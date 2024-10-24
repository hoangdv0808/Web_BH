<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'email', 'address', 'phone', 'note', 'status',
    ];

    /**
     * Get all of the orderDetail for the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail()
    {
        return $this->hasMany(order_detail::class, 'order_id', 'id');
    }
}
