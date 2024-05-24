<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori';
    protected $primaryKey = 'ID_KATEGORI';
    protected $fillable = ['NAMA_KATEGORI'];
    public $timestamps = false; //Menonaktifkan Kolom Timesstamps bawaan laravel
    
    // Relasi ke tabel Paket
    public function obat(){
        return $this->hasMany(obat::class, 'ID_KATEGORI', 'ID_KATEGORI');
    }
}
