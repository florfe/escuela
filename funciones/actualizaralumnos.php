<?php
function ActualizarAlumnos($vConexion) {

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
      $tipoDni=$_POST['tipoDni'];
    $numero=$_POST['numeroDni'];
      $vencimientoDni=$_POST['vencimientoDni'];
    $cuil=$_POST['cuil'];
      $tipoTel=$_POST['tipoTel'];
    $tel=$_POST['numeroTel'];
 $email=$_POST['email'];
    $nacimiento=$_POST['fechaNacimiento'];
    $edad=$_POST['edad'];
    
    $sex=$_POST['sexo'];
   
    $calle=$_POST['calle'];
       $num=$_POST['numero'];
        $dep=$_POST['departamento'];
    $piso=$_POST['piso'];
    $barrio=$_POST['barrio'];
    $loc=$_POST['localidad'];
    $prov=$_POST['provincia'];
    $pais=$_POST['pais'];
      $fechaIngreso=$_POST['fechaIngreso'];
  
    $esta=$_POST['estado'];
  $leg=$_POST['legajo'];   
    
 
   

    
    //1) genero la consulta que deseo
    $SQL = "UPDATE alumnos SET Nombre='$nombre', Apellido='$apellido', IdTipoDni='$tipoDni', NumeroDni='$numero', VencimientoDni='$vencimientoDni', Cuil='$cuil', IdTelefono=' $tipoTel', NumeroTel=' $tel', Email='$email', FechaNacimiento='$nacimiento', Edad='$edad',  IdSexo='$sex',  Calle='$calle', Numero='$num', Departamento='$dep', Piso='$piso',  Barrio='$barrio', Localidad='$loc', Provincia='$prov', Pais='$pais', IdSituacion='$esta', FechaIngreso='$fechaIngreso', Legajo='$leg'
       
        WHERE Id='$id'";

     if (!mysqli_query($vConexion, $SQL)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>