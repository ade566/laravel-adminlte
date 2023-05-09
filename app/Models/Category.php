<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $table = 'category';

  protected $fillable = ['title'];

  static function getData(){
    $data = Category::orderBy('id', 'desc')->get()->map(function($item) {
      return $item;
    });
    return $data;
  }
}
