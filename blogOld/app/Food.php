<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table ='products';

    public $primaryKey = 'id';
    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
