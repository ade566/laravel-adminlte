<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use InvalidArgumentException;

class PartnerController extends Controller
{
  function index(){
    $data['collection'] = Partner::getData();
    return view('partner.index', $data);
  }

  function add(){
    $data['title'] = 'Tambah Service';
    $data['nama'] = 'Contoh Nama';
    return view('partner.add', $data);
  }

  function store(Request $request){
    Partner::create([
      'file' => $this->upload($request->file, 'partner'),
    ]);
    return redirect(url('partner'))->with('success', 'Partner berhasil ditambahkan!');
  }

  function edit($id){
    $data['title'] = 'Edit Service';
    $data['nama'] = 'Contoh Nama';
    $data['item'] = Partner::where('id', $id)->first();
    return view('partner.edit', $data);
  }

  function update(Request $request){
    $file = Partner::where('id', $request->id)->first()['file'];

    Partner::where('id', $request->id)->update([
      
      'file' => $request->file ? $this->upload($request->file, 'partner') : $file,
    ]);
    if ($request->file) {
      $this->deleteFile($file);
    }
    return redirect(url('partner'))->with('success', 'Partner berhasil diedit!');
  }
  function delete(Request $request){
    $item = Partner::find($request->id);

    if (!$item) {
      throw new InvalidArgumentException('Data tidak ditemukan!', 500);
    }

    $this->deleteFile($item->file);
    
    $item->delete();

    return redirect(url('partner'))->with('success', 'Partner berhasil dihapus!');
  }
}
