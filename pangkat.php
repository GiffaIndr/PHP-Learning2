

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pangkat</title>
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
 $H = "";
if (isset($_POST ['X']) && isset($_POST ['Y'])){
    $H =1;
    for ($i=1; $i <= $_POST['Y'] ; $i++) { 
        $H *= $_POST ['X'];
    }
}
if ($H >= 1) {
    echo  " $H";
};
?>
</div>

<div class="mb-3 p-4">
    <label for="nilaiH" class="form-label">Angka Aritmatika</label>
    <input type="number" name="X" class="form-control" id="nilaiPr">
  </div>

  <div class="mb-3 p-4">
    <label for="nilaiL" class="form-label">Pangkat</label>
    <input type="number" name="Y" class="form-control" id="nilaiL">
  </div>
  <button type="submit" class="btn btn-secondary">Submit</button>
  </form>
  
  
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>