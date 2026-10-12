<?php
   // Recuperar datos del formulario
   $FolTicket=$_POST['FolTicket'];
   $fechventa=$_POST['fechventa'];
   $prodvend=$_POST['prodvend'];
   $clavemed=$_POST['clavemed'];
   $idcliente=$_POST['idcliente'];
   // Variables para la conexion
   $host="localhost";
   $user='root';
   $pass='';
   $dbNombre="farmaciasanpablo";
   // Hacer la conexion y probarla
   $conexion=mysqli_connect($host,$user,$pass,$dbNombre)
             or die ('Error en la conexion ');
   
   //Guardar los datos en la tabla
   mysqli_query($conexion,"INSERT INTO ventas(FolTicket, fechventa, prodvend, clavemed, idcliente) 
                              VALUES ($FolTicket, '$fechventa', $prodvend, $clavemed, $idcliente)");
   
	// cerrar la conexion a la base de datos
	mysqli_close($conexion);
?>