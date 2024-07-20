<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Reservación de hotel</title>
</head>
<body> 
<!-- NOTA: Le puse controlador por que no sabia que ponerle, pero podria llamarse controlador al ser algo que interactura con este front end y tu clase reserva. -->
    <form method="POST" action="controlador.php"> 
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
    
    <form method="POST" action="controlador.php">
        <input type="submit" name="eliminar" value="Eliminar Reservaciones"/>
    </form>
</body>
</html>