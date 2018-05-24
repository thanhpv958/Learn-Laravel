<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    public function getList() {
        $loaitin = LoaiTin::orderBy('id', 'DESC')->get();
        return view('admin.loaitin.list', ['loaitin' => $loaitin]);
    }

    public function getAdd() {
        $theloai = TheLoai::select('id','Ten')->get();
        return view('admin.loaitin.add', ['theloai' => $theloai]);
    }

    public function postAdd(Request $request) {
        $this->validate($request,
            [
                'loaiTin' => 'required|unique:loaitin,Ten|min:3|max:100'
            ],
            [
                'loaiTin.required' => 'Bạn chưa nhập tên thể loại',
                'loaiTin.unique' => 'Loại tin đã tồn tại',
                'loaiTin.min' => 'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
                'loaiTin.max' => 'Tên loại tin phải có độ dài từ 3 đến 100 ký tự'
            ]
        );
        $loaitin = new LoaiTin();
        $loaitin->idTheLoai = $request->theLoai;
        $loaitin->Ten = $request->loaiTin;
        $loaitin->TenKhongDau = str_slug($request->loaiTin);
        $loaitin->save();
        return redirect('admin/loaitin/add')->with('thongbao', 'Thêm thành công');
    }

    public function getEdit($id=1) {
        $theloai = TheLoai::all();
        $loaitinEdit = LoaiTin::find($id);
        return view('admin.loaitin.edit', ['theloai' => $theloai, 'loaitinEdit' => $loaitinEdit]);
    }

    public function postEdit(Request $request, $id) {
        $this->validate($request,
            [
                'loaiTin' => 'required|min:3|max:100'
            ],
            [
                'loaiTin.required' => 'Bạn chưa nhập tên thể loại',
                'loaiTin.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'loaiTin.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
            ]
        );
        $loaitin = LoaiTin::find($id);
        $loaitin->idTheLoai = $request->theLoai;
        $loaitin->Ten = $request->loaiTin;
        $loaitin->TenKhongDau = str_slug($request->loaiTin);
        $loaitin->save();
        return redirect("admin/loaitin/edit/$id")->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id) {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/list')->with('thongbao', 'Xóa thành công');
    }
}
