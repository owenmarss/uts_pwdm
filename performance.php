<?php
    include 'config.php';

    // Query to retrieve data from database
    $sql = "SELECT tgl_penilaian, nik, nama, status_kerja, position, responsibility, teamwork, management_time, total, grade FROM performance";
    $result = $conn->query($sql);

    $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url_components = parse_url($url);

    $object = (object)NULL;

    if(isset($url_components['query'])) {
        parse_str($url_components['query'], $params);
        if(isset($params['nik'])) {
            $nik = $params['nik'];
            $sql_get_view = "SELECT * FROM performance WHERE nik = $nik";
            
        
            if ($result_view = $conn -> query($sql_get_view)) {
                $object = $result_view -> fetch_object();
                $result_view -> free_result();
            }
        }
    }



    // echo $obje->tgl_penilaian;
    // echo $result_view -> fetch_object();
    // $object->status_kerja == "Tetap" ? echo "Selected" : echo ""

    // echo (isset($object->nik)) ? "value=\"" . $object->nik . "\"": "";

    echo (isset($object->nik)) ? "value=\"" . $object->nik . "\"" : "";

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
            <a href="home.php" class="text-decoration-none fs-5 text-black link-primary"> Home </a>
            <a href="performance.php" class="text-decoration-none fs-5 text-black link-primary"> Performance </a>
        </div>
    </nav>

    <section id="performance_content" class="py-5">
        <div class="container">
            <form action="edit.php" class="row border border-2 border-black py-5 rounded" method="post" enctype="multipart/form-data">
                <div class="row justify-content-between">
                    <div id="foto" class="col d-flex gap-5">
                        <h5> Foto: </h5>
                        <div class="img-area" data-img="">
                            <p>upload foto</p>
                        </div>

                        <!-- <img src="img/Sample_User_Icon.jpg" alt=""> -->
                        <input type="file" id="file-img" accept="image/*" name="up_img" class="input">
                        <!-- <input type="file" accept="image/*" name="" id="file_img"> -->
                    </div>
    
                    <div id="formButton" class="col col-2 d-flex flex-column gap-2 align-items-end">
                        <input type="submit" class="btn btn-success" name="submit" value="Simpan"></input>
                        <!-- <button type="submit" class="btn btn-success" name="submit"> Simpan </button> -->
                        <button class="btn btn-warning"> Clear </button>
                        <button type="reset" class="btn btn-danger"> Cancel </button>
                    </div>
                </div>
    
                <div class="row py-3">
                    <div id="left" class="col"> 
                        <div class="col">
                            <label for="tanggal"> Tanggal Penilaian: </label>
                            <input type="date" name="tanggal" id="tanggal" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->tgl_penilaian . "\"" : "";?>>
                        </div>
    
                        <div class="col mt-3">
                            <label for="nik"> NIK: </label>
                            <input type="text" name="nik" id="nik" disabled <?php echo (isset($object->nik)) ? "value=\"" . $object->nik . "\"" : "";?>>
                            <input type="hidden" name="nikHidden" id="nik" <?php echo (isset($object->nik)) ? "value=\"" . $object->nik . "\"" : "";?>>
                        </div>
    
                        <div class="col mt-3">
                            <label for="nama"> Nama: </label>
                            <input type="text" name="nama" id="nama" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->nama . "\"" : "";?>>
                        </div>
    
                        <div class="col mt-3">
                            <label for="status"> Status Kerja: </label>
                            <select name="status" id="status" class="input">
                                <Option> Tetap </Option>
                                <Option> Tidak Tetap </Option>
                            </select>
                        </div>
    
                        <div class="col mt-3">
                            <label for="posisi"> Posisi: </label>
                            <input type="text" name="posisi" id="posisi" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->position . "\"" : "";?>>
                        </div>
                    </div>
    
                    <div id="right" class="col"> 
                        <div class="col">
                            <label for="responsibility"> Responsibility: </label>
                            <input type="number" name="responsibility" id="responsibility" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->responsibility . "\"" : "";?>>
                        </div>
    
                        <div class="col mt-3">
                            <label for="teamwork"> Teamwork: </label>
                            <input type="number" name="teamwork" id="teamwork" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->teamwork . "\"" : "";?>>
                        </div>
    
                        <div class="col mt-3">
                            <label for="management"> Management Time: </label>
                            <input type="number" name="management" id="management" class="input" <?php echo (isset($object->nik)) ? "value=\"" . $object->management_time . "\"" : "";?>>
                        </div>
    
                        <div class="col d-flex align-items-center mt-3">
                            <label for="total"> Total: </label>
                            <input type="text" id="total" class="border-0" disabled <?php echo (isset($object->nik)) ? "value=\"" . $object->total . "\"" : "";?>>
                            <input type="hidden" name="total" id="totalHidden">
                        </div>
    
                        <div class="col d-flex align-items-center mt-3">
                            <label for="grade"> Grade: </label>
                            <input type="text" id="grade" class="border-0" disabled <?php echo (isset($object->nik)) ? "value=\"" . $object->grade . "\"" : "";?>>
                            <input type="hidden" name="grade" id="gradeHidden">
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
                                

                                // View Button
                                echo "<td class=\"border border-2 border-black bg-info-subtle\">
                                    <a href=\"performance.php?nik=". $row['nik'] ."\">
                                        <button class=\"view\"> View </button>
                                    </a>
                                </td>";


                                // Edit Button
                                echo "<td class=\"border border-2 border-black bg-warning-subtle\">
                                    <form action=\"\">
                                        <button type=\"button\" class=\"edit\"> Edit </button>
                                    </form>
                                </td>";


                                // Hapus Button
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
                    <a href="add.php">
                        <button id="add" class="btn btn-primary"> Add </button>
                    </a>
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

    <!-- Script Image Upload -->
    <script src="imageUpload.js"></script>

    <!-- Script Total & Grade -->
    <script src="eventlistener.js"></script>
    
    <script src="edit.js"></script>

    <!-- <script src="add.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script> -->
</body>
</html>