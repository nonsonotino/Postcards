<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['description']) && isset($_POST['location'])) {

        if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['postImage'];
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
            $location = filter_input(INPUT_POST, "location", FILTER_SANITIZE_SPECIAL_CHARS);

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

                    if ($dbh->insertPostcard($location, $targetFile, $description, $username)) {
                        echo "success";
                    } else {
                        $errorMessage = "Error while creating the postcard.";
                    }

                } else {
                    $errorMessage = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $errorMessage = "Please select an image.";
        }
    } else {
        $errorMessage = "All fields are required.";
    }

    if (isset($errorMessage)) {
        echo json_encode(["error" => $errorMessage]);
    }
}
?>