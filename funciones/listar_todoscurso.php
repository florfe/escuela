<?php
function Listar_CursosCompletos($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT  Id, Curso, Division, Turno, Ciclos
        FROM cursoscompletos
        ";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
        while ($data=mysqli_fetch_array($rs)) {
            $Listado[$i]['Id'] = $data['Id'];
            $Listado[$i]['Curso'] = $data['Curso'];
             $Listado[$i]['Division'] = $data['Division'];
             $Listado[$i]['Turno'] = $data['Turno'];
              $Listado[$i]['Ciclos'] = $data['Ciclos'];
            $i++;
    }
    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}
?>