<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Rental Mobil Dashboard</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            flex: 1;
        }

        .navbar {
            background-color: #007bff;
            color: #ffffff;
            height: 95px;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: red !important;
        }
       
        .content {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }

        .btn-dark:hover {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
    }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-auto" href="#" style="font-size: 24px; font-family: 'Arial', sans-serif; font-weight: bold;">
        <img src="images/afu.png" style="height: 100px; width: auto;" alt="logo" class="mt-2 md-4">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Profil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('terima')}}">
                    Terima mobil
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('nyenda')}}">
                    History Denda
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mx-auto">
    <div class="content">
        <h2>Hitam di larang menyewa mobil</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat datang, {{Auth::user()->username}}</h5>
                <p class="card-text">Anda dapat mulai menyewa mobil sekarang.</p>
            </div>
        </div>

        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{asset('storage/posts/' . $post->images)}}" class="card-img-top" alt="{{$post->merk}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->merk}}</h5>
                        <p class="card-text">Warna : {{$post->warna}}</p>
                        <p class="card-text">Kode mobil : {{$post->kd_mobil}}</p>
                        <p class="card-text">Harga: <span id="hargasewa">{{$post->harga}}</span></p>
                        <a href="{{route("nyewa")}}" class="btn btn-dark">Sewa Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

<footer class="footer">
    <p>&copy; 2024 Rental Mobil</p>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
