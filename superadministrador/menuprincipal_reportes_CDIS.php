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
                   <h1><i class="fa fa-tachometer"></i> Reportes <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                    </ol> 
                   
                    
                    <h2>

                    <a href="report_tiene_alergias_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Alérgia 
                    </a>

                    <a href="report_alergia_alimentos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Alérgia a alimentos
                    </a>

                    <a href="report_rechaza_alimentos_no_gusta_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Alimentos que rechaza niño
                    </a>
                    
                    <a href="report_disgustos_ninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Disgustos del niño 
                    </a>

                    <a href="report_enfermedades_graves_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Enfermedades graves 
                    </a>

                    <a href="report_enfermedades_q_padecio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Enfermedades que padeció 
                    </a>
                    
                    <a href="report_etnia_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Étnia 
                    </a>
                    
                    <a href="report_genero_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Género 
                    </a>

                    <a href="report_gustos_ninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Gustos del niño 
                    </a>

                    <a href="report_habitos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Hábitos 
                    </a>

                    <a href="report_intervenciones_quirur_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Intervenciones quierúrgicas 
                    </a>

                    <a href="report_juegos_ninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Juegos 
                    </a>
                    
                    <a href="report_mascotas_ninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Mascotas 
                    </a>
                                
                    <a href="report_miedos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Miedos 
                    </a>
                    
                    <a href="report_pais_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Nacionalidad 
                    </a>

                    <a href="report_persona_q_tiene_mas_relacion_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Persona que tiene más relación el niño 
                    </a>

                    <a href="report_tipo_accidente_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Tipo de accidente que ha sufrido 
                    </a>

                    <a href="report_tipo_discapacidad_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Tipo de discapacidad
                    </a>
                    
                    <a href="report_toma_medicamentos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Tipo de medicamentos que toma el niño 
                    </a>  
                    
                    <a href="report_vivienda_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Vivienda 
                    </a>  

                    <a href="report_vocabulario_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fas fa-file-pdf"></i> Vocabulario 
                    </a>
                    
                    
                    
                    





<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                    

                    
                    
                        
                </div>
        </div>
                
    </div>
            
        

<?php require_once('inc/footer.php');?>

