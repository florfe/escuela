<?php
function calcularEdad($fechaNacimiento)
{
    $fechaActual = new DateTime();
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $diferencia = $fechaActual->diff($fechaNacimiento);

    return $diferencia->y; // Devuelve la edad en años
}
?>