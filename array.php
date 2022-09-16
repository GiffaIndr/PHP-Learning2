<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayStudyCase</title>
    <script src="https://unpkg.com/scrollreveal"></script>
  
  <style>
   body{
      margin: 50px;
      padding: 0;
      background-color: black;
      color: white;

   }
 p{
    text-align: center;
    color: white;
 }
 h2{
   color: orange;
 }
    </style>

</head>
<body>
   <section id="reveal" class="reveal">
<h2 style="text-align : center;">Soal</h2>
<p>pisah memakai koma<p>
    <p>nilai tertinggi</p>
    <p>nilai terendah</p>
    <p> kecil ke besar</p>
    <p>besar ke kecil</p>
    <p>rata rata dan dibulatkan keatas</p>
    <p>ganti angka 72 jadi 75</p>
   <p> urutkan angka baru dari besar ke terkecil</p>
   </section>

   <hr>
   <h2 style="text-align:center;">Jawaban <hr></h2>
   
</body>

<script>
   const sr = ScrollReveal({
    distance:'40px',
    duration: 2600,
    reset: true
 })
 sr.reveal('.reveal, .jawaban',{delay:100, origin:'bottom'})
</script>
<section  class="jawaban" id="Jawaban">
<?php
$nilai = ["80", "98", "72", "84", "92", "88"];
$koma = implode(", ",$nilai);
echo "Pemisah kata hubung menggunakan koma : $koma";
$max 	= max($nilai);
$min 	= min($nilai);
$newvar = array();

foreach ($nilai as$nilaibaru) {
   array_push($newvar, $nilaibaru);
}
echo "<hr> nilai tertinggi : $max";
echo "<hr> nilai terendah : $min <hr>";

asort($nilai);
$koma = implode(", ",$nilai);
echo "nilai dari terkecil hingga terbesar : $koma <hr>";

arsort($nilai);
$koma = implode(", ",$nilai);
echo "nilai dari terbesar hingga terkecil : $koma <hr>";

$avg = array_sum($nilai)/count($nilai);
$hasil = round($avg);
echo "rata ratanya adalah : $hasil <hr>";

$nilai2 = ["75"];
array_splice($newvar,2,1,$nilai2);
$koma = implode(", ",$newvar);
echo "Peganti angka 72 ke 75 : $koma <hr>";

$nilai2 = ["75"];
array_splice($newvar,2,1,$nilai2);
arsort($newvar);
$koma = implode(", ",$newvar);
echo "Nilai baru yang sudah diurutkan dari terbesar ke terkecil : $koma";
?>
</section>
</html>