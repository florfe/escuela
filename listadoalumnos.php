<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$alumnos="SELECT doc.Id, doc.Nombre, doc.Apellido, doc.NumeroDni, doc.Cuil, doc.FechaNacimiento, doc.Edad, doc.NumeroTel
        FROM alumnos doc";

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
    background-color: rgba(81, 140, 5, 0.5); /* Change the background color of the header */
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
         
          <p>Listado total de alumnos</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de alumnos</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Alumnos </h3>
            <div class="table-responsive">
              <table id="docentesTable" class="table">
                <thead>
                  <tr>
                    <!--<th>#</th>-->
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dni</th>
                    <th>Cuil</th>
                    <th>FechaNacimiento</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                     <th></th>
                  </tr>
                </thead>
               
                <tbody>
                 <?php
                 $resultado=mysqli_query($MiConexion, $alumnos); 
                 while($row=mysqli_fetch_assoc($resultado))
               
                  { ?>
                  <tr > 
                  <!--<td><?php echo $row['Id']; ?></td>-->
                  <td><?php echo $row['Nombre']; ?></td>
                  <td><?php echo $row['Apellido']; ?></td>
                  <td><?php echo $row['NumeroDni']; ?></td>
                  <td><?php echo $row['Cuil']; ?></td>
                  <td><?php echo $row['FechaNacimiento']; ?></td>
                  <td><?php echo $row['Edad']; ?></td>
                  <td><?php echo $row['NumeroTel']; ?></td>
                  <td><a href="actualizaralumnos.php?id=<?php echo $row['Id']; ?>">Actualizar datos...</a></td>
                  </tr>
                  <?php } ?>
                  <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div><img  src= "icon/group-walk-in-circle-md-nwm-v2-unscreen.gif" style="width:10%; position: absolute; right: 1%" />
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
       <h3 class="tile-title">Cantidad Alumnos por Edad</h3>
              <canvas id="ageChart" width="400" height="200"></canvas>
              <?php
$ages = array();
$resultado = mysqli_query($MiConexion, $alumnos);

while ($row = mysqli_fetch_assoc($resultado)) {
    
    
$ages[] = $row['Edad'];
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
    <!-- Page specific javascripts-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
   

    // Get the ages from PHP
    var agesData = <?php echo json_encode($ages); ?>;

    // Count the occurrences of each age
    var ageCounts = {};
    agesData.forEach(function (age) {
        ageCounts[age] = (ageCounts[age] || 0) + 1;
    });

    // Prepare data for Chart.js
    var labels = Object.keys(ageCounts);
    var data = labels.map(function (age) {
        return ageCounts[age];
    });

    // Create a bar chart
    var ctx = document.getElementById('ageChart').getContext('2d');
    var ageChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Alumnos',
                data: data,
                backgroundColor: 'rgba(81, 140, 5, 0.5)',
                borderColor: 'rgba(81, 140, 5, 1)',
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
  </body>
</html>