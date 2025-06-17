<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use Notifiable;

    protected $table = 'carts';

    protected $fillable = [
        'order_id',
        'name',
        'price',
        'total',
        'status',
        'created_at',
        'updated_at',
    ];
}
