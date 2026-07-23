<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    private function applyFilter($query, $filter, $column = 'created_at')
    {
        return match ($filter) {
            'today' => $query->whereDate($column, today()),

            'month' => $query->whereMonth($column, now()->month)
                ->whereYear($column, now()->year),

            'year' => $query->whereYear($column, now()->year),

            default => $query,
        };
    }
    private function getFilterLabel($filter)
    {
        return match ($filter) {
            'today' => 'Today',
            'month' => 'This Month',
            'year' => 'This Year',
            default => 'All Time',
        };
    }

    private function getDashboardStats($filter)
    {
        return [
            'ordersCount' => $this->applyFilter(
                Order::query(),
                $filter
            )->count(),

            'customersCount' => $this->applyFilter(
                User::where('role', 'user'),
                $filter
            )->count(),

            'revenue' => $this->applyFilter(
                Order::query(),
                $filter
            )->sum('total'),
        ];
    }

    private function getChartData($filter)
    {
        switch ($filter) {

            case 'today':

                $labels = collect(range(0, 23))
                    ->map(fn($hour) => sprintf('%02d:00', $hour));

                $orders = Order::selectRaw('HOUR(created_at) as label, COUNT(*) as total')
                    ->whereDate('created_at', today())
                    ->groupBy(DB::raw('HOUR(created_at)'))
                    ->pluck('total', 'label');

                $revenue = Order::selectRaw('HOUR(created_at) as label, SUM(total) as total')
                    ->whereDate('created_at', today())
                    ->groupBy(DB::raw('HOUR(created_at)'))
                    ->pluck('total', 'label');

                $products = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
                    ->selectRaw('HOUR(orders.created_at) as label, SUM(order_items.quantity) as total')
                    ->whereDate('orders.created_at', today())
                    ->groupBy(DB::raw('HOUR(orders.created_at)'))
                    ->pluck('total', 'label');

                break;

            case 'month':

                $days = now()->daysInMonth;

                $labels = collect(range(1, $days));

                $orders = Order::selectRaw('DAY(created_at) as label, COUNT(*) as total')
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->groupBy(DB::raw('DAY(created_at)'))
                    ->pluck('total', 'label');

                $revenue = Order::selectRaw('DAY(created_at) as label, SUM(total) as total')
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->groupBy(DB::raw('DAY(created_at)'))
                    ->pluck('total', 'label');

                $products = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
                    ->selectRaw('DAY(orders.created_at) as label, SUM(order_items.quantity) as total')
                    ->whereMonth('orders.created_at', now()->month)
                    ->whereYear('orders.created_at', now()->year)
                    ->groupBy(DB::raw('DAY(orders.created_at)'))
                    ->pluck('total', 'label');

                break;

            default:

                $labels = collect(range(1, 12))
                    ->map(fn($month) => Carbon::create()->month($month)->format('M'));

                $orders = Order::selectRaw('MONTH(created_at) as label, COUNT(*) as total')
                    ->whereYear('created_at', now()->year)
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->pluck('total', 'label');

                $revenue = Order::selectRaw('MONTH(created_at) as label, SUM(total) as total')
                    ->whereYear('created_at', now()->year)
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->pluck('total', 'label');

                $products = OrderItem::join('orders', 'orders.id', '=', 'order_items.order_id')
                    ->selectRaw('MONTH(orders.created_at) as label, SUM(order_items.quantity) as total')
                    ->whereYear('orders.created_at', now()->year)
                    ->groupBy(DB::raw('MONTH(orders.created_at)'))
                    ->pluck('total', 'label');
        }

        $orderData = [];
        $revenueData = [];
        $productData = [];

        foreach ($labels as $index => $label) {

            $key = $filter == 'year' ? $index + 1 : (int) $label;

            $orderData[] = $orders[$key] ?? 0;

            $revenueData[] = $revenue[$key] ?? 0;

            $productData[] = $products[$key] ?? 0;
        }

        return [
            'labels' => $labels,
            'ordersData' => $orderData,
            'revenueData' => $revenueData,
            'productsData' => $productData,
        ];
    }
    public function dashboard()
    {
        $categories = Category::all();
        $filter = request('filter', 'today');


        $stats = $this->getDashboardStats($filter);

        $ordersCount = $stats['ordersCount'];
        $CustomerCount = $stats['customersCount'];
        $revenue = $stats['revenue'];

        $chart = $this->getChartData($filter);

        $labels = $chart['labels'];
        $orderData = $chart['ordersData'];
        $revenueData = $chart['revenueData'];
        $productData = $chart['productsData'];
        $orders = $this->applyFilter(
            Order::with('user'),
            $filter
        )
            ->latest()
            ->take(10)
            ->get();


        $topProducts = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->selectRaw('
        order_items.product_id,
        SUM(order_items.quantity) as total_sold,
        SUM(order_items.quantity * order_items.price) as total_revenue
    ');
        $this->applyFilter($topProducts, $filter, 'orders.created_at');

        $filterLabel = $this->getFilterLabel($filter);

        $topProducts = $topProducts
            ->groupBy('order_items.product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        $products = Product::whereIn('id', $topProducts->pluck('product_id'))
            ->get()
            ->keyBy('id');

        foreach ($topProducts as $item) {
            $item->product = $products[$item->product_id] ?? null;
        }



        return view('admin.dashboard', compact('categories', 'orderData', 'revenueData', 'labels', 'productData', 'topProducts', 'orders', 'CustomerCount', 'ordersCount', 'filterLabel', 'revenue'));
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }
    public function create()
    {
        $categories = Category::all();


        return view('admin.products.addproduct', compact('categories'));
    }
    public function store(Request $request)
    {

        $request->validate([

            'name' => ['required', 'unique:products', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'imagepath' => ['image', 'mimes:jpg,jpeg,png'],
            'description' => ['nullable'],
            'category_id' => ['required', 'exists:categories,id']
        ]);


        $imageName = null;

        if ($request->hasFile('imagepath')) {
            $imageName = time() . '.' . $request->imagepath->extension();
            $request->imagepath->move(public_path('images'), $imageName);
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'imagepath' => $imageName ? 'images/' . $imageName : null,
            'user_id' => Auth::id(),
        ]);




        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.ViewProduct', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {


        $product = Product::findOrFail($id);
        $product->update([

            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }


    public function updateprofile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'image' => 'nullable|image',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        //uploade image 
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin/assets/image/profile'), $imageName);

            $data['image'] = 'admin/assets/image/profile/' . $imageName;
        }

        $user->update($data);

        return back()->with('success', 'Profile updated successfully');
    }

    public function deleteProfileImage()
    {
        $user = User::findOrFail(Auth::id());

        $user->save();
        $user->image = null;
        $user->save();

        return back()->with('success', 'Profile image removed');
    }
}
