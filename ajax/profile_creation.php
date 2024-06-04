<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['profileImage'];

        $targetDir = "../uploads/";
        $targetFile = $targetDir . time() . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $errorMessage = "File is not an image.";
        }

        if (file_exists($targetFile)) {
            $uploadOk = 0;
            $errorMessage = "File already exists.";
        }

        if ($image["size"] > 5000000) {
            $uploadOk = 0;
            $errorMessage = "File is too large.";
        }

        if ($uploadOk == 0) {
            $errorMessage = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                $username = $_SESSION['username'];

                if ($dbh->insertProfilePicture($targetFile, $username)) {
                    echo "success";
                } else {
                    $errorMessage = "Error while editing your profile picture.";
                }

            } else {
                $errorMessage = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $errorMessage = "Please select an image.";
    }
}

if (isset($errorMessage)) {
    echo json_encode(["error" => $errorMessage]);
}

?>