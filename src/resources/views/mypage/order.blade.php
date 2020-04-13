@extends('layouts.app')

@section('title')Harotoko｜マイページ @endsection

@section('content')
    <div class="container col-md-4 offset-md-4 mb-5">
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item font-weight-bold">購入済みチケット</li>
        @foreach($orders as $order)
        <li class="list-group-item font-weight-bold">購入済みチケット：{{$order->ordering_description}}</li>
        @endforeach
    </ul>
    </div>
@endsection
