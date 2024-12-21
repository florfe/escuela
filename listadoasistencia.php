 <?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();


$SQL = "SELECT doc.Id, doc.Apellido, doc.Nombre, estad.IdDocente, estad.Fecha, estad.EstadoAsis as Asistencia
        FROM docentes doc, asistenciadoc estad  
        where doc.Id=estad.IdDocente 
        order by estad.Fecha
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
  <?php require_once 'slider.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
                   <p>Listado total de asistencia docente</p>
           </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de asistencia docente</a></li>
          </ul>
      </div>
      <div class="row">
               <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Asistencia de Docentes</h3>
            <div class="table-responsive">
              <table id="docentesTable"  class="table">
                <thead>
                  <tr>
                    <!--<th>#</th>-->
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    
                    <th>
                     Asistencia
                      

                        </th>
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
                                 
                                 <td><?php echo $row['Fecha']; ?></td>
                 <td><?php echo $row['Asistencia']; ?></td>
              <td><a href="actualizarasis.php?id=<?php echo $row['Id']; ?>">Actualizar datos...</a></td>
                  </tr>
                 <?php } ?>
                    <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total de registros: <?php echo ($row_cnt);?></h4>
                                  </tbody>
              </table>
            </div><img  src= "icon/business-line-PA-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
          </div>
        </div>
        <div class="clearfix"></div>
             </div>
              <h3 class="tile-title">Cantidad de Presentes por Fecha</h3>
             

  <canvas id="barChart" width="400" height="200"></canvas>
  <?php
$chartSQL = "SELECT 
            estad.Fecha,
            COUNT(CASE WHEN estad.EstadoAsis = 'Presente' THEN 1 END) as PresentCount
        FROM docentes doc
        JOIN asistenciadoc estad ON doc.Id = estad.IdDocente
        GROUP BY estad.Fecha
        ORDER BY estad.Fecha";
$chartResult = mysqli_query($MiConexion, $chartSQL);

$dateLabels = [];
$presentCounts = [];

while ($chartRow = mysqli_fetch_assoc($chartResult)) {
  $dateLabels[] = $chartRow['Fecha'];
  $presentCounts[] = $chartRow['PresentCount'];
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
    <script>

  var ctx = document.getElementById('barChart').getContext('2d');
  var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($dateLabels); ?>,
      datasets: [{
        label: 'Estadísticas de Asistencia',
        data: <?php echo json_encode($presentCounts); ?>,
        backgroundColor: 'rgba(75, 192, 192, 0.8)',
        borderWidth: 1
      }]
    },
    options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
    <!-- Page specific javascripts-->
      </body>
</html>