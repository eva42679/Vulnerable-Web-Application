<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
</head>
<body>
<div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='fileupl.html';">Main Page</button>
</div>

<div align="center">
<form action="" method="post" enctype="multipart/form-data">
   <br>
    <b>Select image : </b> 
    <input type="file" name="file" id="file" style="border: solid;">
    <input type="submit" value="Submit" name="submit">
</form>
</div>
<?php

if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name;
    $upload_ok = true;

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check === false) {
        echo "El archivo no es una imagen.";
        $upload_ok = false;
    }

    $allowed_file_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_file_types)) {
        echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $upload_ok = false;
    }

    $safe_file_name = preg_replace("/[^a-zA-Z0-9\.\-_]/", "_", $file_name);
    $safe_target_file = $target_dir . $safe_file_name;

    if ($upload_ok) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $safe_target_file)) {
            echo "El archivo ha sido subido a: " . htmlspecialchars($safe_target_file);
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
}
?>

</body>
</html>
