@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Products</h1>
        <p class="lead">eCommerce+ offers only the highest quality product!</p>
        <hr class="my-4">
        <div class="row">
            <a href="{{url("/products")}}" class="btn btn-outline-primary m-1">All</a>
            <a href="{{url("/products/men")}}" class="btn btn-outline-primary m-1">Men</a>
            <a href="{{url("/products/women")}}" class="btn btn-outline-primary m-1">Women</a>
            <a href="{{url("/products/kids")}}" class="btn btn-outline-primary m-1">Kids</a>
        </div>
    </div>
    <div class="container" style="min-height: 42vh">
        @if(count($products)>0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" style="height: 25vh;"
                                 src="{{url("public/storage/product_images/$product->image_path")}}"
                                 alt="Card image">
                            <div class="card-body">
                                <p class="card-text"><b>{{$product->name}}</b></p>
                                <p class="card-text text-muted">{{$product->type}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{url("/products/$product->id")}}" type="button"
                                           class="btn btn-sm btn-outline-secondary">View</a>
                                        @auth
                                            <form action="">

                                            </form>
                                            <a href="{{url("/cart/create/$product->id")}}" type="button"
                                               class="btn btn-sm btn-outline-secondary">Add</a>
                                        @endauth
                                    </div>
                                    <small class="text-muted">${{$product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="row mt-4">
                <div class="text-xs-center ml-auto mr-auto">
                    {{$products->links()}}
                </div>
            </div>
        @else
            <div class="row">
                <h4 class="ml-auto mr-auto">There are unfortunately no products at this time...</h4>
            </div>
        @endif
    </div>
@endsection
