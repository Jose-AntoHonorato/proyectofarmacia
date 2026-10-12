<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('verve.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        table {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid #000;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #000;
            text-align: center;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <?php
    // Variables para la conexion
    $host="localhost";
    $user='root';
    $pass='';
    $dbNombre="farmaciasanpablo";

    // Hacer la conexion y probarla
    $conexion=mysqli_connect($host,$user,$pass,$dbNombre)
                or die ('Error en la conexion ');

    // en una variable hacer la tabla virtual ( de la clave que andamos buscando)
    $result=mysqli_query($conexion, "SELECT * FROM ventas  WHERE Folticket='".$_POST['Folticket']."'")
            or die("Problemas en el select:".mysqli_error($conexion));    

    // se llena un arreglo con la información seleccionada
    // empezar a pintar la tabla
    echo "<table>";
    echo "<TR>";
    echo "<TH>folio del ticket</TH>  <TH> ID del cliente </TH>  <TH> clave del medicamento </TH>  <TH> fecha de venta</TH>  <TH> prodcutos vendidos </TH>";
    echo "</TR>";

    // debemos de recorrerlo todo asignandolo a una variable
    while($row = mysqli_fetch_array($result))
    { 
     echo "<TR>";
        echo "<TD>";  printf("%d ",$row["Folticket"]);  echo  "</TD>";
        echo "<TD>";  printf("%s ",$row["Idcliente"]);  echo  "</TD>";
        echo "<TD>";  printf("%s ",$row["Clavemed"]);  echo  "</TD>";
        echo "<TD>";  printf("%s ",date('Y-m-d', strtotime($row["Fechventa"])));  echo  "</TD>";
        echo "<TD>";  printf("%s ",$row["Prodvend"]);  echo  "</TD>";
    echo "</TR>";      
    }

    // cuando termino de mostrarlos todos cierro la etiqueta table
    echo "</table>";

    // cuando trmina de recorrer el arreglo refrescar o limpiar la consulta
    mysqli_free_result($result); 

    // cerrar la conexion a la base de datos
    mysqli_close($conexion); 
    ?>
</body>
</html>
