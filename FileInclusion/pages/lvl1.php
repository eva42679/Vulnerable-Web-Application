<html>
   <head>
      <meta charset="utf-8">
      <link rel="shortcut icon" href="../../Resources/hmbct.png" />
      <title> Level 1 </title>
   </head>

   <body>    
      <div style="background-color:#c9c9c9;padding:15px;">
      <button type="button" name="homeButton" onclick="location.href='../../homepage.html';">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='fileinc.html';">Main Page</button>  
      </div>
      
      <div align="center"><b><h3>This is Level 1</h3></b></div>
      <div align="center">
      <a href=lvl1.php?file=1.php><button>Button</button></a>
      <a href=lvl1.php?file=2.php><button>The Other Button!</button></a>
      </div>
      
      <?php
    echo "</br></br>";
    
    // Directorio permitido
    $allowed_directory = 'safe_files/';
    
    // Archivos permitidos
    $allowed_files = ['file1.php', 'file2.php']; // Lista de archivos permitidos

    if (isset($_GET['file'])) {
        $file = basename($_GET['file']); // Extrae solo el nombre del archivo para evitar Path Traversal
        
        if (in_array($file, $allowed_files)) { 
            $filepath = $allowed_directory . $file;

            if (file_exists($filepath)) {
                @include($filepath);
                echo "<div align='center'><b><h5>" . htmlspecialchars($file) . "</h5></b></div>";
            } else {
                echo "<div align='center'><b><h5>Archivo no encontrado</h5></b></div>";
            }
        } else {
            echo "<div align='center'><b><h5>Archivo no permitido</h5></b></div>";
        }
    }
?>
   </body>
</html>

