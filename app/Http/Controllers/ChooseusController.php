<?php

namespace App\Http\Controllers;

use App\Models\Chooseus;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ChooseusController extends Controller
{
  function index(Request $req){
    $params = [
      'title' => 'Keunggulan Kami',
      'collection' => Chooseus::where('title', 'like', "%$req->title%")
        ->orderBy('id', 'desc')->get()
    ];

    return view('chooseus.index', $params);
  }

  function add(){
    $params = [
      'title' => 'Tambah Keunggulan Kami'
    ];
    return view('chooseus.add', $params);
  }

  function edit($id){
    $params = [
      'title' => 'Edit Keunggulan Kami',
      'item' => Chooseus::find($id),
    ];

    return view('chooseus.edit', $params);
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
      Chooseus::create([
        'title' => $req->title,
        'file' => $this->upload($req->file, 'chooseus'),
      ]);

      return redirect('chooseus')->with('success', 'Berhasil menambahkan data!');
    } catch (\Throwable $th) {
      return redirect('chooseus')->with('error', $th->getMessage());
    }
  }

  function update(Request $req){
    try {
      $data = Chooseus::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $data->file;

      if ($req->file) {
        $file = $this->upload($req->file, 'chooseus');
      }

      $data->update([
        'title' => $req->title,
        'file' => $file,
      ]);

      return redirect('chooseus')->with('success', 'Berhasil memperbarui data!');
    } catch (\Throwable $th) {
      return redirect('chooseus')->with('error', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $data = Chooseus::find($req->id);

      if (!$data) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      if(file_exists($data->file)){
        unlink($data->file);
      }

      $data->delete();
      
      return redirect('chooseus')->with('success', 'Berhasil menghapus data!');
    } catch (\Throwable $th) {
      return redirect('chooseus')->with('error', $th->getMessage());
    }
  }
}
