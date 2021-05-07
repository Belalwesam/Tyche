@extends('layouts.app')
@section('content')
    <div class="products-listing py-5">
        <div class="container">
            <div class="row justify-content-between">
                @if($products->count() > 0)
                    @foreach ($products as $product)
                    <div class="col-12 col-md-4 border mb-5 py-3">
                        <div class="single-product">
                            <img src="/images/product-main.png" class="img-fluid">
                            <div class="single-product-text text-center">
                                <p class="m-0">{{$product->product_title}}</p>
                                <p class="m-0">${{$product->product_price}}</p>
                                @auth
                               <form action="{{ route('add-item-to-cart' , $product->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning text-white mt-2 add-to-cart-btn" data-id="{{$product->id}}">Add to cart</button>
                               </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection