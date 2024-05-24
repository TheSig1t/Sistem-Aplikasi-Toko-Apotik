<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'ID_PEMBAYARAN';
    protected $fillable = ['NAMA_PEMBAYARAN'];
    public $timestamps = false; //Menonaktifkan Kolom Timesstamps bawaan laravel

    // Relasi ke tabel Penjualan
    public function penjualan(){
        return $this->hasMany(penjualan::class, 'ID_PEMBAYARAN', 'ID_PEMBAYARAN');
    }
}
