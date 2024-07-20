<?php

require_once("reservacion.php");

function handleReservacion() {
    $cr_file = 'reservacion.csv';

    try {
        $reservacion = new reservacion(
            $_POST['lugar'],
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['celular'],
            $_POST['fecha_e'],
            $_POST['fecha_s']
        );
        $reservacion->createFile ($cr_file);
        echo "Reservación guardada con éxito.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleReservacion();
}
?>