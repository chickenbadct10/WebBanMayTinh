<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSanpham extends Model
{
    public    $timestamps   = false;
    protected $table        = 'cusc_mau_sanpham';
    protected $fillable     = ['msp_soluong'];
    protected $guarded      = ['sp_ma', 'm_ma'];
    protected $primaryKey   = ['sp_ma', 'm_ma'];
    public    $incrementing = false;


    public function sanpham()
    {
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }

}
