<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BaoCaoController extends Controller
{
    /**
     * Action hiển thị view Báo cáo đơn hàng
     */
    public function donhang()
    {
        return view('backend.reports.donhang');
    }
    /**
     * Action AJAX get data cho báo cáo Đơn hàng
     */
    public function donhangData(Request $request)
    {
        $parameter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        // dd($parameter);
        $data = DB::select('
            SELECT dh.dh_thoiGianDatHang as thoiGian
                , SUM(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
            FROM cusc_donhang dh
            JOIN cusc_chitietdonhang ctdh ON dh.dh_ma = ctdh.dh_ma
            WHERE dh.dh_thoiGianDatHang BETWEEN :tuNgay AND :denNgay
            GROUP BY dh.dh_thoiGianDatHang
        ', $parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }
}
