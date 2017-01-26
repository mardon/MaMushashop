@extends('layouts.admin')

@section('content')

    <div class="row">
        <h2>Objednávka č. {{ $order->id }}</h2>
        <h3>Zákazník:</h3>
        {{ $order->customer->firstname }} {{ $order->customer->lastname }}
        <p>{{ $order->customer->email }}</p>
        {{ $order->customer->phone }}
        <h3>Adresa:</h3>
        <p>{{ $order->customer->street }}</p>
        <p>{{ $order->customer->city }}</p>
        <p>{{ $order->customer->psc }}</p>
        <h3>Položky:</h3>
        @if($order->status)
            <button class="btn-info btn">Vyřízena</button>
        @else
            <div class="pull-right">
                <a href="{{ URL::to('/admin/status/'.$order->id) }}" class="btn-info btn">Vyřídit</a>
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
            <th>Název</th>
            <th>Počet</th>
            <th>Cena</th>
            </thead>
            <tbody>
            @foreach($order->items  as $item)
                <tr>
                    <th>{{ $item->name }}</th>
                    <th>{{ $item->pivot->quantity }}</th>
                    <th>{{ $item->pivot->price }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop