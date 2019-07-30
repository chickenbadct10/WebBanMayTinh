<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscMauSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_mau_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('sp_ma')
                ->comment('Mã sản phẩm');
            $table->unsignedTinyInteger('m_ma')
                ->comment('Mã mẫu sản phẩm');
            $table->unsignedsmallInteger('msp_soLuong')
                ->default('0')
                ->comment('Mã sản phẩm');

            $table->primary(['sp_ma', 'm_ma']);

            $table->foreign('sp_ma') // Cột khóa ngoại cua bảng
                ->references('sp_ma') // tham chiếu đến cột cha trong table cusc_loai
                ->on('cusc_sanpham')// ở cột cha cusc_loai
                ->onDelete('RESTRICT') // Sẽ xóa dữ liệu khi xóa cha, RESTRISCT sẽ không xóa khi đang sử dụng ở thằng con
                ->onUpdate('CASCADE');// đặt khóa ngoại
            $table->foreign('m_ma') // Cột khóa ngoại cua bảng
                ->references('m_ma') // tham chiếu đến cột cha trong table cusc_loai
                ->on('cusc_mau')// ở cột cha cusc_loai
                ->onDelete('RESTRICT') // Sẽ xóa dữ liệu khi xóa cha, RESTRISCT sẽ không xóa khi đang sử dụng ở thằng con
                ->onUpdate('CASCADE');// đặt khóa ngoại

        });
        DB::statement("ALTER TABLE `cusc_mau_sanpham` comment 'Số lượng sản phẩm theo màu # Số lượng sản phẩm tương ứng với các màu'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_mau_sanpham');
    }
}
