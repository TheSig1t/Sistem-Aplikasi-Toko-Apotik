<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas | Obat</title>
    <link rel="stylesheet" href="/css/form.css">
    <style>
        /* Styling untuk pesan error */
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h2>KLINIK HEPI AJA</h2>
        <div class="insert">
            <a href="{{ url('indexPenjualanPetugas') }}"><button>Kembali</button></a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <h2>FORM Pembelian Obat</h2>
        <form action="{{ url('postInsertPenjualanPetugas', @$penjualans->ID_PENJUALAN) }}" method="post"
            enctype="multipart/form-data">
            @if (!empty($penjualans))
                @method('PATCH')
            @endif
            @csrf


            <div class="form-container">
                <div class="form-group">
                    <label>Pilih Obat</label>
                    <select name="kode_obat" id="kode_obat"><br>
                        <option disabled selected>-- Pilih Obat --</option>
                        @foreach ($obat as $row)
                            <option value="{{ $row->KODE_OBAT }}" {{ old('kode_obat') }}
                                @if (@$penjualans->KODE_OBAT == $row->KODE_OBAT) selected @endif>
                                {{ $row->NAMA_OBAT }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih User</label>
                    <select name="id_user" id="id_user"><br>
                        <option disabled selected>-- Pilih User --</option>
                        @foreach ($user as $row)
                            <option value="{{ $row->id }}" {{ old('id_user') }}
                                @if (@$penjualans->ID_USER == $row->id) selected @endif>
                                {{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan"><br>
                        <option disabled selected>-- Pilih Pelanggan --</option>
                        @foreach ($pelanggan as $row)
                            <option value="{{ $row->ID_PELANGGAN }}" {{ old('id_pelanggan') }}
                                @if (@$penjualans->ID_PELANGGAN == $row->ID_PELANGGAN) selected @endif>
                                {{ $row->NAMA_PELANGGAN }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Method Pembayaran</label>
                    <select name="id_pembayaran" id="id_pembayaran"><br>
                        <option disabled selected>-- Pilih Method Pembayaran --</option>
                        @foreach ($pembayaran as $row)
                            <option value="{{ $row->ID_PEMBAYARAN }}" {{ old('id_pembayaran') }}
                                @if (@$penjualans->ID_PEMBAYARAN == $row->ID_PEMBAYARAN) selected @endif>
                                {{ $row->NAMA_PEMBAYARAN }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group2">
                        <label>Tanggal</label>
                        <input type="date" required name="tanggal" id="tanggal" autofocus
                            value="{{ old('tanggal', @$penjualans->TANGGAL) }}">
                    </div>
                    <div class="form-group2">
                        <label>Jumlah</label>
                        <input type="number" required name="jumlah" id="jumlah"
                            value="{{ old('jumlah', @$penjualans->JUMLAH) }}">
                    </div>
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</body>

</html>
