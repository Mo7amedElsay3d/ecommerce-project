@extends('admin.layouts.app')
@section('content')
    <div class="product-section  mb-150">
        <div class="container" style="margin-left: 250px; padding-top: 100px;">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اضافة</span> منتج</h3>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-8 offset-lg-2 mb-5 mb-lg-0" style="margin-top: 120px;">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" action="{{ url('/storeProduct') }}" enctype="multipart/form-data">
                            @csrf
                            <p>
                                <input style="width: 100%" type="text" name="name" placeholder="name"
                                    value="{{ old('name') }}" id="name" required>
                                @error('name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            </p>
                            <p style="display: flex">
                                <input style="width: 50%" type="number" class="mr-4" placeholder="Price"
                                    value="{{ old('quantity') }}" name="price" id="price" required>
                                @error('Price')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                            <input style="width: 50%" type="number" class="mr-4" name="quantity" placeholder="quantity"
                                value="{{ old('quantity') }}" id="quantity" required>
                            @error('quantity')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <select name="category_id" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            </p>
                            <input type="file" name="imagepath" required>
                            @error('imagepath')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <p>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="description" required>{{ old('description') }}</textarea>
                            </p>
                            <p><input type="submit" value="Submit"></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
