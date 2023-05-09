<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use InvalidArgumentException;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;
  
  public function upload($img, $folder)
  {
    try {
      $folder_ext = explode('/', $folder);
      $path = 'storage/upload/'.$folder;
      if (!file_exists($path)) {
        mkdir($path, 0755, true);
      }
      $extension = $img->getClientOriginalExtension();
      $file = rand(000000, 999999).'_'.$folder_ext[0].'.'.$extension;
      $path = $img->move('storage/upload/'.$folder, $file);
      return 'storage/upload/'.$folder.'/'.$file;
    } catch (\Throwable $th) {
      throw new InvalidArgumentException($th->getMessage(), 500);
    }
  }  


  function deleteFile($img){
    if(file_exists($img)){
      unlink($img);
    }
  }
}
