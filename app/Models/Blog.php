<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  use HasFactory;
    
  protected $table = 'blogs';

  protected $fillable = ['category_id', 'overview', 'title', 'file', 'description'];

  public function scopeWithParameters($query, $req) {
    if (!empty($req['title'])) {
      $query->where('title', 'LIKE', '%'.$req['title'].'%');
    }
    return $query = $query;
  }
    
  static function getData($req = []){
    $data = Blog::orderBy('id', 'desc')->withParameters($req)->get()->map(function($item) {
      $item['category'] = Category::where('id', $item->category_id)->first();
      return $item;
    });
    return $data;
  }

}
