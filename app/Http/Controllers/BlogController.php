<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use InvalidArgumentException;

class BlogController extends Controller
{
  function index(Request $req){
    $collection = Blog::getData($req->all());

    return view('blog.index', [
      'collection' => $collection
    ]);
  }
  
  function add(){
    return view('blog.add', [
      'collection' => Category::get(),
      'title' => 'Tambah blog'
    ]);
  }
  
  function store(Request $req){
    try {
      $post = array_merge($req->only(['category_id', 'title', 'overview', 'description']), [
        'file' => $this->upload($req->file, 'blog')
      ]);

      Blog::create($post);

      return redirect(url('blog'))->with('success', 'Blog berhasil ditambahkan!');
    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
  
  function edit($id){
    $item = Blog::find($id);

    if (!$item) {
      return redirect()->back()->with('message', 'Data tidak ditemukan!');
    }

    return view('blog.edit', [
      'title' => 'Edit blog',
      'item' => $item,
      'collection' => Category::get(),
    ]);
  }

  function update(Request $req){
    try {
      $item = Blog::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $file = $item->file;

      $post = array_merge($req->only(['category_id', 'overview', 'title', 'description']), [
        'file' => $req->file ? $this->upload($req->file, 'blog') : $file
      ]);

      $item->update($post);

      if ($req->file) {
        $this->deleteFile($file);
      }

      return redirect(url('blog'))->with('success', 'Porotofolio berhasil diperbarui!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
  
  function delete(Request $req){
    try {
      $item = Blog::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $this->deleteFile($item->file);
      
      $item->delete();

      return redirect(url('blog'))->with('success', 'blog berhasil dihapus!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

}
