<?php
function Listar_Curso($vConexion){
    
 
   $Listado=array();
    $SQL="SELECT * FROM curso  ORDER BY Denominacion";
            $rs=mysqli_query($vConexion, $SQL);
    $i=0;
    while($data=mysqli_fetch_array($rs)){
    $Listado[$i]['ID']=$data['Id'];
    $Listado[$i]['DENOMINACION']=$data['Denominacion'];
    $i++;
        }

        return $Listado;
   

}  


 

  

?>