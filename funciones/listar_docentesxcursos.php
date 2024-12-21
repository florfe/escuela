<?php
function Listar_DocentesXCursos($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT  doc.Id as ID, doc.Apellido, doc.Nombre, cur.Id, cur.Denominacion as Curso, div.Id, div.Denominacion as Division, cic.Id, cic.Denominacion  as  Ciclo,  tur.Id, tur.Denominacion  as Turno
        FROM docentes doc, curso cur, division div, ciclos cic, turno tur
        WHERE doc.IdCurso=cur.Id AND doc.Division=div.Id AND  doc.Ciclo=cic.Id AND doc.Turno=tur.Id 
        ORDER BY doc.Id";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
        while ($data=mysqli_fetch_array($rs)) {
            $Listado[$i]['Id'] = $data['Id'];
            $Listado[$i]['Apellido'] = $data['Apellido'];
            $Listado[$i]['Nombre'] = $data['Nombre'];
            $Listado[$i]['Curso'] = $data['Curso'];
            $Listado[$i]['Division'] = $data['Division'];
           $Listado[$i]['Ciclo'] = $data['Ciclo'];
           $Listado[$i]['Turno'] = $data['Turno'];
            $i++;
    }
    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}
?>