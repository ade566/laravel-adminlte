<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use InvalidArgumentException;

class SliderController extends Controller
{
  function index(Request $req){
    $params = [
      'title' => 'Slider',
      'collection' => Slider::where('title', 'like', "%$req->title%")
        ->where('content', 'like', "%$req->content%")
        ->orderBy('id', 'desc')->get()
    ];

    return view('slider.index', $params);
  }

  function add(){
    $params = [
      'title' => 'Tambah Slider'
    ];
    return view('slider.add', $params);
  }

  function edit($id){
    $params = [
      'title' => 'Edit Slider',
      'item' => Slider::find($id),
    ];

    return view('slider.edit', $params);
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

  function store(Request $req){
    try {
      Slider::create(array_merge($req->only(['title', 'content', 'url']), [
        'file' => $this->upload($req->file, 'slider'),
      ]));

      return redirect('slider')->with('success', 'Berhasil menambahkan data!');
    } catch (\Throwable $th) {
      return redirect('slider')->with('error', $th->getMessage());
    }
  }

  function update(Request $req){
    try {
      $data = Slider::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $data->file;

      if ($req->file) {
        $file = $this->upload($req->file, 'slider');
      }

      $data->update(array_merge($req->only(['title', 'content', 'url']), [
        'file' => $file,
      ]));

      return redirect('slider')->with('success', 'Berhasil memperbarui data!');
    } catch (\Throwable $th) {
      return redirect('slider')->with('error', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $data = Slider::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      if(file_exists($data->file)){
        unlink($data->file);
      }

      $data->delete();
      
      return redirect('slider')->with('success', 'Berhasil menghapus data!');
    } catch (\Throwable $th) {
      return redirect('slider')->with('error', $th->getMessage());
    }
  }
}
