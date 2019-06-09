<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $primaryKey  = 'mahd';
    protected $table = 'order';
    protected $fillable = ['ten','donhang','mahd','dienthoai','diachi','email'];
    public function order_detail(){
        return $this->hasMany('App\order_detail');
    }
}
