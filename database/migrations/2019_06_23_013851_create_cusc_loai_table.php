<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Câu lệnh tạo migration mới php artisan make:migration create_cusc_loai_table --create=cusc_loai
        Schema::create('cusc_loai', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // InnoDb mối quan hệ với bảng , MyISAM thiết lập bảng chỉ để đọc
            $table->unsignedTinyInteger('l_ma')
                ->autoIncrement()
                ->comment('Mã loại sản phẩm');
            $table->string('l_ten', 50)
                ->comment('Tên loại # Tên loại sản phẩm');
            $table->timestamp('l_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
            $table->timestamp('l_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất');
            $table->tinyInteger('l_trangThai')
                ->default('2')
                ->comment('Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-khả dụng');
            
            $table->unique(['l_ten']);
        });
        DB::statement("ALTER TABLE `cusc_loai` comment 'Loại sản phẩm # Loại sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_loai');
    }
}
