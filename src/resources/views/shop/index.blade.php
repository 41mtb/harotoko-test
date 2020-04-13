@extends('layouts.app')

@section('title')Tellad｜店舗一覧 @endsection

@section('content')
<div class="mx-3">
    <div class="row">
        <div class="col-md-8 offset-md-2" >
            <div class="row">
                @foreach ($shops as $shop)
                    <div class="col-md-4 space-card border mb-3">
                        <a href="{{ route('shop.show', ['shop' => $shop->id ] ) }}">
                            <img class="card-img-top"  src="{{$shop->shopImages[0]->real_path}}?<?= uniqid() ?>">
                            <div class="card-body text-dark">
                                <h6 class="card-title ">{{$shop->shop_name}}</span></h6>
                                <p class="card-text">{{mb_substr($shop->description,0,24)}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-5 mt-3">
    {{ $shops->links() }}
    </div>
</div>
@endsection
