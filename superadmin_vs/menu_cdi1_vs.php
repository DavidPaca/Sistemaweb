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
                   
<!--*********************************************** S E **************************************************** -->                                             
                    <div class="row">
                      <label for="nom_alimentos" style="font-size:1.5rem"> FICHA SOCIO ECONÓMICA </label>
                    </div>
<!--*********************************************** menu **************************************************** -->                            
                    <h2>


                    <a href="niniosregistrados_ing_se.php" class="list-group-item">
                      <i class="fa fa-user-plus"></i> Ingresar Información Socio Económica
                    </a>

                    <a href="niniosregistrados_ing_se.php" class="list-group-item">
                      <i class="fas fa-hand-holding-usd"></i> Información Socio Económica registrada
                    </a>
                    </h2>

<!--*********************************************** DPN **************************************************** -->                                             
                    <div class="row">
                      <label for="nom_alimentos" style="font-size:1.5rem"> DATOS PERSONALES DE LOS NIÑOS </label>
                    </div>
<!--*********************************************** munu **************************************************** -->                            
                    <h2>  
                    <a href="protipodiscapacidad.php" class="list-group-item">     
                      <i class="fas fa-outdent"></i> Lista de niños registrados
                    </a>
                    </h2>
<!--*********************************************** E I **************************************************** -->                                             
<div class="row">
                      <label for="nom_alimentos" style="font-size:1.5rem"> ENTREVISTA INICIAL </label>
                    </div>
<!--*********************************************** menu **************************************************** --> 
                    <h2>
                    <a href="proalergias.php" class="list-group-item">
                      <i class="fa fa-folder-open" aria-hidden="true"></i> Entrevista Inicial registrada            
                    </a>
                    </h2>
                                   
                    
                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

