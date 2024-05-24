<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $primaryKey = 'ID_PELANGGAN';
    protected $fillable = ['NAMA_PELANGGAN','USERNAME','PASSWORD','EMAIL'];
    public $timestamps = false; //Menonaktifkan Kolom Timesstamps bawaan laravel
    
    // Relasi ke tabel penjualan
    public function penjualan(){
        return $this->hasMany(penjualan::class, 'ID_PELANGGAN', 'ID_PELANGGAN');
    }
}
