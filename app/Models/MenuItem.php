<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
   protected $fillable = [
    'user_id',
    'menuname',
    'image',
    'price'
   ];

public function User()
    {
        return $this->belongsTo(User::class);
    }
}
