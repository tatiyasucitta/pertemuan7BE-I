<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        'author_id',
        'image'
    ];

    public function Author(): BelongsTo{
        return $this->belongsTo(Author::class, 'author_id');
    }
    
    public function Category(){
        return $this->belongsToMany(Category::class, 'book_categories', 'book_id', 'cat_id');
    }
}
