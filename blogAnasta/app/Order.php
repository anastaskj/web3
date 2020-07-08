<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    public $primaryKey = 'id';

    public function food()
    {
        return $this->belongsToMany('App\Food');
    }
}
