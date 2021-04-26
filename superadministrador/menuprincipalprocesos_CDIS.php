<?php 
require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}


$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

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
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                    
                </div>


                <div class="col-md-9">
                   <h1><i class="fa fa-tachometer"></i> Lista de Procesos <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                    </ol> 
                   
                    
                    <h2>

                    <a href="proaccidentes_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-plus-square" aria-hidden="true"></i> Accidentes                
                    </a> 

                    <a href="proalergias_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-allergies" aria-hidden="true"></i> Alergias            
                    </a>

                    <a href="proalimentos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-apple-alt"></i> Alimentos
                    </a>

                    <a href="procdi_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-university" aria-hidden="true"></i> Centro de Desarrollo Infantil
                    </a>

                    
                    <a href="proenfermedades_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-plus-square"></i> Enfermedades
                    </a>

                    <a href="proestadocivil_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Estado Civil
                    </a>

                    <a href="proetnia_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-id-card-alt" aria-hidden="true"></i> Etnia
                    </a>

                    <a href="progenero_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-venus-mars" aria-hidden="true"></i> Género
                    </a>                    

                    <a href="prohabitos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-h-square" aria-hidden="true"></i> Hábitos
                    </a>

                    <a href="proinstruccion_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Instrucción
                    </a>

                    <a href="prointervensionesquirur_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-heartbeat"></i> Intervensiones Quirúrgicas        
                    </a>

                    <a href="projuegos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-futbol" aria-hidden="true"></i> Juegos
                    </a>

                    <a href="promascotas_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-paw" aria-hidden="true"></i> Mascotas
                    </a>

                    <a href="promedicamentos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-pills" aria-hidden="true"></i> Medicamentos      
                    </a>

                    <a href="promiedos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-file" aria-hidden="true"></i> Miedos
                    </a>

                    <a href="pronivelninio_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i> Niveles académicos
                    </a>
                    
                    <a href="proocupacion_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Ocupación
                    </a>

                    <a href="propais_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-globe-americas" aria-hidden="true"></i> País
                    </a>
                    
                    <a href="proparentesco_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Parentesco
                    </a>

                    <a href="properiodos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-qrcode" aria-hidden="true"></i> Período
                    </a> 
                    
                    <a href="propersonas_q_juega_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-user-tie" aria-hidden="true"></i> Personas que juega el niño
                    </a>

                    <a href="progustos_disgustos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-file" aria-hidden="true"></i> Personalidad
                    </a>

                    <a href="proserviciosbasicos_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-phone-square" aria-hidden="true"></i> Servicios Básicos
                    </a>

                    <a href="protipodiscapacidad_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">     
                      <i class="fas fa-wheelchair"></i> Tipo de Discapacidad
                    </a>

                    <a href="prodocumentoidentificacion_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-id-card"></i> Tipo de Documento de Identidad
                    </a>

                    <a href="protipopared_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-th" aria-hidden="true"></i> Tipo de Pared
                    </a>

                    <a href="protipopiso_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fab fa-schlix" aria-hidden="true"></i> Tipo de Piso
                    </a>

                    <a href="protipotecho_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fab fa-houzz" aria-hidden="true"></i> Tipo de Techo
                    </a>

                    <a href="protipovivienda_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-home" aria-hidden="true"></i> Tipo de Vivienda
                    </a>
                    
                    <a href="provacunas_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-syringe" aria-hidden="true"></i> Vacunas
                    </a>
                    
                    <a href="provivienda_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-home" aria-hidden="true"></i> Vivienda
                    </a>

                    <a href="provocalbulario_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-file" aria-hidden="true"></i> Vocabulario
                    </a>


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                    

                    

                   

                    

                    

                    
                    
                    

                                                                                                  

                    
                    
                    

                    

                    

                    

                   

                    

                    

                    
                    
                    

                    
                    
                    

                <!--    <a href="proprovincia_PROC.php" class="list-group-item">
                      <i class="fas fa-flag" aria-hidden="true"></i> Provincia
                    </a>

                    <a href="procanton_PROC.php" class="list-group-item">
                      <i class="fab fa-font-awesome" aria-hidden="true"></i> Cantón
                    </a>-->  


                    

                    

                    
                    
                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

