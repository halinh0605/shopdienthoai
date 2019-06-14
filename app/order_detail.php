<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public $primaryKey  = 'id';
    protected $table = 'order_detail';
    protected $fillable = ['mahd','idsp','tensp','soluong','gia','tongtien'];
    public function order(){
        return $this->belongsTo('App\order');
    }
}
