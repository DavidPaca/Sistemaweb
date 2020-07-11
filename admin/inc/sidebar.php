<?php



$session_role1 = $_SESSION['roleSS'];
//echo('hola');
//echo($session_role1);
//$get_comment = "SELECT * FROM comments WHERE status = 'pendiente'";
//$get_comment_run = mysqli_query($con, $get_comment);
//$num_of_rows = mysqli_num_rows($get_comment_run);
?>
<div class="list-group rojo"  >
    <a href="index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
    </a>
    <!--<a href="posts.php" class="list-group-item">
        <i class="fas fa-list-ul"></i> Noticias publicadas
    </a>
   
    
    <a href="añadirInformación.php" class="list-group-item">
        <i class="fas fa-list-ul"></i> añadir informacion
    </a>
    <a href="añadirPdf.php" class="list-group-item">
        <i class="fas fa-file-upload"></i> Subir Documentos
    </a>
    <a href="listaAñadirPdf.php" class="list-group-item">
        <i class="fas fa-eye"></i> Ver Documentos
    </a>
    <!--                      <a href="media.php" class="list-group-item">
                              <i class="fa fa-database"></i> Imágenes
                          </a>-->
    <?php
    if ($session_role1 == 'Coordinador') {
        ?>
        <!--<a href="comments.php" class="list-group-item">
            <?php
            if ($num_of_rows > 0) {
                echo "<span class='badge'>$num_of_rows</span>";
            }
            ?>
            <i class="fa fa-comment"></i> Comentarios Realizados
        </a>-->
       
        <a href="add-user.php" class="list-group-item">
            <i class="fa fa-users"></i> Agregar Usuario
        </a>

        <a href="users.php" class="list-group-item">
            <i class="fa fa-users"></i> Usuarios Registrados
        </a>
      <!--  <a href="categories.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Categoría de Noticias
        </a>-->

        <a href="categories.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Categoría de Eventos
        </a>
        
         <a href="añadirInformación.php" class="list-group-item">
           <i class="fa fa-indent"></i> Agregar Eventos
        </a>
         <a href="posts.php" class="list-group-item">
            <i class="fas fa-outdent"></i> Eventos Publicados
        </a>

          <a href="media.php" class="list-group-item">
                              <i class="fa fa-database"></i> Imágenes
        </a>
           
     <!--   <a href="niniosregistrados.php" class="list-group-item">
            <i class="fas fa-outdent"></i> Datos Personales del Niño
        </a> -->

            <!--

        <a href="Estadis_noticias.php" class="list-group-item">
            <i class="fas fa-chart-pie"></i>  Estadistístico Noticias</a>
        <a href="Estadis_Usuarios.php" class="list-group-item">
            <i class="fas fa-chart-bar"></i>  Estadístico Usuarios</a>
        <a href="reportePdf.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Usuarios
        </a>
        <a href="reportePdfDocumentos.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Documentos
        </a>-->
    <?php } ?>
</div>


<!-----------------------------------------------Menu fichas......------------------------------------------->


<div class="list-group" >
    <a href="index.php" class="list-group-item active" style="background-color:#595757">  
        <i class="fas fa-home"></i>  Fichas de los Niños 
    </a>
    
    <?php
    if ($session_role1 == 'Coordinador') {
        ?>
        <!--<a href="comments.php" class="list-group-item">
            <?php
            if ($num_of_rows > 0) {
                echo "<span class='badge'>$num_of_rows</span>";
            }
            ?>
            <i class="fa fa-comment"></i> Comentarios Realizados
        </a>-->
       
    <!--    <a href="add-user.php" class="list-group-item">
            <i class="fa fa-users"></i> Agregar Usuario
        </a> -->

     <!--   <a href="users.php" class="list-group-item">
            <i class="fa fa-users"></i> Usuarios Registrados
        </a>  -->
      <!--  <a href="categories.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Categoría de Noticias
        </a>-->

      <!--  <a href="categories.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Categoría de Eventos
        </a>
        
         <a href="añadirInformación.php" class="list-group-item">
           <i class="fa fa-indent"></i> Agregar Eventos
        </a>
         <a href="posts.php" class="list-group-item">
            <i class="fas fa-outdent"></i> Eventos Publicados
        </a> -->

        
     <!--   <a href="anadirconcurso.php" class="list-group-item">
            <i class="fas fa-briefcase"></i> Añadir Concurso
        </a>-->
     <!--   <a href="concursopublicado.php" class="list-group-item">
            <i class="fas fa-briefcase"></i> Concursos Publicados     
        </a>
        <a href="users.php" class="list-group-item">
            <i class="fa fa-users"></i> Usuarios Registrados
        </a> -->


        <!--<a href="Estadis_noticias.php" class="list-group-item">
            <i class="fas fa-chart-pie"></i>  Estadistístico Noticias</a>
        <a href="Estadis_Usuarios.php" class="list-group-item">
            <i class="fas fa-chart-bar"></i>  Estadístico Usuarios</a>-->
        <!--<a href="reportePdf.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Usuarios
        </a>
        <a href="reportePdfDocumentos.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Documentos
        </a>-->


  <!--xxxxxxxxxxxxxxxxxxxxxxxxx CODIGOS EJEMPLO xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
  <a href="add-user.php" class="list-group-item">
            <i class="fa fa-users"></i> Agregar Usuario
        </a>

  <div id="accordion">
  <div class="card">
    <div class="list-group-item" id="headingOne">
      <h5 class="fa fa-users">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" background= "Black">
          DATOS PERSONALES DEL NIÑO(A)
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
    <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
      <div class="card-body">
     

      <a href="ing_dp_ninio.php" class="list-group-item">
        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
        </a>
     
      <a href="niniosregistrados.php" class="list-group-item">
            <i class="fas fa-outdent"></i> Listado de Niños 
        </a>
        
     
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          ENTREVISTA INICIAL
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      
      <a href="add-user.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
        </a>

        <a href="nientrevistaregistrada.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Entrevistas Registradas del Niño(a)
        </a>
      
      
      
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          SOCIO ECONÓMICA
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        
      <a href="ing_socio_eco.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
        </a>

        <a href="nisocioeconomico.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
        </a>


      </div>
    </div>
  </div>
</div>
 <!--xxxxxxxxxxxxxxxxxxxxxxxxx FIN CODIGOS EJEMPLO xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
 



 

 

    
  <!--<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>-->



 <!--xxxxxxxxxxxxxxxxxxXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX   EJEMPLOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->


<!--</head>
<body>
  <div id="navbar" class="nav-side-menu">
    <ul class="nav-side-menu">
        <li class="dropdown">
            <a href="ing_dp_ninio.php" data-toggle="dropdown" class="dropdown-toggle">DATOS PERSONALES DEL NIÑO</a>
            <ul class="dropdown-menu">
                <li><a href="ing_dp_ninio.php">Agregar <span class="caret"></span></a>
                   <ul class="dropdown-menu sub-menu">
                        <li><a href="#">Trabajadores</a></li>
                        <li><a href="#">Empresarios</a></li>
                    </ul>
                </li>
                <li><a href="#">Consultar </a></li>
                <li><a href="#">Actualizar </a></li>
            </ul>
        </li>
    </ul>      
  </div>

  <!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  HASTA AQUI XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxxxxxxxxxxxxxxxxxxxx  -->


  

<!--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>



    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div> -->

 <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX NUEVO EJEMPLO MENU AZUL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->




<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  HASTA AQUI EL NUEVO EJEMPLO MENU AZUL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
 
 
 
     <!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx     

    
        <ul>
        <li> <a href="ing_dp_ninio.php" class="list-group-item">
        <i class="fa fa-users"></i> Datos Personales del Niño(a) 
        </a></li>
        
        <a href="niniosregistrados.php" class="list-group-item">
            <i class="fas fa-outdent"></i> Listado de Niños 
        </a>
           
        <a href="ing_entrevista_i.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Entrevista Inicial
        </a>

        <a href="nientrevistaregistrada.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Entrevistas Registradas
        </a>

        <a href="ing_socio_eco.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Información Socio Económica
        </a>

        <a href="nisocioeconomico.php" class="list-group-item">
            <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
        </a>
--> 

            <!--

        <a href="Estadis_noticias.php" class="list-group-item">
            <i class="fas fa-chart-pie"></i>  Estadistístico Noticias</a>
        <a href="Estadis_Usuarios.php" class="list-group-item">
            <i class="fas fa-chart-bar"></i>  Estadístico Usuarios</a>
        <a href="reportePdf.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Usuarios
        </a>
        <a href="reportePdfDocumentos.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Documentos
        </a>-->
    <?php } ?>
</div>









    