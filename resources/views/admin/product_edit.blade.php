@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/product/update/{{ $product->id }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Název</label>
                    <input type="text" name="name" class="form-control"  value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Popis</label>
                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Cena</label>
                    <input type="text" name="price" class="form-control"  value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="image">Obrázek</label>
                    <input type="file" name="image" class="form-control" value="{{ $product->image }}">
                </div>
                <button type="submit" class="btn btn-default">Uložit</button>
            </form>
        </div>
    </div>
@stop