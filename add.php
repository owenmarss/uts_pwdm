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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="performance.css">
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

    <!-- ALERTS -->
    <?php
        if (isset($_GET['success'])) {
            $success_message = $_GET['success'];
            echo "<div class=\"container-fluid\">
                    <div class=\"alert alert-success d-flex align-items-center\" role=\"alert\">
                        <strong>Success!</strong> $success_message
                    </div>
                    </div>";
        } elseif (isset($_GET['error'])) {
            $error_message = $_GET['error'];
            echo "<div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\">
                    <strong>Failed!</strong> $error_message
                    </div>";
        }
    ?>

    <section class="container py-5">
        <form action="simpan.php" class="row border border-2 border-black py-5 rounded" method="post" enctype="multipart/form-data">
            <div class="row justify-content-between">
                <div id="foto" class="col d-flex gap-5">
                    <h5> Foto: </h5>
                    <div class="img-area" data-img="hello.png">
                        <p>upload foto</p>
                    </div>

                    <input type="file" id="file-img" accept="image/*" name="up_img" class="input">
                </div>

                <div id="formButton" class="col col-2 d-flex flex-column gap-2 align-items-end">
                    <input type="submit" class="btn btn-success" name="submit" value="submit"></input>
                    <button class="btn btn-warning"> Clear </button>
                    <button type="reset" class="btn btn-danger"> Cancel </button>
                </div>
            </div>

            <div class="row py-3">
                <div id="left" class="col"> 
                    <div class="col">
                        <label for="tanggal"> Tanggal Penilaian: </label>
                        <input type="date" name="tanggal" id="tanggal" class="input">
                    </div>

                    <div class="col mt-3">
                        <label for="nik"> NIK: </label>
                        <input type="text" name="nik" id="nik" class="input">
                    </div>

                    <div class="col mt-3">
                        <label for="nama"> Nama: </label>
                        <input type="text" name="nama" id="nama" class="input">
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
                        <input type="text" name="posisi" id="posisi" class="input">
                    </div>
                </div>

                <div id="right" class="col"> 
                    <div class="col">
                        <label for="responsibility"> Responsibility: </label>
                        <input type="number" name="responsibility" id="responsibility" class="input">
                    </div>

                    <div class="col mt-3">
                        <label for="teamwork"> Teamwork: </label>
                        <input type="number" name="teamwork" id="teamwork" class="input">
                    </div>

                    <div class="col mt-3">
                        <label for="management"> Management Time: </label>
                        <input type="number" name="management" id="management" class="input">
                    </div>

                    <div class="col d-flex align-items-center mt-3">
                        <label for="total"> Total: </label>
                        <input type="text" id="total" class="border-0" disabled>
                        <input type="hidden" name="total" id="totalHidden">
                    </div>

                    <div class="col d-flex align-items-center mt-3">
                        <label for="grade"> Grade: </label>
                        <input type="text" id="grade" class="border-0" disabled>
                        <input type="hidden" name="grade" id="gradeHidden">
                    </div>
                </div>
            </div>
        </form>
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

    <!-- Script Image Upload -->
    <script src="imageUpload.js"></script>

    <!-- Script Total & Grade -->
    <script src="eventlistener.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script>
</body>
</html>