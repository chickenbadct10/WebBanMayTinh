<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vanchuyen;
use Session;
class VanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vanchuyen = Vanchuyen::all();
        return view('backend.vanchuyen.index')
                ->with('vanchuyen', $vanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vanchuyen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vanchuyen = new Vanchuyen();
        $vanchuyen->vc_ten = $request->input('vc_ten');
        $vanchuyen->vc_chiPhi = $request->input('vc_chiPhi');
        $vanchuyen->vc_dienGiai = $request->input('vc_dienGiai');
        $vanchuyen->vc_trangthai = 2;
        Session::flash('alert-success','Thêm mới thành công');
        $vanchuyen->save();
        return redirect()->route('backend.vanchuyen.index');
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
        $vanchuyen = Vanchuyen::find($id);
        return view('backend.vanchuyen.edit')
        ->with('vanchuyen',$vanchuyen);
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
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen ->vc_ten = $request->input('vc_ten');
        $vanchuyen ->vc_chiPhi = $request->input('vc_chiPhi');
        $vanchuyen ->vc_dienGiai = $request->input('vc_dienGiai');
        $vanchuyen->save();

        Session::flash('alert-warning','Cập nhật thành công');

        return redirect()->route('backend.vanchuyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen ->delete();

        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.vanchuyen.index');
    }
}
