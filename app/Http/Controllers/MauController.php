<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mau;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
class MauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mau = Mau::all();
        return view('backend.mau.index')
            ->with('mau',$mau);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mau.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mau = new Mau();
        $mau->m_ten = $request->input('m_ten');
        $mau->m_trangthai = 2;
        $mau->save();
        Session::flash('alert-success','Thêm mới thành công');
        return redirect()->route('backend.mau.index');
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
        $mau = Mau::find($id);
        return view('backend.mau.edit')
                ->with('mau',$mau);
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
        $mau = Mau::find($id);
        $mau->m_ten  = $request->input('m_ten');
        $mau->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.mau.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mau = Mau::find($id);
        $mau ->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.mau.index');
    }
    public function pdf(){
        $mau = Mau::all();
        $data = [
            'mau'=>$mau,
        ];
        // return view('backend.mau.pdf')
        //         ->with('mau',$mau);
        $pdf = PDF::loadView('backend.mau.pdf',$data);
        return $pdf->download('danhsachmau.pdf');

    }
}
