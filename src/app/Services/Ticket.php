<?php

namespace App\Services;

use Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use TicketModel;

class Ticket
{
  // singup時
  public function create($request)
  {
    $ticketInputs = $request->except(['files','_token']);
    //0は単品、1は割引、2以上はまとめと回数
    if($ticketInputs['type'] == 0 ){
      $ticketInputs['type'] ='単品';
      $ticketInputs['remaing'] = 1 ;
    }elseif($ticketInputs['type'] == 1 ){
      $ticketInputs['type'] ='割引' ;
      $ticketInputs['remaing'] = 1 ;
    }else{
      $ticketInputs['remaing'] = $ticketInputs['type'];
      $ticketInputs['type'] ='まとめ';
    }
    $ticket = TicketModel::create($ticketInputs);
    if($request->file('files')){
      $ticketImages = $request->file('files');
      foreach ($ticketImages as $key => $ticketImage) {
        $path = Storage::disk('s3')->putFileAs('shops', $ticketImage, $ticket['id'].'-'.$key.'.jpg', 'public');
        $realPath = Storage::disk('s3')->url($path);
        $ticket->ticketImages()->create(['path' => $path,'real_path' => $realPath]);
      }
    };
    return $ticket;
  }

  public function update($request,$id)
  {
    try {
      $ticket = TicketModel::where('id', $id)->first();
      $ticketInputs = $request->except(['files','_token']);
      //0は単品、1は割引、2以上はまとめと回数
      if($ticketInputs['type'] == 0 ){
        $ticketInputs['type'] ='単品';
        $ticketInputs['remaing'] = 1 ;
      }elseif($ticketInputs['type'] == 1 ){
        $ticketInputs['type'] ='割引' ;
        $ticketInputs['remaing'] = 1 ;
      }else{
        $ticketInputs['remaing'] = $ticketInputs['type'];
        $ticketInputs['type'] ='まとめ';
      }
      $ticket->fill($ticketInputs)->update();
      if($request->file('files')){
        $ticketImages = $request->file('files');
        $ticketImagePaths = $ticket->ticketImages;
        foreach ($ticketImagePaths as $key => $ticketImagePath) {
          //S3の画像とDBのパスを削除
          Storage::disk('s3')->delete($ticketImagePath['path']);
          $ticket->ticketImages()->delete();
        }
        foreach ($ticketImages as $key => $ticketImage) {
          //S3の画像とDBのパスを追加
          $path = Storage::disk('s3')->putFileAs('shops', $ticketImage, $ticket['id'].'-'.$key.'.jpg', 'public');
          $realPath = Storage::disk('s3')->url($path);
          $ticket->ticketImages()->create(['path' => $path,'real_path' => $realPath]);
        }
      };
    } catch (ModelNotFoundException $e) {
      logger()->error('ShopModel not found.', ['error' => $e]);
      throw new \Exception('ShopModel を取得できなかった');
    } catch (\Exception $e) {
      logger()->error('ShopModel deleting is failed.', ['error' => $e]);
      throw new \Exception('ShopModel を削除できなかった');
    }

    return $ticket;
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