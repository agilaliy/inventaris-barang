<?php
include "koneksi.php";

if (isset($_POST['bsimpan'])) {
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $kondisi_barang = $_POST['kondisi_barang'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $simpan = mysqli_query($koneksi, "INSERT INTO barang (tanggal_masuk,nama_barang,id_kategori,kondisi_barang,stok,satuan,tanggal_keluar) VALUES('$tanggal_masuk','$nama_barang','$id_kategori','$kondisi_barang','$stok','$satuan','$tanggal_keluar')");
    if ($simpan) {
        echo '<script>alert("Berhasil Menambahkan Data Barang!"); location.href="index.php?page=barang"</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Data Barang!"); location.href="index.php?page=barang"</script>';
    }
}

if (isset($_POST['bedit'])) {
    $kode_barang = $_POST['kode_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $kondisi_barang = $_POST['kondisi_barang'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $edit = mysqli_query($koneksi, "UPDATE barang SET tanggal_masuk='$tanggal_masuk',nama_barang='$nama_barang',id_kategori='$id_kategori',kondisi_barang='$kondisi_barang',stok='$stok',satuan='$satuan',tanggal_keluar='$tanggal_keluar' WHERE kode_barang='$kode_barang'");
    if ($edit) {
        echo '<script>alert("Berhasil Ubah Data Barang!"); location.href="index.php?page=barang"</script>';
    } else {
        echo '<script>alert("Gagal Ubah Data Barang!"); location.href="index.php?page=barang"</script>';
    }
}


if (isset($_POST['bhapus'])) {
    $kode_barang = $_POST['kode_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $kondisi_barang = $_POST['kondisi_barang'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $hapus = mysqli_query($koneksi, "DELETE FROM barang where kode_barang = '$kode_barang'");
    if ($hapus) {
        echo '<script>alert("Berhasil Hapus Data Barang!"); location.href="index.php?page=barang"</script>';
    } else {
        echo '<script>alert("Gagal Hapus Data Barang!"); location.href="index.php?page=barang"</script>';
    }
}
?>