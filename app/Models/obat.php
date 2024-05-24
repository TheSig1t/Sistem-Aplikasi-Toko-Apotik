<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = 'tb_obat';
    protected $primaryKey = 'KODE_OBAT';
    protected $fillable = ['ID_KATEGORI','NAMA_OBAT','HARGA','KETERANGAN','STOK','EXP','image'];
    public $timestamps = false; //Menonaktifkan Kolom Timesstamps bawaan laravel
    
    // Relasi ke tabel Kategori
    public function kategori(){
        return $this->belongsTo(kategori::class, 'ID_KATEGORI', 'ID_KATEGORI');
    }
    // Relasi ke tabel Penjualan
    public function penjualan(){
        return $this->hasMany(penjualan::class, 'KODE_OBAT', 'KODE_OBAT');
    }
}
