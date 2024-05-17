<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cocur\Slugify\Slugify;

class   Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $premarykey = "id";
    protected $guarded = ['id'];
    protected $fillable = [
        'isbn', 'name', 'author', 'description', 'picture', 'publisher', 'category_id', 'recommendation_id', 'bookshelf_id', 'stock','slug'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            $book->slug = self::createSlug($book->name);
        });

        static::updating(function ($book) {
            if ($book->isDirty('name')) {
                $book->slug = self::createSlug($book->name);
            }
        });
    }

    public static function createSlug($name)
    {
        $slugify = new Slugify();
        return $slugify->slugify($name);
    }

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
