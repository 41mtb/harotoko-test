@extends('layouts.app')

@section('title')Tellad｜スペース詳細 @endsection

@section('content')
<div class='row'>
  <div class='col-md-6 offset-md-3'>
    <div class='row mt-3'>
      <div class='container bg-success rounded-lg col-10 py-2'>
        <div class="d-inline-block my-auto mx-2 row">
          <img class="img-thumbnail" src='{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>' style="height:50px;" >
        </div>
        <a class='text-white' href="{{ route('ticket.show', ['ticket' => $ticket->id ] ) }}">{{$ticket->title}}</a>
      </div>
      <div class='col-2 my-auto'>
          <a class='btn btn-outline-danger' href="{{ route('shop.edit', ['shop' => $shop->id ] ) }}">購入</a>
      </div>
    </div>
    <h5 class='mt-2 text-center'>チケット情報</h5>
    <div class='row my-2 mx-0'>
      <div class='col-6'>
        <img class="img-fluid" src='{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>' style="height:150px;" >
      </div>
      <div class='col-6 my-auto'>
        <ul class="list-group list-group-flush small">
          <li class="p-2 list-group-item">金額：{{$ticket->price}}円</li>
          <li class="p-2 list-group-item">{{$ticket->type}}チケット：{{$ticket->remaing}}回</li>
          <li class="p-2 list-group-item">このチケットの説明<br>{{$ticket->description}}</li>
        </ul>
      </div>
    </div>
    <div class='row'>
      <div class="card border-0">
        <div class="card-title h5 m-3">{{$shop->feature}}<br>{{$shop->shop_name}}</div>
          <img class="img-fluid" src="{{ asset('images/global/harotoko.png')}}" alt="店舗画像">
          <a class='text-center text-dark font-weight-bold' data-toggle="collapse" href="#multiCollapseExample99" role="button" aria-expanded="false" aria-controls="multiCollapseExample99">▼お店の詳細を見る▼</a>
          <div class="collapse multi-collapse" id="multiCollapseExample99">
            <div class="card-body">
              <ul class="list-group list-group-flush ">
                <li class="p-2 list-group-item">お店の名前：{{$shop->shop_name}}</li>
                <li class="p-2 list-group-item">お店のHP：{{$shop->url}}</li>
                <li class="p-2 list-group-item">ジャンル：{{$shop->shop_category}}</li>
                <li class="p-2 list-group-item">住所：{{$shop->shop_nprefecture}}{{$shop->city}}{{$shop->block}}</li>
                <li class="p-2 list-group-item">お店の説明<br>{{$shop->description}}</li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection