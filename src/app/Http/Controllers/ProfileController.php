<?php
namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


// Model
use ProfileModel;

// Service
use ProfileService;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profiles = ProfileModel::paginate(12);
        // return view('shop.index',compact('shops'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('profile/create',compact('user'));
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
            $profile = ProfileService::create($request);
            $user = Auth::user();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        //サポーターはhome、ホストは店舗登録
        if($user->type == 0){
            return redirect('/home');
        }else{
            $shopCategories = array('カレー屋','カフェ','居酒屋');
            return view('shop/create',compact(['user','shopCategories']));
        };
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
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
            $user = Auth::user();
            $id = $user->id;
            $profile = ProfileModel::where('id', $id)->firstOrFail();
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('profile.edit',compact(['profile','user']));
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
            $profile = ProfileModel::where('id', $id)->firstOrFail();
            $profile = ProfileService::update($request,$id);
        }
        catch (ModelNotFoundException $error) {
            return $error->getMessage();
        }

        return redirect('mypage');
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