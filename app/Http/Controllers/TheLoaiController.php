<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getListTheLoai() {
        $theloai = TheLoai::all();
        return view('admin.theloai.list', ['theloai' => $theloai]);
    }

    public function addTheLoai() {
        
    }

    public function editTheLoai() {
        
    }

    public function deleteTheLoai() {

    }
}
