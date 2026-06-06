@extends('admin.layouts.app')
@section('content')






@section('title')
    Show
@endsection
<main id="main" class="main">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Product info
            </div>
            <div class="card-body">
                <h1 class="card-title"> Name: {{ $product->name }}</h1>
                <img style="max-height: 250px;min-height:250px" src="{{ url($product->imagepath) }}" alt="">
                <p class="card-text">Description: {{ $product->description }}</p>
                <p class="card-text">Category: {{ $product->category->name }}</p>
                <p class="card-text">Price: {{ $product->price }}</p>
                <p class="card-text">Quantity: {{ $product->quantity }}</p>
            </div>
        </div>
        <div class="card mt-4">
            <h5 class="card-header">Product creator info</h5>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $product->user ? $product->user->name : 'Not Found' }} </h5>
                <p class="card-text">Email: {{ $product->user ? $product->user->email : 'Not Found' }}</p>
                <p class="card-text"> created_at: {{ $product->user ? $product->user->created_at : 'Not Found' }}</p>
            </div>
        </div>
    </div>



</main>



@endsection
