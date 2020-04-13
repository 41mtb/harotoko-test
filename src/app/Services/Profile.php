<?php

namespace App\Services;

use Hash;

use App\Traits\{CreateKey, FindByKey};

use ArrayUtil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ProfileModel;

class Profile
{

  public function create($request)
  {
    $profileInputs = $request->except('_token');
    $profile = ProfileModel::create($profileInputs);
    return $profile;
  }

  public function update($request,$id)
  {
    try {
      $profile = ProfileModel::where('id', $id)->first();
      $profileInputs = $request->except('_token');
      $profile->fill($profileInputs)->update();
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $profile;
  }
}