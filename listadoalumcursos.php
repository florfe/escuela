<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, doc.IdCurso as Curso, doc.IdCiclo as Ciclo, doc.IdTurno as Turno, doc.IdDivision as Division
        FROM alumnos doc
      order by doc.IdCurso
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
  <?php require_once 'slideralumnos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado total de alumnos por cursos</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de alumnos por cursos</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Alumnos por curso</h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                  
                     <th>Nombre</th>
                    <th>Apellido</th>
                   
                     <th>Curso</th>
                  <th>Division</th>
                     <th>Ciclo</th>
                      <th>Turno</th>
                      <th></th>
                  </tr>
                </thead>
               
                <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                
                  { ?>
                  <tr > 
                 
                  <td><?php echo $row['Nombre']; ?></td>
                   <td><?php echo $row['Apellido']; ?></td>
                 <td><?php echo $row['Curso']; ?></td>
                  <td><?php echo $row['Division']; ?></td>
                
                 <td><?php echo $row['Ciclo']; ?></td>
                <td><?php echo $row['Turno']; ?></td>
               
                <td><a href="actualizaralumcursos.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                  <?php } ?>
                   <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div><img  src= "icon/four-sports-fans-doing-the-wav-unscreen.gif" style="width:10%; position: absolute; right: 5%" />
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
              <h3 class="tile-title">Cantidad de Alumnos por Grupo de Cursos</h3>
              <canvas id="myChart" width="800" height="600"></canvas>
              <?php
// ... (existing PHP code)

$chartData = array(); // Array to store data for the chart

// Fetch data from the database and populate $chartData
$resultado = mysqli_query($MiConexion, $SQL);

while ($row = mysqli_fetch_assoc($resultado)) {
    
   
$curso = $row['Curso'];
    

if (!isset($chartData[$curso])) {
        

$chartData[$curso] = 1;
    } 
  
else {
  
$chartData[$curso]++;
    }
}
?>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
      <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var cursoData = <?php echo json_encode($chartData); ?>;

  var courseLabels = Object.keys(cursoData);
  var courseCounts = Object.values(cursoData);

  var myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
      labels: courseLabels,
      datasets: [{
        label: 'Cantidad de Alumnos',
        data: courseCounts,
       backgroundColor: 'rgba(162, 14, 87, 0.5)', // Change the background color
        borderColor: 'rgba(162, 14, 87, 1)', // Change the border color
        borderWidth: 1
      }]
    },
    options: {
      responsive: false, // Add this line to make the chart not responsive
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

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

    <!-- Page specific javascripts-->
      </body>
</html>