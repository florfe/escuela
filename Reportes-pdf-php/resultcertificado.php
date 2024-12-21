<?php
// Función para extraer el listado de usuarios
function Listar_Docentes($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT  doc.Id, doc.Nombre, doc.Apellido, dn.NumeroDni as Dni
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
            
            $i++;
    }
    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}
    //AND modulo.mo_estado = 'Cerrado'
    if($consulta -> num_rows != 0){
        $n = 1;
        // convertimos el objeto
    echo   "<div class='panel panel-success'>
                <div class='panel-heading'>
                     <h3 class='panel-title'><i class='fa fa-eye-slash'></i><b>&nbsp; Estado Actual</b></h3>
                </div>
                <div class='panel-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <div class='col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4'>
                                    <i class='fa fa-check-circle-o fa-5x'></i>
                                </div>
                                <div class='col-sm-4 col-sm-offset-4 col-xs-12'>
                                    <h3 align='center'>Disponible</h3>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>" ;
    echo   "<div class='panel panel-success'>
                <div class='panel-heading'>
                    <h3 class='panel-title'><i class='fa fa-folder-open-o'></i><b>&nbsp; Detalle</b></h3>
                </div>
                <div class='panel-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                               <div class='table-responsive'>
                                <table class='table table-hover table-striped table-bordered'>
                                    <thead> 
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Fecha Emision</th>
                                            <th>Fecha Expiracion</th>
                                            <th>Accción</th>
                                        </tr>
                                    </thead>
                                    <tbody> ";

        while($listadoOK = $consulta -> fetch_assoc())
        { 
                echo '<tr>';
                    echo '<td>'.$n.'</td>';
                    echo '<td>Certificacion en '.$listadoOK['Nombre'].'</td>';
                    echo '<td>'.$listadoOK['Apellido'].'</td>';
                    echo '<td>'.$listadoOK['NumeroDni'].'</td>';
                    
                echo '<tr>';
            ;
            $n++;
        }
    echo   "                        </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>";

    }
    else{
    echo   "<div class='panel panel-success'>
                <div class='panel-heading'>
                    <h3 class='panel-title'><i class='fa fa-eye-slash'></i></i><b>&nbsp; Estado Actual</b></h3>
                </div>
                <div class='panel-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <div class='col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4'>
                                    <i class='fa fa-refresh fa-spin fa-5x'></i>
                                </div>
                                <div class='col-sm-4 col-sm-offset-4 col-xs-12'>
                                    <h3 align='center'>En Espera</h3>
                                </div>
                                <div class='col-sm-10 col-sm-offset-1'
                                    <p align='center'>Actualmente no disponible, se requiere el cierre académico</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>";
    }

}



    // Evitando problemas con acentos
    $mysqli -> query('SET NAMES "utf8"');
}