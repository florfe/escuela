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
     <?php require_once 'slider.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Buscador</h1>
          <p>Consultas docentes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Consultas docentes</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa lo que buscas<img  src= "icon/woman-searching-scope-md-nwm-v-unscreen.gif" style="width:20%; position: absolute; right: 4%" /></h3>
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
    <button class="btn btn-primary" type="submit" name="BotonBuscar" value="BotonBuscar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Buscar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="buscador.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
             <?php
 if(!empty($_POST['BotonBuscar']))
{
      $aKeyword = explode(" ", $_POST['busqueda']);
      $query ="SELECT * FROM docentes WHERE Apellido like '%" . $aKeyword[0] . "%' OR Nombre like '%" . $aKeyword[0] . "%'OR NumeroTel like '%" . $aKeyword[0] . "%'OR Email like '%" . $aKeyword[0] . "%'OR Calle like '%" . $aKeyword[0] . "%'OR Numero like '%" . $aKeyword[0] . "%'OR Departamento like '%" . $aKeyword[0] . "%'OR Piso like '%" . $aKeyword[0] . "%'OR Barrio like '%" . $aKeyword[0] . "%'";
          for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR Nombre like '%" . $aKeyword[$i] . "%'OR NumeroTel like '%" . $aKeyword[$i] . "%'OR Email like '%" . $aKeyword[$i] . "%'OR Calle like '%" . $aKeyword[$i] . "%'OR Numero like '%" . $aKeyword[$i] . "%'OR Departamento like '%" . $aKeyword[$i] . "%'OR Piso like '%" . $aKeyword[$i] . "%'OR Barrio like '%" . $aKeyword[$i] . "%'";
        }
      }
          $result = $MiConexion->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['busqueda']."</b>";
            if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados:   ";
        $row_cnt = $result->num_rows;
 echo ($row_cnt);
        echo "<br><table class='table table-striped'>";
     echo "<tr style='background-color: #5499C7'>
                                            <th  style='color: white'>Orden</th>
                                            <th style='color: white'>Apellido</th>
                                            <th style='color: white'>Nombre</th>
                                            <th style='color: white'>Telefono</th>
                                            <th style='color: white'>Email</th>
 <th style='color: white'>Calle</th>
                                            <th style='color: white'>Numero</th>
                                            <th style='color: white'>Departamento</th>
                                            <th style='color: white'>Piso</th>
                                            <th style='color: white'>Barrio</th>
                                            <tr>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr>
            <td>".$row_count." </td>
            <td>". $row['Apellido'] . "</td>
            <td>". $row['Nombre'] . "</td>
             <td>". $row['NumeroTel'] . "</td>
              <td>". $row['Email'] . "</td>
                <td>". $row['Calle'] . "</td>
                  <td>". $row['Numero'] . "</td>
                    <td>". $row['Departamento'] . "</td>
                      <td>". $row['Piso'] . "</td>
                        <td>". $row['Barrio'] . "</td>
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