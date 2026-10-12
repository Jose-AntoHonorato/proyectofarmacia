<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Medicamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('vermed.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
		h2 {
            text-align: right; /* Alinea el texto a la derecha */
            padding-right: 800px; /* Añade un espacio a la derecha del texto */
        }
        form {
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
        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        form input[type="submit"], form input[type="reset"] {
            margin-top: 20px;
        }
        form select, form input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <h2>Busqueda de medicamentos</h2>
    <form action="vermedicamentos.php" method="POST">
        <label>Nombre del medicamento</label>
        <select name="Nombremed" required>
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
            $result=mysqli_query($conexion, "SELECT * FROM medicamento")
                    or die("Problemas en el select:".mysqli_error($conexion));    
            // debemos de recorrerlo todo asignandolo a una variable
            while($row = mysqli_fetch_array($result))
            { 
                echo "<option value='".$row["Nombremed"]."'>".$row["Nombremed"]."</option>";
            } 
            // cuando trmina de recorrer el arreglo refrescar o limpiar la consulta
            mysqli_free_result($result); 
            // cerrar la conexion a la base de datos
            mysqli_close($conexion); 
            ?>
        </select>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>
</html>
