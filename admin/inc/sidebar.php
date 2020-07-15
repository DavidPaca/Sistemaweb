<?php



$session_role1 = $_SESSION['roleSS'];
//echo('hola');
//echo($session_role1);
$get_comment = "SELECT * FROM comments WHERE status = 'pendiente'";
$get_comment_run = mysqli_query($con, $get_comment);
//$num_of_rows = mysqli_num_rows($get_comment_run);
?>
<div class="list-group rojo"  >
    <a href="index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
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
       
        <a href="add-user.php" class="list-group-item">
            <i class="fa fa-users"></i> Agregar Usuario
        </a>

        <a href="users.php" class="list-group-item">
            <i class="fa fa-users"></i> Usuarios Registrados
        </a>
    
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
        
        <a href="reportePdfDocumentos.php" class="list-group-item">
            <i class="fas fa-print"></i> Reportes Documentos
        </a>-->


  <!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS NIÑOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
  

  <div id="accordion">
  <div class="card">
    <div class="list-group-item" id="headingOne">
      <h5 class="fa fa-users">
        <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" background= "Black">
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
        <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
        <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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


          <a href="menuprincipalprocesos.php" class="list-group-item">
            <i class="fa fa-users"></i> PROCESOS
          </a>

 

</div>
 
 
    
    <?php } ?>
</div>









    