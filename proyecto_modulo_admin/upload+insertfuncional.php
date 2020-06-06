<?php
require_once ("clases/conexion.php");
$obj= new conectar();
$conexion=$obj->conexion();

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
        $data=$fileDirAct;

        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysqli_escape_string($conexion,$data);

        // Insertamos en la base de datos.
        $resultado = mysqli_query($conexion,"UPDATE producto set 
                        fotoRuta='$data'
                        where id_prod = (SELECT MAX(id_prod) FROM producto)");

    } else {
        echo 0;
    }
} else {
    echo 0;
}


/*
// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["file"]) || $_FILES["file"]["error"] > 0)
{
    echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 1048576;

    if (in_array($_FILES['file']['type'], $permitidos) && $_FILES['file']['size'] <= 10*MB)
    {

        // Archivo temporal
        $imagen_temporal = $_FILES['file']['tmp_name'];

        // Tipo de archivo
        $tipo = $_FILES['file']['type'];

        // Leemos el contenido del archivo temporal en binario.
        //$fp = fopen($fileDirAct, 'r+b');
       // $data = fread($fp, filesize($fileDirAct));
       // fclose($fp);
        
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
         $data=file_get_contents($fileDirAct);

        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysqli_escape_string($conexion,$data);

        // Insertamos en la base de datos.
        $resultado = @mysqli_query("UPDATE producto set 
                        fotoRuta='$data'
                        where id_prod = (SELECT MAX(id_prod) FROM producto)");

        if ($resultado)
        {
            echo "El archivo ha sido copiado exitosamente.";
        }
        else
        {
            echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

*/











?>