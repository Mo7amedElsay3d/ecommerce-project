@extends('layouts.sub')
@section('contentt')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>MY ORDERS</h1>
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
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                        </tr>
                                        
                                        <tbody>
                                            @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->total }} $</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
