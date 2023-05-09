<?php

namespace App\Http\Controllers;

use App\Models\ChooseUs;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ChooseUsController extends Controller
{
  function index(Request $req){
    $collection = ChooseUs::getData($req->all());

    return view('choose-us.index', [
      'collection' => $collection
    ]);
  }

  function add(){
    return view('choose-us.add', [
      'title' => 'Tambah Keunggulan Kami'
    ]);
  }

  function edit($id){
    $item = ChooseUs::find($id);

    if (!$item) {
      return redirect()->back()->with('message', 'Data tidak ditemukan!');
    }

    return view('choose-us.edit', [
      'title' => 'Edit Keunggulan Kami',
      'item' => $item
    ]);
  }

  function store(Request $req){
    try {
      $post = array_merge($req->only(['title', 'overview']), [
        'file' => $this->upload($req->file, 'choose-us')
      ]);

      ChooseUs::create($post);

      return redirect(url('choose-us'))->with('success', 'Keunggulan kami berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $item = ChooseUs::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }
      
      $this->deleteFile($item->file);

      $item->delete();

      return redirect(url('choose-us'))->with('success', 'Keunggulan kami berhasil dihapus!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function update(Request $req){
    try {
      $item = ChooseUs::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $item->file;

      $post = array_merge($req->only(['title', 'overview']), [
        'file' => $req->file ? $this->upload($req->file, 'choose-us') : $file
      ]);

      $item->update($post);

      if ($req->file) {
        $this->deleteFile($file);
      }

      return redirect(url('choose-us'))->with('success', 'Keunggulan kami berhasil diperbarui!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
}
