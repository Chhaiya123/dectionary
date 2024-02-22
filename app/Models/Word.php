<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $table = "words";
    protected $fillable = [
        'word',
        'word_km',
        'word_en',
        'user_id',
        'description',
        'description_km',
        'description_en',
    ];
    protected $primaryKey = 'word_id';
}
