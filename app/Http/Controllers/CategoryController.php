<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use InvalidArgumentException;

class CategoryController extends Controller
{
  function index(){
    $collection = Category::getData();

    return view('category.index', [
      'collection' => $collection
    ]);
  }

  function add(){
    return view('category.add', [
      'title' => 'Tambah Kategori'
    ]);
  }

  function edit($id){
    $item = Category::find($id);

    if (!$item) {
      return redirect()->back()->with('message', 'Data tidak ditemukan!');
    }

    return view('category.edit', [
      'title' => 'Edit Kategori',
      'item' => $item
    ]);
  }

  function store(Request $req){
    try {
      $post = $req->only(['title']);

      Category::create($post);

      return redirect(url('category'))->with('success', 'Kategori berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $item = Category::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }
      
      $item->delete();

      return redirect(url('category'))->with('success', 'Kategori berhasil dihapus!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function update(Request $req){
    try {
      $item = Category::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $post = $req->only(['title']);

      $item->update($post);

      return redirect(url('category'))->with('success', 'Kategori berhasil diperbarui!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
}
