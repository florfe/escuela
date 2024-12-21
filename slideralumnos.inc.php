 <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="img/team/<?php echo $_SESSION['Usuario_Imagen']; ?>" >
          <div>
            <p class="app-sidebar__user-name">
              <?php echo $_SESSION['Usuario_Nombre']; ?></p>
               <p class="app-sidebar__user-name">
              <?php echo $_SESSION['Usuario_Apellido']; ?></p>

            <?php if($_SESSION['Usuario_Area']== 1) { ; ?>
          <p class="app-sideba__user-designation"> Secretaria </p>
        <?php } else if($_SESSION['Usuario_Area']== 2) { ; ?>
          <p class="app-sideba__user-designation"> Prosecretaria </p>
           <?php } else if($_SESSION['Usuario_Area']== 3) { ; ?>
          <p class="app-sideba__user-designation"> Coordinador/a </p>
           <?php } else if($_SESSION['Usuario_Area']== 4) { ; ?>
          <p class="app-sideba__user-designation"> Despacho de Alumnos </p>
        <?php } else if($_SESSION['Usuario_Area']== 5) { ; ?>
          <p class="app-sideba__user-designation"> Preceptor/a </p>
 <?php } else if($_SESSION['Usuario_Area']== 6) { ; ?>
          <p class="app-sideba__user-designation"> Administrador/a </p>
        <?php } ?>

          </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="principalalumnos.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Alumnos</span></a></li>
    
            <li><a class="app-menu__item" href="cargaalumnos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Datos Personales</span></a></li>

            <li><a class="app-menu__item" href="cargaalumnos2.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Datos Académicos</span></a></li>


            <li><a class="app-menu__item" href="cargaalumnos3.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Documentación</span></a></li>
             <li><a class="app-menu__item" href="cargartutor.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Cargar Tutor</span></a></li>

             <li><a class="app-menu__item" href="asistenciaalum2.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Asistencia Alumnos</span></a></li>

                  <li><a class="app-menu__item" href="notasprimera.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Notas Alumnos</span></a></li>
 
                <li><a class="app-menu__item" href="examenalumnos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Exámen Alumnos</span></a></li>

               <li><a class="app-menu__item" href="buscadoralumnos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Buscar Alumnos</span></a></li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 
            <li><a class="treeview-item" href="listadoalumnos.php"><i class="icon fa fa-circle-o"></i> Listado total  de Alumnos</a></li>
           
            <li><a class="treeview-item" href="listadoalumcursos.php"><i class="icon fa fa-circle-o"></i> Listado de Alumnos por cursos</a></li>
            
           
                <li><a class="treeview-item" href="listadodocumenalum.php"><i class="icon fa fa-circle-o"></i>Listado de Documentacion de Alumnos</a></li>
                
            <li><a class="treeview-item" href="listadoasistenciaalum.php"><i class="icon fa fa-circle-o"></i>Listado de Asistencia de Alumnos</a></li>
            <li><a class="treeview-item" href="listadodiscapacidad.php"><i class="icon fa fa-circle-o"></i>Listado de Alumnos con Discapacidad</a></li>
             <li><a class="treeview-item" href="listadonotas.php"><i class="icon fa fa-circle-o"></i>Listado de Notas</a></li>
              </ul>
            </li>

<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Certificados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 
            <li><a class="treeview-item" href="constanciaalumnoreg.php"><i class="icon fa fa-circle-o"></i> Constancia Alumno Regular</a></li>
           
             <li><a class="treeview-item" href="libretasalumnos.php"><i class="icon fa fa-circle-o"></i> Libretas</a></li>
            
                       
            
              </ul>
            </li>

          </ul>
      </aside>
    <!-- fin Sidebar menu-->