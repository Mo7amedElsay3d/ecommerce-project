<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function items()
{
    return $this->hasMany(OrderItem::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'total',
        'payment_method',
        'payment_status',
        'status',
    ];
}

