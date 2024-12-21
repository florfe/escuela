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
            <li><a class="app-menu__item active" href="principal.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Docentes</span></a></li>
                <li><a class="app-menu__item" href="cargadocentes.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Datos Personales</span></a></li>
            <li><a class="app-menu__item" href="cargadocentes2.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Datos Académicos</span></a></li>
            <li><a class="app-menu__item" href="cargadocentes3.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Datos Laborales</span></a></li>
            <li><a class="app-menu__item" href="cargadocentes4.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Documentación</span></a></li>
                <li><a class="app-menu__item" href="buscador.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Buscar Docentes</span></a></li>
                 <li><a class="app-menu__item" href="asistenciadoc.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Asistencia Docentes</span></a></li>
                <li><a class="app-menu__item" href="cargarConceptos.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Cargar Conceptos</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                             <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado total  de Docentes</a></li>
                       <li><a class="treeview-item" href="listadocursos.php"><i class="icon fa fa-circle-o"></i> Listado de Docentes Ciclo Básico por cursos</a></li>
            <li><a class="treeview-item" href="listadocursosori.php"><i class="icon fa fa-circle-o"></i> Listado de Docentes Ciclo Orientado por cursos</a></li>
             
                <li><a class="treeview-item" href="listadodocumen.php"><i class="icon fa fa-circle-o"></i>Listado de Documentación de Docentes</a></li>
                
            <li><a class="treeview-item" href="listadoasistencia.php"><i class="icon fa fa-circle-o"></i>Listado de Asistencia de Docentes</a></li>
              </ul>
            </li>

<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Certificados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 
            <li><a class="treeview-item" href="constancia.php"><i class="icon fa fa-circle-o"></i> Constancia General Docente</a></li>
           
            <li><a class="treeview-item" href="conceptos.php"><i class="icon fa fa-circle-o"></i> Conceptos Docentes</a></li>
            
                       
            
              </ul>
            </li>

          </ul>
      </aside>
    <!-- fin Sidebar menu-->