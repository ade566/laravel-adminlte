<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;


class ServiceController extends Controller
{
  function index(){
    $data['collection'] = Service::getData();
    return view('service.index', $data);
  }

  function add(){
    $data['title'] = 'Tambah Service';
    $data['nama'] = 'Contoh Nama';
    $data['collection'] = Category::get();
    return view('service.add', $data);
  }

  function store(Request $request){
    Service::create([
      'category_id' => $request->category_id,
      'title' => $request->title,
      'overview' => $request->overview,
      'file' => $this->upload($request->file, 'service'),
      'description' => $request->description,
    ]);
    return redirect(url('service'))->with('success', 'Service berhasil ditambahkan!');
  }

  function edit($id){
    $data['title'] = 'Edit Service';
    $data['nama'] = 'Contoh Nama';
    $data['collection'] = Category::get();
    $data['item'] = Service::where('id', $id)->first();
    return view('service.edit', $data);
  }

  function update(Request $request){
    $file = Service::where('id', $request->id)->first()['file'];

    Service::where('id', $request->id)->update([
      'category_id' => $request->category_id,
      'title' => $request->title,
      'overview' => $request->overview,
      'file' => $request->file ? $this->upload($request->file, 'service') : $file,
      'description' => $request->description,
    ]);
    if ($request->file) {
      $this->deleteFile($file);
    }
    return redirect(url('service'))->with('success', 'Service berhasil diedit!');
  }
}
