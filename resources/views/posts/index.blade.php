<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Mobil Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <form>
          <div class="form-group">
            <label for="merk">Merk:</label>
            <input type="text" class="form-control" id="merk" placeholder="Masukkan merk mobil">
          </div>
        
         
          <div class="form-group">
            <label for="warna">Warna:</label>
            <input type="text" class="form-control" id="warna" placeholder="Masukkan warna mobil">
          </div>
          <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" placeholder="Masukkan harga mobil">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar Mobil:</label>
            <input type="file" class="form-control-file" id="gambar" onchange="previewImage()">
          </div>
          <div class="form-group">
            <label for="kd_mobil">Kode Mobil:</label>
            <input type="text" class="form-control" id="kd_mobil" placeholder="Masukan kode mobil">
          </div>
          <img id="preview-image" src="#" alt="Preview Gambar" style="display: none;">
          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

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
