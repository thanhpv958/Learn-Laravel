<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';
    public $timestamps = false;

    public function loaiSanPham() {
        return $this->belongsTo('App\LoaiSanPham', 'id_loaisanpham');
    }
}
