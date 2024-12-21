<?php
function calcularCuil($dni, $sexo) {
    // Verificar que el DNI sea numérico y tenga 8 dígitos
    if (!is_numeric($dni) || strlen($dni) !== 8) {
        return false; // DNI inválido
    }

    // Convertir el sexo a mayúsculas
    $sexo = strtoupper($sexo);

    // Verificar que el sexo sea válido (M, F o 0)
    if ($sexo !== 'M' && $sexo !== 'F' && $sexo !== '0') {
        return false; // Sexo inválido
    }

    // Obtener el número de CUIL asignado a cada persona
    $numeroCuil = mt_rand(10, 99);

    // Calcular el dígito verificador
    $dniSexo = $dni . $sexo;
    $suma = 0;

    for ($i = 0; $i < 10; $i++) {
        $digito = substr($dniSexo, $i, 1);
        $factor = ($i % 2 === 0) ? 1 : 2;

        $producto = $digito * $factor;

        if ($producto > 9) {
            $producto -= 9;
        }

        
      
$suma += $producto;
    }

    $resto = $suma % 10;
    $digitoVerificador = ($resto === 0) ? 0 : 10 - $resto;

    // Formar el CUIL completo
    $cuil = "20{$dniSexo}{$numeroCuil}{$digitoVerificador}";

    return $cuil;
}

// Ejemplo de uso
$dni = 12345678;
$sexo = 'M';

$cuilCalculado = calcularCuil($dni, $sexo);

if ($cuilCalculado) {
    echo "CUIL calculado: $cuilCalculado";
} else {
    echo "Error en el DNI o sexo proporcionados.";
}
?>