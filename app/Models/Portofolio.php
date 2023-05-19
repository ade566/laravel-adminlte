<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $table = 'portofolios';
    protected $fillable = ['category_id','title','file','description'];

    public function scopeWithParameters($query, $req) {
        if (!empty($req['title'])) {
          $query->where('title', 'LIKE', '%'.$req['title'].'%');
        }
        return $query = $query;
    }
    
    static function getData($req = []){
        $data = Portofolio::orderBy('id', 'desc')->withParameters($req)->get()->map(function($item) {
        $item['category_name'] = Category::where('id', $item->category_id)->first();
          return $item;
        });
        return $data;
    }

}
