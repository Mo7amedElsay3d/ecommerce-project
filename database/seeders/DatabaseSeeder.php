<?php

namespace Database\Seeders;
// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\product;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    
    public function run(): void
    {
     

    $categories=[
    ['id'=>'1','name'=>'ماكولات', 'description'=> 'مشويه', 'imagepath'=> 'assets\img\m.jfif'],
    ['id'=>'2','name'=>'الكترونيات', 'description'=> '', 'imagepath'=> 'assets\img\e1.jfif'],
    ['id'=>'3','name'=>'مكياج', 'description'=> 'مستورده', 'imagepath'=> 'assets\img\y.jfif'],
    ['id'=>'4','name'=>'كاميرات', 'description'=> 'canon', 'imagepath'=> 'assets\img\k.jfif'],
    ['id'=>'5','name'=>'ساعات', 'description'=> 'سويسريه', 'imagepath'=> 'assets\img\s.jfif'],
    ['id'=>'6','name'=>'شنط', 'description'=> '', 'imagepath'=> 'assets\img\sh.jfif']
    ];



    DB::table('categories')->insertOrIgnore($categories);




    
    for ($i = 1; $i <= 25; $i++) {
        product::create([
            'name' => 'Product ' . $i,
            'description'=>'this is product number' . $i,
            'price' => rand(100, 1000),
            'quantity' => rand(1,50),
            'imagepath'=>'',
            'category_id'=>rand(1,6),
            ]);
    }          
            
    }
}
