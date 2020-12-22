<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

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
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-address-book"></i> Detalle <small> Entrevista Inicial</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="nientrevistaregistrada.php"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>

                    

                    <div class="row">
                    
                        <div class="col-xs-12">
                            
                            <table class="table table-bordered">
                            
                                <label for="nom_alimentos" style="font-size:1.5rem">DATOS PERSONALES DEL NIÑO</label>
                                                                 
                                <tr>
                                    <td width="20%"><b> Documento de identidad del ninño:</b></td>
                                    <td width="30%"><?php echo $c_i_ei_impri; ?></td>
                                    <td width="20%"><b>Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo "$last_name_ei_impri $first_name_ei_impri"; ?></td>
                                </tr>
                            </table>            

                            <table class="table table-bordered">    
                                <label for="nom_alimentos" style="font-size:1.5rem">ALIMENTOS</label>
                                <tr>
                                    <td width="20%"><b> Alérgia a algún tipo de alimento:</b></td>
                                    <td width="30%"><?php echo $tiene_alergia_alimento_ei ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <?php  
                                   $alergia_alimento_sql = "SELECT * FROM `tbl_rechaza_alimentos` WHERE id_ninio = $edit_id";
                                   $run = mysqli_query($con, $alergia_alimento_sql);
                                   //echo $alergia_alimento_sql;
                                   while ($row = mysqli_fetch_array($run)) {
                                   
                                   }
                                 $alerg_ali = $row['id_ninio'];
                                    ?>
                                    <td width="30%"><?php echo $alerg_ali; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Rechaza algún alimento:</b></b></td>
                                    <td width="30%"><?php echo $rechaza_alimento_ei ; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo $provincia_nac; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Come solo:</b></b></td>
                                    <td width="30%"><?php echo $come_solo_ei ; ?></td>
                                    <td width="20%"><b>Usa mamadera:</b></td>
                                    <td width="30%"><?php echo $usa_mamadera_ei; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>Control de esfínteres:</b></td>
                                    <td width="30%"><?php echo $control_esfinteres_ei; ?></td>
                                    <td width="20%"><b>Actualemente va al baño solo:</b></td>
                                    <td width="30%"><?php echo $actual_va_banio_solo_ei; ?></td>
                                </tr>
                                </table>

                                <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">SALUD</label>
                                <tr>
                                    <td width="20%"><b>¿Ha tenido alguna enfermedad grave?</b></td>
                                    <td width="30%"><?php echo $presencia_enfermedades_graves_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo $idetnia_n; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Ha tenido alguna intervensión quirúrgica?</b></td>
                                    <td width="30%"><?php echo $intervensiones_q_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo "$ni_porcentaje %"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Toma algún tipo de medicamentos de forma regular?</b></td>
                                    <td width="30%"><?php echo $toma_medicamentos_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo $tip_discapacidad_n; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Es alérgico?</b></td>
                                    <td width="30%"><?php echo $es_alergico_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo $tip_discapacidad_n; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Ha sufrido algún tipo de accidente?</b></td>
                                    <td width="30%"><?php echo $sifrio_accidentes_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo $nombre_estable; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Alguna enfermedad que padeció?</b></td>
                                    <td width="30%"><?php echo $enfermedades_padecio_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php //echo "$n_talla cm"; ?></td>
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

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">SUEÑO</label>
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
                                <label for="nom_alimentos" style="font-size:1.5rem">HÁBITOS</label>
                                <tr>
                                    <td width="20%"><b>¿Cuáles con sus hábitos?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $duerme_solo_ei; ?></td>                            
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">LENGUAJE</label>
                                <tr>
                                    <td width="20%"><b>Tipo de vocabulario</b></td>
                                    <td width="30%"><?php echo $vocabulario_ninio_ei; ?></td>
                                    <td width="20%"><b>La mayoría de veces se expresa con:</b></td>
                                    <td width="30%"><?php echo $Expresa_gestos_palabras_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">VIDA SOCIAL</label>
                                <tr>
                                    <td width="20%"><b>¿Con quién o quiénes se relaciona más el niño?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $duerme_solo_ei; ?></td>
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
                                <label for="nom_alimentos" style="font-size:1.5rem">JUEGOS</label>
                                <tr>
                                    <td width="20%"><b>¿A qué juega?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $duerme_solo_ei; ?></td>
                                    <td width="20%"><b>¿Con quién juega?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $dependencia_adultos_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Tiene mascotas?</b></td>
                                    <td width="30%"><?php echo $tiene_mascotas_ei; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>  
                                    <td width="30%"><?php //echo $sociable_actitud_negativa_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Comparte con dificultad sus juguetes?</b></td>
                                    <td width="30%"><?php echo $comparte_juguete_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">PERSONALIDAD</label>
                                <tr>
                                    <td width="20%"><b>¿Llora con facilidad?</b></td>
                                    <td width="30%"><?php echo $llora_con_facilidad_ei; ?></td>
                                    <td width="20%"><b>¿Qué le gusta?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $dependencia_adultos_ei; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Qué le disgusta?**** OJO TBL APA</b></td>
                                    <td width="30%"><?php //echo $tiene_mascotas_ei; ?></td>
                                    <td width="20%"><b>¿Tiene miedo a algo?</b></td>  
                                    <td width="30%"><?php echo $miedo_a_algo_ei; ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">OTROS DATOS DE INTERÉS</label>
                                <tr>
                                    <td width="20%"><b>¿Le leen cuentos?</b></td>
                                    <td width="30%"><?php echo $alguien_lee_cuentos_ei; ?></td>                            
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem">OBSERVACIONES</label>
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
                                    <td width="30%"><?php echo $parentesco_ei; ?></td>                            
                                    <td width="20%"><b>Nombre del Entrevistador(a):</b></td>
                                    <td width="30%"><?php echo $nombre_entrevistador; ?></td>                            
                                </tr>
                                <tr>
                                    <td width="20%"><b>Tipo de Usuario:</b></td>
                                    <td width="30%"><?php echo $tipo_usuario_ei; ?></td>
                                    <td width="20%"><b>Fecha de Inscripción:</b></td>
                                    <td width="30%"><?php echo $fecha_entrevista_ei; ?></td>                             
                                </tr>
                            </table>
                            <center>
                            <a href="editar_datos_ninio.php?edit=<?php echo $idninio; ?>" class="btn btn-primary">Editar</a>
                            <a href="nientrevistaregistrada.php">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            </center>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php require_once('inc/footer.php'); ?>