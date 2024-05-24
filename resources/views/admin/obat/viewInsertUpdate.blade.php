<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Obat</title>
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
            <a href="{{ url('indexKategori') }}"><button>Kembali</button></a>
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
        <h2>FORM OBAT</h2>
        <form action="{{ url('postInsertObat', @$obats->KODE_OBAT) }}" method="post" enctype="multipart/form-data">
            @if (!empty($obats))
                @method('PATCH')
            @endif
            @csrf
            <div class="form-group">
                <div class="form-group2">
                    <label>Nama Obat</label>
                    <input type="text" required name="nama_obat" id="nama_obat" autofocus
                        value="{{ old('nama_obat', @$obats->NAMA_OBAT) }}">
                </div>
                <div class="form-group2">
                    <label>Harga</label>
                    <input type="number" required name="harga" id="harga"
                        value="{{ old('harga', @$obats->HARGA) }}">
                </div>
            </div>
            <div class="form-container">

                <div class="form-group">
                    <div class="form-group2">
                        <label>Keterangan</label>
                        <input type="text" required name="keterangan" id="keterangan" autofocus
                            value="{{ old('keterangan', @$obats->KETERANGAN) }}">
                    </div>
                    <div class="form-group2">
                        <label>Stok</label>
                        <input type="number" required name="stok" id="stok"
                            value="{{ old('stok', @$obats->STOK) }}">
                    </div>
                    <div class="form-group2">
                        <label>Tanggal Expired</label>
                        <input type="date" required name="exp" id="exp"
                            value="{{ old('exp', @$obats->EXP) }}">
                    </div>
                </div>
            </div>

            <div class="form-container">
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="" name="id_kategori" id="id_kategori"><br>
                        <option disabled selected>-- Pilih Kategori --</option>
                        @foreach ($kategori as $row)
                            <option value="{{ $row->ID_KATEGORI }}" {{ old('id_kategori') }}
                                @if (@$obats->ID_KATEGORI == $row->ID_KATEGORI) selected @endif>
                                {{ $row->NAMA_KATEGORI }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload Gambar Obat</label>
                    <input type="file" required name="image" id="image">
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</body>

</html>
