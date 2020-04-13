<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// Model
use ShopModel;
use UserModel;
use TicketModel;

// Service
use UserService;
use ShopService;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = ShopModel::paginate(12);
        return view('shop.index',compact('shops'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $shopCategories = array('カレー屋','カフェ','居酒屋');
        //サポーターはhome、ホストは店舗登録
        if($user->type == 0){
            return redirect('shop');
        }else{
            return view('shop/create',compact(['user','shopCategories']));
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
            $shop = ShopService::create($request);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('ticket/create');
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
            $shop = ShopModel::where('id', $id)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('shop.show',compact('shop'));
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
            $shop = ShopModel::where('id', $id)->firstOrFail();
            $user = Auth::user();
            $shopCategories = array('カレー屋','カフェ','居酒屋');
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('shop.edit',compact(['user','shop','shopCategories']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $shop = ShopModel::where('id', $id)->firstOrFail();
            $shop = ShopService::update($request,$id);
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }

        return view('shop.show',compact('shop'));
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
