<?php 
function InsertarCursoscompletos2($vConexion){
  



    $SQL_Insert="INSERT INTO hora (IdCurso, Hora, Dia, Horario_ingreso, Horario_salida, Materia)
VALUES ('".$_POST['IdCurso']."', '".$_POST['Denominacion']."', '".$_POST['Dia']."','".$_POST['Horario_ingreso']."','".$_POST['Horario_salida']."','".$_POST['Materias']."')";

    

    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}


?>