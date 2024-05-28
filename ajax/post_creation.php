<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = [];

    if (isset($_POST['description']) && isset($_POST['location'])) {
        $image = $_FILES['postImage'];
        $description = $_POST['description'];
        $location = $_POST['location'];

        // Valida e salva l'immagine
        $targetDir = "../uploads/";
        //save image with current timestamp as name
        $targetFile = $targetDir . time() . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Controlla se il file è un'immagine effettiva
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $response['error'] = "File is not an image.";
        }

        // Controlla se il file esiste già
        if (file_exists($targetFile)) {
            $uploadOk = 0;
            $response['error'] = "File already exists.";
        }

        // Controlla la dimensione del file
        if ($image["size"] > 5000000) {
            $uploadOk = 0;
            $response['error'] = "File is too large.";
        }

        if ($uploadOk == 0) {
            $response['error'] = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                $username = $_SESSION['username'];

                if ($dbh->insertPostcard($location, $targetFile, $description, $username)) {
                    echo "success";
                } else {
                    echo "error";
                }

            } else {
                $response['error'] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $response['error'] = "All fields are required.";
    }

    if (!empty($response['error'])) {
        echo $response['error'];
    }
}
?>