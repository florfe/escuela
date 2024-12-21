<?php
  session_start();
  if(empty($_SESSION['Usuario_Nombre'])){
header('location: cerrarsesion.php');
exit;
  }

require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();


 require_once 'header.inc.php'; 
 ?>


</head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once 'menu.inc.php'; ?>
    <?php require_once 'user.inc.php'; ?>
      </header>
    <!-- Sidebar menu-->
     <?php require_once 'sliderexamen.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Buscador</h1>
          <p>Consultas Examen</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Consultas Examen</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa lo que buscas<img  src= "icon/on-top-of-the-books-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 5%" /></h3>
                <div class="bs-component">
                <?php if(!empty($Mensaje)) { ?>
                                <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                    <?php echo $Mensaje; ?>
                                </div>
                            <?php } ?>
              </div>

                <div class="bs-component">
               
              </div>
            <div class="tile-body">
              <!-- formulario  registro-->

<form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
   <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"><label class="control-label">
Palabras clave, numeros clave...</label> 
<input type="text" class="form-control form-control-user" id="keywords" name="busqueda" size="30" maxlength="30">
</div></div>


           
   <div class="tile-footer">

    <button class="btn btn-primary" type="submit" name="BotonBuscar" value="BotonBuscar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="buscadorexamen.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
           
            <?php
 
if(!empty($_POST['BotonBuscar']))
{
      $aKeyword = explode(" ", $_POST['busqueda']);
      $query ="SELECT * FROM coloquios  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]. "%' OR Division like '%" . $aKeyword[0]. "%' OR Turno like '%" . $aKeyword[0]."%'";
      $query3 ="SELECT * FROM coloquiosdic  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]. "%' OR Division like '%" . $aKeyword[0]. "%' OR Turno like '%" . $aKeyword[0]."%'";



      $query2 ="SELECT * FROM previas  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]."%'";
 $query4 ="SELECT * FROM previasabril  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]."%'";
$query5="SELECT * FROM previasjulio  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]."%'";
$query6 ="SELECT * FROM previasseptiembre  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]."%'";
$query7 ="SELECT * FROM previasdiciembre  WHERE Materia  like '%" . $aKeyword[0] . "%' OR Fecha like '%" . $aKeyword[0]. "%' OR Hora like '%" . $aKeyword[0]. "%' OR Curso like '%" . $aKeyword[0]."%'";

     for($i = 1; $i < count($aKeyword); $i++) {
      if(!empty($aKeyword[$i])) {
$query .= " ORMateria  like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]. "%' OR Division like '%" . $aKeyword[$i]. "%' OR Turno like '%" . $aKeyword[$i]."%'";
$query3 .= " ORMateria  like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]. "%' OR Division like '%" . $aKeyword[$i]. "%' OR Turno like '%" . $aKeyword[$i]."%'";

        $query2 .= " OR Materia like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]."%'";
        $query4 .= " OR Materia like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]."%'";
        $query5 .= " OR Materia like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]."%'";
        $query6 .= " OR Materia like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]."%'";
        $query7 .= " OR Materia like '%" . $aKeyword[$i] . "%' OR Fecha like '%" . $aKeyword[$i]. "%' OR Hora like '%" . $aKeyword[$i]. "%' OR Curso like '%" . $aKeyword[$i]."%'";
     }
     }
     
     $result = $MiConexion->query($query);
      $result3 = $MiConexion->query($query3);
    echo "<br>Has buscado la palabra clave:<b> ". $_POST['busqueda']."</b>";
     $result2 = $MiConexion->query($query2);
$result4 = $MiConexion->query($query4);
 $result5 = $MiConexion->query($query5);
 $result6 = $MiConexion->query($query6);
 $result7 = $MiConexion->query($query7);
 
     if(mysqli_num_rows($result)> 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
        echo " <tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Curso</th>
<th>Division</th>
<th>Turno</th>
            </tr>";
        While($row = $result->fetch_assoc() ) {   
            $row_count++;                         
            echo "
            <tr>
              <td>Coloquios Febrero</td>
           
                      <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
                             <td>". $row['Division'] . "</td>
                                <td>". $row['Turno'] . "</td>
                    

            </tr>";
        }


        if(mysqli_num_rows($result3) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Curso</th>
<th>Division</th>
<th>Turno</th>

            </tr>";
        While($row = $result3->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Coloquios Diciembre</td>
       
                   <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
                             <td>". $row['Division'] . "</td>
                                <td>". $row['Turno'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }
if(mysqli_num_rows($result2) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Año</th>

            </tr>";
        While($row = $result2->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Previas Febrero</td>
       
                     <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }
if(mysqli_num_rows($result4) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Año</th>

            </tr>";
        While($row = $result4->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Previas Abril</td>
       
                     <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }

if(mysqli_num_rows($result5) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Año</th>

            </tr>";
        While($row = $result5->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Previas Julio</td>
       
                     <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }
if(mysqli_num_rows($result6) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Año</th>

            </tr>";
        While($row = $result6->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Previas Septiembre</td>
       
                     <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }
if(mysqli_num_rows($result7) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo "<tr style='background-color:#36A0D6; color:#ffff'><th>Examen</th>
<th>Materia</th>
<th>Fecha</th>
<th>Hora</th>
<th>Año</th>

            </tr>";
        While($row = $result7->fetch_assoc()) {   
          $row_count++;                         
            echo "
            <tr>  <td>Previas Diciembre</td>
       
                     <td>". $row['Materia'] . "</td>
                      <td>". $row['Fecha'] . "</td>
                       <td>". $row['Hora'] . "</td>
                          <td>". $row['Curso'] . "</td>
            </tr>";
        }
        echo "</table>";
  
    }


  }
    else {
        echo "<br>Resultados encontrados: Ninguno";
    
    }
}
 
?>
 </div>
            </form>


          </div>
        </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
     </body>
</html>