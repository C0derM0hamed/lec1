<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes;
     use HasFactory;

    protected $fillable = ['title', 'image','content','user_id'];

    function user(){
        return $this->belongsTo(User::class);
    }
}
