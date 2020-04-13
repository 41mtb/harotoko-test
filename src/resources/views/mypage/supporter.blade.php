@extends('layouts.app')

@section('title')Harotoko｜マイページ @endsection

@section('content')
    <div class="container col-md-4 offset-md-4 mb-5">
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item font-weight-bold">購入済みの支援者一覧</li>
        @if($allOrder)
            @foreach($allOrder as $order)
            <li class="list-group-item ">{{$order->user->name}}さん　{{$order->message}}</li>
            @endforeach
        @else
            <li class="list-group-item ">まだ購入者はいません</li>
        @endif
    </ul>
    </div>
@endsection
