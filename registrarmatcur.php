<?php
  session_start();
if(empty($_SESSION['Usuario_Nombre'])){
   header('location: cerrarsesion.php');
      exit;
}
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();

$variable=$_GET['Id'];
$cursos = "SELECT hor.Id, hor.IdCurso, hor.Hora, hor.Dia, hor.Horario_ingreso, hor.Horario_salida, hor.Materia, comp.Id as ID, comp.Curso, comp.Division, comp.Turno
        FROM hora hor, cursoscompletos comp

        WHERE comp.Id='$variable' and comp.Id=hor.IdCurso";


require_once 'funciones/actualizaralumnoscursos.php'; 
$Mensaje= '';
$Estilo= 'danger';
if(!empty($_POST['BotonRegistrar'])) {
if(empty($Mensaje)){
  if(ActualizarAlumnos($MiConexion)!= false) {
    $Mensaje= 'Alumno actualizado!';
    $_POST= array();
   $Estilo='success';
    

}}}


 require_once 'header.inc.php'; 
 ?>
 
</head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once 'menu.inc.php'; ?>
    <?php require_once 'user.inc.php'; ?>
      </header>
    <!-- Sidebar menu-->
     <?php require_once 'slidercursos.inc.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Actualizar</h1>
          <p>Completa todos los datos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Actualizar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ciclo Basico</h3>
               
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post">

    <HR></HR>
 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Turno Mañana</h3>
            <div class="table-responsive">
              <table border="1">
                <thead>
              <tr>
              <th colspan="4" style="background-color: yellow; text-align: center;"></th>
                <th colspan="4" style="background-color: yellow; text-align: center;">
                 <!-- <input type="text" style="border:0" name="Curso" value="<?php echo $row['Curso']; ?>">-->
                  
                </th>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
              </tr>
              <tr>
                <th style="background-color: cyan; text-align: center;">HORARIO</th>
                
                <?php
                $lista=mysqli_query($MiConexion, $cursos); 
                while ($row = mysqli_fetch_array($lista) )
                { ?>
                 
                <th name="dia" id="dia"colspan="2" style="background-color: cyan; text-align: center;" >
                  <input type="text" style="border:0" name="Dia" value="<?php echo $row['Dia']; ?>">
                </th>
               
              <?php } ?>
              </tr>
              </thead>
              <tbody>
                <?php
                $lista=mysqli_query($MiConexion, $cursos); 
                while ($row = mysqli_fetch_array($lista) )
                { ?>
              <tr>

               <input type="hidden"  name="id" value="<?php echo $row['Id']; ?>">
                <th style="background-color: cyan; text-align: center;">
                  <input type="text" style="border:0" name="Horario_ingreso" value="<?php echo $row['Horario_ingreso']; ?>">
                   <input type="text" style="border:0" name="Horario_salida" value="
                <?php echo $row['Horario_salida']; ?>">
              </th>
                  
                  
               
                <td > <input type="text" style="border:0" name="Hora" value="
                <?php echo $row['Hora']; ?>"> </td>
               
             

                <td>  <input type="text" style="border:0" name="Materias" value="
                <?php echo $row['Materias']; ?>">
                </td>

                 <td ><input type="text" style="border:0" name="Hora" value="
                <?php echo $row['Hora']; ?>"></td>
                <td> <input type="text" style="border:0" name="Materias" value="
                <?php echo $row['Materias']; ?>">
                </td>
    <td ><input type="text" style="border:0" name="Hora" value="
                <?php echo $row['Hora']; ?>"></td>
                <td> <input type="text" style="border:0" name="Materias" value="
                <?php echo $row['Materias']; ?>">
                </td>
                  <td ><input type="text" style="border:0" name="Hora" value="
                <?php echo $row['Hora']; ?>"></td>
                <td> <input type="text" style="border:0" name="Materias" value="
                <?php echo $row['Materias']; ?>">
                </td>
                <td ><input type="text" style="border:0" name="Hora" value="
                <?php echo $row['Hora']; ?>"></td>
                <td> <input type="text" style="border:0" name="Materias" value="
                <?php echo $row['Materias']; ?>">
                 <?php } ?>
                </td>
              </tr>
          </tbody>
          </table><img  src= "icon/dog-sitting-down-md-nwm-v2-unscreen.gif" style="width:11%; position: absolute; right:1%" />
          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarmatcur.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
         </div>
       </div>
     </div>
   </div>
       </form>

  <HR></HR>
 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Turno  Tarde</h3>
            <div class="table-responsive">
              <table border="1">
                <thead>
              <tr>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
                <th colspan="4" style="background-color: yellow; text-align: center;">
                  <select name="IdCurso" class="form-control form-control-user" id="idCurso" >
                  <option value="" >Selecciona...</option>
                  <?php for($i=0;$i<$CantidadCurso2;$i++) {
                  if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso2[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoCurso2[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso2[$i]['CURSO'], $ListadoCurso2[$i]['DIVISION'], $ListadoCurso2[$i]['TURNO']?></option>
                  <?php } ?>
                  </select> 
                </th>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
              </tr>
              <tr>
                <th style="background-color: cyan; text-align: center;">HORARIO</th>
                
                <?php
                $lista=mysqli_query($MiConexion, $cursos3); 
                while ($fila = mysqli_fetch_array($lista) )
                { ?>
                 
                <th id="dia"colspan="2" style="background-color: cyan; text-align: center;" ><?php echo $fila['Dia']; ?></th>
               
              <?php } ?>
              </tr>
              </thead>
              <tbody>
                <?php
               $lista=mysqli_query($MiConexion, $cursos2);
                
                while ($fila = mysqli_fetch_array($lista)  )
                  { ?>
              <tr>
                <th style="background-color: cyan; text-align: center;"> <?php echo $fila['Horario_ingreso']; ?>
                <?php echo $fila['Horario_salida']; ?></th>
                
               <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMaterias;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMaterias[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMaterias[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                   <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMaterias;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMaterias[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMaterias[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMaterias;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMaterias[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMaterias[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
 <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMaterias;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMaterias[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMaterias[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                 <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMaterias;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMaterias[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMaterias[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMaterias[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                  <?php } ?>
                </td>
              </tr>
          </tbody>
          </table><img  src= "icon/on-the-trail-sniffing-md-nwm-v-unscreen.gif" style="width:12%; position: absolute; right:1%" />
          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar1" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarmatcur.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
         </div>
       </div>
     </div>
   </div>
       </form>
       </div>
   </div>
 </div>
</div>

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ciclo  Orientado</h3>
               
            <div class="tile-body">
              <!-- formulario  registro-->
             <form class="user" method="post">

    <HR></HR>
 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Turno  Mañana</h3>
            <div class="table-responsive">
              <table border="1">
                <thead>
              <tr>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
                <th colspan="4" style="background-color: yellow; text-align: center;">
                  <select name="IdCurso" class="form-control form-control-user" id="idCurso" >
                  <option value="" >Selecciona...</option>
                  <?php for($i=0;$i<$CantidadCurso3;$i++) {
                  if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso3[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoCurso3[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso3[$i]['CURSO'], $ListadoCurso3[$i]['DIVISION'], $ListadoCurso3[$i]['TURNO']?></option>
                  <?php } ?>
                  </select> 
                </th>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
              </tr>
              <tr>
                <th style="background-color: cyan; text-align: center;">HORARIO</th>
                
                <?php
                $lista=mysqli_query($MiConexion, $cursos3); 
                while ($fila = mysqli_fetch_array($lista) )
                { ?>
                 
                <th id="dia"colspan="2" style="background-color: cyan; text-align: center;" ><?php echo $fila['Dia']; ?></th>
               
              <?php } ?>
              </tr>
              </thead>
              <tbody>
                <?php
               
                $lista=mysqli_query($MiConexion, $cursos); 
                while ($fila = mysqli_fetch_array($lista) )
                { ?>
              <tr>
                <th style="background-color: cyan; text-align: center;"> <?php echo $fila['Horario_ingreso']; ?>
                <?php echo $fila['Horario_salida']; ?></th>
            <td id="hora"><?php echo $fila['Id']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
               <td id="hora"><?php echo $fila['Id']; ?></td>
                <td><select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                <td id="hora"><?php echo $fila['Id']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                 <td id="hora"><?php echo $fila['Id']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select>  
                </td>
                   <td id="hora"><?php echo $fila['Id']; ?></td>
                <td><select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                  <?php } ?>
                </td>
              </tr>

          </tbody>
          </table><img  src= "icon/dog-running-md-nwm-v2-unscreen.gif" style="width:12%; position: absolute; right:1%" />
          <div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar2" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarmatcur.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
         </div>
       </div>
     </div>
   </div>
       </form>

  <HR></HR>
 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Turno  Tarde</h3>
            <div class="table-responsive">
              <table border="1">
                <thead>
              <tr>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
                <th colspan="4" style="background-color: yellow; text-align: center;">
                  <select name="IdCurso" class="form-control form-control-user" id="idCurso" >
                  <option value="" >Selecciona...</option>
                  <?php for($i=0;$i<$CantidadCurso4;$i++) {
                  if(!empty($_POST['Curso'])&& $_POST['Curso']==  $ListadoCurso4[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoCurso4[$i]['ID'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoCurso4[$i]['CURSO'], $ListadoCurso4[$i]['DIVISION'], $ListadoCurso4[$i]['TURNO']?></option>
                  <?php } ?>
                  </select> 
                </th>
                <th colspan="4" style="background-color: yellow; text-align: center;"></th>
              </tr>
              <tr>
                <th style="background-color: cyan; text-align: center;">HORARIO</th>
                
                <?php
                $lista=mysqli_query($MiConexion, $cursos3); 
                while ($fila = mysqli_fetch_array($lista) )
                { ?>
                 
                <th id="dia"colspan="2" style="background-color: cyan; text-align: center;" ><?php echo $fila['Dia']; ?></th>
               
              <?php } ?>
              </tr>
              </thead>
              <tbody>
                <?php
               
                $lista=mysqli_query($MiConexion, $cursos2); 
                while ($fila = mysqli_fetch_array($lista) )
                { ?>
              <tr>
                <th style="background-color: cyan; text-align: center;"> <?php echo $fila['Horario_ingreso']; ?>
                <?php echo $fila['Horario_salida']; ?></th>
               <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                   <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                  <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                  <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                </td>
                <td id="hora"><?php echo $fila['Denominacion']; ?></td>
                <td> <select name="Materias" class="form-control form-control-user" id="materias">
                  <option value="" >Selecciona...</option>
                  <?php 
                  for($i=0;$i<$CantidadMateriasori;$i++) {
                  if(!empty($_POST['Materia'])&& $_POST['Materia']==  $ListadoMateriasori[$i]['ID']){
                  $selected='selected';}
                  else{
                  $selected='';
                  }
                  ?>
                  <option value="<?php echo $ListadoMateriasori[$i]['NOMBRE'];  ?>" <?php echo $selected; ?> ><?php echo $ListadoMateriasori[$i]['NOMBRE' ]; ?></option>
                  <?php } ?>
                  </select> 
                  <?php } ?>
                </td>
              </tr>

          </tbody>

          </table><img  src= "icon/dog-sniffing-footprint-trail-m-unscreen.gif" style="width:20%; position: absolute; right:1%" />
<div class="tile-footer">
    <button class="btn btn-primary" type="submit" name="BotonRegistrar3" value="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registrarmatcur.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
         </div>
       </div>
     </div>
   </div>

       </form>



     </div>
   </div>
 </div>
</div>
</main>
  <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
     </body>
</html>