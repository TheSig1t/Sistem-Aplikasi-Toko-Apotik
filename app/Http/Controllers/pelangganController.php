<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\User;
use App\Models\pelanggan;
use App\Models\penjualan;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class pelangganController extends Controller
{
    public function indexPenjualanPelanggan(){
        $user_id = Auth::id();
        
        $data['historyTransaksi'] = penjualan::where('ID_USER', $user_id)->get();
        // $data['historyTransaksi'] = pelanggan::where('ID_PELANGGAN', $user_id)->get();
        return view('pelanggan/penjualan/index',$data);
    }
    
    public function viewInsertPenjualanPelanggan()
    {
        $data['obat'] = obat::get();
        $data['user'] = User::get();
        $data['pelanggan'] = pelanggan::get();
        $data['pembayaran'] = pembayaran::get();
        return view('pelanggan/penjualan/viewInsertUpdate',$data);
    }

    public function postInsertPenjualanPelanggan(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'kode_obat' => 'required',
            // 'id_user' => 'required',
            'id_pembayaran' => 'required',
            // 'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            // 'total' => 'required',
        ]);
        
        $user_id = Auth::id();
        // $users = penjualan::where('ID_USER', $user_id)->get();
        
        $harga = obat::where('KODE_OBAT', $request->kode_obat)->value('HARGA');
        
        $total = $harga * $request->jumlah;
        
        $data = new penjualan;
        
        $data->KODE_OBAT = $request->kode_obat;
        $data->ID_USER = $user_id;
        $data->ID_PEMBAYARAN = $request->id_pembayaran;
        $data->ID_PELANGGAN = $request->id_pelanggan;
        $data->TANGGAL = $request->tanggal;
        $data->JUMLAH = $request->jumlah;
        $data->TOTAL = $total;

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPenjualanPelanggan')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertPenjualanPelanggan')->with('error','Gagal menambahkan data');
        }
    }

    public function cetakDetailSatuanPelanggan($ID_PENJUALAN){
        
        $dataDetail = penjualan::find($ID_PENJUALAN);

        $data = [
            'title' => 'Struk Pembelian Obat',
            'date' => date('m/d/Y'),
            'penjualan' => $dataDetail,
        ];
        
        $pdf = PDF::loadView('pelanggan/penjualan/cetakDetailSatuan', $data);
        return $pdf->download('StrukPembelian.pdf');
    }
}
