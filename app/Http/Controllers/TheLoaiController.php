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

    public function getAddTheLoai() {
        return view('admin.theloai.add');
    }

    public function postAddTheLoai(Request $request) {
        $this->validate($request,
            [
                'cateName' => 'required|min:3|max:100'
            ],
            [
                'cateName.required' => 'Bạn chưa nhập tên thể loại',
                'cateName.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'cateName.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
            ]
        );
        $theloai = new TheLoai();
        $theloai->Ten = $request->cateName;
        $theloai->TenKhongDau = str_slug($request->cateName);
        $theloai->save();
        return redirect('admin/theloai/add')->with('thongbao', 'Thêm thành công');
    }

    public function editTheLoai() {
        
    }

    public function deleteTheLoai() {

    }
}
