@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Seznam objednávek</h1>
            <table class="table table-bordered table-striped">
                <thead>
                <th>Číslo</th>
                <th>Zákazník</th>
                <th>Celkem</th>
                <th>Stav</th>
                <th>Datum</th>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th><a href="{{ URL::to('/admin/detail/'.$order->id) }}">{{ $order->id }}</a></th>
                        <th>{{ $order->name }}</th>
                        <th>{{ $order->sum }}</th>
                        <th>@if($order->status)
                                <span class="label label-info">Vyřízeno</span>
                            @else
                                <span class="label label-danger">Nevyřízeno</span>
                            @endif
                        </th>
                        <th>{{ $order->created_at->format('d.m.Y H:i') }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@stop