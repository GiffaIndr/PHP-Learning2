<?php
$nama = "";
$nis = "";
$nilaiP = "";
$nilaiK = "";
$rombel = "";
$nilaiAkhir = "";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input nilai</title>
    <style>
    </style>
</head>
<body>
<form action="" method="post">
    <div class="container">
    <div class="text-center py-5">
        <h1 style="background-color: lightblue;">Nilai</h1>
    </div>
    <div class="alert alert-success" role="alert">
    <?php 
    if (isset($_POST ['nama']) && isset($_POST ['nama']) && isset($_POST ['nama']) && isset($_POST ['nama'])) {
        $nama=$_POST['nama'];
        $nis=$_POST['nis'];
        $nilaiP=$_POST['nilaiP'];
        $nilaiK=$_POST['nilaiK'];
        $rombel=$_POST['rombel'];


        echo "Nama : $nama </br>";
        echo "Nis : $nis</br>";
        echo "NilaiP : $nilaiP </br>";
        echo "NilaiK : $nilaiK </br>";
        echo "Rombel : $rombel </br>";
        $nilaiAkhir =($nilaiP + $nilaiK) / 2;
      }

    
      if ($nilaiP > 100 || $nilaiK > 100) {
        echo "nilai tidak boleh lebih dari 100";
      } elseif ($nilaiAkhir >= 85){
            echo " Nilai akhir anda : $nilaiAkhir <br> Anda mendapatkan nilai : A </br>";
        } elseif ($nilaiAkhir > 75 || $nilaiAkhir >= 75){
            echo " Nilai akhir anda : $nilaiAkhir <br> mendapatkan nilai : B </br>";
        }else{
          echo "Mendapatkan Nilai : C";
        }

    ?>
</div>
    <div class="p-4">
    <label for="nama"  class="form-label">Nama Siswa</label>
    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 p-4">
    <label for="nis"  class="form-label">Nis</label>
    <input type="text" name="nis" class="form-control" id="nis" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 p-4">
    <label for="nilaiP" class="form-label">Nilai Pengetahuan</label>
    <input type="text" name="nilaiP" class="form-control" id="nilaiPr">
  </div>
  <div class="mb-3 p-4">
    <label for="nilaiK" class="form-label">JNilai Keterampilan</label>
    <input type="text" name="nilaiK" class="form-control" id="nilaiK">
  </div>
  <div class="mb-3 p-4">
    <label for="rombel" class="form-label">Rombel</label>
    <select type="text" name="rombel" class="form-control" id="rombel">
   <option hidden="hidden"></option>
  <option value="PPLG X-1">PPLG X-1</option>
  <option value="PPLG X-2">PPLG X-2</option>
  <option value="PPLG X-3">PPLG X-3</option>
  <option value="PPLG X-4">PPLG X-4</option>
  <option value="PPLG X-5">PPLG X-5</option>
</select>
<button> <a href="destroy.php"></a> Hapus Data</button>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</diV>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>