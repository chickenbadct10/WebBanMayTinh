<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
// Chức năng đăng nhập
// Xác thực Routes...
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
// Đăng ký Routes...
Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/register', 'Auth\RegisterController@register');
Route::post('/admin/active/{nv_ma}', 'Auth\RegisterController@active')->name('active');

// Quên mật khẩu Routes...
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');

    //Route danh sách  Sản phẩm
    Route::get('/admin/sanpham', 'SanPhamController@index')->name('backend.sanpham.index');
    Route::get('/admin/sanpham/themmoi', 'SanPhamController@create')->name('backend.sanpham.create');
    Route::post('/admin/sanpham/store', 'SanPhamController@store')->name('backend.sanpham.store');
    Route::get('/admin/sanpham/edit/{id}', 'SanPhamController@edit')->name('backend.sanpham.edit');
    Route::put('/admin/sanpham/update/{id}', 'SanPhamController@update')->name('backend.sanpham.update');
    Route::delete('/admin/sanpham/delete/{id}', 'SanPhamController@destroy')->name('backend.sanpham.destroy');
    Route::get('/admin/sanpham/print', 'SanPhamController@print')->name('backend.sanpham.print');
    Route::get('/admin/sanpham/pdf', 'SanPhamController@pdf')->name('backend.sanpham.pdf');
    Route::get('/admin/admin/loai', 'LoaiController@index')->name('backend.loai.index');
// Group middleware quản lý chức năng khi login mới được sử dụng
Route::group(['middleware' => 'auth'], function(){
    //Loại
    Route::get('/admin/loai/themmoi', 'LoaiController@create')->name('backend.loai.create');
    Route::post('/admin/loai/store', 'LoaiController@store')->name('backend.loai.store');
    Route::get('/admin/loai/edit/{id}', 'LoaiController@edit')->name('backend.loai.edit');
    Route::put('/admin/loai/update/{id}', 'LoaiController@update')->name('backend.loai.update');
    Route::delete('/admin/loai/delete/{id}', 'LoaiController@destroy')->name('backend.loai.destroy');
    //Route danh sách chủ đề
    Route::get('/admin/chude', 'ChuDeController@index')->name('backend.chude.index');
    Route::get('/admin/chude/themmoi', 'ChuDeController@create')->name('backend.chude.create');
    Route::post('/admin/chude/store', 'ChuDeController@store')->name('backend.chude.store');
    Route::get('/admin/chude/edit/{id}', 'ChuDeController@edit')->name('backend.chude.edit');
    Route::put('/admin/chude/update/{id}', 'ChuDeController@update')->name('backend.chude.update');
    Route::delete('/admin/chude/delete/{id}', 'ChuDeController@destroy')->name('backend.chude.destroy');
    Route::get('/admin/chude/pdf', 'ChuDeController@pdf')->name('backend.chude.pdf');

    //Route danh sách vận chuyển
    Route::get('/vanchuyen', 'VanChuyenController@index')->name('backend.vanchuyen.index');
    Route::get('/vanchuyen/themmoi', 'VanChuyenController@create')->name('backend.vanchuyen.create');
    Route::post('/vanchuyen/store', 'VanChuyenController@store')->name('backend.vanchuyen.store');
    Route::get('/vanchuyen/edit/{id}', 'VanChuyenController@edit')->name('backend.vanchuyen.edit');
    Route::put('/vanchuyen/update/{id}', 'VanChuyenController@update')->name('backend.vanchuyen.update');
    Route::delete('/vanchuyen/delete/{id}', 'VanChuyenController@destroy')->name('backend.vanchuyen.destroy');


    //Route danh sách thanh toán
    Route::get('/thanhtoan', 'ThanhToanController@index')->name('backend.thanhtoan.index');
    Route::get('/thanhtoan/themmoi', 'ThanhToanController@create')->name('backend.thanhtoan.create');
    Route::post('/thanhtoan/store', 'ThanhToanController@store')->name('backend.thanhtoan.store');
    Route::get('/thanhtoan/edit/{id}', 'ThanhToanController@edit')->name('backend.thanhtoan.edit');
    Route::put('/thanhtoan/update/{id}', 'ThanhToanController@update')->name('backend.thanhtoan.update');
    Route::delete('/thanhtoan/delete/{id}', 'ThanhToanController@destroy')->name('backend.thanhtoan.destroy');

    //Route danh sách Xuất xứ
    Route::get('/xuatxu', 'XuatxuController@index')->name('backend.xuatxu.index');
    Route::get('/xuatxu/themmoi', 'XuatxuController@create')->name('backend.xuatxu.create');
    Route::post('/xuatxu/store', 'XuatxuController@store')->name('backend.xuatxu.store');
    Route::get('/xuatxu/edit/{id}', 'XuatxuController@edit')->name('backend.xuatxu.edit');
    Route::put('/xuatxu/update/{id}', 'XuatxuController@update')->name('backend.xuatxu.update');
    Route::delete('/xuatxu/delete/{id}', 'XuatxuController@destroy')->name('backend.xuatxu.destroy');

    //Route danh sách Mẫu
    Route::get('/mau', 'MauController@index')->name('backend.mau.index');
    Route::get('/mau/themmoi', 'MauController@create')->name('backend.mau.create');
    Route::post('/mau/store', 'MauController@store')->name('backend.mau.store');
    Route::get('/mau/edit/{id}', 'MauController@edit')->name('backend.mau.edit');
    Route::put('/mau/update/{id}', 'MauController@update')->name('backend.mau.update');
    Route::delete('/mau/delete/{id}', 'MauController@destroy')->name('backend.mau.destroy');
    Route::get('/mau/pdf', 'MauController@pdf')->name('backend.mau.pdf');

    //Route danh sách Quyền
    Route::get('/quyen', 'QuyenController@index')->name('backend.quyen.index');
    Route::get('/quyen/themmoi', 'QuyenController@create')->name('backend.quyen.create');
    Route::post('/quyen/store', 'QuyenController@store')->name('backend.quyen.store');
    Route::get('/quyen/edit/{id}', 'QuyenController@edit')->name('backend.quyen.edit');
    Route::put('/quyen/update/{id}', 'QuyenController@update')->name('backend.quyen.update');
    Route::delete('/quyen/delete/{id}', 'QuyenController@destroy')->name('backend.quyen.destroy');

    //Route danh sách Khách hàng
    Route::get('/khachhang', 'KhachhangController@index')->name('backend.khachhang.index');
    Route::get('/khachhang/themmoi', 'KhachhangController@create')->name('backend.khachhang.create');
    Route::post('/khachhang/store', 'KhachhangController@store')->name('backend.khachhang.store');
    Route::get('/khachhang/edit/{id}', 'KhachhangController@edit')->name('backend.khachhang.edit');
    Route::put('/khachhang/update/{id}', 'KhachhangController@update')->name('backend.khachhang.update');
    Route::delete('/khachhang/delete/{id}', 'KhachhangController@destroy')->name('backend.khachhang.destroy');


    //Route danh sách nhân viên
    Route::get('/nhanvien', 'NhanVienController@index')->name('backend.nhanvien.index');
    Route::get('/nhanvien/themmoi', 'NhanVienController@create')->name('backend.nhanvien.create');
    Route::post('/nhanvien/store', 'NhanVienController@store')->name('backend.nhanvien.store');
    Route::get('/nhanvien/edit/{id}', 'NhanVienController@edit')->name('backend.nhanvien.edit');
    Route::put('/nhanvien/update/{id}', 'NhanVienController@update')->name('backend.nhanvien.update');
    Route::delete('/nhanvien/delete/{id}', 'NhanVienController@destroy')->name('backend.nhanvien.destroy');
    Route::get('/nhanvien/print', 'NhanVienController@print')->name('backend.nhanvien.print');
    Route::get('/nhanvien/pdf', 'NhanVienController@pdf')->name('backend.nhanvien.pdf');
    //Route danh sách nhà cung cấp
    Route::get('/nhacungcap', 'NhaCungCapController@index')->name('backend.nhacungcap.index');
    Route::get('/nhacungcap/themmoi', 'NhaCungCapController@create')->name('backend.nhacungcap.create');
    Route::post('/nhacungcap/store', 'NhaCungCapController@store')->name('backend.nhacungcap.store');
    Route::get('/nhacungcap/edit/{id}', 'NhaCungCapController@edit')->name('backend.nhacungcap.edit');
    Route::put('/nhacungcap/update/{id}', 'NhaCungCapController@update')->name('backend.nhacungcap.update');
    Route::delete('/nhacungcap/delete/{id}', 'NhaCungCapController@destroy')->name('backend.nhacungcap.destroy');
    Route::get('/nhacungcap/print', 'NhaCungCapController@print')->name('backend.nhacungcap.print');
    Route::get('/nhacungcap/pdf', 'NhaCungCapController@pdf')->name('backend.nhacungcap.pdf');
});
Route::get('/admin/','BackendController@dashboard')->name('backend.dashboard');

    //Route danh sách hình ảnh
    Route::get('/hinhanh', 'HinhAnhController@index')->name('backend.hinhanh.index');
    Route::get('/hinhanh/themmoi', 'HinhAnhController@create')->name('backend.hinhanh.create');
    Route::post('/hinhanh/store', 'HinhAnhController@store')->name('backend.hinhanh.store');
    Route::get('/hinhanh/edit/{id}', 'HinhAnhController@edit')->name('backend.hinhanh.edit');
    Route::put('/hinhanh/update/{id}', 'HinhAnhController@update')->name('backend.hinhanh.update');
    Route::delete('/hinhanh/delete/{id}', 'HinhAnhController@destroy')->name('backend.hinhanh.destroy');
    Route::get('/hinhanh/print', 'HinhAnhController@print')->name('backend.hinhanh.print');
    Route::get('/hinhanh/pdf', 'HinhAnhController@pdf')->name('backend.hinhanh.pdf');

   //Route danh sách đơn hàng
   Route::get('/donhang', 'DonHangController@index')->name('backend.donhang.index');
   Route::get('/donhang/themmoi', 'DonHangController@create')->name('backend.donhang.create');
   Route::post('/donhang/store', 'DonHangController@store')->name('backend.donhang.store');
   Route::get('/donhang/edit/{id}', 'DonHangController@edit')->name('backend.donhang.edit');
   Route::put('/donhang/update/{id}', 'DonHangController@update')->name('backend.donhang.update');
   Route::delete('/donhang/delete/{id}', 'DonHangController@destroy')->name('backend.donhang.destroy');
   Route::get('/donhang/print', 'DonHangController@print')->name('backend.donhang.print');
   Route::get('/donhang/pdf', 'DonHangController@pdf')->name('backend.donhang.pdf');


     //Route danh sách màu sản phẩm
     Route::get('/mausanpham', 'MauSanPhamController@index')->name('backend.mausanpham.index');
     Route::get('/mausanpham/themmoi', 'MauSanPhamController@create')->name('backend.mausanpham.create');
     Route::post('/mausanpham/store', 'MauSanPhamController@store')->name('backend.mausanpham.store');
     Route::get('/mausanpham/edit/{id}', 'MauSanPhamController@edit')->name('backend.mausanpham.edit');
     Route::put('/mausanpham/update/{id}', 'MauSanPhamController@update')->name('backend.mausanpham.update');
     Route::delete('/mausanpham/delete/{id}', 'MauSanPhamController@destroy')->name('backend.mausanpham.destroy');
     Route::get('/mausanpham/print', 'MauSanPhamController@print')->name('backend.mausanpham.print');
     Route::get('/mausanpham/pdf', 'MauSanPhamController@pdf')->name('backend.mausanpham.pdf');


       //Route danh sách hình ảnh
    Route::get('/hinhanh', 'HinhAnhController@index')->name('backend.hinhanh.index');
    Route::get('/hinhanh/themmoi', 'HinhAnhController@create')->name('backend.hinhanh.create');
    Route::post('/hinhanh/store', 'HinhAnhController@store')->name('backend.hinhanh.store');
    Route::get('/hinhanh/edit/{id}', 'HinhAnhController@edit')->name('backend.hinhanh.edit');
    Route::put('/hinhanh/update/{id}', 'HinhAnhController@update')->name('backend.hinhanh.update');
    Route::delete('/hinhanh/delete/{id}', 'HinhAnhController@destroy')->name('backend.hinhanh.destroy');
    Route::get('/hinhanh/print', 'HinhAnhController@print')->name('backend.hinhanh.print');
    Route::get('/hinhanh/pdf', 'HinhAnhController@pdf')->name('backend.hinhanh.pdf');


      //Route danh sách Góp ý
      Route::get('/gopy', 'GopYController@index')->name('backend.gopy.index');
      Route::get('/gopy/themmoi', 'GopYController@create')->name('backend.gopy.create');
      Route::post('/gopy/store', 'GopYController@store')->name('backend.gopy.store');
      Route::get('/gopy/edit/{id}', 'GopYController@edit')->name('backend.gopy.edit');
      Route::put('/gopy/update/{id}', 'GopYController@update')->name('backend.gopy.update');
      Route::delete('/gopy/delete/{id}', 'GopYController@destroy')->name('backend.gopy.destroy');
      Route::get('/gopy/print', 'GopYController@print')->name('backend.gopy.print');
      Route::get('/gopy/pdf', 'GopYController@pdf')->name('backend.gopy.pdf');


        //Route danh sách chủ đề sản phẩm
    Route::get('/chudesanpham', 'ChuDeSanPhamController@index')->name('backend.chudesanpham.index');
    Route::get('/chudesanpham/themmoi', 'ChuDeSanPhamController@create')->name('backend.chudesanpham.create');
    Route::post('/chudesanpham/store', 'ChuDeSanPhamController@store')->name('backend.chudesanpham.store');
    Route::get('/chudesanpham/edit/{id}', 'ChuDeSanPhamController@edit')->name('backend.chudesanpham.edit');
    Route::put('/chudesanpham/update/{id}', 'ChuDeSanPhamController@update')->name('backend.chudesanpham.update');
    Route::delete('/chudesanpham/delete/{id}', 'ChuDeSanPhamController@destroy')->name('backend.chudesanpham.destroy');
    Route::get('/chudesanpham/print', 'ChuDeSanPhamController@print')->name('backend.chudesanpham.print');
    Route::get('/chudesanpham/pdf', 'ChuDeSanPhamController@pdf')->name('backend.chudesanpham.pdf');


      //Route danh sách Khuyễn mãi
      Route::get('/khuyenmai', 'KhuyenMaiController@index')->name('backend.khuyenmai.index');
      Route::get('/khuyenmai/themmoi', 'KhuyenMaiController@create')->name('backend.khuyenmai.create');
      Route::post('/khuyenmai/store', 'KhuyenMaiController@store')->name('backend.khuyenmai.store');
      Route::get('/khuyenmai/edit/{id}', 'KhuyenMaiController@edit')->name('backend.khuyenmai.edit');
      Route::put('/khuyenmai/update/{id}', 'KhuyenMaiController@update')->name('backend.khuyenmai.update');
      Route::delete('/khuyenmai/delete/{id}', 'KhuyenMaiController@destroy')->name('backend.khuyenmai.destroy');
      Route::get('/khuyenmai/print', 'KhuyenMaiController@print')->name('backend.khuyenmai.print');
      Route::get('/khuyenmai/pdf', 'KhuyenMaiController@pdf')->name('backend.khuyenmai.pdf');


        //Route danh sách Phiếu nhập
    Route::get('/phieunhap', 'PhieuNhapController@index')->name('backend.phieunhap.index');
    Route::get('/phieunhap/themmoi', 'PhieuNhapController@create')->name('backend.phieunhap.create');
    Route::post('/phieunhap/store', 'PhieuNhapController@store')->name('backend.phieunhap.store');
    Route::get('/phieunhap/edit/{id}', 'PhieuNhapController@edit')->name('backend.phieunhap.edit');
    Route::put('/phieunhap/update/{id}', 'PhieuNhapController@update')->name('backend.phieunhap.update');
    Route::delete('/phieunhap/delete/{id}', 'PhieuNhapController@destroy')->name('backend.phieunhap.destroy');
    Route::get('/phieunhap/print', 'PhieuNhapController@print')->name('backend.phieunhap.print');
    Route::get('/phieunhap/pdf', 'PhieuNhapController@pdf')->name('backend.phieunhap.pdf');


// Các rout dành riêng cho frontend
//Namespace Php
    Route::get('/','Frontend\FrontendController@index')->name('frontend.home');
    Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');
    Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');
    Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');
    Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');
    Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');
    Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');
    Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
    Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');
    Route::get('setLocale/{locale}', function ($locale) {
        if (in_array($locale, Config::get('app.locales'))) {
          Session::put('locale', $locale);
        }
        return redirect()->back();
    })->name('app.setLocale');
// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');
