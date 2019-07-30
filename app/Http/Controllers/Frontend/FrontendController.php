<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use DB;
use Mail;
use App\Mail\ContactMailer;
use App\SanPham;
use App\Mau;
use App\Vanchuyen;
use App\Thanhtoan;
use App\Khachhang;
use App\Donhang;
use Illuminate\Support\Carbon;
use App\Chitietdonhang;
use App\Mail\OrderMailer;

class FrontEndController extends Controller
{
    public function index(Request $request){
        //Query top 3 sản phẩm mới nhất
        // Query builder
        $ds_top3_newest_loaisanpham = DB::table('cusc_loai')
            ->join('cusc_sanpham','cusc_loai.l_ma','=','cusc_sanpham.l_ma')
            ->orderBy('sp_capNhat')->take(3)->get();

        //query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);

        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('cusc_hinhanh')
            ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
            ->get();
        // Query danh sách Loại
        $danhsachloai = Loai::all();

        // Query danh sách màu
        $danhsachmau = Mau::all();

        return view('frontend.index')
                ->with('ds_top3_newest_loaisanpham',$ds_top3_newest_loaisanpham)
                ->with('danhsachsanpham',$danhsachsanpham)
                ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
                ->with('danhsachmau', $danhsachmau)
                ->with('danhsachloai', $danhsachloai);
    }

        /**
     * Hàm query danh sách sản phẩm theo nhiều điều kiện
     */
    private function searchSanPham(Request $request)
    {
        $query = DB::table('cusc_sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        if ($searchByLoaiMa != null) {
        }
        $data = $query->get();
        return $data;
    }

        /**
     * Action hiển thị view Giới thiệu
     * GET /about
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

        /** * Action hiển thị view Liên hệ * GET /contact */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Action gởi email với các lời nhắn nhận được từ khách hàng
     * POST /lien-he/goi-loi-nhan
     */
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('dnmkhoi@cusc.ctu.edu.vn')->send(new ContactMailer($input));
        return $input;
    }

    public function product(Request $request){

    // Query tìm danh sách sản phẩm
    $danhsachsanpham = $this->searchSanPham($request);
    // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
    $danhsachhinhanhlienquan = DB::table('cusc_hinhanh')
                            ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
                            ->get();
    // Query danh sách Loại
    $danhsachloai = Loai::all();
    // Query danh sách màu
    $danhsachmau = Mau::all();
    // Hiển thị view `frontend.index` với dữ liệu truyền vào
    return view('frontend.pages.product')
        ->with('danhsachsanpham', $danhsachsanpham)
        ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
        ->with('danhsachmau', $danhsachmau)
        ->with('danhsachloai', $danhsachloai);
    }

    /**
 * Action hiển thị chi tiết Sản phẩm
 */
    public function productDetail(Request $request, $id)
    {
    $sanpham = SanPham::find($id);
    // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
    $danhsachhinhanhlienquan = DB::table('cusc_hinhanh')
                            ->where('sp_ma', $id)
                            ->get();
    // Query danh sách Loại
    $danhsachloai = Loai::all();
    // Query danh sách màu
    $danhsachmau = Mau::all();
    return view('frontend.pages.product-detail')
        ->with('sp', $sanpham)
        ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
        ->with('danhsachmau', $danhsachmau)
        ->with('danhsachloai', $danhsachloai);
    }
    /**
     * Action hiển thị giỏ hàng
     */
    public function cart(Request $request)
    {
        // Query danh sách hình thức vận chuyển
        $danhsachvanchuyen = Vanchuyen::all();
        // Query danh sách phương thức thanh toán
        $danhsachphuongthucthanhtoan = Thanhtoan::all();
        return view('frontend.pages.shopping-cart')
            ->with('danhsachvanchuyen', $danhsachvanchuyen)
            ->with('danhsachphuongthucthanhtoan', $danhsachphuongthucthanhtoan);
    }

        /**
     * Action Đặt hàng
     */
    public function order(Request $request)
    {
        // dd($request);
        // Data gởi mail
        $dataMail = [];
        try {
            // Tạo mới khách hàng
            $khachhang = new Khachhang();
            $khachhang->kh_taiKhoan = $request->khachhang['kh_taiKhoan'];
            $khachhang->kh_matKhau = bcrypt('123456');
            $khachhang->kh_hoTen = $request->khachhang['kh_hoTen'];
            $khachhang->kh_gioiTinh = $request->khachhang['kh_gioiTinh'];
            $khachhang->kh_email = $request->khachhang['kh_email'];
            $khachhang->kh_ngaySinh = $request->khachhang['kh_ngaySinh'];
            if(!empty($request->khachhang['kh_diaChi'])) {
                $khachhang->kh_diaChi = $request->khachhang['kh_diaChi'];
            }
            if(!empty($request->khachhang['kh_dienThoai'])) {
                $khachhang->kh_dienThoai = $request->khachhang['kh_dienThoai'];
            }
            $khachhang->kh_trangThai = 2; // Khả dụng
            $khachhang->save();
            $dataMail['khachhang'] = $khachhang->toArray();
            // Tạo mới đơn hàng
            $donhang = new Donhang();
            $donhang->kh_ma = $khachhang->kh_ma;
            $donhang->dh_thoiGianDatHang = Carbon::now();
            $donhang->dh_thoiGianNhanHang = $request->donhang['dh_thoiGianNhanHang'];
            $donhang->dh_nguoiNhan = $request->donhang['dh_nguoiNhan'];
            $donhang->dh_diaChi = $request->donhang['dh_diaChi'];
            $donhang->dh_dienThoai = $request->donhang['dh_dienThoai'];
            $donhang->dh_nguoiGui = $request->donhang['dh_nguoiGui'];
            $donhang->dh_loiChuc = $request->donhang['dh_loiChuc'];
            $donhang->dh_daThanhToan = 0; //Chưa thanh toán
            $donhang->nv_xuLy = 1; //Mặc định nhân viên đầu tiên
            $donhang->nv_giaoHang = 1; //Mặc định nhân viên đầu tiên
            $donhang->dh_trangThai = 1; //Nhận đơn
            $donhang->vc_ma = $request->donhang['vc_ma'];
            $donhang->tt_ma = $request->donhang['tt_ma'];
            $donhang->save();
            $dataMail['donhang'] = $donhang->toArray();
            // Lưu chi tiết đơn hàng
            foreach($request->giohang['items'] as $sp)
            {
                $chitietdonhang = new Chitietdonhang();
                $chitietdonhang->dh_ma = $donhang->dh_ma;
                $chitietdonhang->sp_ma = $sp['_id'];
                $chitietdonhang->m_ma = 1;
                $chitietdonhang->ctdh_soLuong = $sp['_quantity'];
                $chitietdonhang->ctdh_donGia = $sp['_price'];
                $chitietdonhang->save();
                $dataMail['donhang']['chitiet'][] = $chitietdonhang->toArray();
                $dataMail['donhang']['giohang'][] = $sp;
            }
            // Gởi mail khách hàng
            // dd($dataMail);
            Mail::to($khachhang->kh_email)
                ->send(new OrderMailer($dataMail));
        }
        catch(ValidationException $e) {
            return response()->json(array(
                'code'  => 500,
                'message' => $e,
                'redirectUrl' => route('frontend.home')
            ));
        }
        catch(Exception $e) {
            throw $e;
        }
        return response()->json(array(
            'code'  => 200,
            'message' => 'Tạo đơn hàng thành công!',
            'redirectUrl' => route('frontend.orderFinish')
        ));
    }
        /**
     * Action Hoàn tất Đặt hàng
     */
    public function orderFinish()
    {
        return view('frontend.pages.order-finish');
    }
}
