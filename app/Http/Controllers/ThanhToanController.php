<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thanhtoan;
use Session;
class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thanhtoan = Thanhtoan::all();
        return view('backend.thanhtoan.index')
            ->with('thanhtoan',$thanhtoan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thanhtoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thanhtoan = new Thanhtoan();
        $thanhtoan->tt_ten = $request->input('tt_ten');
        $thanhtoan->tt_dienGiai = $request->input('tt_dienGiai');
        $thanhtoan->tt_trangthai = 2;
        Session::flash('alert-success','Thêm mới thành công');
        $thanhtoan->save();
        return redirect()->route('backend.thanhtoan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thanhtoan = Thanhtoan::find($id);
        return view('backend.thanhtoan.edit')
        ->with('thanhtoan',$thanhtoan);
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
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan ->tt_ten = $request->input('tt_ten');
        $thanhtoan ->tt_dienGiai = $request->input('tt_dienGiai');
        $thanhtoan->save();

        Session::flash('alert-warning','Cập nhật thành công');

        return redirect()->route('backend.thanhtoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan->delete();
        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.thanhtoan.index');
    }
}
