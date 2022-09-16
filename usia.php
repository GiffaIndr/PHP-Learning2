<?php
$listFilm = [
    [
     "judul" => "deadpool",
     "min-usia" => 21,
     "Harga" => 45000
    ],
    [
        "judul" => "the Raid 2",
        "min-usia" => 18,
        "Harga" => 35000
    ],
    [
        "judul" => "the raid",
        "min-usia" => 16,
        "Harga" => 35000
     ]
     ];
     $usia = "";
     $judul = "";  
     $submit = "";

     $usia = $_POST ['usia'];
     $judul = $_POST ['judul'];
     $submit = $_POST ['submit'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <h1 style="text-align:center;">Belajar</h1>
<div class="p" style="text-align:center;">
    <label for="usia" class="judul"></label>
    <input type="usia" class="form-control" id="judul" aria-describedby="emailHelp" name="judul">

    <div class="p" style="text-align:center;">
    <label for="usia" class="form-label"></label>
    <select class="form-select" id="usia" aria-label=".form-select-lg example" name="usia">
    <option selected- hidden>Pilih Judul</option>
    <option value="PPLG XI-1">Deadpool</option>
    <option value="PPLG XI-2">The raid 2</option>
    <option value="PPLG XI-3">The raid</option>
    <div class="p">
    <label for="submit"></label>
    <input type="submit" class="form-control" id="submit" name="submit"></input>
    </div>
</select>
    </div>
    </form>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
   if ($usia < 17) {
    echo  "Kamu tidak boleh menonton";
   } else {
    echo "kamu boleh menonton $judul dengan harga $harga";
   }
}
?>