<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, entre.CopiaDni as Dni, entre.ConstanciaServ as Constancia, entre.RegimenIncomp as Regimen, entre.CertifDelitSex as Delitos, entre.TituloDoc as Titulo, entre.AptoPsicofis as Apto, entre.ArtCarnet as ART, entre.CopiaVac as Vacunas
        FROM docentes doc, entrega entre
        Where doc.Id=entre.IdDocente
        order by doc.Apellido, doc.Nombre
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
    background-color: rgba(199, 193, 25, 0.5); /* Change the background color of the header */
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
                   <p>Listado de documentacion docente</p>
           </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado documentacion docentes</a></li>
          </ul>
      </div>
      <div class="row">
                <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Documentacion</h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                    <!--<th>#</th>-->
                    <th>Apellido</th>
                     <th>Nombre</th>
                     <th>Dni</th>
                  <th>Constancia</th>
                     <th>Regimen</th>
                      <th>Delitos</th>
                       <th>Titulo</th>
                  <th>Apto</th>
                     <th>ART</th>
                      <th>Vacunas</th>
                      <th></th>
                  </tr>
                </thead>
                               <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                                  { ?>
                  <tr > 
                  <!--<td><?php echo $row['ID']; ?></td>-->
                
                   <td><?php echo $row['Apellido']; ?></td>
                     <td><?php echo $row['Nombre']; ?></td>
                 <td><?php echo $row['Dni']; ?></td>
                  <td><?php echo $row['Constancia']; ?></td>
                                 <td><?php echo $row['Regimen']; ?></td>
                <td><?php echo $row['Delitos']; ?></td>
               <td><?php echo $row['Titulo']; ?></td>
                  <td><?php echo $row['Apto']; ?></td>
                                 <td><?php echo $row['ART']; ?></td>
                <td><?php echo $row['Vacunas']; ?></td>
                <td><a href="actualizardocu.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                  <?php } ?>
                    <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div>
            <img  src= "icon/businesswomen-team-high-five-m-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
          </div>
        </div>
        <div class="clearfix"></div>
              </div>
              


<?php
  $chartSQL = "SELECT 
                SUM(CASE WHEN entre.CopiaDni IS NOT NULL AND entre.CopiaDni NOT LIKE '%0%' THEN 1 ELSE 0 END) as DniCount,
                SUM(CASE WHEN entre.ConstanciaServ IS NOT NULL AND entre.ConstanciaServ NOT LIKE '%0%' THEN 1 ELSE 0 END) as ConstanciaCount,
                SUM(CASE WHEN entre.RegimenIncomp IS NOT NULL AND entre.RegimenIncomp NOT LIKE '%0%' THEN 1 ELSE 0 END) as RegimenCount,
                SUM(CASE WHEN entre.CertifDelitSex IS NOT NULL AND entre.CertifDelitSex NOT LIKE '%0%' THEN 1 ELSE 0 END) as DelitosCount,
                SUM(CASE WHEN entre.AptoPsicofis IS NOT NULL AND entre.AptoPsicofis NOT LIKE '%0%' THEN 1 ELSE 0 END) as AptoCount,
                SUM(CASE WHEN entre.ArtCarnet IS NOT NULL AND entre.ArtCarnet NOT LIKE '%0%' THEN 1 ELSE 0 END) as ARTCount,
                SUM(CASE WHEN entre.CopiaVac IS NOT NULL AND entre.CopiaVac NOT LIKE '%0%' THEN 1 ELSE 0 END) as VacunasCount,
                SUM(CASE WHEN entre.TituloDoc IS NOT NULL AND entre.TituloDoc NOT LIKE '%0%' THEN 1 ELSE 0 END) as TituloCount
            FROM entrega entre";
$chartResult = mysqli_query($MiConexion, $chartSQL);
$dniCount = 0;
  $constanciaCount = 0;
$regimenCount = 0;
  $delitosCount = 0;
$aptoCount = 0;
  $artCount = 0;
$vacunasCount = 0;
  $tituloCount = 0;
if ($chartRow = mysqli_fetch_assoc($chartResult)) {
    $dniCount = $chartRow['DniCount'];
    $constanciaCount = $chartRow['ConstanciaCount'];
    $regimenCount = $chartRow['RegimenCount'];
    $delitosCount = $chartRow['DelitosCount'];
    $aptoCount = $chartRow['AptoCount'];
    $artCount = $chartRow['ARTCount'];
    $vacunasCount = $chartRow['VacunasCount']; 
$tituloCount = $chartRow['TituloCount'];
  } 
?>


<h3 class="tile-title">Cantidades por Documentacion Presentada</h3>
<canvas id="pieChart" width="600" height="400"></canvas>   
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
     var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['CopiaDni', 'Constancia', 'Regimen', 'Delitos', 'Apto', 'ART', 'Vacunas', 'Titulo'],
                datasets: [{
                  label: 'Documentación entregada',
                    data: [
                        <?php echo $dniCount; ?>,
                        <?php echo $constanciaCount; ?>,
                        <?php echo $regimenCount; ?>,
                        <?php echo $delitosCount; ?>,
                        <?php echo $aptoCount; ?>,
                        <?php echo $artCount; ?>,
                        <?php echo $vacunasCount; ?>,
                        <?php echo $tituloCount; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(83, 220, 6, 0.8)',
                        'rgba(210, 23, 40, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    legend: {
                
            
display: true // Hide the legend for bar chart
            },
            
            
         scales: {
                
          
x: {
beginAtZero: true
                },
                
                },
       

             
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