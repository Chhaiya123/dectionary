<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWords extends Model
{
    use HasFactory;
    protected $table = "user_words";
    // protected $fillable = [
    //     'id',
    //     'user_id',
    //     'word_id',
    //     'status',
    //     'role',
    // ];
}
