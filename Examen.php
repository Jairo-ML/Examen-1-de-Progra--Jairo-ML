<!DOCTYPE html>
<html lang="en">

<head> 
    <title>Reservación de hotel</title>
</head>

<body> 
    <form method="POST" action="#"> 
        <!--Definición de los módulos-->       
        <label for="lugar">Seleccione el hotel:</label>
        <br><br>
        <select name="lugar" required>
            <option value="" disabled selected>Seleccione un lugar</option>
            <option value="Hotel Bejuco"> Hotel Bejuco </option>
            <option value="Hotel Colinas del Viento"> Hotel Colinas del Viento </option>
            <option value="Hotel Madrigal"> Hotel Madrigal </option>
            <option value="Hotel York"> Hotel York </option>
            <option value="Hotel Mañana Soleado">Hotel Mañana Soleado</option>
        </select>
        <br><br>
        <label for="nombre">Digite su nombre:</label>
        <br><br>
        <input type="text" placeholder="Escriba su nombre" name="nombre" required>
        <br><br>
        <label for="apellido">Digite su apellido:</label>
        <br><br>
        <input type="text" placeholder="Escriba su apellido" name="apellido" required>
        <br><br>
        <label for="celular">Digite su número de celular:</label>
        <br><br>
        <input type="number" placeholder="Escriba su telefono" min="0" name="celular" required>
        <br><br>
        <label for="fecha_e">Seleccione la fecha de entrada:</label>
        <br><br>
        <input type="date" placeholder="seleccione la fecha" name="fecha_e" required>
        <br><br>
        <label for="fecha_s">Seleccione la fecha de salida:</label>
        <br><br>
        <input type="date" id="fecha_salida" name="fecha_s" required>
        <br><br>
        <input type="submit" name="procesar" value="Agregar" />
        <br><br>
    </form>
    
    <!--Hice un formulario específico para eliminar (sino no funciona por el required de los modulos)-->
    
    <form method="POST" action="#">
        <input type="submit" name="eliminar" value="Eliminar Reservaciones"/>
    </form>

    <?php 
        // Procesar y guardar los datos
        if (isset($_POST['procesar'])) {
  
            $nombre= $_POST ['nombre'];
            $apellido= $_POST ['apellido'];
            $hotel= $_POST['lugar'];
            $entrada= $_POST ['fecha_e'];
            $salida= $_POST ['fecha_s'];

            $contenido = "$nombre / $apellido / $hotel / $entrada / $salida";
            
            //Creación del archivo plano
            $archivo = 'reservaciones.txt';
            $registro = $contenido . PHP_EOL; 
           
            //Guardar los datos en el archivo plano
            $file = fopen($archivo, 'a');
            if ($file) {
                fwrite($file, $registro);
                fclose($file);
                echo "<p>¡Reservación guardada correctamente!</p>";
            } 
        }
        // Resetear las reservaciones guardadas
        if (isset($_POST['eliminar'])) {
            $archivo = 'reservaciones.txt';
            if (file_exists($archivo)) {
                if (unlink($archivo)) {
                    echo '<p>¡Se eliminaron las reservaciones exitosamente!</p>';
                } 
                else {
                    echo '<p>Ocurrió un error al eliminar las reservaciones.</p>';
                }
            } else {
                echo '<p>No hay reservaciones que eliminar.</p>';
            }
        }
        
        // Mostrar como datos como "table"
        
        echo "<h2>Reservaciones Actuales</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Hotel</th><th>Fecha de Entrada</th><th>Fecha de Salida</th></tr>";
        
        // Leer el archivo plano de reservaciones
        $archivo = 'reservaciones.txt';
        if (file_exists($archivo)) {
            $lineas = file($archivo, FILE_IGNORE_NEW_LINES); // Le añadí file_ignore para eliminar cualquier carácter de la línea nueva
            foreach ($lineas as $linea) {
                list($nombre, $apellido, $hotel, $fecha_e, $fecha_s) = explode(' / ', $linea);
                echo "<tr><td>$nombre</td><td>$apellido</td><td>$hotel</td><td>$fecha_e</td><td>$fecha_s</td></tr>";
            }
        } else {
            echo "<tr><td>No hay reservaciones guardadas.</td></tr>";
        }
        
        echo "</table>";

    ?>

    

</body>
