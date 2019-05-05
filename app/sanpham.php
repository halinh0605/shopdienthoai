<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    public $primaryKey  = 'idsp';
    protected $table = 'sanpham';
    protected $fillable = ['tensp','gia','motangan','madm','noidung','soluong','hinhanh'];
    public function Hoadonchitiet(){
        return $this->hasMany('App\Hoadonchitiet');
    }

    public function chitietsanpham(){
        return $this->hasMany('App\chitietsanpham');
    }
    public function danhmuc(){
        return $this->belongsTo('App\danhmuc');
    }
}
