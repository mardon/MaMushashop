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
                                {{--<button type="submit"  class="btn btn-primary">Koupit</button>--}}
                            </form>
                            <a href="#" id="add" class="btn btn-primary" data-id="{{ $product->id }}" data-product="{{ $product->name }}" data-price="{{ $product->price }}">Koupit</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="add-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="alert alert-success">Zboží přidáno do košíku</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-product"></div>
                    <div class="modal-price"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Pokračovat v nákupu</button>
                    <a href="{{ URL::to('cart') }}" type="button" class="btn btn-primary">Objednat</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('scripts')
    $(document).ready(function() {

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('a#add').click( function() {
            var product_id = $(this).data('id');
            var url = "/ajaxadd";
            var product_name = $(this).data('product');
            var product_price = $(this).data('price');

            $.ajax({

                type: "POST",
                url: url,
                data: { product_id: product_id },
                success: function (msg) {
                console.log(JSON.stringify(msg));
                var obj = JSON.parse(JSON.stringify(msg));
                $('.badge').html(obj.msg);
                $('#add-modal .modal-product').html(product_name);
                $('#add-modal .modal-price').html(product_price);
                $('#add-modal').modal();

                },
                error: function (data) {
                console.log('Error:', data);
                }
            });
        });
    });
@stop
