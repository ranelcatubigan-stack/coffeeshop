<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'menuitem_id',
        'quantity',
        'status',
    ];

    // 👤 Order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🍽️ Order belongs to a MenuItem
    public function menuitem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}