<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use OrderModel;

class Order {

  public function create($request)
  {
    $adRequestInputs = $request['adRequest'];
    $adRequestInputs['key']= $this->createKey();
    $adRequestInputs['user_id'] = auth()->id();
    $adRequest = AdRequestModel::create($adRequestInputs);
    return $adRequest;
  }

  public function update($request,$key)
  {
    try {
      $adRequest = AdRequestModel::where('key', $key)->first();
      $adRequest->fill($request['adRequest'])->save();
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }
    return $adRequest;
  }
  
  public function delete(string $key)
  {
      try {
          $request = RequestModel::where('key', $key)->firstOrFail();
          $request->delete();
          return true;
      } catch (ModelNotFoundException $e) {
          logger()->error('RequestModel not found.', ['error' => $e]);
          throw new \Exception('RequestModel を取得できなかった');
      } catch (\Exception $e) {
          logger()->error('RequestModel deleting is failed.', ['error' => $e]);
          throw new \Exception('RequestModel を削除できなかった');
      }
      return false;
  }
}