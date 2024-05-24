<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Data User</title>
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

    @if (session('update'))
        <div class="massage">
            {{ session('update') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="massage">
            {{ session('delete') }}
        </div>
    @endif
    <div class="sidebar">
        <p>KLINIK HEPI AJA</p>
        <ul>
            <li><a href="{{ url('indexPenjualan') }}">Penjualan</a></li>
            <li><a href="{{ url('indexObat') }}">Obat</a></li>
            <li><a href="{{ url('indexKategori') }}">Kategori</a></li>
            <li><a href="{{ url('indexPembayaran') }}">Pembayaran</a></li>
            <li><a href="{{ url('indexPelanggan') }}">Pelanggan</a></li>
        </ul>
    </div>

    <div class="topbar">
        <div class="insert">
            <a href="{{ url('viewInsertUser') }}"><button>+ Tambah data</button></a>
        </div>
        <div class="logout">
            <a href="{{ url('indexPenjualan') }}"><button>Kembali</button></a>
        </div>
    </div>
    <div class="content">
        <h2>Admin | Manajemen Data User</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th colspan="3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($user as $row)
                    <tr>
                        <td><?= $i++ ?></td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->role }}</td>
                        <td><a href="{{ url('viewUpdateUser/' . $row->id) }}"><button class="btn-warning"><i
                                        class="fa-regular fa-pen-to-square"></i> Edit</button></a></td>
                        <td><a href="{{ url('deleteUser/' . $row->id) }}"
                                onclick="return confirm('Are u sure want to delete {{ $row->name }} ?')"><button
                                    class="btn-danger"><i class="fa-regular fa-trash-can"></i> Delete</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">TheS1gt ©2024</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    {{-- Sweet alert --}}
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
