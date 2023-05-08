<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use InvalidArgumentException;

class SliderController extends Controller
{
  function index(Request $req){
    $collection = Slider::getData($req->all());

    return view('sliders.index', [
      'collection' => $collection
    ]);
  }

  function add(){
    return view('sliders.add', [
      'title' => 'Tambah Slider'
    ]);
  }

  function store(Request $req){
    try {
      $post = array_merge($req->only(['title', 'overview']), [
        'file' => $this->upload($req->file, 'sliders')
      ]);

      Slider::create($post);

      return redirect(url('sliders'))->with('success', 'Slider berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $item = Slider::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }
      
      $item->delete();

      return redirect(url('sliders'))->with('success', 'User Admin berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function edit($id){
    $item = Slider::find($id);

    if (!$item) {
      return redirect()->back()->with('message', 'Data tidak ditemukan!');
    }

    return view('sliders.edit', [
      'title' => 'Edit Slider',
      'item' => $item
    ]);
  }

  function update(Request $req){
    try {
      $item = Slider::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }

      $post = array_merge($req->only(['title', 'overview']), [
        'file' => $req->file ? $this->upload($req->file, 'sliders') : $item->file
      ]);

      $item->update($post);

      return redirect(url('sliders'))->with('success', 'Sliders berhasil diperbarui!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
}
