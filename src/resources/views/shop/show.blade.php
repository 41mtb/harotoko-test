@extends('layouts.app')

@section('title')Tellad｜スペース詳細 @endsection

@section('content')
<div class='row'>
  <div class='col-md-8 offset-md-2'>
    <div class='row'>
        <div class="card mx-auto border-0">
          <div class="card-title h5 m-3">{{$shop->feature}}</div>
          <div class="card-body">
            <img class="img-fluid" src="{{ $shop->shopImages[0]->real_path}}?<?= uniqid() ?>"  style="height:250px;" alt="店舗画像">
            <div claaa='row'>
              <a class=' text-dark font-weight-bold' data-toggle="collapse" href="#multiCollapseExample99" role="button" aria-expanded="false" aria-controls="multiCollapseExample99">▼お店の詳細を見る▼</a>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample99">
                  <ul class="list-group list-group-flush ">
                    <li class="p-2 list-group-item">お店の名前：{{$shop->shop_name}}</li>
                    <li class="p-2 list-group-item">お店のHP：{{$shop->url}}</li>
                    <li class="p-2 list-group-item">ジャンル：{{$shop->shop_category}}</li>
                    <li class="p-2 list-group-item">住所：{{$shop->shop_nprefecture}}{{$shop->city}}{{$shop->block}}</li>
                    <li class="p-2 list-group-item">お店の説明<br>{{$shop->description}}</li>
                  </ul>
            </div>
          </div>
          @foreach($shop->tickets as $ticket)
            <li class="list-group-item font-weight-bold text-white p-1 border-0">
              <div class='row'>
                <div class='container col-10 bg-success rounded-lg py-2'>
                  <a data-toggle="collapse" href="#multiCollapseExample{{$loop->iteration}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{$loop->iteration}}">
                    <div class="d-inline-block my-auto mx-2">
                      <img class="img-thumbnail" src='{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>' style="height:50px;" >
                    </div>
                    <span class='text-white'>{{$ticket->title}}</span>
                  </div>
                </a>
                <div class='col-2'>
                  <a class='btn btn-outline-primary' href="{{ route('ticket.show', ['ticket' => $ticket->id ] ) }}">詳細</a>
                </div>
              </div>
                  <div class="collapse multi-collapse" id="multiCollapseExample{{$loop->iteration}}">
                    <div class="card text-dark card-body border-0">
                      第1要素のコンテンツ。第1要素のコンテンツ。第1要素のコンテンツ。第1要素のコンテンツ。
                    </div>
                  </div>
              </div>
            </li>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div><!-- row -->
@endsection