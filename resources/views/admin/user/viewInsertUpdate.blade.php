<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Insert User</title>
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
        <h2>KLINIK Hepi Ajah</h2>
        <div class="insert">
            <a href="{{ url('indexUser') }}"><button>Kembali</button></a>
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
        <h2>FORM Insert User</h2>
        <form action="{{ url('postInsertUser', @$users->id) }}" method="post">
            @if (!empty($users))
                @method('PATCH')
            @endif
            @csrf
            <div class="form-container">
                <div class="form-group">
                    <div class="form-group2">
                        <label>Nama</label>
                        <input type="text" required name="name" id="name" autofocus
                            value="{{ old('name', @$users->name) }}">
                    </div>
                    <div class="form-group2">
                        <label>Username</label>
                        <input type="text" required name="username" id="username"
                            value="{{ old('username', @$users->username) }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group2">
                        <label>Email</label>
                        <input type="email" required name="email" id="email" autofocus
                            value="{{ old('email', @$users->email) }}">
                    </div>
                    <div class="form-group2">
                        <label>Password</label>
                        <input type="password" required name="password" id="password"
                            value="{{ old('password', @$users->password) }}">
                        </div>
                    </div>
            </div>
            <div class="form-container">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" required name="alamat" id="alamat"
                        value="{{ old('alamat', @$users->alamat) }}">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="" name="role" id="role"><br>
                        <option disabled selected>-- Pilih Role --</option>
                        @foreach (['admin', 'petugas', 'pelanggan'] as $role)
                        <option value="{{ $role }}"
                                {{ old('role', @$users->role) == $role ? 'selected' : '' }}>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-submit">Tambah</button>
            </div>
        </form>
    </div>
</body>

</html>
