<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

// Request
use App\Http\Requests\Order;

// Model
use OrderModel;

// Service
use OrderService;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $adRequest = AdRequestService::create($request);
        }
        catch (\Exception $e) {
            return ApiResponseBuilder::serverError();
        }
        return ApiResponseBuilder::createResponse(AdRequestResponseBuilder::formatData($adRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        try {
            $adRequest = AdRequestModel::where('key', $key)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('adRequest', $key);
        }
        return ApiResponseBuilder::createResponse(AdResponseBuilder::formatData($adRequest));
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
            $adRequest = AdRequestModel::where('key', $key)->firstOrFail();
            $adRequest = AdRequestService::update($request,$key);
        }
        catch (ModelNotFoundException $error) {
            return ApiResponseBuilder::modelNotFound('adRequest', $key);
        }

        return ApiResponseBuilder::createResponse(AdRequestResponseBuilder::formatData($adRequest));
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