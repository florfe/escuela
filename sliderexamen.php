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
            <li><a class="app-menu__item active" href="principalexamen.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Examen</span></a></li>

       
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Coloquios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
            <li><a class="treeview-item" href="coloquioscb.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Febrero</a></li>
           <li><a class="treeview-item" href="coloquiosco.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Febrero</a></li>    
            <li><a class="treeview-item" href="coloquioscbdic.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Diciembre</a></li>
                          <li><a class="treeview-item" href="coloquioscodic.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Diciembre</a></li>     

     
           
              </ul>
            </li>


<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Previas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
            <li><a class="treeview-item" href="previascbfeb.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Febrero</a></li>
           <li><a class="treeview-item" href="previascofeb.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Febrero</a></li>  
            <li><a class="treeview-item" href="previascbabril.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Abril</a></li>
           <li><a class="treeview-item" href="previascoabril.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Abril</a></li>  
            <li><a class="treeview-item" href="previascbjul.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Julio</a></li>
           <li><a class="treeview-item" href="previascojul.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Julio</a></li>  



             <li><a class="treeview-item" href="previascbsep.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Septiembre</a></li>
           <li><a class="treeview-item" href="previascosep.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Septiembre</a></li>  
            <li><a class="treeview-item" href="previascbdic.php"><i class="icon fa fa-circle-o"></i>Ciclo Basico Diciembre</a></li>
            <li><a class="treeview-item" href="previascodic.php"><i class="icon fa fa-circle-o"></i>Ciclo Orientado Diciembre</a></li>     

     
           
              </ul>
            </li>
   
           
           
          <li><a class="app-menu__item" href="buscadorexamen.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Consultar Examen</span></a></li>

                
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
            <li><a class="treeview-item" href="listado_coloquios.php"><i class="icon fa fa-circle-o"></i> Listado de coloquios Febrero</a></li>
           
            <li><a class="treeview-item" href="listado_coloquiosdic.php"><i class="icon fa fa-circle-o"></i> Listado de coloquios Diciembre</a></li>
           
            <li><a class="treeview-item" href="listadoprevfeb.php"><i class="icon fa fa-circle-o"></i>Listado previas Febrero</a></li>  
<li><a class="treeview-item" href="listadoprevabril.php"><i class="icon fa fa-circle-o"></i>Listado previas Abril</a></li> 

           <li><a class="treeview-item" href="listadoprevjul.php"><i class="icon fa fa-circle-o"></i>Listado previas Julio</a></li> 
             

 <li><a class="treeview-item" href="listadoprevsep.php"><i class="icon fa fa-circle-o"></i>Listado previas Septiembre</a></li>            
           
             
             <li><a class="treeview-item" href="listadoprevdic.php"><i class="icon fa fa-circle-o"></i>Listado previas Diciembre</a></li>            
           
              </ul>
            </li>
               <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Registros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                
                    <li><a class="treeview-item" href="permiso.php"><i class="icon fa fa-circle-o"></i> Permiso de examen</a></li>

                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Actas Volantes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a class="treeview-item" href="actavolantefebrero.php"><i class="icon fa fa-circle-o"></i>Coloquio Febrero</a></li>
            <li><a class="treeview-item" href="actavolante.php"><i class="icon fa fa-circle-o"></i>Coloquio Diciembre</a></li>
           
          </ul>
           
              </ul>
            </li>
          </ul>
      </aside>
    <!-- fin Sidebar menu-->