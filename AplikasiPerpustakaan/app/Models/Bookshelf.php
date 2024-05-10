<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookshelf extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $premarykey = "id";
    protected $guarded = ['id'];

    public function books(){
        return $this->hasMany(Book::class,"bookshelf_id","id");
    }
}
