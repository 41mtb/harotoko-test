@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8 row mx-auto">
            <div class='col-md-4 mt-5'>
                <a class='btn-lg btn-warning py-4' href="shop">　店舗　</a>
            </div>
            <div class='col-md-4 mt-5'>
                <a class='btn-lg btn-primary py-4' href="ticket">チケット</a>
            </div>
            <div class='col-md-4 mt-5'>
                <a class='btn-lg btn-danger py-4' href="ticket">そのほか</a>
            </div>
        </div>
</div>
@endsection
