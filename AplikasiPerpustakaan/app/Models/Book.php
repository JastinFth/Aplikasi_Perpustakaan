<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class   Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $premarykey = "id";
    protected $guarded = ['id'];

    function category() {
        return $this->belongsTo(Category::class,"category_id","id");
    }

    function recommendation() {
        return $this->belongsTo(Recommendation::class,"recommendation_id","id");
    }

    function bookshelf() {
        return $this->belongsTo(Bookshelf::class,"bookshelf_id","id");
    }
}
