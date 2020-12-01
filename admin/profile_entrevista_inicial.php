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
                            
                            <table class="table table-bordered">
                                                       
                            <td style="height:100px" height="500%"><b>DATOS PERSONALES DEL NIÑO</b></td>
                                <tr>
                                    <td width="20%"><b> Documento de identidad del ninño :</b></td>
                                    <td width="30%"><?php echo $c_i_ei_impri; ?></td>
                                    <td width="20%"><b>Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo "$last_name_ei_impri $first_name_ei_impri"; ?></td>
                                </tr>
                                
                                <tr>
                                    <td height="20%"><b>DATOS PERSONALES DEL NIÑO</b></td>
                                    
                                    
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
                                </tr>
                            </table>

                            <center>
                            <a href="editar_datos_ninio.php?edit=<?php echo $idninio; ?>" class="btn btn-primary">Editar</a>
                            <a href="niniosregistrados.php">
                                <button type="button" class="btn btn-primary">Regresar</button>
                            </a>
                            </center>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php require_once('inc/footer.php'); ?>