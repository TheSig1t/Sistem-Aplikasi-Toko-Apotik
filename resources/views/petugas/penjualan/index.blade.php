<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petugas | Riwayat</title>
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
    <nav class="navbar">
        <div class="logo">KLINIK HEPI AJAH</div>
        <ul class="menu">
            <li><a href="{{ url('indexPenjualanPetugas') }}">Transaksi</a></li>
        </ul>
        <div class="actions">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
        </div>
    </nav>

    <div class="container">
        <h2>Petugas | Riwayat Transaksi</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal pembelian</th>
                    <th colspan="3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($historyPenjualan as $row)
                    <tr>
                        <td><?= $i++ ?></td>
                        <td>{{ $row->pelanggan->NAMA_PELANGGAN }}</td>
                        <td>{{ $row->obat->NAMA_OBAT }}</td>
                        <td>{{ $row->obat->HARGA }}</td>
                        <td>{{ $row->JUMLAH }}</td>
                        <td>{{ $row->TOTAL }}</td>
                        <td>{{ $row->TANGGAL }}</td>
                        <td><a href="{{ url('cetakDetailSatuanPetugas/' . $row->ID_PENJUALAN) }}"><button
                                    class="btn-warning"><i class="fa-regular fa-pen-to-square"></i> Cetak
                                    Struk</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="17">TheS1gt ©2024</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Selamat datang di halaman Admin',
                text: '{{ session('info') }}',
            });
        </script>
    @endif
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
