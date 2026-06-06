@extends('admin.layouts.app')
@section('title')
    edit
@endsection
@section('content')
    <main id="main" class="main">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('products.update', $product->id) }}" method ="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="title" value="{{ $product->name }}" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <textarea name="quantity" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->quantity }} </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <textarea name="price" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->price }} </textarea>
            </div>
            <select name="category_id" required>
                <option value="">Select Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }} </textarea>
            </div>
            
            <button class="btn btn-primary">Update</button>
        </form>
    </main>
@endsection
