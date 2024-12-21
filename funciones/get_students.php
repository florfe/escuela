<?php
if (isset($_POST['CursoId'])) {
  $cursoId = $_POST['CursoId'];
$alumnos="SELECT Id, Nombre, Apellido FROM alumnos order by Apellido";
 $output = '';
  $lista = mysqli_query($MiConexion, $alumnos);
  while ($fila = mysqli_fetch_array($lista)) {
    $output .= '<tr>';
    
    $output .= '<td>' . $fila['Apellido'] . ', ' . $fila['Nombre'] . '</td>';
    // Add your radio buttons here
    $output .= '<td><input type="radio" value="Presente" name="Falta' . $grupo . '[]" checked></td>';
    // Add other radio buttons
    $output .= '</tr>';
    $grupo++;
  }

  echo $output;
}
?>
