<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);
   
        $query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
        $run = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run);
        $c_i_ei_impri = $row['numero_docide'];
        $last_name_ei_impri = $row['apellidos'];
        $first_name_ei_impri = $row['nombres'];
         }

         
if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);
    
        $query = "SELECT * FROM tbl_entrevista_inicial WHERE id_ninio = $edit_id";
        $run = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run);
        $id_ninio_ei = $row['id_ninio'];
        $tiene_alergia_alimento_ei = $row['tiene_alergia_alimento'];
        $rechaza_alimento_ei = $row['rechaza_alimento'];
        $come_solo_ei = $row['come_solo'];
        $usa_mamadera_ei = $row['usa_mamadera'];
        $control_esfinteres_ei = $row['control_esfinteres'];
        $actual_va_banio_solo_ei = $row['actual_va_banio_solo'];
        $presencia_enfermedades_graves_ei = $row['presencia_enfermedades_graves'];
        $intervensiones_q_ei = $row['intervensiones_q'];
        $toma_medicamentos_ei = $row['toma_medicamentos'];
        $es_alergico_ei = $row['es_alergico'];
        $sifrio_accidentes_ei = $row['sifrio_accidentes'];
        $enfermedades_padecio_ei = $row['enfermedades_padecio'];
        $lado_predominante_ninio_ei = $row['lado_predominante_ninio'];
        $ha_gateado_ei = $row['ha_gateado'];
        $problemas_vista_ei = $row['problemas_vista'];
        $usa_lentes_ei = $row['usa_lentes'];
        $escucha_bien_ei = $row['escucha_bien'];
        $usa_audifonos_ei = $row['usa_audifonos'];
        $duerme_solo_ei = $row['duerme_solo'];
        $hora_acostarse_ei = $row['hora_acostarse'];
        $hora_despertarse_ei = $row['hora_despertarse'];
        $vocabulario_ninio_ei = $row['vocabulario_ninio'];
        $Expresa_gestos_palabras_ei = $row['Expresa_gestos_palabras'];
        $dependencia_adultos_ei = $row['dependencia_adultos'];
        $esta_contacto_otros_ninios_ei = $row['esta_contacto_otros_ninios'];
        $sociable_actitud_negativa_ei = $row['sociable_actitud_negativa'];
        $comparte_juguete_ei = $row['comparte_juguete'];
        $tiene_mascotas_ei = $row['tiene_mascotas'];
        $llora_con_facilidad_ei = $row['llora_con_facilidad'];
        $miedo_a_algo_ei = $row['miedo_a_algo'];
        $alguien_lee_cuentos_ei = $row['alguien_lee_cuentos'];
        $referencia_del_cdi_n_ei = $row['referencia_del_cdi_n'];
        $experiencia_cdi_ei = $row['experiencia_cdi'];
        $acuerdo_contribucion_cdi_ei = $row['acuerdo_contribucion_cdi'];
        $nombre_entrevistado_ei = $row['nombre_entrevistado'];
        $parentesco_ei = $row['parentesco'];
        $nombre_entrevistador = $row['nombre_entrevistador'];
        $tipo_usuario_ei = $row['tipo_usuario'];
        $fecha_entrevista_ei = $row['fecha_entrevista'];
            } 
                 



?>
</head>
<body id="profile">
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-address-book"></i> Detalle <small> Entrevista Inicial</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>

                    

                    <div class="row">
                    
                        <div class="col-xs-12">
                            
                            <table class="table table-bordered">                            
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">DATOS PERSONALES DEL NIÑO</label>
                                                                 
                                <tr>
                                    <td width="20%"><b> Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo $c_i_ei_impri; ?></td>
                                    <td width="20%"><b>Apellidos/Nombres del niño:</b></td>
                                    <td width="30%"><?php echo "$last_name_ei_impri $first_name_ei_impri"; ?></td>
                                </tr>
                            </table>            

                            <table class="table table-bordered">   
                                <br>
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB " >ALIMENTOS</label>

                                <tr>
                                    <td width="20%"><b> Alérgia a algún tipo de alimento:</b></td>
                                    <td width="30%"><?php echo $tiene_alergia_alimento_ei ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $alergia_alimento_sql = "SELECT tbl_alimentos.detalle FROM tbl_rechaza_alimentos INNER JOIN tbl_alimentos ON tbl_alimentos.id_alimentos = tbl_rechaza_alimentos.id_alimentos WHERE tbl_rechaza_alimentos.id_ninio = $edit_id";
                                            $run = mysqli_query($con, $alergia_alimento_sql);
                                            //echo $alergia_alimento_sql;
                                            $cont = 0;
                                            while ($row = mysqli_fetch_assoc($run)) {
                                                 
                                                $alerg_ali = $row['detalle']; $cont++;
                                                echo $alerg_ali,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Rechaza algún alimento:</b></b></td>
                                    <td width="30%"><?php echo $rechaza_alimento_ei ; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $rechaza_el_alimento_sql = "SELECT tbl_alimentos.detalle
                                            FROM tbl_inter_ei_rechaza_alimento_disgusta
                                            INNER JOIN tbl_alimentos 
                                            ON tbl_alimentos.id_alimentos = tbl_inter_ei_rechaza_alimento_disgusta.id_alimentos_rech_ali
                                            WHERE tbl_inter_ei_rechaza_alimento_disgusta.id_ninio_rech_ali = $edit_id";
                                            $run = mysqli_query($con, $rechaza_el_alimento_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $recha_ali = $row['detalle']; 
                                                echo $recha_ali,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Come solo:</b></b></td>
                                    <td width="30%"><?php echo $come_solo_ei ; ?></td>
                                    <td width="20%"><b>Usa mamadera:</b></td>
                                    <td width="30%"><?php echo $usa_mamadera_ei; ?></td>
                                    
                                </tr>
                            </table>
                               
                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB " >CONTROL DE ESFÍNTERES</label>
                                <tr>
                                    <td width="20%"><b>Control de esfínteres:</b></td>
                                    <td width="30%"><?php echo $control_esfinteres_ei; ?></td>
                                    <td width="20%"><b>Actualemente va al baño solo:</b></td>
                                    <td width="30%"><?php echo $actual_va_banio_solo_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">SALUD</label>
                                <tr>
                                    <td width="20%"><b>¿Ha tenido alguna enfermedad grave?</b></td>
                                    <td width="30%"><?php echo $presencia_enfermedades_graves_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                    <?php                                          
                                            $enfer_grave_sql = "SELECT tbl_inter_ei_enfermedades_graves.id_enfermedades_graves_eg, tbl_enfermedades.detalle
                                            FROM tbl_inter_ei_enfermedades_graves
                                            INNER JOIN tbl_enfermedades
                                            ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_graves.id_enfermedades_graves_eg
                                            WHERE tbl_inter_ei_enfermedades_graves.id_ninio_eg = $edit_id";
                                            $run = mysqli_query($con, $enfer_grave_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $enf_grav = $row['detalle']; 
                                                echo $enf_grav,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Ha tenido alguna intervensión quirúrgica?</b></td>
                                    <td width="30%"><?php echo $intervensiones_q_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $intervencionesq_sql = "SELECT tbl_intervensionesq.detalle
                                            FROM tbl_inter_ei_intervensiones_quirugicas
                                            INNER JOIN tbl_intervensionesq
                                            ON tbl_intervensionesq.id_intervensionesq = tbl_inter_ei_intervensiones_quirugicas.id_intervensiones_q_iq
                                            WHERE tbl_inter_ei_intervensiones_quirugicas.id_ninio_iq = $edit_id";
                                            $run = mysqli_query($con, $intervencionesq_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $inter_qui = $row['detalle']; 
                                                echo $inter_qui,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Toma algún tipo de medicamentos de forma regular?</b></td>
                                    <td width="30%"><?php echo $toma_medicamentos_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $toma_med_sql = "SELECT tbl_medicamentos.detalle, tbl_inter_ei_toma_medicamentos.id_medicamentos_tm
                                            FROM tbl_inter_ei_toma_medicamentos
                                            INNER JOIN tbl_medicamentos
                                            ON tbl_medicamentos.id_medicamentos = tbl_inter_ei_toma_medicamentos.id_medicamentos_tm
                                            WHERE tbl_inter_ei_toma_medicamentos.id_ninio_tm = $edit_id";
                                            $run = mysqli_query($con, $toma_med_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $tom_med = $row['detalle']; 
                                                echo $tom_med,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Es alérgico?</b></td>
                                    <td width="30%"><?php echo $es_alergico_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $es_alergico_sql = "SELECT tbl_alergias.detalle
                                            FROM tbl_inter_ei_es_alergico
                                            INNER JOIN tbl_alergias
                                            ON tbl_alergias.id_alergias = tbl_inter_ei_es_alergico.id_alergia_ea
                                            WHERE tbl_inter_ei_es_alergico.id_ninio_ea = $edit_id";
                                            $run = mysqli_query($con, $es_alergico_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $es_aler = $row['detalle']; 
                                                echo $es_aler,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Ha sufrido algún tipo de accidente?</b></td>
                                    <td width="30%"><?php echo $sifrio_accidentes_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $tuvo_accident_sql = "SELECT tbl_accidentes.detalle
                                            FROM tbl_inter_ei_sifrio_accidentes
                                            INNER JOIN tbl_accidentes
                                            ON tbl_accidentes.id_accidentes = tbl_inter_ei_sifrio_accidentes.id_accidentes_sa
                                            WHERE tbl_inter_ei_sifrio_accidentes.id_ninio_sa = $edit_id";
                                            $run = mysqli_query($con, $tuvo_accident_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $accident = $row['detalle']; 
                                                echo $accident,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                            </table> 
                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">ENFERMEDADES QUE PADECIÓ</label>
                                <tr>
                                    <td width="20%"><b>¿Alguna enfermedad que padeció?</b></td>
                                    <td width="30%"><?php echo $enfermedades_padecio_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $enfer_padecio_sql = "SELECT tbl_enfermedades.detalle
                                            FROM tbl_inter_ei_enfermedades_padecio
                                            INNER JOIN tbl_enfermedades
                                            ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_padecio.id_enfermedades_padecio_ep
                                            WHERE tbl_inter_ei_enfermedades_padecio.id_ninio_ep = $edit_id";
                                            $run = mysqli_query($con, $enfer_padecio_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $enfer_padec = $row['detalle']; 
                                                echo $enfer_padec,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Lado predominante:</b></td>
                                    <td width="30%"><?php echo $lado_predominante_ninio_ei; ?></td>
                                    <td width="20%"><b>¿Ha gateado?</b></td>
                                    <td width="30%"><?php echo $ha_gateado_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Tiene problemas de vista?</b></td>
                                    <td width="30%"><?php echo $problemas_vista_ei; ?></td>
                                    <td width="20%"><b>¿Utiliza lentes?</b></td>
                                    <td width="30%"><?php echo $usa_lentes_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Tiene problemas de oído?</b></td>
                                    <td width="30%"><?php echo $escucha_bien_ei; ?></td>
                                    <td width="20%"><b>¿Utiliza audífonos?</b></td>
                                    <td width="30%"><?php echo $usa_audifonos_ei; ?></td>
                                </tr>
                            </table>

                            <?php                                          
                                  /*  $sql_miembros_hogar = "SELECT tbl_inter_ei_vacunas.id_inter_ei_vacunas, tbl_inter_ei_vacunas.fecha_vac, tbl_inter_ei_vacunas.obcervaciones_vac,
                                    tbl_datos_personales_ninio.id_ninio, tbl_vacunas.id_vacunas, tbl_vacunas.detalle AS detalle_vacunas
                                    FROM tbl_inter_ei_vacunas
                                    INNER JOIN tbl_datos_personales_ninio
                                    ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_vacunas.id_ninio_vac
                                    INNER JOIN tbl_vacunas
                                    ON tbl_vacunas.id_vacunas = tbl_inter_ei_vacunas.id_vacunas_vac
                                    WHERE tbl_inter_ei_vacunas.id_ninio_vac = $edit_id";
                                    $run = mysqli_query($con, $sql_miembros_hogar);     */                                                          
                                ?>
                             <!--  <table class="table table-bordered">                                               
                                <thead>
                                    <tr>
                                        <th>Nombre de la vacuna</th>
                                        <th>Fecha</th>
                                        <th>Obcervación</th>                                               
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                      /*  while ($row = mysqli_fetch_array($run)) {                                                
                                                $detalle_vacunas = $row['detalle_vacunas'];
                                                $fecha_vac = $row['fecha_vac'];   
                                                $obcervaciones_vac = $row['obcervaciones_vac'];  */ 
                                    ?>
                                     <tr>                                            
                                            <td><?php //echo $detalle_vacunas; ?></td>
                                            <td><?php //echo $fecha_vac; ?></td>
                                            <td><?php //echo $obcervaciones_vac; ?></td>                                           
                                    </tr>
                                      
                                     <?php //} ?>                                                           
                                <tbody>
                            </table>  -->

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">SUEÑO</label>
                                <tr>
                                    <td width="20%"><b>¿Duerme solo?</b></td>
                                    <td width="30%"><?php echo $duerme_solo_ei; ?></td>
                                    <td width="20%"><b>Hora de acostarse:</b></td>
                                    <td width="30%"><?php echo $hora_acostarse_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Hora de despertarse:</b></td>
                                    <td width="30%"><?php echo $hora_despertarse_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">HÁBITOS</label>
                                <tr>
                                    <td width="20%"><b>¿Cuáles con sus hábitos?</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $habitos_sql = "SELECT tbl_habitos.detalle
                                            FROM tbl_inter_ei_habitos
                                            INNER JOIN tbl_habitos
                                            ON tbl_habitos.id_habitos = tbl_inter_ei_habitos.id_habitos_hn
                                            WHERE tbl_inter_ei_habitos.id_ninio_hn = $edit_id";
                                            $run = mysqli_query($con, $habitos_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $hab = $row['detalle']; 
                                                echo $hab,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>                            
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">LENGUAJE</label>
                                <tr>
                                    <td width="20%"><b>Tipo de vocabulario</b></td>
                                    <td width="30%">
                                    <?php                                          
                                            $vovabulario_sql = "SELECT tbl_vocabulario.detalle
                                            FROM tbl_entrevista_inicial
                                            INNER JOIN tbl_vocabulario
                                            ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
                                            WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                            $run = mysqli_query($con, $vovabulario_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $voca = $row['detalle']; 
                                                echo $voca;//,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                    <td width="20%"><b>La mayoría de veces se expresa con:</b></td>
                                    <td width="30%"><?php echo $Expresa_gestos_palabras_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">VIDA SOCIAL</label>
                                <tr>
                                    <td width="20%"><b>¿Con quién o quiénes se relaciona más el niño?</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $relacion_ni_sql = "SELECT tbl_parentesco.detalle
                                            FROM tbl_inter_ei_relacion_ninio
                                            INNER JOIN tbl_parentesco
                                            ON tbl_parentesco.id_parentesco = tbl_inter_ei_relacion_ninio.id_parentesco_rn
                                            WHERE tbl_inter_ei_relacion_ninio.id_ninio_rn = $edit_id";
                                            $run = mysqli_query($con, $relacion_ni_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $relacion = $row['detalle']; 
                                                echo $relacion,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                    <td width="20%"><b>¿Se muestra dependiente de los adultos?</b></td>
                                    <td width="30%"><?php echo $dependencia_adultos_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Está en contacto con otros niños?</b></td>
                                    <td width="30%"><?php echo $esta_contacto_otros_ninios_ei; ?></td>
                                    <td width="20%"><b>¿Es sociable o presenta una actitud negativa?</b></td>
                                    <td width="30%"><?php echo $sociable_actitud_negativa_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">JUEGOS</label>
                                <tr>
                                    <td width="20%"><b>¿A qué juega?</b></td>
                                    <td width="30%">
                                    <?php                                          
                                            $juegos_ni_sql = "SELECT tbl_juegos.detalle
                                            FROM tbl_inter_ei_juegos_del_ninio
                                            INNER JOIN tbl_juegos
                                            ON tbl_juegos.id_juegos = tbl_inter_ei_juegos_del_ninio.id_juegos_jn
                                            WHERE tbl_inter_ei_juegos_del_ninio.id_ninio_jn = $edit_id";
                                            $run = mysqli_query($con, $juegos_ni_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $juegos_n = $row['detalle']; 
                                                echo $juegos_n,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>      
                                    </td>
                                    <td width="20%"><b>¿Con quién juega?</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $con_q_juega_sql = "SELECT tbl_personas_que_juega.detalle
                                            FROM tbl_inter_ei_con_quien_juega
                                            INNER JOIN tbl_personas_que_juega
                                            ON tbl_personas_que_juega.id_personas_q_juega = tbl_inter_ei_con_quien_juega.id_personas_q_juega_cqj
                                            WHERE tbl_inter_ei_con_quien_juega.id_ninio_cqj = $edit_id";
                                            $run = mysqli_query($con, $con_q_juega_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $cqj = $row['detalle']; 
                                                echo $cqj,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="20%"><b>¿Comparte con dificultad sus juguetes?</b></td>
                                    <td width="30%"><?php echo $comparte_juguete_ei; ?></td>
                                </tr>
                                
                            </table>


                            <?php                                          
                                            $tiene_masc_sql = "SELECT tbl_mascotas.detalle, tbl_inter_ei_tiene_mascotas.nombre_mascotita
                                            FROM tbl_inter_ei_tiene_mascotas
                                            INNER JOIN tbl_mascotas
                                            ON tbl_mascotas.id_mascota = tbl_inter_ei_tiene_mascotas.id_mascotas_tm
                                            WHERE tbl_inter_ei_tiene_mascotas.id_ninio_tm = $edit_id";
                                            $run = mysqli_query($con, $tiene_masc_sql);                                                                              
                                        ?>

                            <table class="table table-bordered">
                                <tr>
                                    <td width="50%"><b>¿Tiene mascotas?</b></td>
                                    <td width="30%"><?php echo $tiene_mascotas_ei; ?></td>                           
                                </tr>                                                                        
                                
                                    <tr>
                                        <th>Especifíque</th>
                                        <th>Nombre de la mascota</th>                                                                                        
                                    </tr>                              
                                
                                    <?php 
                                        while ($row = mysqli_fetch_array($run)) {                                                
                                            $mascot = $row['detalle']; 
                                            $nom_mascot = $row['nombre_mascotita'];                                              
                                    ?>
                                     <tr>                                            
                                            <td><?php echo $mascot; ?></td>
                                            <td><?php echo $nom_mascot; ?></td>                                        
                                    </tr>                                      
                                     <?php } ?>                               
                            </table>








                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">PERSONALIDAD</label>
                                <tr>
                                    <td width="20%"><b>¿Llora con facilidad?</b></td>
                                    <td width="30%"><?php echo $llora_con_facilidad_ei; ?></td>
                                    <td width="20%"><b>¿Qué le gusta?</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $gustos_nin_sql = "SELECT tbl_gustos_disgustos.detalle
                                            FROM tbl_inter_ei_gustos_ninio
                                            INNER JOIN tbl_gustos_disgustos
                                            ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_gustos_ninio.id_gustos_gn
                                            WHERE tbl_inter_ei_gustos_ninio.id_ninio_gn = $edit_id";
                                            $run = mysqli_query($con, $gustos_nin_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $gus_n = $row['detalle']; 
                                                echo $gus_n,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Qué le disgusta?</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $disgustos_nin_sql = "SELECT tbl_gustos_disgustos.detalle
                                            FROM tbl_inter_ei_disgustos_ninio
                                            INNER JOIN tbl_gustos_disgustos
                                            ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_disgustos_ninio.id_disgustos_dn
                                            WHERE tbl_inter_ei_disgustos_ninio.id_ninio_dn = $edit_id";
                                            $run = mysqli_query($con, $disgustos_nin_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $disgus_n = $row['detalle']; 
                                                echo $disgus_n,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>    
                                <tr>    
                                    <td width="20%"><b>¿Tiene miedo a algo?</b></td>  
                                    <td width="30%"><?php echo $miedo_a_algo_ei; ?></td>
                                    <td width="20%"><b>Especifíque</b></td>  
                                    <td width="30%"><?php $disgustos_nin_sql = "SELECT tbl_miedos.detalle AS detalle_miedos
                                                FROM tbl_inter_ei_miedos_ninio
                                                INNER JOIN tbl_miedos
                                                ON tbl_miedos.id_miedos = tbl_inter_ei_miedos_ninio.id_miedos_miedosn
                                                WHERE tbl_inter_ei_miedos_ninio.id_ninio_miedosn = $edit_id";
                                            $run = mysqli_query($con, $disgustos_nin_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $detalle_miedos = $row['detalle_miedos']; 
                                                echo $detalle_miedos,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            } 
                                         ?>
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">OTROS DATOS DE INTERÉS</label>
                                <tr>
                                    <td width="20%"><b>¿Le leen cuentos?</b></td>
                                    <td width="30%"><?php echo $alguien_lee_cuentos_ei; ?></td>                            
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">OBSERVACIONES</label>
                                <tr>
                                    <td width="20%"><b>¿Cuál fue el motivo de su elección?</b></td>
                                    <td width="30%"><?php echo $referencia_del_cdi_n_ei; ?></td>                            
                                    <td width="20%"><b>Calificación del Centro de Desarrollo Infantil es:</b></td>
                                    <td width="30%"><?php echo $experiencia_cdi_ei; ?></td>                            
                                </tr>
                                <tr>
                                    <td width="20%"><b>Acuerdos de contribución al Centro de Desarrollo Infantil</b></td>
                                    <td width="30%"><?php echo $acuerdo_contribucion_cdi_ei; ?></td>                            
                                    <td width="20%"><b>Nombre del entrevistado(a):</b></td>
                                    <td width="30%"><?php echo $nombre_entrevistado_ei; ?></td>                            
                                </tr>
                                <tr>
                                    <td width="20%"><b>Parentesco:</b></td>
                                    <td width="30%">
                                    <?php                                        
                                            $parent_nin_sql = "SELECT tbl_parentesco.detalle
                                            FROM tbl_entrevista_inicial
                                            INNER JOIN tbl_parentesco
                                            ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
                                            WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                            $run = mysqli_query($con, $parent_nin_sql);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $parentesco = $row['detalle']; 
                                                echo $parentesco; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                    ?>
                                         </td>                            
                                    <td width="20%"><b>Nombre del Entrevistador(a):</b></td>
                                    <td width="30%"><?php  $sql_muestra = "SELECT tbl_usuario.apellidos, tbl_usuario.nombres
                                    from tbl_entrevista_inicial
                                    INNER JOIN tbl_usuario
                                    ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
                                    WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                    $run = mysqli_query($con, $sql_muestra);
                                        while ($row = mysqli_fetch_assoc($run)) {                                                 
                                        $apellidos = $row['apellidos']; 
                                        $nombres = $row['nombres']; 
                                        
                                    }
                                    echo "$apellidos $nombres"; ?></td>                            
                                </tr>
                                <tr>
                                    <td width="20%"><b>Tipo de Usuario:</b></td>
                                    <td width="30%"><?php $sql_most = "SELECT tbl_usuario_nombre.detalle
                                    from tbl_entrevista_inicial
                                    INNER JOIN tbl_usuario_nombre
                                    ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
                                    WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                    $run = mysqli_query($con, $sql_most);
                                        while ($row = mysqli_fetch_assoc($run)) {                                                 
                                        $detalle = $row['detalle']; 
                                        
                                    }          
                                    echo $detalle; ?></td>
                                    <td width="20%"><b>Fecha de Inscripción:</b></td>
                                    <td width="30%"><?php echo $fecha_entrevista_ei; ?></td>                             
                                </tr>
                            </table>
                            <center>
                            




                            <?php
                           if ($session_role1 == 3){ ?>
                            <a href="niniosregistrados_VIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            

                          <?php } else { ?>
                            <a href="editar_entrevista_inicial_CDIS.php?edit=<?php echo $id_ninio_ei; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="btn btn-primary">Editar</a>
                            <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            <a href="../reportes_pdf/pdf_impri_perfil_entrevista_inicial_CDIS.php?edit=<?php echo $id_ninio_ei; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" target="_blank">
                                <button type="button" class="btn btn-primary">Imprimir</button>  
                            </a>

                            
                          <?php } ?>
                            </center>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php require_once('inc/footer.php'); ?>