<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$selectedCourse = isset($_GET['curso']) ? $_GET['curso'] : '';
$selectedDivision = isset($_GET['division']) ? $_GET['division'] : '';
$selectedTurno = isset($_GET['turno']) ? $_GET['turno'] : '';
$selectedFecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

$SQL = "SELECT col.Id as ID, col.Curso, col.Division, col.Turno, col.Materia, col.Fecha, col.Hora, col.Docente, doc.Id, doc.Apellido, doc.Nombre
        FROM coloquiosdic as  col, docentes as  doc
       WHERE col.Docente=doc.Id
        " . ($selectedCourse ? "AND col.Curso = '$selectedCourse'" : "") . "
        " . ($selectedDivision ? "AND col.Division = '$selectedDivision'" : "") . "
        " . ($selectedTurno ? "AND col.Turno = '$selectedTurno'" : "") . "
        " . ($selectedFecha ? "AND col.Fecha = '$selectedFecha'" : "") . "
        ORDER BY col.Curso, col.Division, col.Turno, col.Fecha, col.Hora, col.Materia";

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
         
          <p>Listado total de coloquios</p>
   
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado total de coloquios</a></li>
          </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Coloquios Diciembre</h3><img  src= "icon/businessmen-greet-md-nwm-v2-unscreen.gif" style="width:15%; position: absolute; right: 4%" />
            <div class="table-responsive">
               <form method="GET">
                <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="curso" class="control-label">Filtrar por Curso:</label>
                            <select class="form-control form-control-user" style="width: 20%" name="curso" id="curso" onchange="this.form.submit()">
                                <option value="" <?php echo ($selectedCourse == '') ? 'selected' : ''; ?>>Todos</option>
                                <?php
                                $coursesQuery = "SELECT DISTINCT Curso FROM coloquiosdic";
                                $coursesResult = mysqli_query($MiConexion, $coursesQuery);
                                while ($courseRow = mysqli_fetch_assoc($coursesResult)) {
                                    echo "<option value='{$courseRow['Curso']}' " . ($selectedCourse == $courseRow['Curso'] ? 'selected' : '') . ">{$courseRow['Curso']}</option>";
                                }
                                ?>
                            </select>
</div>
<div class="col-sm-6 mb-3 mb-sm-0">

                            <label for="division" class="control-label">Filtrar por División:</label>
                            <select class="form-control form-control-user" style="width: 20%" name="division" id="division" onchange="this.form.submit()">
                                <option value="" <?php echo ($selectedDivision == '') ? 'selected' : ''; ?>>Todas</option>
                                <?php
                                // Fetch and display unique divisions from the database
                                $divisionsQuery = "SELECT DISTINCT Division FROM coloquiosdic";
                                $divisionsResult = mysqli_query($MiConexion, $divisionsQuery);
                                while ($divisionRow = mysqli_fetch_assoc($divisionsResult)) {
                                    echo "<option value='{$divisionRow['Division']}' " . ($selectedDivision == $divisionRow['Division'] ? 'selected' : '') . ">{$divisionRow['Division']}</option>";
                                }
                                ?>
                            </select>
                          </div>
                        </div>
 <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="turno"class="control-label">Filtrar por Turno:</label>
                            <select class="form-control form-control-user" style="width: 20%" name="turno" id="turno" onchange="this.form.submit()">
                                <option value="" <?php echo ($selectedTurno == '') ? 'selected' : ''; ?>>Todos</option>
                                <?php
                                // Fetch and display unique turnos from the database
                                $turnosQuery = "SELECT DISTINCT Turno FROM coloquiosdic";
                                $turnosResult = mysqli_query($MiConexion, $turnosQuery);
                                while ($turnoRow = mysqli_fetch_assoc($turnosResult)) {
                                    echo "<option value='{$turnoRow['Turno']}' " . ($selectedTurno == $turnoRow['Turno'] ? 'selected' : '') . ">{$turnoRow['Turno']}</option>";
                                }
                                ?>
                            </select>
</div>
 <div class="col-sm-6 mb-3 mb-sm-0">
 <label for="fecha" class="control-label">Filtrar por Fecha:</label>
  <input class="form-control form-control-user" style="width: 20%" type="date" name="fecha" id="fecha" value="<?php echo $selectedFecha; ?>" min="2023-12-01" max="2023-12-31" onchange="this.form.submit()">

 </div>
</div>


                        </form>
                        <br></br>
              <table class="table">
                <thead>
                  <tr>
                   
                     <th>Curso</th>
                    <th>Division</th>
                   <th>Turno</th>
                    <th>Materia</th>
                     <th>Fecha</th>
                    <th>Hora</th>
                    <th>Docente</th>
                    <th></th>
                  </tr>
                </thead>
               
                <tbody>
                <?php
                 $resultado=mysqli_query($MiConexion, $SQL); 
                 while($row=mysqli_fetch_assoc($resultado))
                
                  { ?>
                  <tr > 
                  
                  <td><?php echo $row['Curso']; ?></td>
                   <td><?php echo $row['Division']; ?></td>
                    <td><?php echo $row['Turno']; ?></td>
                     <td><?php echo $row['Materia']; ?></td>
                      <td><?php echo $row['Fecha']; ?></td>
                       <td><?php echo $row['Hora']; ?></td>
                  <td><?php echo $row['Apellido']; ?><?php echo $row['Nombre']; ?></td>
                  
                   <td><a href="actualizarcoloqdic.php?id=<?php echo $row['ID']; ?>">Actualizar datos...</a></td>
                 
               
               
                  </tr>
                  <?php } ?>

                    <?php $row_cnt = $resultado->num_rows; ?>
 <h4> Total: <?php echo ($row_cnt);?></h4>
                  </tbody>
              </table>
            </div>
          </div>
         
        </div>

        <div class="clearfix"></div>
        
      </div>
 <h3 class="tile-title">Cantidad Total de Coloquios por Fecha</h3>
 <canvas id="myChart" width="800" height="600"></canvas>
          <?php
$chartQuery = "SELECT Fecha, COUNT(*) as cantidad FROM coloquiosdic  GROUP BY Fecha";
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
                text: 'Coloquios por Fecha'
            }
        }
    });
});
</script>
  </body>
</html>