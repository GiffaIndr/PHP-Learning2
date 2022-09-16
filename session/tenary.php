<?php
$angka = 15;
?>

<h2 style="color : <?= $angka %5 == 0? "chartreuse" : "red";?>;">
<?php
echo $angka %5 == 0? "kelipatan 5" : "bukan kelipatan 5";
?>
</h2>