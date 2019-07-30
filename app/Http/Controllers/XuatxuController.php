<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Xuatxu;
use Illuminate\Support\Facades\Redirect;
use Session;
class XuatxuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xuatxu =  Xuatxu::all();
        return view('backend.xuatxu.index')
            ->with('xuatxu',$xuatxu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.xuatxu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xuatxu = new Xuatxu();
        $xuatxu->xx_ten = $request->input('xx_ten');
        $xuatxu->xx_trangThai = 2;
        $xuatxu->save();
        Session::flash('alert-success','Tạo mới thành công');
        return redirect()->route('backend.xuatxu.index');
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
        $xuatxu = Xuatxu::find($id);
        return view('backend.xuatxu.edit')
                    ->with('xuatxu',$xuatxu);
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
        $xuatxu = Xuatxu::find($id);
        $xuatxu->xx_ten = $request->input('xx_ten');
        $xuatxu->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.xuatxu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xuatxu = Xuatxu::find($id);
        $xuatxu -> delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.xuatxu.index');
    }
}
