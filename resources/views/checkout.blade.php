@extends('layouts.master')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-6">
        <form class="form-horizontal" method="post" action="{{ URL::to('checkout') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="firstname" class="control-label col-xs-2">Jméno</label>
                <div class="col-xs-10">
                    <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" id="firstname" placeholder="Jméno">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="control-label col-xs-2">Příjmení</label>
                <div class="col-xs-10">
                    <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" id="lastname" placeholder="Příjmení">
                </div>
            </div>
            <div class="form-group">
                <label for="street" class="control-label col-xs-2">Ulice, č.p</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="street" value="{{ old('street') }}" id="street" placeholder="Ulice, č.p">
                </div>
            </div>
            <div class="form-group">
                <label for="town" class="control-label col-xs-2">Místo</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city" placeholder="Místo">
                </div>
            </div>
            <div class="form-group">
                <label for="town" class="control-label col-xs-2">PSČ</label>
                <div class="col-xs-10">
                    <input type="text" name="psc" class="form-control" value="{{ old('psc') }}" name="psc" id="psc" placeholder="PSČ">
                </div>
            </div>
            <div class="form-group">
                <label for="town" class="control-label col-xs-2">email</label>
                <div class="col-xs-10">
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="email">
                </div>
            </div>
            <div class="form-group">
                <label for="town" class="control-label col-xs-2">Telefon</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Telefon">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Odeslat</button>
                </div>
            </div>
        </form>
    </div>

@endsection