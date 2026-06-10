<?php
// Koneksi database dengan mysqli
$koneksi = mysqli_connect("localhost", "root", "", "db_rental_kendaraan");

// Proses Tambah
if(isset($_POST['tambah'])) {
    $nik = $_POST['nik_ktp'];
    $nama = $_POST['nama_lengkap'];
    $hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO penyewa (nik_ktp, nama_lengkap, no_hp, alamat) VALUES ('$nik', '$nama', '$hp', '$alamat')");
    header("Location: index.php");
}

// Proses Hapus
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM penyewa WHERE id_penyewa = '$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Data Penyewa</title></head>
<body>
    <h2>Form Tambah Penyewa</h2>
    <form method="POST">
        <input type="text" name="nik_ktp" placeholder="NIK KTP" required><br><br>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required><br><br>
        <input type="text" name="no_hp" placeholder="No HP" required><br><br>
        <textarea name="alamat" placeholder="Alamat" required></textarea><br><br>
        <button type="submit" name="tambah">Simpan Penyewa</button>
    </form>

    <hr>
    <h2>Daftar Penyewa</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr bgcolor="#ddd">
            <th>ID</th><th>NIK</th><th>Nama Lengkap</th><th>No HP</th><th>Alamat</th><th>Aksi</th>
        </tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM penyewa");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $d['id_penyewa']; ?></td>
            <td><?php echo $d['nik_ktp']; ?></td>
            <td><?php echo $d['nama_lengkap']; ?></td>
            <td><?php echo $d['no_hp']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><a href="index.php?hapus=<?php echo $d['id_penyewa']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>