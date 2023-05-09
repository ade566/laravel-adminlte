<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use InvalidArgumentException;

class PortofolioController extends Controller
{
  function index(Request $req){
    $collection = Portofolio::getData($req->all());

    return view('portofolio.index', [
      'collection' => $collection
    ]);
  }

  function add(){
    return view('portofolio.add', [
      'categories' => Category::get(),
      'title' => 'Tambah Portofolio'
    ]);
  }

  function store(Request $req){
    try {
      $post = array_merge($req->only(['category_id','title', 'description']), [
        'file' => $this->upload($req->file, 'portofolio')
      ]);

      Portofolio::create($post);

      return redirect(url('portofolio'))->with('success', 'Portofolio berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $item = Portofolio::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $this->deleteFile($item->file);
      
      $item->delete();

      return redirect(url('portofolio'))->with('success', 'Slider berhasil dihapus!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function edit($id){
    $item = Portofolio::find($id);

    if (!$item) {
      return redirect()->back()->with('message', 'Data tidak ditemukan!');
    }

    return view('portofolio.edit', [
      'title' => 'Edit Portofolio',
      'item' => $item,
      'categories' => Category::get()
    ]);
  }

  function update(Request $req){
    try {
      $item = Portofolio::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $item->file;

      $post = array_merge($req->only(['category_id','title', 'description']), [
        'file' => $req->file ? $this->upload($req->file, 'portofolio') : $file
      ]);

      $item->update($post);

      if ($req->file) {
        $this->deleteFile($file);
      }

      return redirect(url('portofolio'))->with('success', 'Portofolio berhasil diperbarui!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
}
