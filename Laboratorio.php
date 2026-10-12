<?php
   // Recuperar datos del formulario
   $Clavelab=$_POST['Clavelab'];
   $Nomlab=$_POST['Nomlab'];
   $Direclab=$_POST['Direclab'];
   $Numlab=$_POST['Numlab'];
   $Correo=$_POST['Correo'];
   // Variables para la conexion
   $host="localhost";
   $user='root';
   $pass='';
   $dbNombre="farmaciasanpablo";
   
   // Hacer la conexion y probarla
   $conexion = mysqli_connect($host,$user,$pass,$dbNombre) or die ('Error en la conexion ');
   //Guardar los datos en la tabla
   mysqli_query($conexion,"INSERT INTO laboratorio (Clavelab, Nomlab, Direclab, Numlab, Correo) 
                              VALUES ($Clavelab, '$Nomlab', '$Direclab', $Numlab, '$Correo')");
	// cerrar la conexion a la base de datos
	mysqli_close($conexion);
?>
