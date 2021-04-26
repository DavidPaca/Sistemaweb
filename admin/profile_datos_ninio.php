<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);
   


$query = "SELECT  tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, tbl_datos_personales_ninio.nombres,tbl_datos_personales_ninio.fecha_nac, tbl_datos_personales_ninio.anio, tbl_datos_personales_ninio.mes, tbl_datos_personales_ninio.dia, tbl_datos_personales_ninio.direccion_dom, tbl_datos_personales_ninio.referencia_ubicacion, tbl_datos_personales_ninio.discapacidad, tbl_datos_personales_ninio.porcentaje, tbl_datos_personales_ninio.carnet_conadis, tbl_datos_personales_ninio.asiste_estableci_personas_discapacidad, tbl_datos_personales_ninio.nombre_establecimiento, tbl_datos_personales_ninio.peso, tbl_datos_personales_ninio.talla, tbl_datos_personales_ninio.como_lo_llaman, tbl_datos_personales_ninio.imagen_ninio, 
tbl_datos_personales_ninio.id_docide,tbl_documento_identidad.detalle AS detalle_di, 
tbl_datos_personales_ninio.pais, tbl_pais.detalle AS detalle_pais, 
tbl_datos_personales_ninio.id_provincia, tbl_provincia.detalle AS detalle_provincia, 
tbl_datos_personales_ninio.id_canton, tbl_canton.detalle AS detalle_canton, 
tbl_datos_personales_ninio.id_parroquia, tbl_parroquia.detalle AS detalle_parroquia, 
tbl_datos_personales_ninio.id_genero, tbl_genero.detalle AS detalle_genero, 
tbl_datos_personales_ninio.id_etnia, tbl_etnia.detalle AS detalle_etnia, 
tbl_datos_personales_ninio.id_tipo_discapacidad, tbl_tipos_discapacidad.detalle AS detalle_tdicapacidad, 
tbl_datos_personales_ninio.id_niveles_ninio, tbl_niveles_estudio_ninio.detalle AS detalle_nivel_ninio, 
tbl_datos_personales_ninio.id_cdi, tbl_cdi.nombre AS detalle_cdi
                    FROM tbl_datos_personales_ninio 
                    INNER JOIN tbl_documento_identidad 
                    ON tbl_datos_personales_ninio.id_docide = tbl_documento_identidad.id_docide 
                    INNER JOIN tbl_pais 
                    ON tbl_datos_personales_ninio.pais = tbl_pais.id_pais 
                    INNER JOIN tbl_provincia 
                    ON tbl_datos_personales_ninio.id_provincia = tbl_provincia.id_provincia
                    INNER JOIN tbl_canton
                    ON tbl_datos_personales_ninio.id_canton = tbl_canton.id_canton
                    INNER JOIN tbl_parroquia
                    ON tbl_datos_personales_ninio.id_parroquia = tbl_parroquia.id_parroquia
                    INNER JOIN tbl_genero
                    ON tbl_datos_personales_ninio.id_genero = tbl_genero.id_genero
                    INNER JOIN tbl_etnia
                    ON tbl_datos_personales_ninio.id_etnia = tbl_etnia.id_etnia
                    INNER JOIN tbl_tipos_discapacidad
                    ON tbl_datos_personales_ninio.id_tipo_discapacidad = tbl_tipos_discapacidad.id_tipo_discapacidad
                    INNER JOIN tbl_niveles_estudio_ninio
                    ON tbl_datos_personales_ninio.id_niveles_ninio = tbl_niveles_estudio_ninio.id_niveles_ninio
                    INNER JOIN tbl_cdi
                    ON tbl_datos_personales_ninio.id_cdi = tbl_cdi.id
                    Where estado='Activo' && tbl_datos_personales_ninio.id_ninio = $edit_id";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);


                                    
                                        $idninio = $row['id_ninio'];
                                        $idTipodocumento = $row['detalle_di'];
                                        $c_i = $row['numero_docide'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        $fecha_nac = $row['fecha_nac'];
                                        $anio_ninio = $row['anio'];
                                        $mes_ninio = $row['mes'];
                                        $dia_ninio = $row['dia'];
                                        $pais_nac = $row['detalle_pais'];
                                        $provincia_nac = $row['detalle_provincia'];
                                        $canton_nac = $row['detalle_canton'];
                                        $parroquia_nac = $row['detalle_parroquia'];
                                        $dir = $row['direccion_dom'];
                                        $Referencia_dom = $row['referencia_ubicacion'];
                                        $idgenero_n = $row['detalle_genero'];
                                        $idetnia_n = $row['detalle_etnia'];
                                        $ni_discapacidad = $row['discapacidad'];
                                        $ni_porcentaje = $row['porcentaje'];
                                        $carnet_conadis = $row['carnet_conadis'];
                                        $tip_discapacidad_n = $row['detalle_tdicapacidad'];
                                        $estable_discap = $row['asiste_estableci_personas_discapacidad'];
                                        $nombre_estable = $row['nombre_establecimiento'];
                                        $n_peso = $row['peso'];
                                        $n_talla = $row['talla'];
                                        $n_nivel = $row['detalle_nivel_ninio'];                               
                                        $sobrenombre = $row['como_lo_llaman'];
                                        $cdi = $row['detalle_cdi'];
                                        $imagen_n = $row['imagen_ninio'];                          
                                         

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
                    <h1><i class="fa fa-user"></i> Datos<small> Personales</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="niniosregistrados.php"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>

                    

                    <div class="row">
                    
                        <div class="col-xs-12">
                        
                            <center><img src="img/<?php echo $imagen_n; ?>" width="150px" class="rounded" id="profile-image"></center>
                            
                            <center>
                                <h3>Información</h3>
                            </center>

                            
                            <br>
                            <table class="table table-bordered">
                                                       
                                  
                                <tr>
                                    <td width="20%"><b>Tipo de documento:</b></td>
                                    <td width="30%"><?php echo $idTipodocumento; ?></td>
                                    <td width="20%"><b>Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo $c_i; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Apellidos:</b></td>
                                    <td width="30%"><?php echo $last_name; ?></td>
                                    <td width="20%"><b>Nombres:</b></td>
                                    <td width="30%"><?php echo $first_name; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Fecha de nacimiento:</b></td>
                                    <td width="30%"><?php echo $fecha_nac ?></td>
                                    <td width="20%"><b>Edad:</b></td>
                                    <td width="30%"><?php echo "$anio_ninio año(s), $mes_ninio mes(es), $dia_ninio día(s) "; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Nacionalidad:</b></b></td>
                                    <td width="30%"><?php echo $pais_nac; ?></td>
                                    <td width="20%"><b>Provincia</b></td>
                                    <td width="30%"><?php echo $provincia_nac; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Cantón:</b></b></td>
                                    <td width="30%"><?php echo $parroquia_nac ; ?></td>
                                    <td width="20%"><b>Parroquia:</b></td>
                                    <td width="30%"><?php echo $canton_nac; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>Dirección:</b></td>
                                    <td width="30%"><?php echo $dir; ?></td>
                                    <td width="20%"><b>Referencia domiciliaria:</b></td>
                                    <td width="30%"><?php echo $Referencia_dom; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Género:</b></td>
                                    <td width="30%"><?php echo $idgenero_n; ?></td>
                                    <td width="20%"><b>Etnia:</b></td>
                                    <td width="30%"><?php echo $idetnia_n; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Discapacidad:</b></td>
                                    <td width="30%"><?php echo $ni_discapacidad; ?></td>
                                    <td width="20%"><b>Porcentaje:</b></td>
                                    <td width="30%"><?php echo "$ni_porcentaje %"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Carnet del CONADIS:</b></td>
                                    <td width="30%"><?php echo $carnet_conadis; ?></td>
                                    <td width="20%"><b>Tipo de discapacidad:</b></td>
                                    <td width="30%"><?php echo $tip_discapacidad_n; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>¿Asiste a algún establecimiento de Educación Especial?:</b></td>
                                    <td width="30%"><?php echo $estable_discap; ?></td>
                                    <td width="20%"><b>Nombre/Lugar:</b></td>
                                    <td width="30%"><?php echo $nombre_estable; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Peso:</b></td>
                                    <td width="30%"><?php echo "$n_peso kg"; ?></td>
                                    <td width="20%"><b>Talla:</b></td>
                                    <td width="30%"><?php echo "$n_talla cm"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Nivel académico:</b></td>
                                    <td width="30%"><?php echo $n_nivel; ?></td>
                                    <td width="20%"><b>¿Como lo llaman en casa?</b></td>
                                    <td width="30%"><?php echo $sobrenombre; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Centro de Desarrollo Infantil:</b></td>
                                    <td width="30%"><?php echo $cdi; ?></td>
                                    <td width="20%"><b>Apellidos/Nombres del representante:</b></td>
                                    <?php 
                                    $sql_datosrepre = "SELECT * FROM tbl_socio_economica WHERE id_ninio_se = $edit_id ";
                                    $run = mysqli_query($con, $sql_datosrepre);
                                    $row = mysqli_fetch_array($run);                                    
                                        $apellidos_se = $row['apellidos_se']; 
                                        $nombres_se = $row['nombres_se']; 
                                        $telefono_dom_se = $row['telefono_dom_se']; 

                                    ?>
                                    <td width="30%"><?php echo "$apellidos_se $nombres_se"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Teléfono:</b></td>
                                    <td width="30%"><?php echo $telefono_dom_se; ?></td>
                                </tr>
                            </table>

                            <center>
                            <a href="editar_datos_ninio.php?edit=<?php echo $idninio; ?>" class="btn btn-primary">Editar</a>
                            <a href="editar_ninio_fotografia.php?edit=<?php echo $idninio; ?>">
                                <button type="button" class="btn btn-primary">Editar fotografía</button>
                            </a>
                            <a href="niniosregistrados.php">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            <a href="../reportes_pdf/pdf_impri_datos_personales_ninio.php?edit=<?php echo $idninio; ?>" target="_blank">
                                <button type="button" class="btn btn-primary">Imprimir</button>
                            </a>
                            </center>
                            
                        </div> 
                    </div>
                
            </div>
        </div>
    </div>
        

        <?php require_once('inc/footer.php'); ?>
        