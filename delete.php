<?php
    include 'config.php';

    if(isset($_POST['nik'])) {
        $nik = $_POST['nik'];

        $sql = "DELETE FROM performance WHERE nik=$nik";
        $result = $conn->query($sql);

        header('location: performance.php');
    }
?>