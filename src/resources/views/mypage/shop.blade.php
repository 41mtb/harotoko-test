@extends('layouts.app')

@section('title')Harotoko｜マイページ @endsection

@section('content')
    <div class="container col-md-4 offset-md-4 mb-5">
    <ul class="list-group list-group-flush">
        <li class="list-group-item font-weight-bold text-center h4">店舗・チケット管理</li>
        @foreach($shops as $shop)
          <li class="list-group-item"><span class='h5'><a href="{{ route('shop.show', ['shop' => $shop->id ] ) }}">店舗名：{{$shop->shop_name}}</a></span><a class='float-right' href="{{ route('shop.edit', ['shop' => $shop->id ] ) }}">編集</a>
            <div class="card mt-1 border-0">
              <img class="card-img-top img-thumbnail" src="{{$shop->shopImages[0]->real_path}}?<?= uniqid() ?>" style="height:150px;" alt="店舗画像">
              <div class="card-body p-1 mb-0">
                <p class="card-title">{{$shop->feature}}</p>
                <p class="card-text small">ジャンル：{{$shop->shop_category}}<br>{{$shop->description}}</p>
              </div>
            </div>
          </li>
          @foreach($shop->tickets as $ticket)
          <li class="list-group-item font-weight-bold text-white p-1">
            <div class='row'>
              <div class='container bg-success rounded-lg col-10 py-2'>
                <div class="d-inline-block my-auto mx-2">
                  <img class="img-thumbnail" src='{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>' style="height:50px;" >
                </div>
                <a class='text-white' href="{{ route('ticket.show', ['ticket' => $ticket->id ] ) }}">{{$ticket->title}}</a>
              </div>
              <div class='col-2 my-auto'>
                  <a href="{{ route('ticket.edit', ['ticket' => $ticket->id ] ) }}">編集</a>
              </div>
            </div>
          </li>
          @endforeach
      @endforeach
    </ul>
    </div>
@endsection
