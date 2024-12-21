<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
$alumnos="SELECT al.Id as ID, al.Nombre, al.Apellido,
cc.Id, cc.Curso, cc.Division, cc.Turno, pri.Id as IID,
pri.IdAlumnos, pri.Materias as Materia, pri.Curso as CC,  
pri.Eval1Nota, pri.Eval1Recup1, pri.Eval1Recup2,
pri.Eval2Nota, pri.Eval2Recup1, pri.Eval2Recup2,
pri.Eval3Nota, pri.Eval3Recup1, pri.Eval3Recup2,
pri.Eval4Nota, pri.Eval4Recup1, pri.Eval4Recup2,
pri.Jis1Nota, pri.Jis1Recup, 
pri.Eval5Nota, pri.Eval5Recup1, pri.Eval5Recup2,
pri.Eval6Nota, pri.Eval6Recup1, pri.Eval6Recup2,
pri.Eval7Nota, pri.Eval7Recup1, pri.Eval7Recup2,
pri.Eval8Nota, pri.Eval8Recup1, pri.Eval8Recup2,
pri.Jis2Nota, pri.Jis2Recup,
pri.ColoqDiciembre, pri.ColoqFebrero
FROM alumnos al, notas pri, cursoscompletos cc
WHERE al.Id = pri.IdAlumnos AND cc.Id = pri.Curso 
ORDER BY al.IdCurso, al.IdDivision, al.IdTurno, pri.Materias, al.Apellido, al.Nombre";
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
<?php require_once 'menu.inc.php'; ?>
<?php require_once 'user.inc.php'; ?>
  </header>
  <?php require_once 'slideralumnos.inc.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
<p>Listado notas de alumnos</p>
</div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active">
            <a href="#">Listado notas de alumnos</a></li>
          </ul>
      </div>
      <div class="row" >
                <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Notas de Alumnos </h3>
            <div class="table-responsive">
<table id="docentesTable" class="table" >
                <thead>
                  <tr>
                   <th>Alumno</th>
                   <th>Curso</th>
                   <th>Division</th>
                   <th>Turno</th>
                    <th>Materia</th>
                    <th>N1</th>
                    <th>R1</th>
                    <th>R2</th>
                      <th>N2</th>
                      <th>R1</th>
                      <th>R2</th>
                        <th>N3</th>
                        <th>R1</th>
                        <th>R2</th>
                          <th>N4</th>
                          <th>R1</th>
                          <th>R2</th>
                    <th>N5</th>
                    <th>R1</th>
                    <th>R2</th>
                      <th>N6</th>
                      <th>R1</th>
                      <th>R2</th>
                        <th>N7</th>
                        <th>R1</th>
                        <th>R2</th>
                          <th>N8</th>
                          <th>R1</th>
                          <th>R2</th>
                          <th>J1</th>
                            <th>R1</th>
                            <th>J2</th>
                            <th>R1</th>
                             <th>D</th>
                            <th>F</th>
                            <th></th>
                      
                  </tr>
</thead>
<tbody >
<?php
$resultado=mysqli_query($MiConexion, $alumnos); 
while($row=mysqli_fetch_assoc($resultado))
{ ?>
  <tr > 
  <td><?php echo $row['Apellido']; ?><?php echo $row['Nombre']; ?></td>
  <td><?php echo $row['Curso']; ?></td>
  <td><?php echo $row['Division']; ?></td>
  <td><?php echo $row['Turno']; ?></td>
 <td><input type="hidden" name="Materia[]" value="<?php echo $row['Materia']; ?>"><?php echo $row['Materia']; ?></td>
    <td ><?php echo $row['Eval1Nota']; ?></td>
    <td><?php echo $row['Eval1Recup1']; ?></td>
    <td <?php if (!empty($row['Eval1Recup2']) && $row['Eval1Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval1Recup2']; ?></td>
      <td><?php echo $row['Eval2Nota']; ?></td>
      <td><?php echo $row['Eval2Recup1']; ?></td>
       <td <?php if (!empty($row['Eval2Recup2']) && $row['Eval2Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval2Recup2']; ?></td>
        <td><?php echo $row['Eval3Nota']; ?></td>
        <td><?php echo $row['Eval3Recup1']; ?></td>
         <td <?php if (!empty($row['Eval3Recup2']) && $row['Eval3Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval3Recup2']; ?></td>
          <td><?php echo $row['Eval4Nota']; ?></td>
          <td><?php echo $row['Eval4Recup1']; ?></td>
          <td <?php if (!empty($row['Eval4Recup2']) && $row['Eval4Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval4Recup2']; ?></td>
    <td><?php echo $row['Eval5Nota']; ?></td>
    <td><?php echo $row['Eval5Recup1']; ?></td>
    <td <?php if (!empty($row['Eval5Recup2']) && $row['Eval5Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval5Recup2']; ?></td>
      <td><?php echo $row['Eval6Nota']; ?></td>
      <td><?php echo $row['Eval6Recup1']; ?></td>
       <td <?php if (!empty($row['Eval6Recup2']) && $row['Eval6Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval6Recup2']; ?></td>
        <td><?php echo $row['Eval7Nota']; ?></td>
        <td><?php echo $row['Eval7Recup1']; ?></td>
        <td <?php if (!empty($row['Eval7Recup2']) && $row['Eval7Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval7Recup2']; ?></td>
          <td><?php echo $row['Eval8Nota']; ?></td>
          <td><?php echo $row['Eval8Recup1']; ?></td>
           <td <?php if (!empty($row['Eval8Recup2']) && $row['Eval8Recup2'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Eval8Recup2']; ?></td>
             <td><?php echo $row['Jis1Nota']; ?></td>
            <td <?php if (!empty($row['Jis1Recup']) && $row['Jis1Recup'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Jis1Recup']; ?></td>
            <td><?php echo $row['Jis2Nota']; ?></td>
            <td <?php if (!empty($row['Jis2Recup']) && $row['Jis2Recup'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['Jis2Recup']; ?></td>
 <td <?php if (!empty($row['ColoqDiciembre']) && $row['ColoqDiciembre'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['ColoqDiciembre']; ?></td>
<td <?php if (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] < 7) echo 'style="background-color: #C8343D; color: white"'; ?>><?php echo $row['ColoqFebrero']; ?></td>
 <td><a href="actualizarnotas.php?id=<?php echo $row['IID']; ?>">Actualizar datos...</a></td>
                  </tr>
                  
<?php } 
?>
<?php $row_cnt = $resultado->num_rows; ?>
<h4> Total: <?php echo ($row_cnt);?></h4>
</tbody>
</table>
            </div>
          </div><img  src= "icon/6CEx9WCvLwb-DX464-DY464-CX214--unscreen.gif" style="width:10%; position: absolute; right: 8%" />
        </div>
        <div class="clearfix"></div>
      </div>
<?php
 $aprobadosDiciembre = 0;
$reprobadosDiciembre = 0;
$aprobadosFebrero = 0;
$reprobadosFebrero = 0;
$resultado = mysqli_query($MiConexion, $alumnos);
while ($row = mysqli_fetch_assoc($resultado)) {
if (!empty($row['ColoqDiciembre']) && $row['ColoqDiciembre'] >= 6) {
$aprobadosDiciembre++;
    } 
    else {
$reprobadosDiciembre++;
    }
if (!empty($row['ColoqFebrero']) && $row['ColoqFebrero'] >= 6) {
$aprobadosFebrero++;
    } 
    else {
$reprobadosFebrero++;
    }

  }
 ?>
<h3 class="tile-title">Aprobados en Coloquios</h3>
<canvas id="aprobadosChart" width="600" height="400"></canvas>



    </main>
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
        $('#docentesTable').DataTable();
    });
</script>
<script>
var ctx = document.getElementById('aprobadosChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Aprobados Diciembre', 'Reprobados Diciembre', 'Aprobados Febrero', 'Reprobados Febrero'],
        datasets: [
            {
                label: 'Estadísticas de Aprobación',
                data: [
                    <?php echo $aprobadosDiciembre; ?>,
                    <?php echo $reprobadosDiciembre - $aprobadosDiciembre; ?>, 
                    <?php echo $aprobadosFebrero; ?>,
                    <?php echo $reprobadosFebrero - $aprobadosFebrero; ?>,
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Green for Aprobados Diciembre
                    'rgba(255, 99, 132, 0.2)', // Red for Reprobados Diciembre
                    'rgba(75, 192, 192, 0.2)', // Green for Aprobados Febrero
                    'rgba(255, 99, 132, 0.2)', // Red for Reprobados Febrero
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



    </body>
</html>