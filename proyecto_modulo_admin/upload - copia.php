<?php
//convirtiendo MB 
define('MB', 1048576);


if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif") &&
    ($_FILES["file"]["size"] <  10*MB)) {

    $fileName = $_FILES['file']['name'];
    $fileDirOrig = $_FILES['file']['tmp_name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $fileDirAct = "productos/".$newFileName;

//evitar que se repita el nombre
   

    if (move_uploaded_file($fileDirOrig, $fileDirAct)) {

        echo $fileDirAct;

    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>