@extends('layouts.app')

@section('title')Tellad｜スペース詳細 @endsection

@section('content')
<div class='row'>
  <div class='col-md-6 offset-md-3'>
    <div class="pt-3 bg-white container border-0">
      <div class="border-bottom p-3 h5 text-center font-weight-bold">{{$shop->shop_name}}</div>
      <div class='mx-auto'>
        <img class='mx-auto d-block' src="{{ $shop->shopImages[0]->real_path}}?<?= uniqid() ?>"  style="height:250px;" alt="店舗画像">
      </div>
        <ul class="list-group list-group-flush mt-3">
          <li class="p-2 list-group-item h5 text-center">店舗情報</li>
          <li class="p-2 list-group-item">お店の特徴<br>{{$shop->feature}}</li>
          <li class="p-2 list-group-item">お店の説明<br>{{$shop->description}}</li>
          <li class="p-2 list-group-item">ホームページ：<br>{{$shop->url}}</li>
          <li class="p-2 list-group-item">住所：{{$shop->shop_nprefecture}}{{$shop->city}}{{$shop->block}}</li>
        </ul>
        <div class="text-center h5 m-3">このお店のチケット</div>
        @foreach($shop->tickets as $ticket)
          <li class="list-group-item font-weight-bold text-white p-1 border-0">
            <a href="{{ route('ticket.show', ['ticket' => $ticket->id ] ) }}">
              <div class='container row bg-success rounded-lg py-2'>
                  <div class="d-inline-block my-auto mx-2 col-4">
                    <img class="img-thumbnail" src='{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>' style="height:50px;" >
                  </div>
                  <span class='text-white'>{{$ticket->title}}<br>　　　{{$ticket->price}}円</span>
                </div>
              </div>
            </a>
          </li>
        @endforeach
      </div>
    </div>
  </div>
</div><!-- row -->
@endsection