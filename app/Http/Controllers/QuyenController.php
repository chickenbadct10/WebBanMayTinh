<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;
use Session;
class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quyen =  Quyen::all();
        return view('backend.quyen.index')
            ->with('quyen',$quyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quyen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quyen = new Quyen();
        $quyen->q_ten = $request->input('q_ten');
        $quyen->q_dienGiai = $request->input('q_dienGiai');
        $quyen->q_trangThai = 2;
        $quyen->save();
        Session::flash('alert-success','Tạo mới thành công');
        return redirect()->route('backend.quyen.index');
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
        $quyen = Quyen::find($id);
        return view('backend.quyen.edit')
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
        $quyen = Quyen::find($id);
        $quyen->q_ten = $request->input('q_ten');
        $quyen->q_dienGiai = $request->input('q_dienGiai');
        $quyen->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.quyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::find($id);
        $quyen->delete();

        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.quyen.index');
    }
}
