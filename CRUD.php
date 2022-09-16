 <?php
$session_start();
$rombel = ["PPLG XI-1", "PPLG XI-2", "PPLG XI-3", "PPLG XI-4", "PPLG XI-5"];
$nama = "";
$nis = "";
$nilai_p = "";
$nilai_k = "";
$nilaiakhir = "";
$keterangan = "";
$gagal = "";
$data = [];
$id = "";


if(isset($_POST['nama_murid'])&& isset($_POST['nis_murid']) && isset($_POST['nilai_pengetahuan']) && isset($_POST['nilai_keterampilan']) && isset($_POST['Rombel'])){
    $nama = $_POST['nama_murid'];
    $nis= $_POST['nis_murid'];
    $nilai_p= $_POST['nilai_pengetahuan'];
    $nilai_k= $_POST['nilai_keterampilan'];
    $kelas = $_POST['Rombel'];

    if ($nilai_p > 100 || $nilai_k > 100) {
        $gagal = true;
        $error = "Nilai tidak boleh lebih dari 100";
        $alert = "error-nilai";
    } else {
        $gagal = false;
        $nilaiakhir = ($nilai_k + $nilai_p) / 2;
        if ($nilaiakhir >= 85) {
            $keterangan = "A";
        } else if ($nilaiakhir < 85 && $nilaiakhir >= 75) {
            $keterangan = "B";
        } else {
            $keterangan = "C";
        }
        $alert = "success-nilai";
    
            $data = [
                "id" => "1",
                "nama" => $_POST['nama_murid'],
                "nis" => $_POST['nis_murid'],
                "kelas" => $_POST['Rombel'],
                "nilai_p" => $_POST['nilai_pengetahuan'],
                "nilai_k" => $_POST['nilai_keterampilan'],
                "nilaiakhir" => $nilaiakhir,
                "keterangan" => $keterangan,
            ];

        if(isset($_SESSION['data'])) {
        $id = count(($_SESSION['data'])) + 1;
        $data["id"] = $id;
        array_push($_SESSION['data'], $data);
        } else{
        $id = 1;
        $data['id'] = $id;
        $_SESSION['data'] = [$data];
        }

        if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        }
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($_SESSION['data'][$id]);
    $alert = "success-delete";
    header("Location: data.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class= "bg-info">
<div class="container w-15 py-5">
        <div class="row">
        <div class="col">
        <div class="card p-1">
        <h1 class="text-center py-5" >Form Data Nilai Siswa </h1>
        <form class="p-5" name="form" action="" method="POST">      
    <div class="mb-3">
    <?php
    if ($gagal == true) {
    ?>
    <div class="alert alert-danger" role="alert">
    <?= $error ?>
    </div>
    <?php
    }
    ?>
<div class="mb-3">
    <label for="nama_murid" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama_murid" aria-describedby="emailHelp" name="nama_murid">
</div>
<div class="row g-3">
<div class="col-md-8">
    <label for="nis_murid" class="form-label">NIS</label>
    <input type="number" class="form-control" id="nis_murid" name="nis_murid" > 
</div>
<div class="col-md-4">
<label for="nis_murid" class="form-label">Rombel</label>
<select class="form-select" aria-label=".form-select-lg example" name="Rombel">
    <option selected- hidden>Pilih Rombel</option>
    <option value="PPLG XI-1">PPLG XI-1</option>
    <option value="PPLG XI-2">PPLG XI-2</option>
    <option value="PPLG XI-3">PPLG XI-3</option>
    <option value="PPLG XI-4">PPLG XI-4</option>
    <option value="PPLG XI-5">PPLG XI-5</option>
</select>
</div>
  </div>
<div class="mb-3">
    <label for="nilai_keterampilan" class="form-label">Nilai Keteramplian</label>
    <input type="number" class="form-control" id="nilai_keterampilan" aria-describedby="emailHelp" name="nilai_keterampilan">
</div>
<div class="mb-3">
    <label for="nilai_pengetahuan" class="form-label">Nilai Pengetahuan</label>
    <input type="number" class="form-control" id="nilai_pengetahuan" name="nilai_pengetahuan">
</div>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
<a href="" class="btn btn-primary mt-3 float-end">Reset</a>
</div>    
            
    </div>
   
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Rombel</th>
                        <th scope="col">Nilai Keterampilan</th>
                        <th scope="col">Nilai Pengetahuan</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?= $id?></td>
                            <td><?= $_POST['nama_murid'] ?></td>
                            <td><?= $_POST['Rombel'] ?></td>
                            <td><?= $_POST['nilai_pengetahuan'] ?></td>
                            <td><?= $_POST['nilai_keterampilan'] ?></td>
                            <td><?= $nilaiakhir ?></td>
                            <td><?= $keterangan ?></td>
                            <td>
                                <a href=""><button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($alert)) {
        if ($alert == "error-nilai") {
            echo "<script>
        Swal.fire(
            'Gagal !',
            'Nilai tidak boleh lebih dari 100',
            'error'
          )
        </script>";
        } elseif ($alert == "success-nilai") {
            echo "<script>
        Swal.fire(
            'Sukses !',
            'Berhasil Menampilkan Hasil Nilai !',
            'success'
          )
        </script>";
        }
    }
    ?>

</body>

</html>