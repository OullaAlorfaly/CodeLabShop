<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User ::Class) ;
    }

    public function items()
    {
        return $this->belongsToMany(Item::Class, 'orders_items','order_id') ;
    }
}
