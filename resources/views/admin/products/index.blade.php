@extends('admin.layouts.app')
@section('content')
<table class="table" style="margin-top: 100px; margin-left: 350px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form style="display: inline" method="POST" action="{{ route('products.remove', $product->id) }}"
                            onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
