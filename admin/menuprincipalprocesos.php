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
                   <h1><i class="fa fa-tachometer"></i> Lista de Procesos <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                    </ol> 
                   
                    
                    <h2>


                    <a href="proalimentos.php" class="list-group-item">
                      <i class="fas fa-apple-alt"></i> Alimentos
                    </a>

                    <a href="prodocumentoidentificacion.php" class="list-group-item">
                      <i class="fa fa-id-card"></i> Tipo de Documento de Identidad
                    </a>

                    <a href="proenfermedades.php" class="list-group-item">
                      <i class="fa fa-plus-square"></i> Enfermedades
                    </a>

                    <a href="prointervensionesquirur.php" class="list-group-item">
                      <i class="fa fa-user-md"></i> Intervensiones Quirúrgicas
                    </a>

                    <a href="proalergias.php" class="list-group-item">
                      <i class="fa fa-certificate" aria-hidden="true"></i> Alergias
                    </a>
                    

                    

                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

