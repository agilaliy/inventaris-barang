<?php
if (isset($_POST['tanggal_awal'])) {
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $ruangan = $_POST['ruangan'];
} else {
    $ruangan = '';
}
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Laporan Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Laporan Barang </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
    if (!empty($_POST['tanggal_awal'])) {
    ?>
        <h4>Laporan Barang Periode : <?php echo date('d-m-Y', strtotime($tanggal_awal)) . ' s.d ' . date('d-m-Y', strtotime($tanggal_akhir)) ?></h4>
    <?php
    }
    ?>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-15">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                                        <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                                        <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title m-0"> Laporan Barang </h5>

                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label class="form-label">Tanggal Awal</label>
                                                    <input type="date" name="tanggal_awal" class="form-control" value="<?php echo ($tanggal_awal ? $tanggal_awal : '') ?>" required>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">Tanggal Akhir</label>
                                                    <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo ($tanggal_akhir ? $tanggal_akhir : '') ?>" required>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">Ruangan</label>
                                                    <select name="ruangan" class="form-select" required>
                                                        <option value="">Pilih Ruangan</option>
                                                        <?php
                                                        $query = mysqli_query($koneksi, "SELECT * FROM ruang");
                                                        while ($ruang = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <option value="<?php echo $ruang['nama_ruang'] ?>" <?php echo ($ruang['nama_ruang'] == $ruangan ? 'selected' : '') ?>><?php echo $ruang['nama_ruang'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3"
                                                >
                                                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                                                    <button type="reset" onclick="location.href='?page=laporan-barang'" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->
            </div>

            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-15">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <table class="table table-border datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Barang</th>
                                                <th scope="col">Tanggal Masuk</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Nama Kategori</th>
                                                <th scope="col">Kondisi Barang</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">Satuan</th>
                                                <th scope="col">Nama Ruang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['tanggal_awal'])) {
                                                $tanggal_awal = $_POST['tanggal_awal'];
                                                $tanggal_akhir = $_POST['tanggal_akhir'];
                                                $ruangan = $_POST['ruangan'];
                                                $no = 1;
                                                $query = mysqli_query($koneksi, "SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori INNER JOIN ruang ON barang.id_ruang = ruang.id_ruang WHERE (DATE(tanggal_masuk) BETWEEN '$tanggal_awal' AND '$tanggal_akhir') AND nama_ruang='$ruangan'");
                                                while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data['kode_barang'] ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($data['tanggal_masuk'])) ?></td>
                                                        <td><?php echo $data['nama_barang'] ?></td>
                                                        <td><?php echo $data['nama_kategori'] ?></td>
                                                        <td><?php echo $data['kondisi_barang'] ?></td>
                                                        <td><?php echo $data['stok'] ?></td>
                                                        <td><?php echo $data['satuan'] ?></td>
                                                        <td><?php echo $data['nama_ruang'] ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    if (!empty($_POST['tanggal_awal'])) {
                                    ?>
                                        <a href="cetak-laporan-barang.php?tanggal_awal=<?php echo $tanggal_awal ?>&tanggal_akhir=<?php echo $tanggal_akhir ?>&nama_ruang=<?php echo $ruangan ?>" class="btn btn-primary btn-sm mb-3" target="_blank"><i data-feather="printer"></i> Print </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="cetak-laporan-barang.php" class="btn btn-primary btn-sm mb-3" target="_blank"><i data-feather="printer"></i> Print </a>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>
    </div>
    </div>


</main>