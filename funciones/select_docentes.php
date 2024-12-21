<?php
function Listar_Docentes($vConexion) {
    $Listado=array();
    //1) genero la consulta que deseo
    $SQL = "SELECT  doc.Id, doc.Nombre, doc.Apellido, dn.NumeroDni as Dni, doc.Cuil, doc.FechaNacimiento, doc.Edad, doc.NumeroTel as Telefono
        FROM docentes doc, dni dn
        WHERE doc.Id=dn.Id 
        ORDER BY doc.Id";
    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
           //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
        while ($data=mysqli_fetch_array($rs)) {
            $Listado[$i]['Id'] = $data['Id'];
            $Listado[$i]['Nombre'] = $data['Nombre'];
            $Listado[$i]['Apellido'] = $data['Apellido'];
            $Listado[$i]['NumeroDni'] = $data['Dni'];
            $Listado[$i]['Cuil'] = $data['Cuil'];
            $Listado[$i]['FechaNacimiento'] = $data['FechaNacimiento'];
            $Listado[$i]['Edad'] = $data['Edad'];
            $Listado[$i]['NumeroTel'] = $data['Telefono'];
            $i++;
    }
    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}
?>