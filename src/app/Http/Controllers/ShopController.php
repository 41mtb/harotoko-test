<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    public function index($id)
    {
        //
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
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $key)
    {
        try {
            $shop = ShopModel::where('key', $key)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::unauthorized();
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
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
            $shop = ShopModel::where('key', $key)->firstOrFail();
            $shop = ShopService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('shop', $key);
        }

        return ApiResponseBuilder::createResponse(ShopResponseBuilder::formatData($shop));
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
