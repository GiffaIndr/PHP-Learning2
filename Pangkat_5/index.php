

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Pangkat-5</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
</head>
<body>

        <div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
<div class="container" id="container">
	<div class="form-container count-container">
		<form action="" method="POST">
			<h1>Kelipatan 5</h1>
			<span>silahkan input angka </span>
			<input type="number" name="angka" placeholder="angka" />
			<button name="submit">Hasil</button>
		</form>
	</div>
	<div class="form-container assigment-container">
		<form action="" method="post" {{ csrf_field() }}>
			<h1>Tugas Kelipatan 5</h1>
			<span> Syaikhani Giffa Indrawan</span>
</br>
			<?php
			if (isset ($_POST['submit'])) {
				$angka = $_POST ['angka'];
				$pangkat = 5;
				echo "kelipatan  $pangkat sampai  $angka </br>" ;;
				for ($i=1; $i <= $angka; $i++) { 
					if  ( $bagi = $i % $pangkat == 0 ) {
					echo "<strong><span>$i</span></strong>" ;
					}
				}
			}
			?>
		
		</form>
	</div>
	
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<p>Silahkan masukan <strong><span>limit</span></strong> angka<p>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hallo</h1>
				<p>silahkan Masukan <strong><span>nilai</span></strong></p>
				<button class="ghost" id="Nilai">Masukan Nilai</button>
			</div>
		</div>
	</div>
</div> 
<script src="script.js" charset="utf-8"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
