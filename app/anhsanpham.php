<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anhsanpham extends Model
{
    public $primaryKey  = 'id';
    protected $table = 'anhsanpham';
    protected $fillable = ['image','idsp'];
    public function sanpham(){
        return $this->belongsTo('App\sanpham');
    }
}
