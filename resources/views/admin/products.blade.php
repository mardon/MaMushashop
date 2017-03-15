@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Seznam zboží</h1>
            <table class="table table-bordered table-striped">
                <thead>
                <th>Číslo</th>
                <th>Název</th>
                <th>Cena</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th><a href="{{ URL::to('/admin/product/edit/'.$product->id) }}">{{ $product->id }}</a></th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop