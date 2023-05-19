<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['category_id','title','overview','file','description'];
    static function getData(){
        $query = Service::get();
        return $query;
    }
}
