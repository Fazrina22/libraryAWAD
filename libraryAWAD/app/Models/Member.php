<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ic',
        'address',
        'contact',
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
