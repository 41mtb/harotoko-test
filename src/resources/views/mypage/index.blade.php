@extends('layouts.app')

@section('title')Harotoko｜マイページ @endsection

@section('content')
    <div class="container col-md-4 offset-md-4 mb-5">
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item font-weight-bold">マイページ</li>
        <li class="list-group-item"><a href="{{ route('profile.edit', ['profile' => $user->id ] ) }}">プロフィール</a></li>
        @if($user->type == 1)
        <li class="list-group-item"><a href="{{ route('shop.create') }}">お店を登録する</a></li>
        <li class="list-group-item"><a href="{{ route('ticket.create') }}">チケットを登録する</a></li>
        <li class="list-group-item"><a href="{{ route('mypage.shop') }}">お店とチケットの管理</a></li>
        <li class="list-group-item"><a href="{{ route('mypage.supporter') }}">サポーターの一覧</a></li>
        <li class="list-group-item"><a href="">振込情報登録</a></li>
        @elseif($user->type == 0)
        <li class="list-group-item"><a href="{{ route('mypage.order') }}">マイチケット</a></li>
        <li class="list-group-item"><a href="">決済情報登録</a></li>
        @endif
    </ul>
    </div>
@endsection
