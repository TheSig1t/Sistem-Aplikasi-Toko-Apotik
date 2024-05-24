<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Kategori</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    {{-- Bootstrap CRUD --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <script src="https://kit.fontawesome.com/4417d0eab3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/sidebar.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap');

        .massage {
            color: white;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
            padding: 10px;
            border-radius: 10px;
            background: transparent;
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <p>KILIK HEPI AJA</p>
        <ul>
            <li><a href="{{ url('indexPenjualan') }}">Penjualan</a></li>
            <li><a href="{{ url('indexObat') }}">Obat</a></li>
            <li><a href="{{ url('indexUser') }}">User</a></li>
            <li><a href="{{ url('indexPelanggan') }}">Pelanggan</a></li>
            <li><a href="{{ url('indexPembayaran') }}">Pembayaran</a></li>
        </ul>
    </div>

    <div class="topbar">
        <div class="insert">
            <a href="{{ url('viewInsertKategori') }}"><button>+ Tambah data</button></a>
        </div>
        <div class="logout">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <div class="content">
        <h2>Admin | Manajemen Kategori</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Obat</th>
                    <th colspan="3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($kategori as $row)
                    <tr>
                        <td><?= $i++ ?></td>
                        <td>{{ $row->NAMA_KATEGORI }}</td>
                        <td><a href="{{ url('viewUpdateKategori/' . $row->ID_KATEGORI) }}"><button class="btn-warning"><i
                                        class="fa-regular fa-pen-to-square"></i> Edit</button></a></td>
                        <td><a href="{{ url('deleteKategori/' . $row->ID_KATEGORI) }}"
                                onclick="return confirm('Are u sure want to delete {{ $row->NAMA_KATEGORI }} ?')"><button
                                    class="btn-danger"><i class="fa-regular fa-trash-can"></i> Delete</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">TheS1gt ©2024</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
</body>

</html>
