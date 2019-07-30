<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HinhAnh;
use Session;
use Barryvdh\DomPDF\Facade as PDF;

class HinhAnhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hinhanh = HinhAnh::all();
        return view('backend.hinhanh.index')
                ->with('hinhanh',$hinhanh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hinhanh = HinhAnh::find($id);
        $hinhanh->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.hinhanh.index');
    }

    public function pdf(){
        $hinhanh = HinhAnh::all();
        $data = [
            'hinhanh' =>$hinhanh,
        ];

        // return view('backend.chude.pdf')
        //         ->with('danhsachchude',$chude);

        $pdf = PDF::loadView('backend.hinhanh.pdf', $data);
        return $pdf->download('DanhSachHinhAnh.pdf');
    }
}
