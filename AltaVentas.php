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
   mysqli_query($conexion,"INSERT INTO Ventas(FolTicket, fechventa, prodvend, clavemed, idcliente) 
                              VALUES ($FolTicket, '$fechventa', $prodvend, $clavemed, $idcliente)");
   
   // hacer una tabla virtual con los datos que necesitamos
   $resultado=mysqli_query($conexion, "SELECT *
                                       FROM Ventas") or
           die("Problemas en el select:".mysqli_error($conexion));
   
   echo "<br><br><br><br>";
   echo "<center>";
   echo "<font color='blue'>";
   echo "<h1> VENTAS</h1>";
   echo "<h2>Lista de ventas</h2><br>";
   echo "</font >";
   // empezar a pintar la tabla de HTML
   echo "<table border=1 >";
   echo "<TR>";
   // poner los encabezados de los datos
   echo " <TH> Folio del ticket </TH> <TH> Fecha de Venta </TH> <TH> Productos vendidos </TH> <TH> Clave del medicamento </TH> <TH> Cliente </TH>";
   echo "</TR>";
   // debemos de recorrer toda la tabla virtual
   // asignando cada renglon  a una variable  $row
   while($row=mysqli_fetch_array($resultado))
   { 
		echo "<TR>";
		echo "<TD>";  printf("%d",   $row["FolTicket"]);     echo "</TD>";
		echo "<TD>";  printf("%s",   $row["fechventa"]);     echo "</TD>";
		echo "<TD>";  printf("%d",   $row["prodvend"]);     echo "</TD>";
		echo "<TD>";  printf("%d",   $row["clavemed"]);     echo "</TD>";
		echo "<TD>";  printf("%d",   $row["idcliente"]);     echo "</TD>";
		echo "</TR>";	  
	} 
	// cuando termino de mostrarlos todos cierro la etiqueta table
	echo "</table>";
	echo "</center>";
	// cuando termino de mostrar limpiar la tabla virtual creada
	mysqli_free_result($resultado); 
	// cerrar la conexion a la base de datos
	mysqli_close($conexion);
?>







