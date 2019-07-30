<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Xuatxu;
use App\Nhacungcap;
use Session;

use Barryvdh\DomPDF\Facade as PDF;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhacungcap = Nhacungcap::all();
        return view('backend.nhacungcap.index')
                ->with('nhacungcap',$nhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xuatxu = Xuatxu::all();
        return view('backend.nhacungcap.create')
                ->with('xuatxu',$xuatxu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhacungcap = new Nhacungcap();
        $nhacungcap->ncc_ten = $request->input('ncc_ten');
        $nhacungcap->ncc_daiDien = $request->input('ncc_daiDien');
        $nhacungcap->ncc_diaChi = $request->input('ncc_diaChi');
        $nhacungcap->ncc_dienThoai = $request->input('ncc_dienThoai');
        $nhacungcap->ncc_email = $request->input('ncc_email');
        $nhacungcap->ncc_trangThai = $request->input('ncc_trangThai');
        $nhacungcap->xx_ma = $request->input('xx_ma');

        $nhacungcap->save();
        Session::flash('alert-success','Tạo mới thành công');
        return redirect()->route('backend.nhacungcap.index');
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
        $xuatxu = Xuatxu::all();
        $nhacungcap = Nhacungcap::find($id);
        return view('backend.nhacungcap.edit')
                ->with('xuatxu',$xuatxu)
                ->with('nhacungcap',$nhacungcap);
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
        $nhacungcap = Nhacungcap::find($id);
        $nhacungcap->ncc_ten = $request->input('ncc_ten');
        $nhacungcap->ncc_daiDien = $request->input('ncc_daiDien');
        $nhacungcap->ncc_diaChi = $request->input('ncc_diaChi');
        $nhacungcap->ncc_dienThoai = $request->input('ncc_dienThoai');
        $nhacungcap->ncc_email = $request->input('ncc_email');
        $nhacungcap->ncc_trangThai = $request->input('ncc_trangThai');
        $nhacungcap->xx_ma = $request->input('xx_ma');

        $nhacungcap->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.nhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhacungcap = Nhacungcap::find($id);
        $nhacungcap->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.nhacungcap.index');
    }

    public function print(){
        $nhacungcap = Nhacungcap::all();
        $xuatxu  = Xuatxu::all();
        $data = [
            'nhacungcap' => $nhacungcap,
            'xuatxu'    => $xuatxu,
        ];
        return view('backend.nhacungcap.print')
            ->with('nhacungcap', $nhacungcap)
            ->with('xuatxu', $xuatxu);
    }
    public function pdf(){
        $nhacungcap = Nhacungcap::all();
        $xuatxu = Xuatxu::all();
        $data = [
            'nhacungcap' =>$nhacungcap,
            'xuatxu' => $xuatxu,
        ];

        // return view('backend.nhacungcap.pdf')
        //         ->with('nhacungcap',$nhacungcap)
        //         ->with('xuatxu',$xuatxu);
        $pdf = PDF::loadView('backend.nhacungcap.pdf', $data);
        return $pdf->download('DanhMucNhaCungCap.pdf');
    }
}
