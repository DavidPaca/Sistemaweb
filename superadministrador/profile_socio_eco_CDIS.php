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
    
        $query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
        tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
        tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
        tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
        tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
        tbl_socio_economica.tiene_disca_miembro_familia, tbl_socio_economica.fami_discap_va_manuela_espejo, tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual, 
        tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
        tbl_socio_economica.nivel_ingresos,
        
        tbl_socio_economica.id_tipo_docum, tbl_documento_identidad.detalle AS detalle_docu, tbl_socio_economica.estado_civil_se,
        tbl_estado_civil.detalle AS detalle_est_civil, tbl_socio_economica.etnia_se, tbl_etnia.detalle AS detalle_etnias,
        tbl_socio_economica.parentesco_se, tbl_parentesco.detalle AS detalle_parent, tbl_socio_economica.instruccion_se,
        tbl_instruccion.detalle AS detalle_instruccion, tbl_socio_economica.ocupación_se, tbl_ocupacion.detalle AS detalle_ocupacion,
        tbl_socio_economica.vivienda_acupa_es, tbl_vivienda.detalle AS detalle_vivi, tbl_socio_economica.tipo_vivienda_se, 
        tbl_tipo_vivienda.detalle AS detalle_tvivienda, tbl_socio_economica.tipo_piso_se, tbl_tipo_piso.detalle AS detalle_tpiso,
        tbl_socio_economica.tipo_pared_se, tbl_tipo_pared.detalle AS detalle_tpared, tbl_socio_economica.tipo_techo_se,
        tbl_tipo_techo.detalle AS detalle_ttecho
        FROM tbl_socio_economica
        INNER JOIN tbl_documento_identidad ON tbl_documento_identidad.id_docide = tbl_socio_economica.id_tipo_docum
        INNER JOIN tbl_estado_civil ON tbl_estado_civil.id_estado_civil = tbl_socio_economica.estado_civil_se
        INNER JOIN tbl_etnia ON tbl_etnia.id_etnia = tbl_socio_economica.etnia_se
        INNER JOIN tbl_parentesco ON tbl_parentesco.id_parentesco = tbl_socio_economica.parentesco_se
        INNER JOIN tbl_instruccion ON tbl_instruccion.id_instruccion = tbl_socio_economica.instruccion_se
        INNER JOIN tbl_ocupacion ON tbl_ocupacion.id_ocupacion = tbl_socio_economica.ocupación_se
        INNER JOIN tbl_vivienda ON tbl_vivienda.id_vivienda = tbl_socio_economica.vivienda_acupa_es
        INNER JOIN tbl_tipo_vivienda ON tbl_tipo_vivienda.id_tipo_vivienda = tbl_socio_economica.tipo_vivienda_se
        INNER JOIN tbl_tipo_piso ON tbl_tipo_piso.id_tipo_piso = tbl_socio_economica.tipo_piso_se
        INNER JOIN tbl_tipo_pared ON tbl_tipo_pared.id_tipo_pared = tbl_socio_economica.tipo_pared_se
        INNER JOIN tbl_tipo_techo ON tbl_tipo_techo.id_tipo_techo = tbl_socio_economica.tipo_techo_se
        WHERE tbl_socio_economica.id_ninio_se = $edit_id";
        $run = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run);
        $id_ninio_se = $row['id_ninio_se'];
        $id_tipo_docum = $row['detalle_docu'];
        $num_documide = $row['num_documide'];
        $apellidos_se = $row['apellidos_se'];
        $nombres_se = $row['nombres_se'];
        $edad_se = $row['edad_se'];
        $estado_civil_se = $row['detalle_est_civil'];
        $etnia_se = $row['detalle_etnias'];
        $parentesco_se = $row['detalle_parent'];        
        $direccion_dom_se = $row['direccion_dom_se'];
        $telefono_dom_se = $row['telefono_dom_se'];
        $instruccion_se = $row['detalle_instruccion'];
        $ocupación_se = $row['detalle_ocupacion'];
        $vinculo_laboral = $row['vinculo_laboral'];
        $direccion_laboral_se = $row['direccion_laboral_se'];
        $telefono_trabajo_se = $row['telefono_trabajo_se'];

        $vivienda_acupa_es = $row['detalle_vivi'];
        $tipo_vivienda_se = $row['detalle_tvivienda'];
        $num_habitaciones_se = $row['num_habitaciones_se'];
        $tipo_piso_se = $row['detalle_tpiso'];
        $tipo_pared_se = $row['detalle_tpared'];
        $tipo_techo_se = $row['detalle_ttecho'];
        $recibe_bono_se = $row['recibe_bono_se'];

        $miembros_hogar_se = $row['miembros_hogar_se'];
        $num_hijos_se = $row['num_hijos_se'];
        $num_hijas_se = $row['num_hijas_se'];

        $consume_bebidas_se = $row['consume_bebidas_se'];
        $fuma_se = $row['fuma_se'];
        $tiene_disca_miembro_familia = $row['tiene_disca_miembro_familia'];
        $fami_discap_va_manuela_espejo = $row['fami_discap_va_manuela_espejo'];
        $miembros_hogar_trabajan = $row['miembros_hogar_trabajan'];
        $ingreso_mensual = $row['ingreso_mensual'];
        $egreso_mensual = $row['egreso_mensual'];
        $Acti_genera_ingresos = $row['Acti_genera_ingresos'];
        $especifique_actividad = $row['especifique_actividad'];
        $nivel_vida = $row['nivel_vida'];
        $nivel_ingresos = $row['nivel_ingresos'];
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
                    <h1><i class="fas fa-address-book"></i> Detalle <small> Información Socio Económica</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>

                    

                    <div class="row">
                    
                        <div class="col-xs-12">
                            
                            <table class="table table-bordered">
                            
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">DATOS PERSONALES DEL NIÑO</label>
                                                                 
                                <tr>
                                    <td width="20%"><b> Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo $c_i_ei_impri; ?></td>
                                    <td width="20%"><b>Apellidos/Nombres:</b></td>
                                    <td width="30%"><?php echo "$last_name_ei_impri $first_name_ei_impri"; ?></td>
                                </tr>
                            </table>            

                            <table class="table table-bordered">    
                                <br>
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB" >DATOS PERSONALES DEL REPRESENTANTE</label>

                                <tr>
                                    <td width="20%"><b>Tipo de Documento de Identificación:</b></td>
                                    <td width="30%"><?php echo $id_tipo_docum; ?></td>
                                    <td width="20%"><b>Número de Documento de Identificación:</b></td>
                                    <td width="30%"><?php echo $num_documide; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Apellidos:</b></td>
                                    <td width="30%"><?php echo $apellidos_se; ?></td>
                                    <td width="20%"><b>Nombres:</b></td>
                                    <td width="30%"><?php echo $nombres_se; ?></td>
                                </tr>

                                <tr>
                                    <td width="20%"><b> Edad:</b></td>
                                    <td width="30%"><?php echo $edad_se ?></td>
                                    <td width="20%"><b>Estado civil:</b></td>
                                    <td width="30%"><?php echo $estado_civil_se ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Etnia:</b></b></td>
                                    <td width="30%"><?php echo $etnia_se; ?></td>
                                    <td width="20%"><b>Parentesco:</b></td>
                                    <td width="30%"><?php echo $parentesco_se; ?>
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Dirección domiciliaria:</b></b></td>
                                    <td width="30%"><?php echo $direccion_dom_se ; ?></td>
                                    <td width="20%"><b>Teléfono domicilio:</b></td>
                                    <td width="30%"><?php echo $telefono_dom_se; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>Instrucción:</b></td>
                                    <td width="30%"><?php echo $instruccion_se; ?></td>
                                    <td width="20%"><b>Ocupación:</b></td>
                                    <td width="30%"><?php echo $ocupación_se; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Vínculo laboral</b></td>
                                    <td width="30%"><?php echo $vinculo_laboral; ?></td>
                                    <td width="20%"><b>Dirección trabajo:</b></td>
                                    <td width="30%"><?php  echo $direccion_laboral_se; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Teléfon trabajo</b></td>
                                    <td width="30%"><?php echo $telefono_trabajo_se; ?></td>
                                </tr>
                            </table>


                            <table class="table table-bordered">
                                <label for="miembros_hogar" style="font-size:1.5rem; color:#2174AB">MIEMBROS DEL HOGAR Y EDUCACIÓN</label>
                                <tr>
                                    <td width="20%"><b>¿Cuátos miembros de su hogar componen su familia?</b></td>
                                    <td width="30%"><?php echo $miembros_hogar_se; ?></td>
                                </tr>
                            </table> 
                               
                            <table class="table table-bordered">
                                <tr>                                   
                                    <label class = "col-md-12" style="padding-left: 1%" for="miembros_hogar">Número de hijos:</label><div>
                                    <td width="20%"><b>Hombres</b></td>
                                    <td width="30%"><?php echo $num_hijos_se; ?></td> 
                                    <td width="20%"><b>Mujeres</b></td>
                                    <td width="30%"><?php echo $num_hijas_se; ?></td> 
                                </tr>
                            </table>
                                <label class = "col-md-12" style="padding-left: 1%" for="miembros_hogar">Registro de los miembros del hogar:</label><div> 
                                <?php                                          
                                    $sql_miembros_hogar = "SELECT tbl_inter_se_miembros_hogar.id_ninio_mh, tbl_inter_se_miembros_hogar.apellidos_mh, tbl_inter_se_miembros_hogar.nombres_mh,
                                    tbl_inter_se_miembros_hogar.id_parentesco_mh, tbl_inter_se_miembros_hogar.edad, tbl_inter_se_miembros_hogar.id_instruccion_mh,
                                    tbl_inter_se_miembros_hogar.id_ocupacion_mh, tbl_inter_se_miembros_hogar.vinculo_laboral, tbl_inter_se_miembros_hogar.dir_laboral,
                                    tbl_inter_se_miembros_hogar.telefono, tbl_inter_se_miembros_hogar.estado_mh,
                                    tbl_parentesco.detalle AS detalle_parentesco_mh, tbl_instruccion.detalle AS detalle_instruccion_mh,
                                    tbl_ocupacion.detalle AS detalle_ocupcion_mh
                                    FROM tbl_inter_se_miembros_hogar
                                    INNER JOIN tbl_parentesco ON tbl_parentesco.id_parentesco = tbl_inter_se_miembros_hogar.id_parentesco_mh
                                    INNER JOIN tbl_instruccion ON tbl_instruccion.id_instruccion = tbl_inter_se_miembros_hogar.id_instruccion_mh
                                    INNER JOIN tbl_ocupacion ON tbl_ocupacion.id_ocupacion = tbl_inter_se_miembros_hogar.id_ocupacion_mh
                                    WHERE tbl_inter_se_miembros_hogar.id_ninio_mh = $edit_id";
                                    $run = mysqli_query($con, $sql_miembros_hogar);                                                               
                                ?>
                            <table class="table table-bordered">                                               
                                <thead>
                                    <tr>
                                        <th>Parentesco</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>
                                        <th>Edad</th>
                                        <th>Instrucción</th>
                                        <th>Ocupación</th>
                                        <th>Vínculo laboral</th>
                                        <th>Dirección trabajo</th>
                                        <th>Teléfono trabajo</th>                                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while ($row = mysqli_fetch_array($run)) {                                                
                                            $detalle_parentesco_mh = $row['detalle_parentesco_mh'];
                                            $apellidos_mh = $row['apellidos_mh'];   
                                            $nombres_mh = $row['nombres_mh'];   
                                            $edad = $row['edad'];   
                                            $detalle_instruccion_mh = $row['detalle_instruccion_mh'];   
                                            $detalle_ocupcion_mh = $row['detalle_ocupcion_mh'];   
                                            $vinculo_laboral_mh = $row['vinculo_laboral'];   
                                            $dir_laboral = $row['dir_laboral'];   
                                            $telefono = $row['telefono'];   
                                    ?>
                                     <tr>                                            
                                            <td><?php echo $detalle_parentesco_mh; ?></td>
                                            <td><?php echo $apellidos_mh; ?></td>
                                            <td><?php echo $nombres_mh; ?></td>
                                            <td><?php echo $edad; ?></td>
                                            <td><?php echo $detalle_instruccion_mh; ?></td>
                                            <td><?php echo $detalle_ocupcion_mh; ?></td>
                                            <td><?php echo $vinculo_laboral_mh; ?></td>
                                            <td><?php echo $dir_laboral; ?></td>
                                            <td><?php echo $telefono; ?></td>
                                    </tr>
                                      
                                     <?php } ?>
                                     <tr>                                            
                                            <td><?php echo $parentesco_se; ?></td>
                                            <td><?php echo $apellidos_se; ?></td>
                                            <td><?php echo $nombres_se; ?></td>
                                            <td><?php echo $edad_se; ?></td>
                                            <td><?php echo $instruccion_se; ?></td>
                                            <td><?php echo $ocupación_se; ?></td>
                                            <td><?php echo $vinculo_laboral; ?></td>
                                            <td><?php echo $direccion_laboral_se; ?></td>
                                            <td><?php echo $telefono_trabajo_se; ?></td>
                                    </tr>                       
                                <tbody>
                            </table>


                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">BONO DE DESARROLLO HUMANO</label>
                                <tr>
                                    <td width="20%"><b>¿Recibe bono de desarrollo humano?</b></td>
                                    <td width="30%"><?php echo $recibe_bono_se; ?></td>                                    
                                </tr>
                            </table>


                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">INGRESO FAMILIAR</label>
                                <tr>
                                    <td width="20%"><b>¿Cuátos miembros del hogar trabajan?</b></td>
                                    <td width="30%"><?php echo $miembros_hogar_trabajan; ?></td>
                                    <td width="20%"><b>¿Cuál es el ingreso mensual total de su familia?</b></td>
                                    <td width="30%"><?php echo $ingreso_mensual; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Cuál es el egreso mensual total de su familia?</b></td>
                                    <td width="30%"><?php echo $egreso_mensual; ?></td>                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Realiza otra actividad que le generan ingresos?</b></td>
                                    <td width="30%"><?php echo $Acti_genera_ingresos; ?></td>
                                    <td width="20%"><b>Especifíque:</b></td>
                                    <td width="30%"><?php echo $especifique_actividad; ?></td>                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>En los útimos 12 meses, su nivel de vida:</b></td>
                                    <td width="30%"><?php echo $nivel_vida; ?></td>
                                    <td width="20%"><b>Considera usted, que los ingresos mensuales de su hogar son:</b></td>
                                    <td width="30%"><?php echo $nivel_ingresos; ?></td>
                                </tr>
                            </table> 


                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">DATOS DE VIVIENDA Y HOGAR</label>
                                <tr>
                                    <td width="20%"><b>La vivienda que ocupa es:</b></td>
                                    <td width="30%"><?php echo $vivienda_acupa_es; ?></td>
                                    <td width="20%"><b>Tipo de vivienda:</b></td>
                                    <td width="30%"><?php echo $tipo_vivienda_se?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Número de habitaciones:</b></td>
                                    <td width="30%"><?php echo $num_habitaciones_se; ?></td>
                                    <td width="20%"><b>Tipo de pisos:</b></td>
                                    <td width="30%"><?php echo $tipo_piso_se;?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Tipo de pared:</b></td>
                                    <td width="30%"><?php echo $tipo_pared_se; ?></td>
                                    <td width="20%"><b>Tipo de techo:</b></td>
                                    <td width="30%"><?php echo $tipo_techo_se;?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Servicios básicos:</b></td>
                                    <td width="30%">
                                        <?php                                          
                                            $sql_servicios_basicos = "SELECT tbl_inter_se_servicio_basico.id_ninio_sb, tbl_inter_se_servicio_basico.id_servicio_basicos_sv,
                                            tbl_servicios_basicos.detalle
                                            FROM tbl_inter_se_servicio_basico
                                            INNER JOIN tbl_servicios_basicos ON tbl_servicios_basicos.id_servi_basicos = tbl_inter_se_servicio_basico.id_servicio_basicos_sv
                                            WHERE tbl_inter_se_servicio_basico.id_ninio_sb = $edit_id";
                                            $run = mysqli_query($con, $sql_servicios_basicos);
                                                while ($row = mysqli_fetch_assoc($run)) {                                                 
                                                $recha_ali = $row['detalle']; 
                                                echo $recha_ali,", "; 
                                                //$cont++;   
                                                //echo $cont;                                                                                        
                                            }                                
                                        ?>
                                    </td>
                                </tr>                                
                            </table>


                            <table class="table table-bordered">
                                <label for="nom_alimentos" style="font-size:1.5rem; color:#2174AB">PRESENCIA DE ENFERMEDADES</label>
                                <tr>
                                    <td width="20%"><b>¿Consume bebidas alcohólicas?</b></td>
                                    <td width="30%"><?php echo $consume_bebidas_se; ?></td>
                                    <td width="20%"><b>¿Usted fuma?</b></td>
                                    <td width="30%"><?php echo $fuma_se; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Sufre algún miembro de la familia alguna discapacidad?</b></td>
                                    <td width="30%"><?php echo $tiene_disca_miembro_familia; ?></td>
                                    <td width="20%"><b>¿El/los miembro(s) de la familia con discapacidad accede a la Misión Manuela Espejo?</b></td>
                                    <td width="30%"><?php echo $fami_discap_va_manuela_espejo; ?></td>
                                </tr>
                            </table>

                            
                            <center>
                            <a href="editar_socio_eco_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="btn btn-primary">Editar</a>  
                            <a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            <a href="../reportes_pdf/pdf_impri_perfil_socio_economica_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" target="_blank">
                                <button type="button" class="btn btn-primary">Imprimir</button>  
                            </a>

                            </center>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php require_once('inc/footer.php'); ?>