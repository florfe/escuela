<?php
function calcularCUIL($dni, $Sexo) {
// Verifica que el DNI sea un número de 8 dígitos
    if (!is_numeric($dni) || strlen($dni) !== 8) {
throw new InvalidArgumentException("El DNI debe ser un número de 8 dígitos");
    }
    
// Verifica que el sexo sea "M" o "F"
$Sexo = strtoupper($Sexo);
if ($Sexo !== "1" && $Sexo !== "2") {
throw new InvalidArgumentException("El sexo debe ser 'M' o 'F'");
    }
// Calcula el número de CUIL
    $cuil = "20" . $dni . ($Sexo === "M" ? "1" : "0");
// Calcula el dígito verificador
$suma = 0;
for ($i = 0; $i < 11; $i++) {
$suma += intval($cuil[$i]) * pow(2, (10 - $i));
    }
    
$digitoVerificador = (11 - ($suma % 11)) % 11;
$cuil .= $digitoVerificador;
return $cuil;

}
?>