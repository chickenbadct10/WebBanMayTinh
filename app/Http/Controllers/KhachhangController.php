<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Khachhang;
use Session;
class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachhang = Khachhang::all();
       return view('backend.khachhang.index')
                ->with('khachhang',$khachhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.khachhang.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // Kiểm tra ràng buộc dũ liệu (validator)
                $validator = Validator::make($request->all(),[
                    'kh_taiKhoan' =>'required|min:3|max:50|unique:cusc_khachhang',
                    'kh_matKhau' =>'required|min:3|max:50',
                    'kh_hoTen' =>'required|min:3|max:50',
                    'kh_email' =>'required|min:3|max:50',
                    'kh_ngaySinh' =>'required|min:3|max:50',
                    'kh_diaChi' =>'required|min:3|max:50',
                    'kh_dienThoai' =>'required|min:3|max:50',

                ]);

                if($validator->fails()){
                    return redirect(route('backend.khachhang.create'))
                                    ->withErrors($validator)
                                    ->withInput();
                }



        $khachhang = new Khachhang();
        $khachhang->kh_taiKhoan = $request->input('kh_taiKhoan');
        $khachhang->kh_matKhau = $request->input('kh_matKhau');
        $khachhang->kh_hoTen = $request->input('kh_hoTen');
        $khachhang->kh_gioiTinh = $request->input('kh_gioiTinh');
        $khachhang->kh_email = $request->input('kh_email');
        $khachhang->kh_ngaySinh = $request->input('kh_ngaySinh');
        $khachhang->kh_diaChi = $request->input('kh_diaChi');
        $khachhang->kh_dienThoai = $request->input('kh_dienThoai');
        $khachhang->kh_trangthai = $request->input('kh_trangThai');
        $khachhang->save();
        // Cập nhật thông báo thành công
        Session::flash('alert-success','Thêm mới thành công');

        return redirect()->route('backend.khachhang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = Khachhang::find($id);
        return view('backend.khachhang.edit')
        ->with('khachhang',$khachhang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $khachhang = Khachhang::find($id);
        $khachhang->kh_taiKhoan = $request->input('kh_taiKhoan');
        $khachhang->kh_matKhau = $request->input('kh_matKhau');
        $khachhang->kh_hoTen = $request->input('kh_hoTen');
        $khachhang->kh_gioiTinh = $request->input('kh_gioiTinh');
        $khachhang->kh_email = $request->input('kh_email');
        $khachhang->kh_ngaySinh = $request->input('kh_ngaySinh');
        $khachhang->kh_diaChi = $request->input('kh_diaChi');
        $khachhang->kh_dienThoai = $request->input('kh_dienThoai');
        $khachhang->kh_trangthai = $request->input('kh_trangThai');
        $khachhang->save();

        Session::flash('alert-warning','Cập nhật thành công');

        return redirect()->route('backend.khachhang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = Khachhang::find($id);
        $khachhang->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.khachhang.index');
    }
}
