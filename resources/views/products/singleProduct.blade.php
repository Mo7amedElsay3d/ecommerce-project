@extends('layouts.sub')
@section('contentt')

 <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>تفاصيل اكثر عن هذا المنتج</p>
                        <h1>تفاصيل المنتج</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    
    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img style="max-height: 250px;min-height:250px" src="{{ url($product->imagepath) }}" alt="">
                    </div>
                </div>


                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>{{ $product->qunatity }}</span> {{ $product->price }}$</p>
                        <p>{{ $product->description }}.</p>
                        <div class="single-product-form">
                            <form action="index.html">
                            </form>
                            <form action="{{ url('/add-to-cart/' . $product->id) }}" method="POST">
                                @csrf
                                    <input type="number" name="quantity" value="1" min="1">
                                <button type="submit" class="cart-btn">
                                    اضف الى السله
                                </button>
                            </form>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                                <p><strong>قسم: </strong>{{ $product->category->name }}</p>
                        </div>

                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">منتجات</span> ذات صله</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($relatedProducts as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('/singleProduct/' . $item->id) }}">
                                    <img
                                        style="max-height: 250px;min-height:250px" src="{{ url($item->imagepath) }}"
                                        alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }}$ </p>
                            <form action="{{ url('/add-to-cart/' . $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="cart-btn">
                                    اضف الى السله
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

            </div>
        </div>
    </div>
    <!-- end more products -->
@endsection
