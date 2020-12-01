<?php 
require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

?>
  </head>
  <body>
    <div id="wrapper">





<?php 
require_once('inc/header.php');
//require_once('inc/menufichas.php');
    
?>

    <div class="container-fluid body-section">
        <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php');?>
                    
                </div>


                <div class="col-md-9">
                   <h1><i class="fa fa-tachometer"></i> Menú Principal CDI 1 <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="../admin/index.php"><i class="fas fa-home"></i> Regresar menú</a></li>
                    </ol> 
                   
<!--*********************************************** FICHAS **************************************************** -->                                             
                    <div class="row">
                      <label for="nom_alimentos" style="font-size:1.5rem"> FICHAS DEL NIÑO </label>
                    </div>
<!--*********************************************** TITULO SALUD **************************************************** -->                            
                    <h2>


                    <a href="proalimentos.php" class="list-group-item">
                      <i class="fa fa-user-plus"></i> Ingresar Datos Personales del Niño(a)
                    </a>

                    <a href="prodocumentoidentificacion.php" class="list-group-item">
                      <i class="fas fa-outdent"></i> Lista de Niños registrados
                    </a>

                    <a href="proenfermedades.php" class="list-group-item">
                      <i class="fas fa-address-book"></i> Ingresar Entrevista Inicial
                    </a>

                    <a href="prointervensionesquirur.php" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Entrevista Inicial registrada        
                    </a>
                    </h2>

<!--*********************************************** FICHAS **************************************************** -->                                             
                    <div class="row">
                      <label for="nom_alimentos" style="font-size:1.5rem"> EQUIPO DE TRABAJO </label>
                    </div>
<!--*********************************************** TITULO SALUD **************************************************** -->                            
                    <h2>                     

                    <a href="protipodiscapacidad.php" class="list-group-item">     
                      <i class="fas fa-user"></i> Coordinador(es)
                    </a>

                    <a href="proalergias.php" class="list-group-item">
                      <i class="fas fa-users" aria-hidden="true"></i> Parvularios            
                    </a>
                    </h2>
                                   
                    
                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

