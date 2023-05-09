<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseUs extends Model
{
  use HasFactory;

  protected $table = 'choose_us';

  protected $fillable = ['title', 'overview', 'file'];

  public function scopeWithParameters($query, $req) {
    if (!empty($req['title'])) {
      $query->where('title', 'LIKE', '%'.$req['title'].'%');
    }
    return $query = $query;
  }

  static function getData($req = []){
    $data = ChooseUs::orderBy('id', 'desc')->withParameters($req)->get()->map(function($item) {
      return $item;
    });
    return $data;
  }
}
