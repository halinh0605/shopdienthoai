<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    public $primaryKey  = 'madm';
    protected $table = 'danhmuc';
    protected $fillable = ['tendm'];
    public function sanpham(){
        return $this->hasMany('App\sanpham');
    }
}
