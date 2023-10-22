<?php 
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $db_name = "karyawan_kel1";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if($conn) {
        echo "You are connected!";
    } else {
        echo "Couldn't connect!";
    }

    function calculateTotal($responsibility, $teamwork, $management_time) {
        return (0.3 * $responsibility) + (0.3 * $teamwork) + (0.4 * $management_time);
    }

    function calculateGrade($total) {
        if($total >= 80) {
            return 'A';
        } elseif($total >= 60) {
            return 'B';
        } elseif($total >= 40) {
            return 'C';
        } else {
            return 'D';
        }
    }

    // Query to retrieve data from database
    $sql = "SELECT tgl_penilaian, nik, nama, status_kerja, position, total, grade FROM karyawan";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="main.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->

    <!-- CSS -->
    <link rel="stylesheet" href="performance.css">
</head>
<body>
    <h1> Hello World! </h1>

    <section class="container">
    <div class="row pt-3">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th class="border border-2 border-black"> Tanggal </th>
                            <th class="border border-2 border-black"> NIK </th>
                            <th class="border border-2 border-black"> Nama </th>
                            <th class="border border-2 border-black"> Status Kerja </th>
                            <th class="border border-2 border-black"> Posisi </th>
                            <th class="border border-2 border-black"> Total </th>
                            <th class="border border-2 border-black"> Grade </th>
                            <th colspan="3" class="border border-2 border-black"> Aksi </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc()) {
                                echo "<tr class=\"text-center\">";
                                echo "<td class=\"border border-2 border-black\">" . $row['tgl_penilaian'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['nik'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['nama'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['status_kerja'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['position'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['total'] . "</td>";
                                echo "<td class=\"border border-2 border-black\">" . $row['grade'] . "</td>";
                                echo "<td class=\"border border-2 border-black bg-info-subtle\"> <button> View </button> </td>";
                                echo "<td class=\"border border-2 border-black bg-warning-subtle\"> <button> Edit </button> </td>";
                                echo "<td class=\"border border-2 border-black bg-danger\"> <button style=\"color: white;\"> Hapus </button> </td>";
                            }
                        ?>

                        <!-- <tr class="text-center">
                            <td class="border border-2 border-black"> [dd-mm-yyyy] </td>
                            <td class="border border-2 border-black"> [NIK] </td>
                            <td class="border border-2 border-black"> [Nama] </td>
                            <td class="border border-2 border-black"> [Status Kerja] </td>
                            <td class="border border-2 border-black"> [Posisi] </td>
                            <td class="border border-2 border-black"> [Total] </td>
                            <td class="border border-2 border-black"> [Grade] </td>
                            <td class="border border-2 border-black bg-info-subtle">
                                <button> View </button>
                            </td>
                            <td class="border border-2 border-black bg-warning-subtle">
                                <button> Edit </button>
                            </td>
                            <td class="border border-2 border-black bg-danger">
                                <button style="color: white;"> Hapus </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Bootstrap Script -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script> -->
</body>
</html>