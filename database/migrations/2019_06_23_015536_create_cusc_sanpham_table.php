<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // InnoDb mối quan hệ với bảng , MyISAM thiết lập bảng chỉ để đọc
            $table->unsignedBigInteger('sp_ma')
                ->autoIncrement()
                ->comment('Mã sản phẩm');
            $table->string('sp_ten', 171)
                ->comment('Tên loại # Tên loại sản phẩm');
            $table->unsignedInteger('sp_giaGoc')
                ->default('0')
                ->comment('Giá gốc sản phẩm mặc định 0');
            $table->unsignedInteger('sp_giaBan')
                ->default('0')
                ->comment('Giá bán ra của sản phẩm mặc định 0');
            $table->string('sp_hinh', 171)
                ->comment('Hình của sản phẩm');
            $table->text('sp_thongtin')
                ->comment('Thông tin của sản phẩm');
            $table->string('sp_danhGia', 50)
                ->comment('Đánh giá của sản phẩm');
            $table->timestamp('sp_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
            $table->timestamp('sp_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
            $table->tinyInteger('sp_trangThai')
                ->default('2')
                ->comment('Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('l_ma')
                ->comment('Mã loại sản phẩm');
            $table->unique(['sp_ten']);
            $table->foreign('l_ma') // Cột khóa ngoại cua bảng
                ->references('l_ma') // tham chiếu đến cột cha trong table cusc_loai
                ->on('cusc_loai')// ở cột cha cusc_loai
                ->onDelete('RESTRICT') // Sẽ xóa dữ liệu khi xóa cha, RESTRISCT sẽ không xóa khi đang sử dụng ở thằng con
                ->onUpdate('CASCADE');// đặt khóa ngoại

        });
        DB::statement("ALTER TABLE `cusc_sanpham` comment 'Sản phẩm # Sản phẩm: hoa, giỏ hoa, vòng hoa, ...'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_sanpham');
    }
}
