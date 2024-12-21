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
            <li><a class="app-menu__item active" href="principalcursos.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Cursos</span></a></li>
<li><a class="app-menu__item" href="registrarcursos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registro de Cursos</span></a></li>
           
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Materias y  Horarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">

               <li><a class="treeview-item" href="registrarhorarios.php"><i class="icon fa fa-circle-o"></i> Ciclo Basico T.M.</a></li>  
           
 <li><a class="treeview-item" href="registrarhorarios2.php"><i class="icon fa fa-circle-o"></i> Ciclo Basico T.T.</a></li>  

 <li><a class="treeview-item" href="registrarhorarios3.php"><i class="icon fa fa-circle-o"></i> Ciclo Orientado T.M.</a></li>  

 <li><a class="treeview-item" href="registrarhorarios4.php"><i class="icon fa fa-circle-o"></i> Ciclo Orientado T.T.</a></li>  

</ul>
            </li>
          <li><a class="app-menu__item" href="buscadorcursos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Consultar Cursos</span></a></li>

                
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
            <li><a class="treeview-item" href="listadoporcursos.php"><i class="icon fa fa-circle-o"></i> Listado de cursos</a></li>
           
            
           
            <li><a class="treeview-item" href="listadocursosyhorarios.php"><i class="icon fa fa-circle-o"></i>Listado horarios y  materias</a></li>            
           
              </ul>
            </li>

               <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Registros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
            <li><a class="treeview-item" href="libreton.php"><i class="icon fa fa-circle-o"></i> Libreton por curso</a></li>
           
            <li><a class="treeview-item" href="libretasporcursos.php"><i class="icon fa fa-circle-o"></i> Libreta por curso</a></li>
           
            <li><a class="treeview-item" href="libroaula.php"><i class="icon fa fa-circle-o"></i>Libro de aula</a></li>            
           
           <li><a class="treeview-item" href="asistenciacursos.php"><i class="icon fa fa-circle-o"></i> Planilla de asistencia por cursos</a></li>
           
              </ul>
            </li>
          </ul>
      </aside>
    <!-- fin Sidebar menu-->