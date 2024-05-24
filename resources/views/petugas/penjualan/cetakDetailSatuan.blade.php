<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petugas | Struk</title>
    <script src="https://kit.fontawesome.com/4417d0eab3.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="/css/sidebar.css"> --}}
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        span {
            font-size: 1.2rem;
            font-style: italic;
            color: red;
        }

        i {
            font-size: 1rem;
            font-style: italic;
            color: red;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: rgb(199, 188, 33);
        }

        caption {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .d-flex {
            justify-content: center;
        }
    </style>
</head>

<body>

    <h2>{{ $title }}</h2>
    <h2>Tanggal : <span>{{ $date }}</span></h2>
    <br />
    <br />

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal pembelian</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td>{{ $penjualan->TANGGAL }}</td>
                    <td>{{ $penjualan->pelanggan->NAMA_PELANGGAN }}</td>
                    <td>{{ $penjualan->obat->NAMA_OBAT }}</td>
                    <td>{{ $penjualan->obat->HARGA }}</td>
                    <td>{{ $penjualan->JUMLAH }}</td>
                </tr>
            </tbody>
            <tfoot style="border: none;">
                <tr>
                    <td colspan="8">Total Harga: Rp.<i>{{ $penjualan->TOTAL }}-00.</i></td>
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
