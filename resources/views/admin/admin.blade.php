<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard - Rental Mobil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.dashboard-container {
    display: flex;
}

.sidebar {
    background-color: #333;
    color: #fff;
    width: 250px;
    height: 210vh;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.logo img {
    max-width: 100%;
}

nav ul {
    list-style: none;
    padding: 0;
    margin-top: 20px;
}

nav a {
    text-decoration: none;
    color: #fff;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

nav a:hover {
    background-color: #555;
}

nav a.active {
    background-color: #555;
}

.content {
    flex-grow: 1;
    padding: 20px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.user-profile {
    display: flex;
    align-items: center;
}

.user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.dashboard-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.button {
  display: inline-block;
  background-color: #007bff;
  color: #ffffff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #0056b3;
}

.icon {
  margin-right: 5px;
}


    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #f2f2f2;
    }


/* Tambahkan gaya sesuai kebutuhan untuk konten dashboard */

</style>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <img src="images/car-7.jpg" alt="Rental Mobil Logo">
            </div>
            <nav>
                <ul>
                    
                    <li><a href="#" >Beranda</a></li>
                    <li><a href="{{url('sewa')}}">Sewa</a></li>
                    <li><a href="{{url('pengembalian')}}">Terima</a></li>
                    <li><a href="{{url('denda')}}">Denda </a></li>
                    <li><a href="{{route('logout')}}">Keluar</a></li>

                </ul>
            </nav>
        </aside>

        <main class="content">
            <header>
                <h1>Rental Mobil Admin Dashboard</h1>
                <div class="user-profile">
                    <img src="images/rian.jpg" alt="User Avatar">
                    <span>{{Auth::user()->username}}</span>
                </div>
            </header>

            <section class="dashboard-content">
                <a href="{{ route('posts.create') }}" class="button"><i class="fas fa-plus icon"></i>Tambah</a>
            </section>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Merk</th>
                        <th>Warna</th>
                        <th>Kode mobil</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('/storage/posts/'.$post->images) }}" class="rounded" style="width: 150px">
                        </td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->warna }}</td>
                        <td>{{$post->kd_mobil}}</td>
                        <td>{{ $post->harga }}</td>
                        <td class="text-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data post belum tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{$posts->links()}} 
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
</body>

</html>
