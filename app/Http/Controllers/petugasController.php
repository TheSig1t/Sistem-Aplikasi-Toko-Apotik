<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\pelanggan;
use App\Models\penjualan;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class petugasController extends Controller
{
    public function indexPenjualanPetugas(){
        $data['penjualan'] = penjualan::get();
        return view('petugas/penjualan/historyPenjualan',$data);
    }
    
    public function viewInsertPenjualanPetugas()
    {
        $data['obat'] = obat::get();
        $data['user'] = User::get();
        $data['pelanggan'] = pelanggan::get();
        $data['pembayaran'] = pembayaran::get();
        return view('petugas/penjualan/viewInsertUpdate',$data);
    }

    public function postInsertPenjualanPetugas(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'kode_obat' => 'required',
            'id_user' => 'required',
            'id_pembayaran' => 'required',
            'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            // 'total' => 'required',
        ]);

        $harga = obat::where('KODE_OBAT', $request->kode_obat)->value('HARGA');

        $total = $harga * $request->jumlah;

        $data = new penjualan;

        $data->KODE_OBAT = $request->kode_obat;
        $data->ID_USER = $request->id_user;
        $data->ID_PEMBAYARAN = $request->id_pembayaran;
        $data->ID_PELANGGAN = $request->id_pelanggan;
        $data->TANGGAL = $request->tanggal;
        $data->JUMLAH = $request->jumlah;
        $data->TOTAL = $total;

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPenjualanPetugas')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertPenjualanPetugas')->with('error','Gagal menambahkan data');
        }
    }

    public function viewUpdatePenjualanPetugas($ID_PENJUALAN)
    {
        $data['penjualans'] = penjualan::find($ID_PENJUALAN);
        $data['obat'] = obat::get();
        $data['user'] = User::get();
        $data['pelanggan'] = pelanggan::get();
        $data['pembayaran'] = pembayaran::get();
        return view('petugas/penjualan/viewInsertUpdate', $data);
    }

    public function postUpdatePenjualanPetugas(Request $request, $ID_PENJUALAN)
    {
        $this->validate($request, [
            'kode_obat' => 'required',
            'id_user' => 'required',
            'id_pembayaran' => 'required',
            'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            // 'total' => 'required',
        ]);

        $harga = obat::where('KODE_OBAT', $request->kode_obat)->value('HARGA');
        
        $total = $harga * $request->jumlah;
        
        $data = penjualan::find($ID_PENJUALAN);

        $data->KODE_OBAT = $request->kode_obat;
        $data->ID_USER = $request->id_user;
        $data->ID_PEMBAYARAN = $request->id_pembayaran;
        $data->ID_PELANGGAN = $request->id_pelanggan;
        $data->TANGGAL = $request->tanggal;
        $data->JUMLAH = $request->jumlah;
        $data->TOTAL = $total;

        $status = $data->update();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPenjualanPetugas')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertPenjualanPetugas')->with('error','Gagal perbarui data');
        }
    }

    public function deletePenjualanPetugas($ID_PENJUALAN)
    {
        $data = penjualan::find($ID_PENJUALAN);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPenjualanPetugas')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertPenjualanPetugas')->with('error','Gagal delete data');
        }
    }

    public function indexHistoryPenjualanPetugas(){
        $user_id = Auth::id();

        $data['historyPenjualan'] = penjualan::where('ID_USER', $user_id)->get();
        return view('petugas/penjualan/index',$data);
    }

    public function cetakDetailPetugas(){
        $dataDetail = penjualan::get();
        $data = [
            'title' => 'Laporan Detail Histroy Penjualan',
            'date' => date('m/d/Y'),
            'penjualan' => $dataDetail,
        ];
        $pdf = PDF::loadView('petugas/penjualan/cetakDetail', $data);
        return $pdf->download('DetailTransaksi(All).pdf');
    }
	
    public function cetakDetailSatuanPetugas($ID_PENJUALAN){
        
        $dataDetail = penjualan::find($ID_PENJUALAN);

        $data = [
            'title' => 'Struk Pembelian Obat',
            'date' => date('m/d/Y'),
            'penjualan' => $dataDetail,
        ];
        
        $pdf = PDF::loadView('petugas/penjualan/cetakDetailSatuan', $data);
        return $pdf->download('StrukPembelian.pdf');
    }
}
