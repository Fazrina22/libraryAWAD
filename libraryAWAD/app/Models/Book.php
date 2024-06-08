<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisherName',
        'publishedYear',
        'category',
        'status',
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }


}
