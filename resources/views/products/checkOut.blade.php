@extends('layouts.sub')
@section('contentt')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Check Out</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->



    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{ route('place.order') }}" method="POST">
                                                @csrf
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <p>
                                                    <input type="text" name="name" placeholder="Name" required>
                                                </p>

                                                <p>
                                                    <input type="email" name="email" placeholder="Email" required>
                                                </p>

                                                <p>
                                                    <input type="text" name="address" placeholder="Address" required>
                                                </p>

                                                <p>
                                                    <input type="text" name="phone" placeholder="Phone" required>
                                                </p>

                                                <div class="payment-methods">

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" name="payment_method"
                                                            id="cash" value="cash" checked>

                                                        <label class="form-check-label" for="cash">
                                                            Cash On Delivery
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment_method"
                                                            id="card" value="card">

                                                        <label class="form-check-label" for="card">
                                                            Credit Card
                                                        </label>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Your order Details</th>
                                    <th>Price</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @php
                                $subtotal = 0;
                            @endphp
                            <tbody class="order-details-body">
                                @foreach ($cartItems as $item)
                                    @php
                                        $subtotal += $item->product->price * $item->quantity;
                                    @endphp
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->price }} $</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $item->id) }}"
                                                onclick="return confirm('Remove item?')">
                                                <i class="far fa-window-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{ $subtotal }}$</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$50</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{ $subtotal + 50 }}$</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="boxed-btn">
                            Place Order
                        </button>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end check out section -->
@endsection
