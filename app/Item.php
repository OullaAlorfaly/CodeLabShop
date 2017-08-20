<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(Category ::Class) ;
    }

    public function orders()
    {
        return $this->belongsToMany(Order ::Class, 'orders_items','item_id') ;
    }
    public function users()
    {
        return $this->belongsToMany(User ::Class, 'users_items','item_id') ;
    }



    public function scopeSearch($q, $s)
    {
        return $q->where('name', 'like', '%' .$s. '%')
                    ->orWhere('brand', 'like', '%' .$s. '%');
    }

    public function scopeSearchPrice($q, $min, $max)
    {
        return $q->whereBetween('price', [$min, $max]);
    }


}


