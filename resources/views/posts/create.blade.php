<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Mobil Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    #preview-image {
      max-width: 100%;
      height: auto;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="form-container">
        <h2 class="text-center mb-4">Tambah Mobil Baru</h2>
        <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" placeholder="Masukkan merk mobil">
             <!--- Error message --->
          @error('Merk')
          <div class="alert alert-danger mt-2">
              {{$message}}
          </div>
        @enderror
          </div>
        
         

    
          <div class="form-group">
            <label for="warna">Warna:</label>
            <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" placeholder="Masukkan warna mobil">
             <!--- Error message --->
          @error('Warna')
          <div class="alert alert-danger mt-2">
              {{$message}}
          </div>
        @enderror

          </div>
          <div class="form-group">
            <label for="kd_mobil">Kode mobil:</label>
            <input type="text" class="form-control @error('kd_mobil') is-invalid @enderror" name="kd_mobil" placeholder="Masukkan warna mobil">
             <!--- Error message --->
          @error('kd_mobil')
          <div class="alert alert-danger mt-2">
              {{$message}}
          </div>
        @enderror

          </div>
          <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan harga mobil">
             <!--- Error message --->
          @error('Harga')
          <div class="alert alert-danger mt-2">
              {{$message}}
          </div>
        @enderror
          </div>
          <div class="form-group">
            <label for="images">Gambar Mobil:</label>
            <input type="file" class="form-control @error('images') is-invalid @enderror" name="images" onchange="previewImage()">
             <!--- Error message --->
          @error('images')
          <div class="alert alert-danger mt-2">
              {{$message}}
          </div>
        @enderror
          </div>
          <img id="preview-image" src="#" alt="Preview Gambar" style="display: none;">
          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  function previewImage() {
    var preview = document.getElementById('preview-image');
    var file = document.getElementById('gambar').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
      preview.style.display = 'block';
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }
</script>

</body>
</html>
