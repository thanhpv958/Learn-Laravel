<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "loaitin";

    public function TheLoai() {
        return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');
    }

    public function LoaiTin() {
        return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}
