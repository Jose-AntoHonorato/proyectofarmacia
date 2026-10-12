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
   
      // Guardar los datos con consulta preparada
   $stmt = mysqli_prepare($conexion,
       "INSERT INTO ventas(FolTicket, fechventa, prodvend, clavemed, idcliente)
        VALUES (?, ?, ?, ?, ?)");
   mysqli_stmt_bind_param($stmt, "isiii",
       $FolTicket, $fechventa, $prodvend, $clavemed, $idcliente);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
?>
