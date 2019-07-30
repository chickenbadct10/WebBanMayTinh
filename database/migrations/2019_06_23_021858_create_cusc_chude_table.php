<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Câu lệnh tạo migration mới php artisan make:migration create_cusc_loai_table --create=cusc_loai
        Schema::create('cusc_chude', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // InnoDb mối quan hệ với bảng , MyISAM thiết lập bảng chỉ để đọc
            $table->unsignedTinyInteger('cd_ma')
                ->autoIncrement()
                ->comment('Mã chủ đề sản phẩm');
            $table->string('cd_ten', 50)
                ->comment('Tên chủ đề # Tên chủ đề sản phẩm');
            $table->timestamp('cd_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề sản phẩm');
            $table->timestamp('cd_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm cập nhật # Thời điểm cập nhật chủ đề sản phẩm gần nhất');
            $table->tinyInteger('cd_trangThai')
                ->default('2')
                ->comment('Trạng thái # Trạng thái chủ đề sản phẩm: 1-khóa, 2-khả dụng');

            $table->unique(['cd_ma', 'cd_ten']);
        });
        DB::statement("ALTER TABLE `cusc_chude` comment 'Chủ đề sản phẩm # Chủ đề sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chude');
    }
}
