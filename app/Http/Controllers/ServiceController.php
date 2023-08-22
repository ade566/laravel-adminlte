<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ServiceController extends Controller
{
  function index(Request $req){
    $params = [
      'title' => 'Layanan Kami',
      'collection' => Service::where('title', 'like', "%$req->title%")
        ->where('content', 'like', "%$req->content%")
        ->orderBy('id', 'desc')->get()
    ];

    return view('service.index', $params);
  }

  function add(){
    $params = [
      'title' => 'Tambah Layanan Kami'
    ];
    return view('service.add', $params);
  }

  function edit($id){
    $params = [
      'title' => 'Edit Layanan Kami',
      'item' => Service::find($id),
    ];

    return view('service.edit', $params);
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
      Service::create(array_merge($req->only(['title', 'content']), [
        'file' => $this->upload($req->file, 'service'),
      ]));

      return redirect('service')->with('success', 'Berhasil menambahkan data!');
    } catch (\Throwable $th) {
      return redirect('service')->with('error', $th->getMessage());
    }
  }

  function update(Request $req){
    try {
      $data = Service::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $data->file;

      if ($req->file) {
        $file = $this->upload($req->file, 'service');
      }

      $data->update(array_merge($req->only(['title', 'content']), [
        'file' => $file,
      ]));

      return redirect('service')->with('success', 'Berhasil memperbarui data!');
    } catch (\Throwable $th) {
      return redirect('service')->with('error', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $data = Service::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      if(file_exists($data->file)){
        unlink($data->file);
      }

      $data->delete();
      
      return redirect('service')->with('success', 'Berhasil menghapus data!');
    } catch (\Throwable $th) {
      return redirect('service')->with('error', $th->getMessage());
    }
  }
}
