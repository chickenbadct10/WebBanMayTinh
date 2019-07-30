<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhanvien;
use App\Quyen;
use Session;
use Illuminate\Support\Facades\Redirect;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quyen = Quyen::all();
        $nhanvien = Nhanvien::all();

        return view('backend.nhanvien.index')
                ->with('quyen',$quyen)
                ->with('nhanvien',$nhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quyen = Quyen::all();
        return view('backend.nhanvien.create')
                ->with('quyen',$quyen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new Nhanvien();
        $nhanvien->nv_taiKhoan = $request->input('nv_taiKhoan');
        $nhanvien->nv_matKhau = $request->input('nv_matKhau');
        $nhanvien->nv_hoTen = $request->input('nv_hoTen');
        $nhanvien->nv_gioiTinh = $request->input('nv_gioiTinh');
        $nhanvien->nv_email = $request->input('nv_email');
        $nhanvien->nv_ngaySinh = $request->input('nv_ngaySinh');
        $nhanvien->nv_diaChi = $request->input('nv_diaChi');
        $nhanvien->nv_dienThoai = $request->input('nv_dienThoai');
        $nhanvien->nv_trangThai = $request->input('nv_trangThai');
        $nhanvien->q_ma = $request->input('q_ma');

        $nhanvien->save();
        Session::flash('alert-success','Tạo mới thành công');
        return redirect()->route('backend.nhanvien.index');
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
        $nv = Nhanvien::where("nv_ma", $id)->first();
        $quyen = Quyen::all();
        return view('backend.nhanvien.edit')
                ->with('nv',$nv)
                ->with('quyen',$quyen);
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
        $nv = NhanVien::find($id);
        $nv->nv_taiKhoan = $request->input('nv_taiKhoan');
        $nv->nv_matKhau = $request->input('nv_matKhau');
        $nv->nv_hoTen = $request->input('nv_hoTen');
        $nv->nv_gioiTinh = $request->input('nv_gioiTinh');
        $nv->nv_email = $request->input('nv_email');
        $nv->nv_ngaySinh = $request->input('nv_ngaySinh');
        $nv->nv_diaChi = $request->input('nv_diaChi');
        $nv->nv_dienThoai = $request->input('nv_dienThoai');
        $nv->nv_trangThai = $request->input('nv_trangThai');
        $nv->q_ma = $request->input('q_ma');

        $nv->save();
        Session::flash('alert-success','Cập nhật thành công');
        return redirect()->route('backend.nhanvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = Nhanvien::find($id);
        $nhanvien->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.nhanvien.index');
    }
    public function print(){
        $nhanvien = Nhanvien::all();
        $quyen = Quyen::all();
        $data = [
            'nhanvien'=>$nhanvien,
            'quyen'=>$quyen,
        ];
        return view('backend.nhanvien.print')
                ->with('nhanvien',$nhanvien)
                ->with('quyen',$quyen);
    }
    public function pdf(){

    }
}
