@extends('layouts.master')

@section('title','HomePage');

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Cena</th>
            <th style="width:8%">Množství</th>
            <th style="width:22%" class="text-center">Součet</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cart as $cart_item)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{ $cart_item['item']['name'] }}</h4>
                            <p>{{ $cart_item['item']['description'] }}</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ number_format($cart_item['item']['price'], 2, ',', ' ').' Kč' }}</td>
                <td data-th="Quantity" class="text-center">
                    {{--<input type="number" class="form-control text-center" value="{{ $cart_item['qty'] }}">--}}
                    {{ $cart_item['qty'] }}
                </td>
                <td data-th="Subtotal" class="text-center">{{ number_format($cart_item['total_price'], 2, ',', ' ').' Kč' }}</td>
                <td class="actions" data-th="">
                    {{--<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>--}}
                    <a href="{{ URL::to('/cartdelete/'.$cart_item['item']['id'] ) }} " class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>{{ $sum }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ URL::to('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Pokračovat v nákupu</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>{{ number_format($sum, 2, ',', ' ').' Kč' }}</strong></td>
            <td><a href="{{ URL::to('checkout') }}" class="btn btn-success btn-block">Objednat <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>

@stop