<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT comp.Id  as ID, doc.Curso, doc.Ciclos, doc.Turno, doc.Division, comp.IdCurso, comp.Dia as Dia, comp.Hora, comp.Horario_ingreso as Ingreso, comp.Horario_salida as Salida, comp.Materia as Materias
FROM cursoscompletos doc,  hora as comp
WHERE comp.IdCurso=doc.Id
order by  doc.Curso, doc.Division, doc.Turno, comp.Dia,comp.Hora;
      
       ";

require_once 'header.inc.php'; 
?>

  </head>
  <style>
  
  #docentesTable {
    font-family: Arial, sans-serif; /* Change the font */
  }

  #docentesTable_wrapper {
    background-color: #f0f0f0; /* Change the background color of the wrapper */
    padding: 20px; /* Add some padding to the wrapper */
  }

  #docentesTable th, #docentesTable td {
    border: 1px solid #ddd; /* Add borders to cells */
    padding: 8px; /* Add padding to cells */
    text-align: left; /* Align text to the left */
  }

  #docentesTable thead {
    background-color: rgba(162, 14, 87, 0.5); /* Change the background color of the header */
    color: white; /* Change the text color of the header */
  }

  #docentesTable_filter input {
    width: 200px; /* Adjust the width of the search input */
  }
</style>
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
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado de cursos</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de cursos</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Cursos</h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                    <th>#</th>   
                     <th>Dia</th>
                     <th>Curso</th>
                      <th>Division</th>
                      <th>Turno</th>
                      <th>Ciclo</th>
                   <th>Materias</th>
                      <th>Hora</th>
                      <th>Ingreso</th>
                      <th>Salida</th>
                      <th></th>
                      
                  </tr>
                </thead>
               
                <tbody>
                <?php
                $resultado=mysqli_query($MiConexion, $SQL); 
                 
                while($row=mysqli_fetch_assoc($resultado))

       
                { ?>
               
                <tr > 
                <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['Dia']; ?></td>
                <td><?php echo $row['Curso']; ?></td>
                  <td><?php echo $row['Division']; ?></td>
                <td><?php echo $row['Turno']; ?></td>
               <td><?php echo $row['Ciclos']; ?></td>
              <td><?php echo $row['Materias']; ?></td>
               <td><?php echo $row['Hora']; ?></td>
               <td><?php echo $row['Ingreso']; ?></td>
               <td><?php echo $row['Salida']; ?></td>


                <td><a href="actualizarhoracurso.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                <?php }  ?>
                  </tbody>
              </table>
            </div><img  src= "icon/stick-figures-pulling-door-md--unscreen.gif" style="width:20%; position: absolute; right:1%" />
          </div>
        </div>
        <div class="clearfix"></div>
        
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
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
      <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <!-- Page specific javascripts-->
    <script>
  $(document).ready(function () {
            // Change the label for "Show entries" and set language to Spanish
            $('#docentesTable').DataTable({
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ entradas", // Customize this line
                },
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                // Your other DataTable options...
            });
        });
    </script>
  </body>
</html>