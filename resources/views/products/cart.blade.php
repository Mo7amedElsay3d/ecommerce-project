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

    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($cartItems as $item)
                                    <tr class="table-body-row">

                                        <td>
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" style="border:none;background:none;">
                                                    <i class="far fa-window-close"></i>
                                                </button>
                                            </form>
                                        </td>

                                        <td class="product-image">
                                            <img src="{{ url($item->product->imagepath) }}">
                                        </td>

                                        <td class="product-name">
                                            {{ $item->product->name }}
                                        </td>

                                        <td class="product-price">
                                            {{ $item->product->price }} $
                                        </td>

                                        <td class="column-4">
                                            <div class="d-flex align-items-center">

                                                <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        -
                                                    </button>
                                                </form>

                                                <input type="text" value="{{ $item->quantity }}"
                                                    style="width:60px;text-align:center" readonly>

                                                <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        +
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                        <td class="product-total">
                                            {{ $item->product->price * $item->quantity }} $
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                    $total = 0;
                                @endphp

                                @foreach ($cartItems as $item)
                                    @php
                                        $total += $item->product->price * $item->quantity;
                                    @endphp
                                @endforeach

                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>{{ $total }} $</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$50</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>{{ $total + 50 }} $</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">

                            <a href="cart.html" class="boxed-btn">Update Cart</a>

                            <form action="{{ route('checkout') }}" style="display:inline-block;">

                                <button type="submit" class="boxed-btn custom-checkout-btn">
                                    Check Out
                                </button>
                            </form>

                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
