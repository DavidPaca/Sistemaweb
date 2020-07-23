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
                      <i class="fas fa-heartbeat"></i> Intervensiones Quirúrgicas        
                    </a>

                    <a href="protipodiscapacidad.php" class="list-group-item">     
                      <i class="fas fa-wheelchair"></i> Tipo de Discapacidad
                    </a>

                    <a href="proalergias.php" class="list-group-item">
                      <i class="fas fa-allergies" aria-hidden="true"></i> Alergias            
                    </a>
                    
                    <a href="promedicamentos.php" class="list-group-item">
                      <i class="fas fa-pills" aria-hidden="true"></i> Medicamentos      
                    </a>

                    <a href="proaccidentes.php" class="list-group-item">
                      <i class="fa fa-plus-square" aria-hidden="true"></i> Accidentes                
                    </a>                                                                               

                    <a href="prohabitos.php" class="list-group-item">
                      <i class="fa fa-h-square" aria-hidden="true"></i> Hábitos
                    </a>

                    <a href="provocalbulario.php" class="list-group-item">
                      <i class="fa fa-file" aria-hidden="true"></i> Vocabulario
                    </a>
                    
                    <a href="projuegos.php" class="list-group-item">
                      <i class="fa fa-futbol" aria-hidden="true"></i> Juegos
                    </a>

                    <a href="promascotas.php" class="list-group-item">
                      <i class="fa fa-paw" aria-hidden="true"></i> Mascotas
                    </a>

                    <a href="protipovivienda.php" class="list-group-item">
                      <i class="fas fa-home" aria-hidden="true"></i> Tipo de Vivienda
                    </a>

                    <a href="protipopared.php" class="list-group-item">
                      <i class="fas fa-th" aria-hidden="true"></i> Tipo de Pared
                    </a>

                    <a href="protipopiso.php" class="list-group-item">
                      <i class="fab fa-schlix" aria-hidden="true"></i> Tipo de Piso
                    </a>

                    <a href="protipotecho.php" class="list-group-item">
                      <i class="fab fa-houzz" aria-hidden="true"></i> Tipo de Techo
                    </a>

                    <a href="proserviciosbasicos.php" class="list-group-item">
                      <i class="fas fa-phone-square" aria-hidden="true"></i> Servicios Básicos
                    </a>

                    <a href="proestadocivil.php" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Estado Civil
                    </a>

                    <a href="proetnia.php" class="list-group-item">
                      <i class="fas fa-id-card-alt" aria-hidden="true"></i> Etnia
                    </a>

                    <a href="progenero.php" class="list-group-item">
                      <i class="fas fa-venus-mars" aria-hidden="true"></i> Género
                    </a>

                    
                    
                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

