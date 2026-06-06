<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        return view('admin.dashboard', compact('categories'));
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
