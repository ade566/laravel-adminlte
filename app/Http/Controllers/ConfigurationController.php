<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ConfigurationController extends Controller
{

  function index(){
    $params = [
      'title' => 'Konfigurasi',
      'item' => Configuration::first(),
    ];

    return view('configuration.index', $params);
  }

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


  function update(Request $req){
    try {
      $data = Configuration::first();

      $img_aboutus = $data->img_aboutus;

      if ($req->img_aboutus) {
        $img_aboutus = $this->upload($req->img_aboutus, 'aboutus');
      }

      $data->update(array_merge(
        $req->only(['name', 'title_aboutus', 'desc_aboutus', 'telphone']), 
        [
          'img_aboutus' => $img_aboutus,
        ]
      ));

      return redirect('configuration')->with('success', 'Berhasil memperbarui data!');
    } catch (\Throwable $th) {
      return redirect('configuration')->with('error', $th->getMessage());
    }
  }

}
