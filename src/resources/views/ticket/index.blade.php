@extends('layouts.app')

@section('title')Tellad｜チケット一覧 @endsection

@section('content')
<div class="mx-3">
    <div class="row">
        <div class="col-md-8 offset-md-2" >
            <div class="row">
                @foreach ($tickets as $ticket)
                    <div class="col-md-4 space-card border mb-3">
                        <a href="{{ route('ticket.show', ['ticket' => $ticket->id ] ) }}">
                            <img class="card-img-top"  src="{{$ticket->ticketImages[0]->real_path}}?<?= uniqid() ?>">
                            <div class="card-body text-dark">
                                <h6 class="card-title ">{{$ticket->title}}</span></h6>
                                <p class="h5 card-text text-right text-danger font-weight-bold">{{$ticket->description}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-5 mt-3">
    {{ $tickets->links() }}
    </div>
</div>
@endsection
