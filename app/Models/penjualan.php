<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'ID_PENJUALAN';
    protected $fillable = ['KODE_OBAT','ID_USER','ID_PEMBAYARAN','TANGGAL','JUMLAH','TOTAL','ID_PELANGGAN'];
    public $timestamps = false; //Menonaktifkan Kolom Timesstamps bawaan laravel
    
    // Relasi ke tabel obat
    public function obat(){
        return $this->belongsTo(obat::class, 'KODE_OBAT', 'KODE_OBAT');
    }
    // Relasi ke tabel user
    public function user(){
        return $this->belongsTo(User::class, 'ID_USER', 'id');
    }
    // Relasi ke tabel pembayaran
    public function pembayaran(){
        return $this->belongsTo(pembayaran::class, 'ID_PEMBAYARAN', 'ID_PEMBAYARAN');
    }
    // Relasi ke tabel pelanggan
    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'ID_PELANGGAN', 'ID_PELANGGAN');
    }
}
