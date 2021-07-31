@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5" style="min-height: 64vh">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @auth
                    <div class="card">
                        <div class="card-header">Shopping Cart</div>

                        <div class="card-body">
                            <div class="container">
                                @foreach($cart as $order)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="align-middle"><b>{{$order->product->name}}</b></p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="align-middle">{{$order->quantity}}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="align-middle">
                                                ${{sprintf('%0.2f', $order->quantity * $order->product->price)}}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{url("/cart/$order->id/edit")}}" class="text-muted">edit</a>
                                        </div>
                                        <div class="col-md-1">
                                            {!! Form::open(['action' => ['CartController@destroy', $order->id], 'method'=> 'POST']) !!}
                                            {{Form::hidden('_method','DELETE') }}
                                            {{Form::submit('X',['class'=>'btn text-danger']) }}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="container">
                                <div class="row">
                                    <a class="btn text-primary" href="{{url('products')}}">Keep Shopping</a>
                                    @if(count($cart)>0)
                                    {!! Form::open(['action' => ['CartController@buy', $id], 'method'=> 'POST', 'class'=>'ml-auto']) !!}
                                    {{Form::hidden('_method','DELETE') }}
                                    {{Form::submit('Purchase',['class'=>'btn btn-success ml-auto']) }}
                                    {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
