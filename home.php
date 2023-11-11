<?php
include 'config.php';

// Query to retrieve data from database
$sql = "SELECT * FROM performance";
$result = $conn->query($sql);

// Mengambil data dari query dan menyimpannya dalam array
$karyawanTetap = [];
$karyawanTidakTetap = [];

while ($row = $result->fetch_assoc()) {
    $grade = $row['grade'];
    $status_kerja = $row['status_kerja'];
    if (($grade === 'C' || $grade === 'D') && $status_kerja === 'Tetap') {
        $karyawanTetap[] = $row;
    } elseif (($grade === 'C' || $grade === 'D') && $status_kerja === 'Tidak Tetap') {
        $karyawanTidakTetap[] = $row;
    }
}

// Menghitung jumlah karyawan dengan status 'Tetap'
$sqlTetap = "SELECT COUNT(*) as jumlah_tetap FROM performance WHERE status_kerja = 'Tetap'";
$resultTetap = $conn->query($sqlTetap);
$rowTetap = $resultTetap->fetch_assoc();
$jumlahTetap = $rowTetap['jumlah_tetap'];

// Menghitung jumlah karyawan dengan status 'Tidak Tetap'
$sqltdkTetap = "SELECT COUNT(*) as jumlah_tdktetap FROM performance WHERE status_kerja = 'Tidak Tetap'";
$resulttdkTetap = $conn->query($sqltdkTetap);
$rowtdkTetap = $resulttdkTetap->fetch_assoc();
$jumlahtdkTetap = $rowtdkTetap['jumlah_tdktetap'];

// Mendapatkan waktu saat ini
date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Asia/Jakarta
$current_year = date("Y"); // Format: "Y-m-d H:i:s" = Tahun-Bulan-Tanggal Jam:Menit:Detik

// Array untuk menyimpan jumlah karyawan dengan berbagai grade untuk tetap dan tidak tetap
$jumlahKaryawanTetap = [];
$jumlahKaryawanTidakTetap = [];

// Loop untuk menghitung jumlah karyawan tetap dengan berbagai grade
$grades = ['A', 'B', 'C', 'D'];
foreach ($grades as $grade) {
    $sqlTetap = "SELECT COUNT(*) as jumlah_tetap FROM performance WHERE status_kerja = 'Tetap' AND grade = '$grade'";
    $resultTetap = $conn->query($sqlTetap);
    $rowTetap = $resultTetap->fetch_assoc();
    $jumlahKaryawanTetap[$grade] = $rowTetap['jumlah_tetap'];

    $sqlTidakTetap = "SELECT COUNT(*) as jumlah_tdktetap FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade = '$grade'";
    $resultTidakTetap = $conn->query($sqlTidakTetap);
    $rowTidakTetap = $resultTidakTetap->fetch_assoc();
    $jumlahKaryawanTidakTetap[$grade] = $rowTidakTetap['jumlah_tdktetap'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <nav class="d-flex justify-content-between align-items-center px-5 py-2">
        <div class="" id="navLogo">
            <img src="img/logo_kel1.png" alt="" />
        </div>

        <div class="d-flex gap-5">
            <a href="home.php" class="text-decoration-none fs-5 text-black link-primary"> Home </a>
            <a href="performance.php" class="text-decoration-none fs-5 text-black link-primary"> Performance </a>
        </div>
    </nav>

    <section id="database_information" class="container align-items-center pt-5">
        <div class="row gap-3">
            <div class="col border border-2 border-black rounded pt-4 pb-5">
                <div id="jumlahKaryawan_headline" class="pb-3">
                    <h2 class="fs-3 fw-bold text-center align-middle"> Jumlah Karyawan Perusahaan </h2>
                </div>

                <div id="jumlahKaryawan_content">
                    <div id="jumlahKaryawan_date">
                        <p class="fw-semibold border-bottom border-2 border-black" style="width: fit-content;">
                            <?php
                                // Menampilkan tahun saat ini
                                echo "Tahun: " . $current_year;
                            ?>
                        </p>
                    </div>

                    <?php
                    echo "<div id='jumlahKaryawan_tetap' class='d-flex align-items-center'>";
                    echo "<p class='fw-semibold' style=\"width: 147px\"> Tetap: </p>";
                    echo "<p>" . $jumlahTetap . "</p>";
                    echo "</div>";
                    ?>

                    <?php
                    echo "<div id='jumlahKaryawan_Tidak Tetap' class='d-flex align-items-center'>";
                    echo "<p class='fw-semibold' style=\"width: 150px\"> Tidak Tetap: </p>";
                    echo "<p>" . $jumlahtdkTetap . "</p>";
                    echo "</div>";
                    ?>
                </div>
            </div>

            <div class="col border border-2 border-black rounded pt-4 pb-5">
                <div id="hasilPerformanceTetap_headline" class="pb-3">
                    <h2 class="fs-3 fw-bold text-center"> Hasil Performance Karyawan Tetap </h2>
                </div>

                <div id="hasilPerformanceTetap_content">
                    <div id="hasilPerformanceTetap_date" class="d-flex">
                        <p class="fw-semibold border-bottom border-2 border-black" style="width: fit-content;"><?php
                                                                                                                // Menampilkan tahun saat ini
                                                                                                                echo "Tahun: " . $current_year;
                                                                                                                ?></p>
                    </div>

                    <div id="hasilPerformanceTetap_result" class="d-flex flex-column">
                        <?php
                        // Loop untuk menampilkan jumlah karyawan tetap dengan berbagai grade
                        foreach ($grades as $grade) {
                            echo "<div class=\"d-flex gap-4\">";
                            echo "<p class='fw-semibold ms-2'> $grade: </p>";
                            echo "<p>" . $jumlahKaryawanTetap[$grade] . "</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col border border-2 border-black rounded pt-4 pb-5">
                <div id="hasilPerformanceTidakTetap_headline" class="pb-3">
                    <h1 class="fs-3 fw-bold text-center"> Hasil Performance Karyawan Tidak Tetap </h1>
                </div>

                <div id="hasilPerformanceTidakTetap_content">
                    <div id="hasilPerformanceTidakTetap_date" class="d-flex">
                        <p class="fw-semibold border-bottom border-2 border-black" style="width: fit-content;"><?php
                                                                                                                // Menampilkan tahun saat ini
                                                                                                                echo "Tahun: " . $current_year;
                                                                                                                ?></p>
                    </div>

                    <div id="hasilPerformanceTidakTetap_result" class="d-flex flex-column">
                        <?php
                        // Loop untuk menampilkan jumlah karyawan tidak tetap dengan berbagai grade
                        foreach ($grades as $grade) {
                            echo "<div class=\"d-flex gap-4\">";
                            echo "<p class='fw-semibold ms-2'> $grade: </p>";
                            echo "<p>" . $jumlahKaryawanTidakTetap[$grade] . "</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row pt-3">
                <h1 class="text-center pb-1"> Karyawan Tetap Dengan Performance C dan D 2023 </h1>

                <table class="table table-hover">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th class="border border-2 border-black"> Foto </th>
                            <th class="border border-2 border-black"> NIK </th>
                            <th class="border border-2 border-black"> Nama </th>
                            <th class="border border-2 border-black"> Position </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // Menampilkan data karyawan tetap
                        foreach ($karyawanTetap as $row) {
                            echo "<tr class='text-center'>";
                            echo "<td class='border border-2 border-black'><img src='uploads/" . $row['foto'] . "' style='width: 150px; height: 150px;' /></td>";
                            echo "<td class='border border-2 border-black'>" . $row['nik'] . "</td>";
                            echo "<td class='border border-2 border-black'>" . $row['nama'] . "</td>";
                            echo "<td class='border border-2 border-black'>" . $row['position'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row pt-3 pb-5">
                <h1 class="text-center pb-1"> Karyawan Tidak Tetap Dengan Performance C dan D 2023 </h1>

                <table class="table table-hover">
                    <thead class="table-danger">
                        <tr class="text-center">
                            <th class="border border-2 border-black"> Foto </th>
                            <th class="border border-2 border-black"> NIK </th>
                            <th class="border border-2 border-black"> Nama </th>
                            <th class="border border-2 border-black"> Position </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // Menampilkan data karyawan tidak tetap
                        foreach ($karyawanTidakTetap as $row) {
                            echo "<tr class='text-center'>";
                            echo "<td class='border border-2 border-black'><img src='uploads/" . $row['foto'] . "' style='width: 150px; height: 150px;' /></td>"; // Tambahkan tag <img> untuk menampilkan gambar
                            echo "<td class='border border-2 border-black'>" . $row['nik'] . "</td>";
                            echo "<td class='border border-2 border-black'>" . $row['nama'] . "</td>";
                            echo "<td class='border border-2 border-black'>" . $row['position'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>

    <footer class="d-flex justify-content-between align-items-center px-5 py-3">
        <div class="" id="footerLogo">
            <img src="img/logo_kel1.png" alt="" />
        </div>

        <div id="footerText">
            <p class="mb-0"> © 2023 Healthy Food </p>
        </div>
    </footer>

    <!-- Bootstrap Script -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script>
</body>

</html>