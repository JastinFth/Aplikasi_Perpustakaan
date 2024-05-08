<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $premarykey = "id";
    protected $guarded = ['id'];

    function books(){
        return $this->hasMany(Book::class,"category_id","id");
    }
}
