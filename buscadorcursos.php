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
     <?php require_once 'slidercursos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Buscador</h1>
          <p>Consultas cursos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Consultas cursos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa lo que buscas<img  src= "icon/stick-figure-binoculars-look-u-unscreen.gif" style="width:15%; position: absolute; right: 5%" /></h3>
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

    <button class="btn btn-primary" type="submit" name="BotonBuscar" value="BotonBuscar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="buscadorcursos.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
           
            <?php
 
if(!empty($_POST['BotonBuscar']))
{
      $aKeyword = explode(" ", $_POST['busqueda']);
      $query ="SELECT * FROM cursoscompletos WHERE Curso like '%" . $aKeyword[0] . "%' OR Division like '%" . $aKeyword[0] . "%'OR Turno like '%" . $aKeyword[0] . "%'OR Ciclos like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR Division like '%" . $aKeyword[$i] . "%'OR Turno like '%" . $aKeyword[$i] . "%'OR Ciclos like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $MiConexion->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['busqueda']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr>
            <td>".$row_count." </td>
            <td>". $row['Curso'] . "</td>
            <td>". $row['Division'] . "</td>
             <td>". $row['Turno'] . "</td>
              <td>". $row['Ciclos'] . "</td>

            </tr>";
        }
        echo "</table>";
  
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