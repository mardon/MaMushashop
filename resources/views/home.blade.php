@extends('layouts.master')
@section('title','HomePage');
@section('content')
    @if(session('message'))
        <div id="success-alert" class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        @foreach ($products->chunk(3) as $products)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="image">
                            <img src="{{ url('/products/'.$product->image) }}"  alt="{{ $product->name }}">
                        </div>
                        <div class="description">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="price">{{ $product->price }} Kč</div>
                        <div class="buy">
                            <form method="POST" action="{{ URL::to('addcart') }}" class="form-inline" role="form">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit"  class="btn btn-primary">Koupit</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop
