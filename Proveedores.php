<?php
   // Recuperar datos del formulario
   $Idprov = $_POST['Idprov'];
   $Nomprov = $_POST['Nomprov'];
   $Direcprov = $_POST['Direcprov'];
   $Telprov = $_POST['Telprov'];
   $Clavelab = $_POST['Clavelab'];

   // Variables para la conexion
   $host = "localhost";
   $user = 'root';
   $pass = '';
   $dbNombre = "farmaciasanpablo";

   // Hacer la conexion y probarla
   $conexion = mysqli_connect($host, $user, $pass, $dbNombre)
             or die ('Error en la conexion ');

   //Guardar los datos en la tabla
   mysqli_query($conexion, "INSERT INTO proveedores(Idprov, Nomprov, Direcprov, Telprov, Clavelab) 
                              VALUES ($Idprov, '$Nomprov', '$Direcprov', $Telprov, $Clavelab)");

   // cerrar la conexion a la base de datos
   mysqli_close($conexion);
?>
