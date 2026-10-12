<?php
$idCliente=$_POST['idCliente'];
$Nomcli=$_POST['Nomcli'];
$Direccion=$_POST['Direccion'];
$Numtel=$_POST['Numtel'];
$Fechareg=$_POST['Fechareg'];
$Sexocli=$_POST['Sexocli'];

$host ="localhost";
$user ="root";
$pass ="";
$dbNombre="farmaciasanpablo";

$conexion =mysqli_connect($host,$user,$pass,$dbNombre)or die("error de conexion a la BD");
			mysqli_query($conexion,"INSERT INTO clientes (idCliente,Nomcli,Direccion,Numtel,Fechareg,Sexocli)
			VALUES ($idCliente,'$Nomcli','$Direccion',$Numtel,'$Fechareg', '$Sexocli')");
			
			mysqli_close($conexion)
				
?>
