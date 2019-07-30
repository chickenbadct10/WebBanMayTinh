<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChuDe;
use Session;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;
use App\Http\Requests\ChuDeCreateRequest;
class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $danhsachchude = ChuDe::all();
        $danhsachchude = ChuDe::paginate(5);
        return view('backend.ChuDe.index')
                ->with('danhsachchude',$danhsachchude);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.chude.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChuDeCreateRequest $request)
    {
        // // Kiểm tra ràng buộc dũ liệu (validator)
        // $validator = Validator::make($request->all(),[
        //     'cd_ten' =>'required|min:3|max:50|unique:cusc_chude'
        // ]);

        // if($validator->fails()){
        //     return redirect(route('backend.chude.create'))
        //                     ->withErrors($validator)
        //                     ->withInput();
        // }
        $cd = new ChuDe();
        $cd->cd_ten = $request->input('cd_ten');
        $cd->cd_trangthai = 2;
        $cd->save();
        Session::flash('alert-success','Thêm mới thành công');
        return redirect()->route('backend.chude.index');
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
        $chude = ChuDe::find($id);

        return view('backend.chude.edit')
            ->with('chude',$chude);
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
        $chude = ChuDe::find($id);
        $chude ->cd_ten = $request->input('cd_ten');
        $chude->save();
        Session::flash('alert-warning','Cập nhật thành công');
        return redirect()->route('backend.chude.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chude = ChuDe::find($id);
        $chude ->delete();

        Session::flash('alert-danger','Xóa thành công');
        return redirect()->route('backend.chude.index');
    }

    public function pdf(){
        $chude = ChuDe::all();
        $data = [
            'danhsachchude' =>$chude,
        ];

        // return view('backend.chude.pdf')
        //         ->with('danhsachchude',$chude);

        $pdf = PDF::loadView('backend.chude.pdf', $data);
        return $pdf->download('DanhMucChuDe.pdf');
    }
}
