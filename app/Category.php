<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items()
    {
        return $this->hasMany(Item::Class, 'category_id','id') ;
    }
    public function getCountAttribute()
    {
        return $this->count();
    }


}
