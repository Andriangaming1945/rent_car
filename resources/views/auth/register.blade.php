<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
        }

        .login-header {
            background-color: #0b7cf5;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 24px;
        }

        .login-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0b7cf5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0a6be3;
        }

        .footer-text {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }

        .footer-text a {
            color: #0b7cf5;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            Register
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('register')}}" method="POST" class="login-form">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="noktp">No ktp</label>
                <input type="text" name="noktp" id="noktp" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="notelp">Nomor telepon</label>
                <input type="text" name="notelp" id="notelp" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="footer-text">
                Tidak punya akun? <a href="{{route('login')}}">Buat akun</a>
            </div>
        </form>
    </div>
</body>
</html>
