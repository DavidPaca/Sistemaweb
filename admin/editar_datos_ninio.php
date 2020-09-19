<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} /*else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);
    $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
      
        
        $idninio = $edit_row['id_ninio'];
        $idTipodocumento = $edit_row['id_docide'];
        $c_i = $edit_row['numero_docide'];
        $last_name = $edit_row['apellidos'];
        $first_name = $edit_row['nombres'];
        $fecha_nac = $edit_row['fecha_nac'];
        $anio_ninio = $edit_row['anio'];
        $mes_ninio = $edit_row['mes'];
        $dia_ninio = $edit_row['dia'];
        $pais_nac = $edit_row['pais'];
        $provincia_nac = $edit_row['id_provincia'];
        $canton_nac = $edit_row['id_canton'];
        $parroquia_nac = $edit_row['id_parroquia'];
        $dir = $edit_row['direccion_dom'];
        $Referencia_dom = $edit_row['referencia_ubicacion'];
        $idgenero_n = $edit_row['id_genero'];
        $idetnia_n = $edit_row['id_etnia'];
        $ni_discapacidad = $edit_row['discapacidad'];
        $ni_porcentaje = $edit_row['porcentaje'];
        $carnet_conadis = $edit_row['carnet_conadis'];
        $tip_discapacidad_n = $edit_row['id_tipo_discapacidad'];
        $estable_discap = $edit_row['asiste_estableci_personas_discapacidad'];
        $nombre_estable = $edit_row['nombre_establecimiento'];
        $n_peso = $edit_row['peso'];
        $n_talla = $edit_row['talla'];
        $n_nivel = $edit_row['id_niveles_ninio'];
        $sobrenombre = $edit_row['como_lo_llaman'];
        $cdi = $edit_row['id_cdi'];
        $imagen_n = $edit_row['imagen_ninio'];

   // } else {
       // header('location: index.php');
  /*  }*/
} else {
    header("location: index.php");
}
?>
</head>
<body>
<div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Datos Personales del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        //$date = time();
                        $tipo_docide = ( $_POST['ti_docide']);
                        $ci = ( $_POST['ci_ninio']);
                        $n_apellidos = ( $_POST['apellidos_n']);
                        $n_nombres = ( $_POST['nombres_n']);
                        $fechanaci = ($_POST['fecha_naci']);
                        $n_anio = ($_POST['anio_n']);
                        $n_mes = ($_POST['mes_n']);
                        $n_dia = ($_POST['dia_n']);
                        $n_pais = ($_POST['pais_nom']);
                        $provincianac = ($_POST['provincia_n']);
                        $cantonnac = ($_POST['canton_no']);
                        $parroquia_n = ($_POST['parroquia_ni']);
                        $direccion_domic = ($_POST['direcion_do']);
                        $referencia_domic = ($_POST['referencia_domi']);
                        $genero_ni = ($_POST['genero_n']);
                        $getnico_n = ($_POST['grupoetnico']);
                        $n_discapacidad = ($_POST['n_discap']);
                        $porcentaje_n = ($_POST['n_porcentaje']);
                        $c_conadis_n = ($_POST['n_conadis']);
                        $t_discapa_n = ($_POST['n_tipo_disca']);
                        $establec_disca = ($_POST['n_establec_dis']);
                        $nombre_estableci = ($_POST['nom_establec']);
                        $peso_n = ($_POST['n_peso']);
                        $talla_n = ($_POST['n_talla']);
                        $nivel_ninio = ($_POST['ninio_nivel']);
                        $sobrenombre_ninio = ($_POST['sobrenombre_n']);
                        $cdi_ninio = ($_POST['cdi_n']);
                        $imagen_n = ($_POST['imagen_ninio']);

                                             
                        
                        //echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);


                        $consulta="update tbl_datos_personales_ninio set id_docide='$tipo_docide', numero_docide ='$ci',apellidos='$n_apellidos',nombres='$n_nombres', fecha_nac='$fechanaci',anio='$anio_n',mes='$n_mes',dia='$n_dia',pais='$n_pais',id_provincia='$provincianac', id_canton='$cantonnac',id_parroquia='$parroquia_n',
                        direccion_dom='$direccion_domic', referencia_ubicacion='$referencia_domic', id_genero='$genero_ni', id_etnia='$getnico_n',discapacidad='$n_discapacidad', porcentaje='$porcentaje_n', carnet_conadis='$c_conadis_n',id_tipo_discapacidad='$t_discapa_n', asiste_estableci_personas_discapacidad='$establec_disca',
                        nombre_establecimiento='$nombre_estableci', peso='$peso_n', talla='$talla_n', id_niveles_ninio='$nivel_ninio', como_lo_llaman='$sobrenombre_ninio', id_cdi='$cdi_ninio' where id_ninio = '$edit_id'";
                        $ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $del_query)) {
                            $msg = "Registro modificado";
                        } else {
                            $error = "Registro no modificado";
                        }
                        
                        
                        //$password = crypt($password, $salt);

                       
                    }
                    ?>
       
                <form action="" method="post" enctype="multipart/form-data">


<!--............................................Tipo Documento........................................................-->
<div class="row">
            <div class="col-md-8">
                                <div class="form-group">
                      
                                        <?php
                                            if (isset($error)) {
                                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                            }
                                        ?>
                                    <label for="ti_docide">Tipo de Documento de Identidad:</label>
                                    <select class="form-control" name="ti_docide" id="categories">
                                        <?php
                                            $sql_tdocu = "select * from tbl_documento_identidad ";
                                            $ejecutar = mysqli_query($con, $sql_tdocu);//ejecutar consulta
                                            $sql_llenartdocumento = "SELECT tbl_datos_personales_ninio.id_docide,tbl_documento_identidad.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_documento_identidad ON tbl_datos_personales_ninio.id_docide = tbl_documento_identidad.id_docide Where id_ninio = $edit_id";
                                            $ejecutar2 = mysqli_query($con, $sql_llenartdocumento);
                                            $row3 = mysqli_fetch_array($ejecutar2);
                                            $idlltdoc=$row3['id_docide'];
                                                $detallelltdoc=$row3['detalle'];
                                                echo "<option value='" . $idlltdoc. "' " .  " selected>" . ($detallelltdoc) . "</option>";

                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                                    
                                                    $detalledoc = $row2['detalle'];
                                                    $iddoc = $row2['id_docide'];
                                                    echo "<option value='" . $iddoc. "' " .  ">" . ($detalledoc) . "</option>";
                                                    
                                                }
                                                
                                            } else {
                                            // echo "<center><h6>Categoría no disponible</h6></center>";
                                            }
                                        ?>
                                    </select>
                                </div>         

<!--............................................CI........................................................-->
                                <div class="form-group">
                                    <label for="ci_ninio">Número de Documento de Identificación:</label>
                                    <input type="text" id="ci_ninio" name="ci_ninio" class="form-control" maxlength="10" value="<?php echo($c_i); ?>" >
                                </div>

<!--............................................Apellidos........................................................-->
<div class="form-group">
                                    <label for="last-name">Apellidos:</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value= "<?php
                                    
                                        echo $last_name;
                                
                                    ?>">
                                </div>                                
<!--............................................Nombre........................................................-->                    
                                                 
                                <div class="form-group">
                                    <label for="first-name">Nombres :</label>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value= "<?php
                                        
                                            echo $first_name;
                                        
                                        ?>">
                                </div>
                            
<!--............................................Fecha nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="fecha_naci">Fecha de Nacimiento :</label>  
                                   <!-- <input  class="form-control" placeholder="Fecha de Nacimiento">-->
                                    <input type="date"  name="fecha_naci" class="form-control" id="fecha_naci" value="<?php echo($fecha_nac); ?>" >>
                                </div>                                


                                <input type='text' class='form-control'  value='$datos[2]' name='mostrar_mes' disabled>";
<input type='hidden' class='form-control'  value='$datos[2]' name='dia_n' >";
<span class='input-group-addon' disabled>Día(s)</span> ";

<!--............................................Genero........................................................-->
                                <div class="form-group">
                                    <label for="genero_n">Género :*</label>
                                    <select class="form-control" name="genero_n" id="categories">
                                        <?php
                                        $sql_genero = "select * from tbl_genero";
                                        $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $genero_n = $row2['detalle'];

                                                $id_genero = $row2['id_genero'];
                                                echo "<option value='" . $id_genero. "' " .  ">" . ucfirst($genero_n) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                    
                                </div>

<!--............................................Etnia........................................................-->
                                <div class="form-group">
                                    <label for="grupoetnico">Grupo Étnico</label>
                                    <select class="form-control" name="grupoetnico" id="categories">
                                        <?php
                                        $sql_etnia = "select * from tbl_etnia";
                                        $ejecutar = mysqli_query($con, $sql_etnia);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $etnia_n = $row2['detalle'];

                                                $idetnia = $row2['id_etnia'];
                                                echo "<option value='" . $idetnia. "' " .  ">" . ucfirst($etnia_n) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                   
                                    
                                </div>

<!--............................................Nombre de la madre........................................................-->
                                <div class="form-group">
                                    <label for="nombre_mad">Nombre de la madre:</label>
                                    <input type="text" id="last-name" name="nombre_mad" class="form-control" value= "<?php
                                        if (isset($last_name)) {
                                            echo $last_name;
                                        }
                                        ?>" placeholder="Nombre de la madre">
                                </div>

<!--............................................Nombre del padre........................................................-->
                                <div class="form-group">
                                    <label for="nombre_pad">Nombre del padre:</label>
                                    <input type="text" id="last-name" name="nombre_pad" class="form-control" value= "<?php
                                        if (isset($last_name)) {
                                            echo $last_name;
                                        }
                                        ?>" placeholder="Nombre del padre">
                                </div>

<!--............................................Direccion domiciliaria........................................................-->
                                <div class="form-group">
                                    <label for="direcion_do">Dirección Domiciliaria:</label>
                                    <input type="text" id="last-name" name="direcion_do" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Dirección Domiciliaria">
                                </div>


<!--............................................Discapacidad........................................................-->
                                <div class="form-group">
                                    <label for="discapacidad_n">Tiene Discapacidad :</label>
                                    <select name="discapacidad_n" id="role" class="form-control">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

 <!--............................................Porcentaje........................................................-->                               
                                <div class="form-group">
                                    <label for="dir">Porcentaje:</label>
                                    <input type="text" id="dir" name="porcentaje_d" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Porcentaje">
                                </div>

<!--............................................Carnet conadis........................................................-->
                                <div class="form-group">
                                    <label for="conadis">Tiene Carnet del CONADIS :*</label>
                                    <select name="conadis" id="role" class="form-control">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

<!--............................................Sobrenombre........................................................-->
                                <div class="form-group">
                                    <label for="dir">Como lo llaman en casa:*</label>
                                    <input type="text" id="dir" name="sobrenombre_n" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Sobrenombre">
                                </div>


<!--............................................CDI.......................................................-->                                
                                <div class="form-group">
                                    <label for="role">CDI :*</label>
                                    <select class="form-control" name="cdi" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_cdi";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $cdi = $row2['nombre'];

                                                $idcdi = $row2['id'];
                                                echo "<option value='" . $idcdi. "' " .  ">" . ucfirst($cdi) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                      
<!--............................................Imagen........................................................-->
                                <div class="form-group">
                                    <label for="image">Fotografía</label>
                                    <input type="file" id="image" name="image">
                                </div>       


                                    <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                </form>             
                                
                           
                           
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php require_once('inc/footer.php'); ?>
                    