@extends('layouts.masters')
@section('content')

    <div class="product-section mt-150 mb-150">
        <div class="container">

            @if(!isset($category_id))
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            @foreach ($Categories as $item)
                                <li data-filter="._{{ $item->id }}"> {{ $item->name }}</li>
                            @endforeach
                            <li class="active" data-filter="*">الكل</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row product-lists">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center _{{ $item->category_id }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('/singleProduct/' . $item->id) }}"><img
                                    style="max-height: 250px;min-height:250px" src={{ url($item->imagepath) }}
                                    alt=""></a>
                                </div>
                                <h3>{{ $item->name }}</h3>
                            <p class="product-price"> <span> price </span> {{ $item->price }}$ </p>
                            <p class="product-price"><span> Quantity </span> {{ $item->quantity }} </p>
                            <form action="{{ url('/add-to-cart/' . $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="cart-btn">
                                    اضف الى السله
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
