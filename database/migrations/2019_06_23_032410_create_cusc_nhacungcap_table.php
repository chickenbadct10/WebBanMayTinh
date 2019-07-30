<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhacungcap', function (Blueprint $table) {
            $table->unsignedSmallInteger('ncc_ma')
                ->autoIncrement()
                ->comment('Nhà cung cấp sản phẩm');
            $table->String('ncc_ten',191)
                ->comment('Tên nhà cung cấp  sản phẩm');
            $table->String('ncc_daiDien',100)
                ->comment('Đại diện nhà cung cấp sản phẩm');
            $table->String('ncc_diaChi',191)
                ->comment('Địa chỉ nhà cung cấp sản phẩm');
            $table->String('ncc_dienThoai',11)
                ->comment('Số điện thoại nhà cung cấp sản phẩm');
            $table->String('ncc_email',100)
                ->comment('email nhà cung cấp');
            $table->timestamp('ncc_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhà cung cấp sản phẩm');
            $table->timestamp('ncc_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm cập nhật # Thời điểm cập nhật nhà cung cấp sản phẩm gần nhất');
            $table->tinyInteger('ncc_trangThai')
                ->default('2')
                ->comment('Trạng thái # Trạng thái nhà cung cấp sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedSmallInteger('xx_ma')
                ->comment('Xuất xứ mã của sản phẩm');

            $table->unique(['ncc_ten', 'ncc_dienThoai', 'ncc_email']);

            $table->foreign('xx_ma') // Cột khóa ngoại cua bảng
            ->references('xx_ma') // tham chiếu đến cột cha trong table cusc_loai
            ->on('cusc_xuatxu')// ở cột cha cusc_loai
            ->onDelete('RESTRICT') // Sẽ xóa dữ liệu khi xóa cha, RESTRISCT sẽ không xóa khi đang sử dụng ở thằng con
            ->onUpdate('CASCADE');// đặt khóa ngoại
        });
        DB::statement("ALTER TABLE `cusc_nhacungcap` comment 'Nhà cung cấp # Nhà cung cấp hoa'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nhacungcap');
    }
}
