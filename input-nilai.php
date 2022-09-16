<?php
session_start();

if (!isset($_SESSION['array'])) {
    $_SESSION['array'] = [];
}

$rombel = ["PPLG XI-1", "PPLG XI-2", "PPLG XI-3", "PPLG XI-4", "PPLG XI-5"];

$alert = false;
$berhasil = false;
$delete = false;
$edit = false;
$gagalNomor = false;

if(isset($_POST['kirim'])) {
    if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rombel']) && !empty($_POST['np']) && !empty($_POST['nk'])) {
        if ($_POST['np'] <= 100 && $_POST['nk'] <= 100) {
            $nilaiAkhir = round(($_POST['np'] + $_POST['nk']) / 2);
            if ($nilaiAkhir >= 85) {
                $ket = 'A';
            }elseif ($nilaiAkhir < 85 && $nilaiAkhir >=75) {
                $ket = 'B';
            }else {
                $ket = 'C';
            }

            $data = [
                "nama" => $_POST['nama'],
                "nis" => $_POST['nis'],
                "rombel" => $_POST['rombel'],
                "nilai_pengetahuan" => $_POST['np'],
                "nilai_keterampilan" => $_POST['nk'],
                "nilai_akhir" => $nilaiAkhir,
                "keterangan" => $ket,
            ];

            array_push($_SESSION['array'], $data);

            $berhasil = true;
        }else {
            $gagalNomor = true;
        }
    } else {
        $alert = true;
    }
}

if (isset($_GET['delete'])) {
    array_splice($_SESSION['array'], $_GET['index'], 1);
    $delete = true;
}

if (isset($_GET['edit'])) {
    $index = $_GET['index'];
    $dataEdit = $_SESSION['array'][$index];
}

if (isset($_POST['update'])) {
    if (!empty($_POST['nama']) && !empty($_POST['rombel']) && !empty($_POST['nis']) && !empty($_POST['np']) && !empty($_POST['nk'])) {
        $nilai = round(($_POST['np'] + $_POST['nk']) / 2);
        if ($nilai >= 85) {
            $status = "A";
        } elseif ($nilai < 85 && $nilai >= 75) {
            $status = "B";
        } else {
            $status = "C";
        }

        $index = $_POST['index'];
        $_SESSION['array'][$index]['nama'] = $_POST['nama'];
        $_SESSION['array'][$index]['nis'] = $_POST['nis'];
        $_SESSION['array'][$index]['rombel'] = $_POST['rombel'];
        $_SESSION['array'][$index]['nilai_pengetahuan'] = $_POST['np'];
        $_SESSION['array'][$index]['nilai_keterampilan'] = $_POST['nk'];
        $_SESSION['array'][$index]['nilai_akhir'] = $nilai;
        $_SESSION['array'][$index]['status'] = $status;

        $edit = true;
    }
}

if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: input-nilai.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data Nilai</title>
    <style type="text/css">
        body {
            background: #000;
        }
        table {
            color: #fff;
        }

        h3 {
            color: #fff;
        }

        table.data {
            max-width: 800px;
            width: 100%;
            margin: auto;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        a {
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        if ($alert == true) {
    ?>
    <h4 style="color: white; background: red; padding: 8px;">Data tidak boleh kosong</h4>
    <?php
        }
    ?>
    <?php
        if ($berhasil == true) {
    ?>
    <h4 style="color: white; background: green; padding: 8px;">Data berhasil disimpan</h4>
    <?php
        }
    ?>
    <?php
        if ($delete == true) {
    ?>
    <h4 style="color: white; background: orange; padding: 8px;">Data berhasil dihapus</h4>
    <?php
        }
    ?>
    <?php
        if ($edit == true) {
    ?>
    <h4 style="color: white; background: blue; padding: 8px;">Data berhasil diubah</h4>
    <?php
        }
    ?>
    <?php
        if ($gagalNomor == true) {
    ?>
    <h4 style="color: white; background: red; padding: 8px;">Nilai tidak boleh lebih dari 100</h4>
    <?php
        }
    ?>
    <table align="center" border="1">
        <form method="POST" action="input-nilai.php">
            <h3 align="center">Input Nilai Produktif Siswa</h3>
            <?php
                if (isset($dataEdit)) {
            ?>
                    <tr>
                        <td colspan="2"><input type="number" name="index" value="<?= $_GET['index'] ?>" hidden></td>
                    </tr>
            <?php
                }
            ?>
            <tr>
                <td>Nama Siswa</td>
                <td><input type="text" name="nama" value="<?= @$dataEdit['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Nis</td>
                <td><input type="number" name="nis" value="<?= @$dataEdit['nis'] ?>"></td>
            </tr>
            <tr>
                <td>Rombel</td>
                <td>
                    <select name="rombel">
                        <option hidden>Pilih Rombel</option>
                        <?php
                            foreach ($rombel as $item) {
                                if (isset($dataEdit)) {
                        ?>
                                <option value="<?= $item ?>" <?= $item == $dataEdit['rombel'] ? 'selected' : '' ?>><?= $item ?></option>
                        <?php
                                } else {
                        ?>
                                <option value="<?= $item ?>"><?= $item ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai Pengetahuan</td>
                <td><input type="number" name="np" value="<?= @$dataEdit['nilai_pengetahuan'] ?>"></td>
            </tr>
            <tr>
                <td>Nilai Keterampilan</td>
                <td><input type="number" name="nk" value="<?= @$dataEdit['nilai_keterampilan'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="left">
                        <?php
                            if (isset($_GET['edit'])) {
                        ?>
                        <input type="submit" name="update" value="ubah"/>
                        <?php
                            }else {
                        ?>
                        <input type="submit" name="kirim" value="simpan"/>
                        <?php
                        }?>
                    
                    </div>
                </td>
            </tr>
        </form>
    </table>

    <table align="center" style="margin-top: 15px; margin-bottom: 15px;">
        <form method="POST" action="input-nilai.php">
            <tr>
                <td colspan="2">
                    <div style="margin-right: 10px;">
                        <input type="submit" name="reset" value="reset data"/>
                    </div>
                </td>
            </tr>
        </form>
    </table>

    <?php
    if (!empty($_SESSION['array'])) {
    ?>
    <table border="1" class="data">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Rombel</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Nilai Akhir</th>
            <th>Status</th>
            <th style="width: 80px">Aksi</th>
        </tr>
    <?php 
        $no = 1;
        foreach($_SESSION['array'] as $key => $dt) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $dt['nama']; ?></td>
            <td><?= $dt['nis']; ?></td>
            <td><?= $dt['rombel']; ?></td>
            <td><?= $dt['nilai_pengetahuan'] ?></td>
            <td><?= $dt['nilai_keterampilan'] ?></td>
            <td><?= $dt['nilai_akhir']; ?></td>
            <td><?= $dt['keterangan']; ?></td>
            <td style="display: flex;">
                <a href="?edit&index=<?= $key ?>" style="margin-right: 8px;">edit</a>
                <a href="?delete&index=<?= $key ?>" onclick="return confirm(`Hapus data nilai peserta didik <?= $dt['nama'] ?> ?`)">hapus</a> 
            </td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</body>
</html>