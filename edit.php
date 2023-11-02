<?php
// Checking if the file image is there
if (isset($_POST['submit']) && isset($_FILES['up_img'])) {
    include 'config.php';

    $nik = $_POST['nikHidden'];

    // Form value
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $posisi = $_POST['posisi'];
    $responsibility = $_POST['responsibility'];
    $teamwork = $_POST['teamwork'];
    $management_time = $_POST['management'];
    $total = $_POST['total'];
    $grade = $_POST['grade'];



    // File contents
    $img_name = $_FILES['up_img']['name'];
    $img_size = $_FILES['up_img']['size'];
    $tmp_name = $_FILES['up_img']['tmp_name'];
    $error = $_FILES['up_img']['error'];


    // Checking is there an error
    if ($error === 0) {

        // Get file extension
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex); //To change the extension to lower case

        // Allowed extensions
        $allowed_exs = array("jpg", "jpeg", "png");

        // Checking is the extension file is allowed
        if (in_array($img_ex_lc, $allowed_exs)) {

            // Rename image using unique id
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'uploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path); //move file into uploads folder in (htdocs)

            // Insert into database
            $a = strtotime($tanggal);
            $newTanggal = date("y-m-d", $a);

            $newTotal = (float)$total;

            // $sql = "INSERT into performance (nik, foto, nama, status_kerja, position, tgl_penilaian, responsibility, teamwork, management_time, total, grade) 
            // VALUES ($nik, '$new_img_name', '$nama', '$status', '$posisi', '$newTanggal', $responsibility, $teamwork, $management_time, $newTotal, '$grade')";
            
            $sql = "UPDATE performance SET foto = '$new_img_name',
                        nama = '$nama',
                        status_kerja = '$status',
                        position = '$posisi',
                        tgl_penilaian = '$newTanggal',
                        responsibility = $responsibility,
                        teamwork = $teamwork,
                        management_time = $management_time,
                        total = $newTotal,
                        grade = '$grade'
                    WHERE nik = $nik";
            
            $result = $conn->query($sql);
            
            $conn->close();
            header("location:performance.php");
        } else {

            // Show error message in URL
            $em = "You can't upload file of this type!";
            header("location:add.php?error=$em");
        }
    } else {
        // Show error message in URL
        $em = "Unknown error occurred!";
        header("location:add.php?error=$em");
    }
} else {

    $em = "You haven't upload the image yet!";
    header("location:add.php?error=$em");
}
