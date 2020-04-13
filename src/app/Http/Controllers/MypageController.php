<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// Model
use UserModel;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('mypage.index',compact('user'));
    }
    public function shop()
    {
        $user = Auth::user();
        $shops = $user->shops;
        return view('mypage.shop',compact(['user','shops']));
    }
    public function order()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return view('mypage.order',compact(['user','orders']));
    }
    public function supporter()
    {
        $user = Auth::user();
        $shops =$user->shops;
        $allOrder = '';
        foreach($shops as $shop){
            $tickets = $shop->tickets;
            foreach($tickets as $ticket){
                $orders = $ticket->orders;
                foreach($orders as $order){
                    $allOrder[] = $order;
                }
            }
        }
        return view('mypage.supporter',compact(['user','allOrder']));
    }
}
