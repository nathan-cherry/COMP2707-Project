@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Admin Panel</h1>
        <p class="lead">A backend panel to monitor all database records</p>
        <hr class="my-4">
    </div>
    <div class="row">
        <h3>Orders</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 35%">Product</th>
                <th scope="col" style="width: 35%">User</th>
                <th scope="col" style="width: 10%">Quantity</th>
                <th scope="col" style="width: 15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$order->id}}</th>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>
                        {!! Form::open(['action' => ['CartController@destroy', $order->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/cart/$order->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{url('/admin/orders')}}" class="ml-auto">Show All Orders</a>
    </div>
    <div class="row">
        <h3>Products</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 50%">Product Name</th>
                <th scope="col" style="width: 10%">Price</th>
                <th scope="col" style="width: 10%">Type</th>
                <th scope="col" style="width: 5%">Stock</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row" class="text-center">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->type}}</td>
                    @if($product->state == 'in-stock')
                        <td class="bg-success text-center" style="opacity: 0.85">{{$product->stock}}</td>
                    @elseif($product->state == 'sold-out')
                        <td class="bg-danger text-center" style="opacity: 0.85">{{$product->stock}}</td>
                    @else
                        <td class="bg-secondary text-center">{{$product->stock}}</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/products/$product->id")}}" class="btn btn-secondary">View</a>
                        <a href="{{url("/products/$product->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{url('/admin/products')}}" class="ml-auto">Show All Products</a>
    </div>
    <div class="row mb-5">
        <h3>Users</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">ID</th>
                <th scope="col" style="width: 30%">Name</th>
                <th scope="col" style="width: 30%">Email</th>
                <th scope="col" style="width: 10%">Account</th>
                <th scope="col" style="width: 25%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row" class="text-center">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->isAdmin)
                        <td class="bg-success text-center" style="opacity: 0.85">Admin</td>
                    @else
                        <td class="bg-secondary text-center" style="opacity: 0.85">User</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['AdminController@destroyUser', $user->id], 'method'=> 'POST']) !!}
                        <a href="{{url("/cart/$user->id")}}" class="btn btn-secondary">View Cart</a>
                        <a href="{{url("/admin/user/$user->id/edit")}}" class="btn btn-warning">edit</a>
                        {{Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{url('/admin/users')}}" class="ml-auto">Show All Users</a>
    </div>
@endsection
