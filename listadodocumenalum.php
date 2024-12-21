<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$SQL = "SELECT doc.Id  as ID, doc.Apellido, doc.Nombre, entre.CopiaDni, entre.DniTutor, entre.Partida, entre.Vacunas, entre.CopiaCuil, entre.CuilTutor, entre.FichaMed, entre.SextoGrado as CertifSexto, entre.ConstanciaDoc, entre.Provi as Provisorio, entre.Definitivo
        FROM alumnos doc, entregaalum entre
        Where doc.Id=entre.IdAlumnos
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
  <?php require_once 'slideralumnos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
 <p>Listado de documentación alumnos</p>
    </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado documentación alumnos</a></li>
          </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Documentación</h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                   <th>Nombre</th>
                    <th>Apellido</th>
                   <th>CopiaDni</th>
                  <th>DniTutor</th>
                     <th>Partida</th>
                      <th>Vacunas</th>
                       <th>CopiaCuil</th>
                  <th>CuilTutor</th>
                     <th>FichaMed</th>
                      <th>CertifSexto</th>
                       <th>ConstanciaDoc</th>
                     <th>Provisorio</th>
                      <th>Definitivo</th>
                       <th></th>
                  </tr>
                </thead>
               <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                { ?>
                  <tr> 
                  <td><?php echo $row['Nombre']; ?></td>
                   <td><?php echo $row['Apellido']; ?></td>
                 <td><?php echo $row['CopiaDni']; ?></td>
                  <td><?php echo $row['DniTutor']; ?></td>
                <td><?php echo $row['Partida']; ?></td>
                <td><?php echo $row['Vacunas']; ?></td>
               <td><?php echo $row['CopiaCuil']; ?></td>
                  <td><?php echo $row['CuilTutor']; ?></td>
                <td><?php echo $row['FichaMed']; ?></td>
                <td><?php echo $row['CertifSexto']; ?></td>
                <td><?php echo $row['ConstanciaDoc']; ?></td>
                <td><?php echo $row['Provisorio']; ?></td>
                <td><?php echo $row['Definitivo']; ?></td>
                <td><a href="actualizardocualum.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                  </tr>
                  <?php } ?>
                   <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div><img  src= "icon/carrying-loads-of-boxes-md-nwm-unscreen.gif" style="width:15%; position: absolute; right: 5%" />
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
<?php
  $chartSQL = "SELECT 
                SUM(CASE WHEN entre.CopiaDni IS NOT NULL AND entre.CopiaDni NOT LIKE '%0%' THEN 1 ELSE 0 END) as DniCount,
                SUM(CASE WHEN entre.DniTutor IS NOT NULL AND entre.DniTutor NOT LIKE '%0%' THEN 1 ELSE 0 END) as DniTutorCount,
                SUM(CASE WHEN entre.Partida IS NOT NULL AND entre.Partida NOT LIKE '%0%' THEN 1 ELSE 0 END) as PartidaCount,
                SUM(CASE WHEN entre.Vacunas IS NOT NULL AND entre.Vacunas NOT LIKE '%0%' THEN 1 ELSE 0 END) as VacunasCount,
                SUM(CASE WHEN entre.CopiaCuil IS NOT NULL AND entre.CopiaCuil NOT LIKE '%0%' THEN 1 ELSE 0 END) as CopiaCuilCount,
                SUM(CASE WHEN entre.CuilTutor IS NOT NULL AND entre.CuilTutor NOT LIKE '%0%' THEN 1 ELSE 0 END) as CuilTutorCount,
                SUM(CASE WHEN entre.FichaMed IS NOT NULL AND entre.FichaMed NOT LIKE '%0%' THEN 1 ELSE 0 END) as FichaMedCount,
                SUM(CASE WHEN entre.SextoGrado IS NOT NULL AND entre.SextoGrado NOT LIKE '%0%' THEN 1 ELSE 0 END) as SextoGradoCount,
                SUM(CASE WHEN entre.ConstanciaDoc IS NOT NULL AND entre.ConstanciaDoc NOT LIKE '%0%' THEN 1 ELSE 0 END) as ConstanciaDocCount,
 SUM(CASE WHEN entre.Provi IS NOT NULL AND entre.Provi NOT LIKE '%0%' THEN 1 ELSE 0 END) as ProviCount,
 SUM(CASE WHEN entre.Definitivo IS NOT NULL AND entre.Definitivo NOT LIKE '%0%' THEN 1 ELSE 0 END) as DefinitivoCount
FROM entregaalum entre";
$chartResult = mysqli_query($MiConexion, $chartSQL);
$dniCount = 0;
  $dniTutorCount = 0;
$partidaCount = 0;
  $vacunasCount = 0;
$copiaCuilCount = 0;
  $cuilTutorCount = 0;
$fichaMedCount = 0;
  $sextoGradoCount = 0;
$constanciaDocCount=0;
$proviCount=0;
  $definitivoCount=0;
if ($chartRow = mysqli_fetch_assoc($chartResult)) {
    $dniCount = $chartRow['DniCount'];
    $dniTutorCount = $chartRow['DniTutorCount'];
    $partidaCount = $chartRow['PartidaCount'];
    $vacunasCount = $chartRow['VacunasCount'];
    $copiaCuilCount = $chartRow['CopiaCuilCount'];
    $cuilTutorCount = $chartRow['CuilTutorCount'];
    $fichaMedCount = $chartRow['FichaMedCount']; 
$sextoGradoCount = $chartRow['SextoGradoCount'];
$constanciaDocCount = $chartRow['ConstanciaDocCount'];
$proviCount = $chartRow['ProviCount'];
$definitivoCount = $chartRow['DefinitivoCount'];
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
                labels: ['CopiaDni', 'DniTutor', 'Partida', 'Vacunas', 'CopiaCuil', 'CuilTutor', 'FichaMed', '6Grado', 'Constancia', 'Provi', 'Definitivo'],
                datasets: [{
                  label: 'Documentación entregada',
                    data: [
                        <?php echo $dniCount; ?>,
                        <?php echo $dniTutorCount; ?>,
                        <?php echo $partidaCount; ?>,
                        <?php echo $vacunasCount; ?>,
                        <?php echo $copiaCuilCount; ?>,
                        <?php echo $cuilTutorCount; ?>,
                        <?php echo $fichaMedCount; ?>,
                         <?php echo $sextoGradoCount; ?>,
                          <?php echo $constanciaDocCount; ?>,
                           <?php echo $proviCount; ?>,
                            <?php echo $definitivoCount; ?>
],
backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(83, 220, 6, 0.8)',
                        'rgba(210, 23, 40, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)'
                        
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
</body>
</html>