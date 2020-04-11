@extends('layouts.app')
@section('title')harotoko|welcome 
@endsection
@section('content')

    <div class='container'>
        <h1>神戸市特化の飲食店前払いサービス</h1>
        <h5>お客様からの支援にほんの少しの気持ちを添えて、お返ししましょう。</h5>
        <h5>難しい操作なく、すぐに始められます</h5>
        <img class="img-fluid" src="{{asset('/images/global/harotoko.png')}}?<?= uniqid() ?>" alt="image">
    </div>
@endsection