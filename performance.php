<?php
    include 'config.php';

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
    <nav class="d-flex justify-content-between align-items-center px-5 py-2">
        <div class="" id="navLogo">
            <img src="img/logo1.png" alt="" />
        </div>

        <div class="d-flex gap-5">
            <a href="home.html" class="text-decoration-none fs-5 text-black link-primary"> Home </a>
            <a href="performance.html" class="text-decoration-none fs-5 text-black link-primary"> Performance </a>
        </div>
    </nav>

    <section id="performance_content" class="py-5">
        <div class="container">
            <form action="" class="row border border-2 border-black py-5 rounded" method="post">
                <div class="row justify-content-between">
                    <div id="foto" class="col d-flex gap-5">
                        <h5> Foto: </h5>
                        <img src="img/Sample_User_Icon.jpg" alt="">
                        <input type="file" name="" id="" class="">
                    </div>
    
                    <div id="formButton" class="col col-2 d-flex flex-column gap-2 align-items-end">
                        <button type="submit" class="btn btn-success"> Simpan </button>
                        <button class="btn btn-warning"> Clear </button>
                        <button type="reset" class="btn btn-danger"> Cancel </button>
                    </div>
                </div>
    
                <div class="row py-3">
                    <div id="left" class="col"> 
                        <div class="col">
                            <label for=""> Tanggal Penilaian: </label>
                            <input type="date" name="" id="">
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> NIK: </label>
                            <input type="text" name="" id="">
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> Nama: </label>
                            <input type="text" name="" id="">
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> Status Kerja: </label>
                            <select name="" id="">
                                <Option> Tetap </Option>
                                <Option> Tidak Tetap </Option>
                            </select>
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> Posisi: </label>
                            <input type="text" name="" id="">
                        </div>
                    </div>
    
                    <div id="right" class="col"> 
                        <div class="col">
                            <label for=""> Responsibility: </label>
                            <input type="number" name="" id="">
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> Teamwork: </label>
                            <input type="number" name="" id="">
                        </div>
    
                        <div class="col mt-3">
                            <label for=""> Management Time: </label>
                            <input type="number" name="" id="">
                        </div>
    
                        <div class="col d-flex align-items-center mt-3">
                            <label for=""> Total: </label>
                            <input type="text" name="" id="">
                            <!-- <p class="mb-0"> Hasil dari Total </p> -->
                        </div>
    
                        <div class="col d-flex align-items-center mt-3">
                            <label for=""> Grade: </label>
                            <input type="text" name="" id="">
                            <!-- <p class="mb-0"> Hasil dari Grade </p> -->
                        </div>
                    </div>
                </div>
            </form>
            
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
    
                                echo "<td class=\"border border-2 border-black bg-info-subtle\">
                                    <form action=\"\">
                                        <button> View </button>
                                    </form>
                                </td>";
    
                                echo "<td class=\"border border-2 border-black bg-warning-subtle\">
                                    <form action=\"\">
                                        <button> Edit </button>
                                    </form>
                                </td>";
                                
                                echo "<td class=\"border border-2 border-black bg-danger\">
                                    <form action=\"delete.php\" method=\"post\">
                                        <input type=\"hidden\" name=\"nik\" value=\"". $row['nik'] ."\">
                                        <button style=\"color: white;\"> Hapus </button>
                                    </form>
                                </td>";
                            }
                        ?>
                    </tbody>
                </table>
    
                <div class="pt-5">
                    <button class="btn btn-primary"> Add </button>
                </div>
            </div>
        </div>
        
    </section>

    <footer class="d-flex justify-content-between align-items-center px-5 py-3">
        <div class="" id="footerLogo">
            <img src="img/logo-only-white.png" alt="" />
        </div>

        <div id="footerText">
            <p class="mb-0"> © 2023 Healthy Food </p>
        </div>
    </footer>


     <!-- Bootstrap Script -->
     <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script> -->
</body>
</html>