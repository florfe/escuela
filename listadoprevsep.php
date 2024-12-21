<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$selectedCourse = isset($_GET['curso']) ? $_GET['curso'] : '';

$selectedFecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

$SQL = "SELECT col.Id as ID, col.Curso, col.Materia, col.Fecha, col.Hora, col.Docente, col.Docente2,  col.Docente3, doc.Id, doc.Apellido, doc.Nombre
FROM previasseptiembre as  col, docentes  as doc 
       WHERE col.Docente=doc.Id 
      
     " . ($selectedCourse ? "AND col.Curso = '$selectedCourse'" : "") . "
       
        " . ($selectedFecha ? "AND col.Fecha = '$selectedFecha'" : "") . "
        ORDER BY col.Curso, col.Fecha, col.Hora, col.Materia";


require_once 'header.inc.php'; 
?>

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
<?php require_once 'menu.inc.php'; ?>
<?php require_once 'user.inc.php'; ?>
  </header>
  <!-- Sidebar menu-->
  <?php require_once 'sliderexamen.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
         
          <p>Listado total de previas</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de previas</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Previas Septiembre</h3>
            <div class="table-responsive">
               <form method="GET">
                <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="curso" class="control-label">Filtrar por Curso:</label>
                            <select class="form-control form-control-user" style="width: 20%" name="curso" id="curso" onchange="this.form.submit()">
                                <option value="" <?php echo ($selectedCourse == '') ? 'selected' : ''; ?>>Todos</option>
                                <?php
                                $coursesQuery = "SELECT DISTINCT Curso FROM previasseptiembre";
                                $coursesResult = mysqli_query($MiConexion, $coursesQuery);
                                while ($courseRow = mysqli_fetch_assoc($coursesResult)) {
                                    echo "<option value='{$courseRow['Curso']}' " . ($selectedCourse == $courseRow['Curso'] ? 'selected' : '') . ">{$courseRow['Curso']}</option>";
                                }
                                ?>
                            </select>
</div>

 <div class="col-sm-6 mb-3 mb-sm-0">
 <label for="fecha" class="control-label">Filtrar por Fecha:</label>
  <input class="form-control form-control-user" style="width: 20%" type="date" name="fecha" id="fecha" value="<?php echo $selectedFecha; ?>" min="2023-09-01" max="2023-11-01" onchange="this.form.submit()">

 </div></div>
                        </form>
                        <br></br>
              <table class="table">
                <thead>
                            <tr>
                   <!--<th>#</th>-->
                     <th>Curso</th>
                   
                    <th>Materia</th>
                     <th>Fecha</th>
                    <th>Hora</th>
                         <th></th>
                  </tr>
                </thead>
               
                <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                
                  { ?>
                  <tr > 
                   <!--<td><?php echo $row['Id']; ?></td>-->
                  <td><?php echo $row['Curso']; ?></td>
                   
                     <td><?php echo $row['Materia']; ?></td>
                      <td><?php echo $row['Fecha']; ?></td>
                       <td><?php echo $row['Hora']; ?></td>
                    <td><a href="actualizarpreviasseptiembre.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                 
               
                 
                  </tr>
                  <?php } ?>
                   <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div><img  src= "icon/7094dd1f0f370aa4afbb0b688a0f2a-unscreen.gif" style="width:15%; position: absolute; right: 8%" />
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
      <h3 class="tile-title">Cantidad Total de Coloquios por Fecha</h3>
 <canvas id="myChart" width="800" height="600"></canvas>
          <?php
$chartQuery = "SELECT Fecha, COUNT(*) as cantidad FROM previasseptiembre GROUP BY Fecha";
$chartResult = mysqli_query($MiConexion, $chartQuery);

// Convertir los datos a un formato adecuado para el gráfico
$chartData = [];
while ($chartRow = mysqli_fetch_assoc($chartResult)) {
    $chartRow['Fecha'] = date('Y-m-d', strtotime($chartRow['Fecha']));
    $chartData[] = $chartRow;
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
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Obtener los datos de PHP y convertirlos a un objeto JavaScript
    var rawData = <?php echo json_encode($chartData); ?>;

    // Extraer fechas y contar la cantidad de coloquios para cada fecha
    var dateCountMap = {};
    rawData.forEach(function (row) {
        var fecha = row['Fecha'];
        dateCountMap[fecha] = row['cantidad'];
    });

    // Convertir el objeto de recuento a dos arreglos (fechas y recuentos)
    var dates = Object.keys(dateCountMap);
    var counts = Object.values(dateCountMap);

    // Crear el contexto del gráfico
    var ctx = document.getElementById('myChart').getContext('2d');

    // Configurar y dibujar el gráfico de torta (pie chart)
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates,
            datasets: [{
                data: counts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)',
                    'rgba(255, 255, 102, 0.8)',
                    // Add more colors as needed
                ],
            }]
        },
        options: {responsive: false,
            title: {
                display: true,
                text: 'Previas por Fecha'
            }
        }
    });
});
</script>
  </body>
</html>
  </body>
</html>
  </body>
</html>