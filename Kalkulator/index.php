<?php
include "fungsi.php";
$Kalku = new Kalkulator();

echo '<H1>Latihan Membuat Program dengan OOP PHP</H1>';
echo '<form method="POST">';
echo '<input type="text" name="x" size="3"> &nbsp;';
echo '<select name="operasi">
<option value="tambah">+</option>
<option value="kali">X</option>
<option value="kurang">-</option>
<option value="bagi">/</option>
</select> $nbsp;';
echo '<input type="text" name="y" size="3"> &nbsp;';
echo '<label>=</label> $nbsp;';
echo '<input type="submit" value="Hitung">';
echo '</form>';

if ($_POST) {
    $x = $_POST['x'];
    $y = $_POST['y'];
    if ($_POST['operasi'] == "tambah") {
        echo "Hasil: ".$x." + ".$y." = ".$Kalku->setTambah($x, $y)."<br /><br />";
    } elseif ($_POST['operasi'] == "kali") {
        echo "Hasil: ".$x." x ".$y." = ".$Kalku->setKali($x, $y)."<br /><br />";
    } elseif ($_POST['operasi'] == "kurang") {
        echo "Hasil: ".$x." - ".$y." = ".$Kalku->setKurang($x, $y)."<br /><br />";
    }elseif ($_POST['operasi'] == "bagi") {
        echo "Hasil: ".$x." / ".$y." = ".$Kalku->setBagi($x, $y)."<br /><br />";
    }
}
?>