<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\User;
use App\Models\kategori;
use App\Models\pelanggan;
use App\Models\pembayaran;
use App\Models\penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class admin extends Controller
{
    public function indexPenjualan(){
        $data['penjualan'] = penjualan::get();
        return view('admin/penjualan/index',$data);
    }
    
    public function viewInsertPenjualan()
    {
        $data['obat'] = obat::get();
        $data['user'] = User::get();
        $data['pelanggan'] = pelanggan::get();
        $data['pembayaran'] = pembayaran::get();
        return view('admin/penjualan/viewInsertUpdate',$data);
    }

    public function postInsertPenjualan(Request $request)
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
        $data->save();

        // LOGIKA STOK
        $stok = obat::where('KODE_OBAT', $request->kode_obat)->value('STOK');
            
        $total = $stok - $request->jumlah;

        $datas = obat::where('KODE_OBAT',$request->kode_obat);

        $datas->update([
            'STOK' => $total,
        ]);
            
            
        // $datas->update();
        // Pengechekan data sebelum di save
        if ($status) {
        return redirect('indexPenjualan')->with('success', 'Berhasil menambahkan data');
            

        } else {
            return redirect('viewInsertPenjualan')->with('error','Gagal menambahkan data');
        }
    }

    public function viewUpdatePenjualan($ID_PENJUALAN)
    {
        $data['penjualans'] = penjualan::find($ID_PENJUALAN);
        $data['obat'] = obat::get();
        $data['user'] = User::get();
        $data['pelanggan'] = pelanggan::get();
        $data['pembayaran'] = pembayaran::get();
        return view('admin/penjualan/viewInsertUpdate', $data);
    }

    public function postUpdatePenjualan(Request $request, $ID_PENJUALAN)
    {
        $this->validate($request, [
            'kode_obat' => 'required',
            'id_user' => 'required',
            'id_pembayaran' => 'required',
            'id_pelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
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
            return redirect('indexPenjualan')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertPenjualan')->with('error','Gagal perbarui data');
        }
    }

    public function deletePenjualan($ID_PENJUALAN)
    {
        $data = penjualan::find($ID_PENJUALAN);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPenjualan')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertPenjualan')->with('error','Gagal delete data');
        }
    }
    public function indexPenjualan1(){
        return view('home');
    }

    // ======================================KATEGORI=========================================
    // ======================================KATEGORI=========================================
    // ======================================KATEGORI=========================================

    public function indexKategori()
    {
        $data['kategori'] = kategori::get();
        return view('admin/kategori/index', $data);
    }

    public function viewInsertKategori()
    {
        return view('admin/kategori/viewInsertUpdate');
    }

    public function postInsertKategori(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        $data = new kategori;

        $data->NAMA_KATEGORI = $request->nama_kategori;

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexKategori')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertKategori')->with('error','Gagal menambahkan data');
        }
    }

    public function viewUpdateKategori($ID_KATEGORI)
    {
        $data['kategori'] = kategori::find($ID_KATEGORI);
        return view('admin/kategori/viewInsertUpdate', $data);
    }

    public function postUpdateKategori(Request $request, $ID_KATEGORI)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);
        $data = kategori::find($ID_KATEGORI);

        $data->NAMA_KATEGORI = $request->nama_kategori;

        $status = $data->update();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexKategori')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertKategori')->with('error','Gagal perbarui data');
        }
    }

    public function deleteKategori($ID_KATEGORI)
    {
        $data = kategori::find($ID_KATEGORI);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexKategori')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertKategori')->with('error','Gagal delete data');
        }
    }

    // ======================================OBAT=========================================
    // ======================================OBAT=========================================
    // ======================================OBAT=========================================

    public function indexObat()
    {
        $data['obat'] = obat::get();
        return view('admin/obat/index', $data);
    }
    
    public function viewInsertObat()
    {
        $data['kategori'] = kategori::get();
        return view('admin/obat/viewInsertUpdate',$data);
    }

    public function postInsertObat(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_obat' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
            'exp' => 'required',
            'image' => ['image'],
        ]);

        $image = null;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('images'); //atribut store yang nantinya menyiimpan file foto ke database dengan tambahan nama ('files')
        }

        $data = new obat;

        $data->ID_KATEGORI = $request->id_kategori;
        $data->NAMA_OBAT = $request->nama_obat;
        $data->HARGA = $request->harga;
        $data->KETERANGAN = $request->keterangan;
        $data->STOK = $request->stok;
        $data->EXP = $request->exp;
        $data->image = $image;

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexObat')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertObat')->with('error','Gagal menambahkan data');
        }
    }

    public function viewUpdateObat($KODE_OBAT)
    {
        $data['obats'] = obat::find($KODE_OBAT);
        $data['kategori'] = kategori::get();
        return view('admin/obat/viewInsertUpdate', $data);
    }

    public function postUpdateObat(Request $request, $KODE_OBAT)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_obat' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
            'exp' => 'required',
            'image' => ['image'],
        ]);
        $data = obat::find($KODE_OBAT);
        
        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('image')) {
            // Simpan file baru
            $image = $request->file('image')->store('images');
            // Hapus file lama jika ada
            $oldImage = $data->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
        } else {
            // Jika tidak ada file yang diunggah, gunakan file yang ada
            $image = $request->input('image');
        }

        $data->ID_KATEGORI = $request->id_kategori;
        $data->NAMA_OBAT = $request->nama_obat;
        $data->HARGA = $request->harga;
        $data->KETERANGAN = $request->keterangan;
        $data->STOK = $request->stok;
        $data->EXP = $request->exp;
        $data->image = $image;

        $status = $data->update();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexObat')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertObat')->with('error','Gagal perbarui data');
        }
    }

    public function deleteObat($KODE_OBAT)
    {
        $data = obat::find($KODE_OBAT);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexObat')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertObat')->with('error','Gagal delete data');
        }
    }

    // ======================================PEMBAYARAN=========================================
    // ======================================PEMBAYARAN=========================================
    // ======================================PEMBAYARAN=========================================

    public function indexPembayaran()
    {
        $data['pembayaran'] = pembayaran::get();
        return view('admin/pembayaran/index', $data);
    }

    public function viewInsertPembayaran()
    {
        return view('admin/pembayaran/viewInsertUpdate');
    }

    public function postInsertPembayaran(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'nama_pembayaran' => 'required',
        ]);

        $data = new pembayaran;

        $data->NAMA_PEMBAYARAN = $request->nama_pembayaran;

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPembayaran')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertPembayaran')->with('error','Gagal menambahkan data');
        }
    }

    public function viewUpdatePembayaran($ID_PEMBAYARAN)
    {
        $data['pembayarans'] = pembayaran::find($ID_PEMBAYARAN);
        return view('admin/pembayaran/viewInsertUpdate', $data);
    }

    public function postUpdatePembayaran(Request $request, $ID_PEMBAYARAN)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'nama_pembayaran' => 'required',
        ]);
        $data = pembayaran::find($ID_PEMBAYARAN);

        $data->NAMA_PEMBAYARAN = $request->nama_pembayaran;

        $status = $data->update();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPembayaran')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertPembayaran')->with('error','Gagal perbarui data');
        }
    }

    public function deletePembayaran($ID_PEMBAYARAN)
    {
        $data = pembayaran::find($ID_PEMBAYARAN);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexPembayaran')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertPembayaran')->with('error','Gagal delete data');
        }
    }

    // ======================================USER=========================================
    // ======================================USER=========================================
    // ======================================USER=========================================

    public function indexUser()
    {
        $data['user'] = User::get();
        return view('admin/user/index', $data);
    }

    public function viewInsertUser()
    {
        return view('admin/user/viewInsertUpdate');
    }

    public function postInsertUser(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'role' => 'required',
            'alamat' => 'required',
        ]);

        $data = new User;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->username = $request->username;
        $data->role = $request->role;
        $data->alamat = $request->alamat;
        

        $status = $data->save();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexUser')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect('viewInsertUser')->with('error','Gagal menambahkan data');
        }
    }
    
    public function viewUpdateUser($id)
    {
        $data['User'] = User::find($id);
        return view('admin/user/viewEdit', $data);
    }

    public function postUpdateUser(Request $request, $id)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            'username' => 'required',
            'role' => 'required',
            'alamat' => 'required',
        ]);
        
        $data = User::find($id);
        
        $data->name = $request->name;
        // $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        $data->username = $request->username;
        $data->role = $request->role;
        $data->alamat = $request->alamat;
        // Pengechekan data sebelum di save
        $status = $data->update();

        if ($status) {
            return redirect('indexUser')->with('success','Berhasil perbarui data');
        } else {
            return redirect('viewInsertUser')->with('error','Gagal perbarui data');
        }
    }

    public function deleteUser($id)
    {
        $data = User::find($id);

        $status = $data->delete();
        // Pengechekan data sebelum di save
        if ($status) {
            return redirect('indexUser')->with('success','Berhasil delete data');
        } else {
            return redirect('viewInsertUser')->with('error','Gagal delete data');
        }
    }

    // ===================================HISTORY & CETAK=========================================
    // ===================================HISTORY & CETAK=========================================
    // ===================================HISTORY & CETAK=========================================

    public function indexDetailAdmin()
    {
        $data['penjualan'] = penjualan::get();
        return view('admin/penjualan/historyPenjualan', $data);
    }

	public function cetakDetail(){
        $dataDetail = penjualan::get();
        $data = [
            'title' => 'Laporan Detail Histroy Penjualan',
            'date' => date('m/d/Y'),
            'penjualan' => $dataDetail,
        ];
        $pdf = PDF::loadView('admin/penjualan/cetakDetail', $data);
        return $pdf->download('DetailTransaksi(All).pdf');
    }
	
    public function cetakDetailSatuan($ID_PENJUALAN){
        
        $dataDetail = penjualan::find($ID_PENJUALAN);

        $data = [
            'title' => 'Struk Pembelian Obat',
            'date' => date('m/d/Y'),
            'penjualan' => $dataDetail,
        ];
        
        $pdf = PDF::loadView('admin/penjualan/cetakDetailSatuan', $data);
        return $pdf->download('StrukPembelian.pdf');
    }

     // ===================================Register=========================================
    // ===================================Register=========================================
    // ===================================Register=========================================

    public function postRegister(Request $request)
    {
        // Validasi inputan harus di isi
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
        ]);
        $role = "pelanggan";

        // Insert Data User!
        $data = new User;
        
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->alamat = $request->alamat;
        $data->role = $role;
        $data->save();
        
        // Insert Data Pelanggan!
        $pelanggan = new pelanggan;
        $pelanggan->NAMA_PELANGGAN = $request->name;
        $pelanggan->EMAIL = $request->email;
        $pelanggan->USERNAME = $request->username;
        $pelanggan->PASSWORD = bcrypt($request->password);
        $pelanggan->ALAMAT = $request->alamat;
        $pelanggan->save();

        return redirect('/')->with('Berhasil menambahkan data');
    }
}
