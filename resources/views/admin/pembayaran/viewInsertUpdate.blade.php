<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Pembayaran</title>
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
            <a href="{{ url('indexPembayaran') }}"><button>Kembali</button></a>
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
        <h2>FORM Method Pembayaran</h2>
        <form action="{{ url('postInsertPembayaran', @$pembayarans->ID_PEMBAYARAN) }}" method="post">
            @if (!empty($pembayarans))
                @method('PATCH')
            @endif
            @csrf
            <div class="form-container">
              {{-- <div class="form-group"> --}}
              {{-- <div class="form-group2"> --}}
                <label>Pilih Method Pembayaran</label>
                <select class="" name="nama_pembayaran" id="nama_pembayaran"><br>
                    <option disabled selected>-- Pilih Method Pembayaran --</option>
                    @foreach (['Cash', 'Transfer', 'Kredit'] as $nama_pembayaran)
                        <option value="{{ $nama_pembayaran }}"
                            {{ old('nama_pembayaran', @$pembayarans->NAMA_PEMBAYARAN) == $nama_pembayaran ? 'selected' : '' }}>
                            {{ ucfirst($nama_pembayaran) }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn-submit">Tambah</button>
              {{-- </div> --}}
              {{-- </div> --}}
        </form>
    </div>
</body>

</html>
