<?php
$NombreMed=$_POST['NombreMed'];
$Clavemed=$_POST['Clavemed'];
$Clavelab=$_POST['Clavelab'];
$Fechacad=$_POST['Fechacad'];
$Lotemed=$_POST['Lotemed'];
	$host="localhost";
	$user='root';
	$pass='';
	$dbNombre="farmaciasanpablo";
	
	$conexion=mysqli_connect($host,$user,$pass,$dbNombre)or die ('Error en la conexion ');
	
	mysqli_query($conexion,"INSERT INTO medicamento(NombreMed,Clavemed,Clavelab,Fechacad,Lotemed) 
                              VALUES ('$NombreMed',$Clavemed,$Clavelab,'$Fechacad',$Lotemed )");
    mysqli_close($conexion)
?>
