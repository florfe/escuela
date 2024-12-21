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
            <li><a class="app-menu__item active" href="principalmaterias.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Materias</span></a></li>
    
            <li><a class="app-menu__item" href="ciclobasico.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ciclo Basico</span></a></li>

            <li><a class="app-menu__item" href="cicloorientado.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ciclo Orientado</span></a></li>

            
            
                <li><a class="app-menu__item" href="buscadormaterias.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Buscar Materias</span></a></li>

                
               
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 
                 
            <li><a class="treeview-item" href="materias1.php"><i class="icon fa fa-circle-o"></i> Materias 1° Año</a></li>
            <li><a class="treeview-item" href="materias2.php"><i class="icon fa fa-circle-o"></i> Materias 2° Año</a></li>
            <li><a class="treeview-item" href="materias3.php"><i class="icon fa fa-circle-o"></i> Materias 3° Año</a></li>
            <li><a class="treeview-item" href="materias4.php"><i class="icon fa fa-circle-o"></i> Materias 4° Año</a></li>
            <li><a class="treeview-item" href="materias5.php"><i class="icon fa fa-circle-o"></i> Materias 5° Año</a></li>
            <li><a class="treeview-item" href="materias6.php"><i class="icon fa fa-circle-o"></i> Materias 6° Año</a></li>
            
            <li><a class="treeview-item" href="listadomateriasciclos.php"><i class="icon fa fa-circle-o"></i>Listado de Materias por ciclo</a></li>   
               
                
           
   
            
                       
            
              </ul>
            </li>

          </ul>
      </aside>
    <!-- fin Sidebar menu-->