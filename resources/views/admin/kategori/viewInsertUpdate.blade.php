<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Kategori</title>
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
        <h2>FORM Kategori</h2>
        <form action="{{ url('postInsertKategori', @$kategori->ID_KATEGORI) }}" method="post">
            @if (!empty($kategori))
                @method('PATCH')
            @endif
            @csrf
            <div class="form-container">
                <label>Masukan Tipe Kategori</label>
                <input type="text" required autofocus name="nama_kategori" id="nama_kategori"
                value="{{ old('nama_kategori', @$kategori->NAMA_KATEGORI) }}">
                <button type="submit" class="btn-submit">Tambah</button>
        </form>
    </div>
</body>

</html>
