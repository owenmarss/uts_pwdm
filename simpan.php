<?php

// Checking if the file image is there
if (isset($_POST['submit']) && isset($_FILES['up_img'])) {

    echo "<pre>";
    print_r($_FILES['up_img']);
    echo "</pre>";

    // File contents
    $img_name = $_FILES['up_img']['name'];
    $img_size = $_FILES['up_img']['size'];
    $tmp_name = $_FILES['up_img']['tmp_name'];
    $error = $_FILES['up_img']['error'];

    // Checking is there an error
    if ($error === 0) {

        // Checking image size not more than 1MB
        if ($img_size > 100000000) {

            // Show error message in URL
            $em = "Sorry, your file is too large.";
            header("location:performance.php?error=$em");
        } else {

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
                // ...call your action here!

            } else {
                // Show error message in URL
                $em = "You can't upload file of this type!";
                header("location:performance.php?error=$em");
            }
        }
    } else {
        // Show error message in URL
        $em = "Unknown error occurred!";
        header("location:performance.php?error=$em");
    }
} else {
    // echo "error mas e";
    header("location:performance.php");
}
