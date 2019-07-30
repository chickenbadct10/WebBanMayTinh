<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedTinyInteger('q_ma')
                ->autoIncrement()
                ->comment('Mã Quyền');
            $table->String('q_ten',30)
                ->comment('Tên của Quyền');
            $table->String('q_dienGiai')
                ->nullable($value = true)
                ->comment('diễn giải về quyền');
            $table->timestamp('q_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo quyền');
            $table->timestamp('q_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất');
            $table->tinyInteger('q_trangThai')
                ->default('2')
                ->comment('Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng');

            $table->unique(['q_ten']);

        });
            DB::statement("ALTER TABLE `cusc_quyen` comment 'Quyền # Các quyền quản lý'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_quyen');
    }
}
