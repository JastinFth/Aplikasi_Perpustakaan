<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $premarykey = "id";
    protected $guarded = ['id'];

    function books(){
        return $this->hasMany(Book::class,"recommendation_id","id");
    }
}
