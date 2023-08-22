<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'configuration';
    
    protected $fillable = ['name', 'title_aboutus', 'desc_aboutus', 'img_aboutus', 'telphone'];
}
