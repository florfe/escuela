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
     <?php require_once 'slidermaterias.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Buscador</h1>
          <p>Consultas Materias</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Consultas Materias</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa lo que buscas<img  src= "icon/woman-looking-on-top-books-md--unscreen.gif" style="width:15%; position: absolute; right: 5%" /></h3>
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

    <button class="btn btn-primary" type="submit" name="BotonBuscar" value="BotonBuscar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="buscadormaterias.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
           
            <?php
 
if(!empty($_POST['BotonBuscar']))
{
      $aKeyword = explode(" ", $_POST['busqueda']);
      $query ="SELECT * FROM materias  WHERE Nombre  like '%" . $aKeyword[0] . "%' OR IdCurso like '%" . $aKeyword[0]. "%' OR IdDivision like '%" . $aKeyword[0]. "%' OR IdTurno like '%" . $aKeyword[0]."%'";
      $query2 ="SELECT * FROM materiasorientado  WHERE Nombre  like '%" . $aKeyword[0] . "%' OR IdCurso like '%" . $aKeyword[0]. "%' OR IdDivision like '%" . $aKeyword[0]. "%' OR IdTurno like '%" . $aKeyword[0]."%'";
 
     for($i = 1; $i < count($aKeyword); $i++) {
      if(!empty($aKeyword[$i])) {
        $query .= " OR Nombre like '%" . $aKeyword[$i] . "%' OR IdCurso like '%" . $aKeyword[$i]. "%' OR IdDivision like '%" . $aKeyword[$i]. "%' OR IdTurno like '%" . $aKeyword[$i]."%'";
        $query2 .= " OR Nombre like '%" . $aKeyword[$i] . "%' OR IdCurso like '%" . $aKeyword[$i]. "%' OR IdDivision like '%" . $aKeyword[$i]. "%' OR IdTurno like '%" . $aKeyword[$i]."%'";
     }
     }
     
     $result = $MiConexion->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['busqueda']."</b>";
     $result2 = $MiConexion->query($query2);
              
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
         echo " <tr style='background-color:#36A0D6; color:#ffff'><th>Nº Orden</th>
<th>Materia</th>

<th>Curso</th>
<th>Division</th>
<th>Turno</th><th>Ciclo</th>
            </tr>";
        While($row = $result->fetch_assoc() ) {   
            $row_count++;                         
            echo "<tr>
            <td>".$row_count." </td>
                      <td>". $row['Nombre'] . "</td>
                     <td>". $row['IdCurso'] . "</td>
                     <td>". $row['IdDivision'] . "</td>
                     <td>". $row['IdTurno'] . "</td>
                      <td>Ciclo Basico</td>

            </tr>";
        }
        if(mysqli_num_rows($result2) > 0) {
        $row_count=0;
        
        echo "<br><table class='table table-striped'>";
         echo " <tr style='background-color:#36A0D6; color:#ffff'><th>Nº Orden</th>
<th>Materia</th>

<th>Curso</th>
<th>Division</th>
<th>Turno</th><th>Ciclo</th>
            </tr>";
        While($row = $result2->fetch_assoc()) {   
          $row_count++;                         
            echo "<tr>
           <td>".$row_count." </td>
                      <td>". $row['Nombre'] . "</td>
                      <td>". $row['IdCurso'] . "</td>
                     <td>". $row['IdDivision'] . "</td>
                     <td>". $row['IdTurno'] . "</td>
<td>Ciclo Orientado</td>
            </tr>";
        }
        echo "</table>";
  
    }}
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