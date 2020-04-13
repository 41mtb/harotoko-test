<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// Model
use TicketModel;

// Service
use TicketService;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = TicketModel::paginate(12);
        return view('ticket.index',compact('tickets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        //サポーターはhome、ホストは店舗登録
        if($user->type == 0){
            return view('/home');
        }else{
            return view('ticket/create',compact('user'));
        };
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $ticket = TicketService::create($request);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('mypage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        try {
            $ticket = TicketModel::where('id', $id)->firstOrFail();
            $shop = $ticket->shop;
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('ticket.show',compact(['ticket','shop']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $ticket = TicketModel::where('id', $id)->firstOrFail();
            $user = Auth::user();
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        };
        return view('ticket.edit',compact(['user','ticket']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$key)
    {
        try {
            $space = SpaceModel::where('key', $key)->firstOrFail();
            $space = SpaceService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('space', $key);
        }

        return ApiResponseBuilder::createResponse(SpaceResponseBuilder::formatData($space));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
