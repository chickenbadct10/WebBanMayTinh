<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gopy;
use Session;
use Barryvdh\DomPDF\Facade as PDF;

class GopYController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gopy = Gopy::all();
        return view('backend.gopy.index')
                ->with('gopy',$gopy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $gopy = Gopy::find($id);
        return view('backend.gopy.edit')
                ->with('gopy',$gopy);
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
        $gopy = Gopy::find($id);
        $gopy->gy_trangThai = $request->input('gy_trangThai');
        $gopy->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.gopy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gopy = Gopy::find($id);
        $gopy->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.gopy.index');
    }

    public function pdf(){
        $gopy = Gopy::all();
        $data = [
            'gopy' =>$gopy,
        ];

        // return view('backend.chude.pdf')
        //         ->with('danhsachchude',$chude);

        $pdf = PDF::loadView('backend.gopy.pdf', $data);
        return $pdf->download('DanhSachGopY.pdf');
    }
}
