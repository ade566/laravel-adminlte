<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Service;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
  function index(){
    $data['item'] = Configuration::first();
    return view('configuration.index', $data);
  }

  function update(Request $req){
    $item = Configuration::first();
    $item->update(array_merge($req->except(['icon','logo'])), [
      'logo' => $req->logo ? $this->upload($req->logo, 'configuration') : $item->logo,
      'icon' => $req->icon ? $this->upload($req->icon, 'configuration') : $item->icon,
    ]);
    return redirect(url('configuration'))->with('success', 'Configuration berhasil diedit!');
  }
}
