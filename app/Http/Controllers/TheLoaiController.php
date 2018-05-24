<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getList() {
        $theloai = TheLoai::all();
        return view('admin.theloai.list', ['theloai' => $theloai]);
    }

    public function getAdd() {
        return view('admin.theloai.add');
    }

    public function postAdd(Request $request) {
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
        return redirect('admin/loaitin/add')->with('thongbao', 'Thêm thành công');
    }

    public function getEdit($id) {
        $theloaiEdit = TheLoai::find($id);
        return view('admin.theloai.edit', ['theloaiEdit' => $theloaiEdit]);
    }

    public function postEdit(Request $request, $id) {
        $this->validate($request,
            [
                'cateName' => 'required|unique:theloai,Ten|min:3|max:100'
            ],
            [
                'cateName.required' => 'Bạn chưa nhập tên thể loại',
                'cateName.unique' => 'Thể loại bạn vừa nhập đã tồn tại',
                'cateName.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'cateName.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
            ]
        );

        $theloai = TheLoai::find($id);
        $theloai->Ten = $request->cateName;
        $theloai->TenKhongDau = str_slug($request->cateName);
        $theloai->save();
        return redirect("admin/theloai/edit/$id")->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id) {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/list')->with('thongbao', 'Xóa thành công');
    }
}
