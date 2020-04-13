<?php

namespace App\Services;

use Hash;
use Storage;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use ShopModel;
use UserModel;

class Shop
{

  public function create($request)
  {
    $shopInputs = $request->except(['files','_token']);
    $shop = ShopModel::create($shopInputs);
    if($request->file('files')){
      $shopImages = $request->file('files');
      foreach ($shopImages as $key => $shopImage) {
        $path = Storage::disk('s3')->putFileAs('shops', $shopImage, $shop['id'].'-'.$key.'.jpg', 'public');
        $realPath = Storage::disk('s3')->url($path);
        $shop->shopImages()->create((['path' => $path,'real_path' => $realPath]));
      }
    };
    return $shop;
  }

  public function update($request,$id)
  {
    try {
      $shop = ShopModel::where('id', $id)->first();
      $shopInputs = $request->except(['files','_token']);
      $shop->fill($shopInputs)->update();
      if($request->file('files')){
        $shopImages = $request->file('files');
        $shopImagePaths = $shop->shopImages;
        foreach ($shopImagePaths as $key => $shopImagePath) {
          //S3の画像とDBのパスを削除
          Storage::disk('s3')->delete($shopImagePath['path']);
          $shop->shopImages()->delete();
        }
        foreach ($shopImages as $key => $shopImage) {
          //S3の画像とDBのパスを追加
          $path = Storage::disk('s3')->putFileAs('shops', $shopImage, $shop['id'].'-'.$key.'.jpg', 'public');
          $realPath = Storage::disk('s3')->url($path);
          $shop->shopImages()->create(['path' => $path,'real_path' => $realPath]);
        }
      };
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $shop;
  }

  public function delete(string $key)
  {
    try {
      $user = UserModel::where('key', $key)->firstOrFail();
      $user->delete();
      return true;
    } catch (ModelNotFoundException $e) {
      logger()->error('UserModel not found.', ['error' => $e]);
      throw new \Exception('UserModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('UserModel deleting is failed.', ['error' => $e]);
      throw new \Exception('UserModel を削除できなかった');
    }
    return false;
  }
}