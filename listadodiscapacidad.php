<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdTurno as Turno, doc.IdDivision as Division, doc.IdDiscapacidad as Discapacidad
        FROM alumnos doc
       
        order by doc.Id
      
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
    background-color: rgba(10, 188, 162, 0.5); /* Change the background color of the header */
    color: black; /* Change the text color of the header */
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
  <?php require_once 'slideralumnos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado Alumnos con Discapacidad</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado Alumnos con Discapacidad</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Alumnos con discapacidad<img  src= "icon/wheelchair-racer-md-nwm-v2-unscreen.gif" style="width:10%; position: absolute; right: 1%" /></h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                   
                     <th>Nombre</th>
                    <th>Apellido</th>
                   
                     <th>Curso</th>
                  <th>Division</th>
                    
                      <th>Turno</th>
                      <th>Discapacidad</th>
                       <th></th>
                  </tr>
                </thead>
               
                <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
               $conteoRegistros = 0;
                 while($row=mysqli_fetch_assoc($resultado))
    if($row['Discapacidad']!="No posee" && $row['Discapacidad'] == "Retraso Mental Leve"){
                  { ?>
                  <tr > 
                 
                  <td><?php echo $row['Nombre']; ?></td>
                   <td><?php echo $row['Apellido']; ?></td>
                 <td><?php echo $row['Curso']; ?></td>
                  <td><?php echo $row['Division']; ?></td>
                <td><?php echo $row['Turno']; ?></td>
               <td><?php echo $row['Discapacidad']; ?></td>
              <td><a href="actualizardisca.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                  <?php 
$conteoRegistros++;
}} $row_cnt = $resultado->num_rows; 

echo  "<h4> Total de registros: $conteoRegistros</h4>"; ?>
 
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
       <h3 class="tile-title">Porcentaje de Alumnos con Discapacidad</h3>
      <canvas id="myChart" width="400" height="400"></canvas>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
       <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
$(document).ready(function() {
    // Obtén los datos para el gráfico desde PHP
    var totalAlumnos = <?php echo $row_cnt; ?>;
    var alumnosConDiscapacidad = <?php echo $conteoRegistros; ?>;

    // Calcula el porcentaje de alumnos con discapacidad y otros alumnos
    var porcentajeDiscapacidad = ((alumnosConDiscapacidad / totalAlumnos) * 100).toFixed(2);
    var porcentajeOtros = ((1 - alumnosConDiscapacidad / totalAlumnos) * 100).toFixed(2);

    // Configura los datos para el gráfico
    var data = {
        labels: ['Alumnos con Discapacidad (' + porcentajeDiscapacidad + '%)', 'Otros Alumnos (' + porcentajeOtros + '%)'],
        datasets: [{
            data: [alumnosConDiscapacidad, totalAlumnos - alumnosConDiscapacidad],
            backgroundColor: ['#36a2eb', '#FF6384'],
        }]
    };

    // Configura las opciones del gráfico
    var options = {
        responsive: false,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Porcentaje de Alumnos con Discapacidad',
        },
        animation: {
            animateScale: true,
            animateRotate: true,
        },
    };

    // Obtén el contexto del gráfico
    var ctx = document.getElementById('myChart').getContext('2d');

    // Crea el gráfico de torta
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options,
    });
});
</script>
  </body>
</html>