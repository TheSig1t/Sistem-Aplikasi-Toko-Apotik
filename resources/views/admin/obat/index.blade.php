<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Obat</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
  {{-- Bootstrap CRUD --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
  <script src="https://kit.fontawesome.com/4417d0eab3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/sidebar.css">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap');
        .massage{
            color: white;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            margin-top:10px;
            padding: 10px;
            border-radius: 10px;
            background: transparent;
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="sidebar">
      <p>KLINIK HEPI AJA</p>
      <ul>
        <li><a href="{{ url('indexPenjualan') }}">Penjualan</a></li>
          <li><a href="{{ url('indexKategori') }}">Kategori</a></li>
          <li><a href="{{ url('indexPembayaran') }}">Pembayaran</a></li>
          <li><a href="{{ url('indexUser') }}">User</a></li>
          <li><a href="{{ url('indexPelangan') }}">Pelanggan</a></li>
      </ul>
  </div>
  
  <div class="topbar">
    <div class="insert">
      <a href="{{ url('viewInsertObat') }}"><button>+ Tambah data</button></a>
    </div>
    <div class="logout">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf
        <button type="submit">Logout</button>
      </form>
    </div>
  </div>
    <div class="content">
      <h2>Admin |Manajemen Obat</h2>
      <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Obat</th>
                    <th>Kategori Obat</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Stok</th>
                    <th>Tanggal Expired</th>
                    <th colspan="3">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($obat as $row)
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="{{ asset('storage/'.$row->image) }}" height="150px" style="border-radius: 50%"></td>
                    <td>{{ $row->kategori->NAMA_KATEGORI }}</td>
                    <td>{{ $row->NAMA_OBAT }}</td>
                    <td>{{ $row->HARGA }}</td>
                    <td>{{ $row->KETERANGAN }}</td>
                    <td>{{ $row->STOK }}</td>
                    <td>{{ $row->EXP }}</td>
                    <td><a href="{{ url('viewUpdateObat/'.$row->KODE_OBAT) }}"><button class="btn-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</button></a></td>
                    <td><a href="{{ url('deleteObat/'.$row->KODE_OBAT) }}" onclick="return confirm('Are u sure want to delete {{ $row->NAMA_OBAT }} ?')"><button class="btn-danger"><i class="fa-regular fa-trash-can"></i> Delete</button></a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="19">TheS1gt ©2024</td>
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