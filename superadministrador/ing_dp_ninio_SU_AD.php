<?php
require_once('../admin/inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS

//$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
//$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

?>

<!--script provincia-->
                    <script>                        
                        $(document).ready(function(e){
                            $("#provincia").change(function(){
                                var parametros ="id="+$("#provincia").val();
                                
                                $.ajax({
                                    data:parametros,
                                    url: '../admin/ajax_canton.php',
                                    type: 'post',
                                    beforeSend: function(){
                                    
                                    },
                                    success: function(response){
                                    
                                        $("#canton").html(response);
                                    },
                                    error:function(){
                                        alert("error")
                                    }
                                });            
                            })

                            $("#canton").change(function(){
                                var parametros ="id="+$("#canton").val();
                            // alert(parametros)
                                $.ajax({
                                    data:parametros,
                                    url: '../admin/ajax_parroquia.php',
                                    type: 'post',
                                    beforeSend: function(){
                                    
                                    },
                                    success: function(response){
                                    
                                        $("#parroquia").html(response);
                                    },
                                    error:function(){
                                        alert("error")
                                    }
                                });            
                            })
                        })                    
                    </script>
<!--********************************************Fecha Año*********************************************-->
                    <script>
                        $(document).ready(function(e){
                        $("#fecha_nac").blur(function(){
                            var parametros ="fecha="+$("#fecha_nac").val();
                         //alert(parametros)
                            $.ajax({
                                data:parametros,
                                url: '../admin/ajax_fechaedad.php',
                                type: 'post',
                                beforeSend: function(){
                                
                                },
                                success: function(response){
                                  //alert(response);
                                    $("#calculafecha").html(response);
                                },
                                error:function(){
                                    alert("error")
                                }
                            });            
                        })       

                    })
                    </script>
<!--********************************************Fecha Mes*********************************************-->
                    <script>
                            $(document).ready(function(e){
                            $("#fecha_nac").blur(function(){
                                var parametros ="fecha="+$("#fecha_nac").val();
                            //alert(parametros)
                                $.ajax({
                                    data:parametros,
                                    url: '../admin/ajax_fechames.php',
                                    type: 'post',
                                    beforeSend: function(){
                                    
                                    },
                                    success: function(response){
                                        //alert(response);
                                        $("#calculames").html(response);
                                    },
                                    error:function(){
                                        alert("error")
                                    }
                                });            
                            })       

                        })
                        </script>
<!--********************************************Fecha Dias*********************************************-->
                        <script>
                                $(document).ready(function(e){
                                $("#fecha_nac").blur(function(){
                                    var parametros ="fecha="+$("#fecha_nac").val();
                                //alert(parametros)
                                    $.ajax({
                                        data:parametros,
                                        url: '../admin/ajax_fechadias.php',
                                        type: 'post',
                                        beforeSend: function(){
                                        
                                        },
                                        success: function(response){
                                            //alert(response);
                                            $("#calculadias").html(response);
                                        },
                                        error:function(){
                                            alert("error")
                                        }
                                    });            
                                })       

                            })
                            </script>
<!--*****************************************************************************************-->
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>/Datos Personales del Niño/Niña </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                         <li><a href="menuprincipaldatosninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Ingresar Datos Personales del Niño/Niña</li>
                    </ol>                    
                    
                    <?php                   
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                        $tipo_docide = ( $_POST['ti_docide']);
                        $ci = ( $_POST['ci']);
                        $n_apellidos = ( $_POST['apellidos_n']);
                        $n_nombres = ( $_POST['nombres_n']);     /*first name es el nombre del cajon*/
                        $fechanaci = ( $_POST['fecha_nac']);
                        $n_anio = ( $_POST['anio_n']);
                        $n_mes = ( $_POST['mes_n']);
                        $n_dia = ( $_POST['dia_n']);
                        $n_pais = ( $_POST['pais_nom']);
                        if($_POST['pais_nom'] == 'seleccione'){
                            $n_pais = '1';                                             
                        }else{
                            $n_pais = ( $_POST['pais_nom']);
                        }
                        $provincianac= ( $_POST['provincia_n']);
                        $cantonnac= ( $_POST['canton_no']);
                        $parroquia_n= ( $_POST['parroquia_ni']);
                        $direccion_domic= ( $_POST['direcion_do']);
                        $referencia_dom= ( $_POST['referencia_domi']);
                        $genero_ni =  ( $_POST['genero_n']);
                        $getnico_n  = ( $_POST['grupoetnico']);
                        $n_discapacidad= ( $_POST['n_discap']);
                        if ($_POST['n_porcentaje']==null){
                            $porcentaje_n='0';
                        }else{
                            $porcentaje_n = ( $_POST['n_porcentaje']);
                        }
                        $c_conadis_n = ( $_POST['n_conadis']);
                        $t_discapa_n = ( $_POST['n_tipo_disca']);
                        $establec_disca= ( $_POST['n_establec_dis']);
                        if ($_POST['nom_establec'] == null){
                            $nombre_establec= 'No asiste';

                        }else{
                            $nombre_establec = ( $_POST['nom_establec']);
                        }               
                        $peso_n = ( $_POST['n_peso']);
                        $talla_n = ( $_POST['n_talla']);
                        $nivel_ninio = ( $_POST['ninio_nivel']);
                        $sobrenombre = ( $_POST['sobrenombre_n']);
                        $cdi =  ($_POST['cdi']);
                        $periodo_nin =  ($_POST['periodo_ni']);
                        $n_estado = ( $_POST['estado_n']);
                        $n_estado_ei = ( $_POST['estado_ent_inicial']);
                        $n_estado_se = ( $_POST['estado_socio_eco']);
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];
                        if($image == null){
                            $image='defecto.png';
                        }   
                        if (empty($ci)) {
                            $error = "Debe llenar el campo";
                        }else {
                            $check_query = "SELECT * FROM tbl_datos_personales_ninio WHERE numero_docide = $ci";
                                $check_run = mysqli_query($con, $check_query);                     
                                if (mysqli_num_rows($check_run) > 0) {
                                    $error = "Número de documento de identidad existente";
                                } else {             
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        //if (empty($n_nombres) or empty($n_apellidos) or empty($ci)) {
                          //  $error = "Todos los (*) Campos son requeridos";
                        //} else{
                            $insert_query = "INSERT INTO tbl_datos_personales_ninio(apellidos, nombres, id_docide, numero_docide, fecha_nac, anio, mes, dia , pais, 
                            id_provincia, id_canton, id_parroquia, direccion_dom, referencia_ubicacion, id_genero, id_etnia, discapacidad, porcentaje, carnet_conadis, 
                            id_tipo_discapacidad, asiste_estableci_personas_discapacidad, nombre_establecimiento, peso, talla, id_niveles_ninio, como_lo_llaman, id_cdi, 
                            id_periodo_ninio, estado, estado_ei, estado_se, imagen_ninio) VALUES ('$n_apellidos','$n_nombres','$tipo_docide','$ci','$fechanaci','$n_anio','$n_mes','$n_dia','$n_pais',
                            '$provincianac','$cantonnac','$parroquia_n','$direccion_domic','$referencia_dom','$genero_ni','$getnico_n','$n_discapacidad',
                            '$porcentaje_n','$c_conadis_n','$t_discapa_n','$establec_disca','$nombre_establec','$peso_n','$talla_n','$nivel_ninio','$sobrenombre',
                            '$cdi', '$periodo_nin', '$n_estado', '$n_estado_ei', '$n_estado_se', '$image')";
                            if (mysqli_query($con, $insert_query)) {
                               $msg = "Datos ingresados";
                             //  $path="img/$image";

                              
                                move_uploaded_file($image_temp, "../admin/img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                              //  move_uploaded_file($image_tmp, $path);
                              // copy($path,"../$path");
                              $msg = "Datos personales ingresados";
                              $first_name = "";
                                $last_name = "";
                                $ci  = "";
                                
                          // header("Location: niniosregistrados.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Datos personales no ingresados";
                            }
                        }
                    }
                }
                    ?>                                  

                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
<!--............................................Documento Identidad........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group ">
                                        <?php
                                            if (isset($error)) {
                                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                            }        
                                        ?>
                                        <label for="ti_docide">Tipo de Documento de Identidad:</label>
                                        <select class="form-control" name="ti_docide" id="ti_docide" required>
                                            <option value="" >Seleccione</option>
                                            <?php
                                                $sql_cdi = "select * from tbl_documento_identidad order by detalle asc";
                                                $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {                                                  
                                                        $detalledocu = $row2['detalle'];
                                                        $iddocu = $row2['id_docide'];
                                                        echo "<option value='" . $iddocu. "' " .  ">" . ($detalledocu) . "</option>";
                                                    }
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>   
<!--............................................CI........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="ci">Número de Documento de Identificación:</label>
                                        <input type="text" id="username" name="ci" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="" placeholder="Ej:1234567890" required>
                                    </div>
                                </div>
                            </div>


<!--............................................Apellidos........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="apellidos_n">Apellidos:</label>
                                        <input type="text" id="apellidos_n" name="apellidos_n" class="form-control" value= "" placeholder="Apellidos" required>
                                    </div>
                                </div>
                            </div>

<!--............................................Nombre........................................................-->                    
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nombres_n">Nombres :</label>                                   
                                        <input type="text" id="nombres_n" name="nombres_n" class="form-control" value= "<?php
                                        ?>" placeholder="Nombres" required>
                                    </div>
                                </div>
                            </div>

<!--............................................Fecha nacimiento........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="fecha_nac">Fecha de Nacimiento :</label>  
                                        <input type="date"  name="fecha_nac" class="form-control" id="fecha_nac" required>
                                    </div>
                                </div>
                            </div>

<!--............................................Edad........................................................-->
                           
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="input-group" id="calculafecha" required></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group" id="calculames" required></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group" id="calculadias" required></div>
                                </div>
                            </div>                    
                                                          

<!--............................................Lugar de Nacimiento........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="pais_n">Lugar de Nacimiento :</label> 

                                        <script type="text/javascript">
                                            function mostrar(a) {
                                                if (a== "otro") {
                                                    $("#otro").show();
                                                    $("#Ecuador").hide();                                        
                                                }

                                                if (a == "1") {
                                                    $("#otro").hide();
                                                    $("#Ecuador").show();                                    
                                                }                                   
                                            }    
                                        </script>    
                            
                                            <select  class="form-control" onChange="mostrar(this.value); " name="pais_nom" required >
                                                    <option value="" >Seleccione</option>
                                                    <option name="pais_nom" value="1">Ecuador</option>
                                                    <option value="otro">Otro</option>                                        
                                            </select>
                            
                                            <div id="otro" style="display: none;"> <br>                        
                                                <div class="form-group" >
                                                <label class = "col-md-3" style= padding-top: 1%;padding-right: 10% for="role">Seleccione el país:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-8">                          
                                                            <select class="form-control" name="pais_nom" id="pais_nom">
                                                                <option value="seleccione" selected>Seleccione</option>
                                                                <?php
                                                                    $sql_genero = "select * from tbl_pais WHERE id_pais != 1 order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {                                                                             
                                                                            $genero_n = $row2['detalle'];

                                                                            $id_genero = $row2['id_pais'];
                                                                            echo "<option value='" . $id_genero. "' " .  ">" . ($genero_n) . "</option>";
                                                                        }
                                                                    } 
                                                                ?>
                                                            </select>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>            
                            
                                            <div id="Ecuador" style="display: none;" >  <br>
                                              <label for="provincia_n" class = "col-md-1" style="padding-top: 1%;padding-right: 10%" >Provincia:</label> 
                                                <div class="row" >                          
                                                    <div class="col-md-8"> 
                                                        <select name="provincia_n" class="form-control" id="provincia">
                                                            <option value="0" selected>Seleccione</option>  
                                                            <?php
                                                                $sql_provincia = "select * from tbl_provincia where id_provincia != 0 order by detalle asc";
                                                                $ejecutar_prov = mysqli_query($con, $sql_provincia);//ejecutar consulta
                                                                
                                                                if (mysqli_num_rows($ejecutar_prov) > 0) {
                                                                    while ($row_prov = mysqli_fetch_array($ejecutar_prov)) {
                                                                        
                                                                        $nom_prov = $row_prov['detalle'];
                                                                        $id_prov = $row_prov['id_provincia'];
                                                                        echo "<option value='" . $id_prov. "' " .  ">" . ($nom_prov) . "</option>";
                                                                    }
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <label for="canton_no" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Cantón:</label>                            
                                                <div class="row" >                          
                                                    <div class="col-md-8">
                                                        <select name="canton_no" id="canton" class="form-control" >
                                                                <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <label for="parroquia_ni" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Parroquia:</label>
                                                <div class="row" >                          
                                                    <div class="col-md-8">
                                                        <select name="parroquia_ni" class="form-control" id="parroquia">
                                                            <option value="0" selected>Seleccione</option>                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>    
                                    </div>
                                </div>
                            </div>
        

<!--............................................Direccion domiciliaria........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="direcion_do">Dirección del domicilio:</label>
                                        <input type="text" id="direcion_do" name="direcion_do" class="form-control" value= "<?php
                                        ?>" placeholder="Dirección Domiciliaria" required>
                                    </div>
                                </div>
                            </div>

<!--............................................Referencia de Unbicación........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="referencia_domi">Referencia del domicilio:</label>
                                        <input type="text" id="referencia_domi" name="referencia_domi" class="form-control" value= "<?php
                                        ?>" placeholder="Referencia de Unbicación" required>
                                    </div>
                                </div>
                            </div>

<!--............................................Genero........................................................-->                       
                        <div class="row">                             
                            <div class="col-md-8">
                                <div class="form-group">
                                      <label for="genero_n">Género :</label>
                                    <select class="form-control" name="genero_n" id="genero_n" required>
                                        <option value="">Seleccione</option>
                                        <?php
                                        $sql_genero = "select * from tbl_genero order by detalle asc";
                                        $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $genero_n = $row2['detalle'];

                                                $id_genero = $row2['id_genero'];
                                                echo "<option value='" . $id_genero. "' " .  ">" . ($genero_n) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                         

<!--............................................Etnia........................................................-->                       
                        <div class="row">                             
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="grupoetnico">Grupo Étnico</label>
                                    <select class="form-control" name="grupoetnico" id="grupoetnico" required>
                                      <option value="">Seleccione</option>
                                        <?php
                                        $sql_etnia = "select * from tbl_etnia order by detalle asc";
                                        $ejecutar = mysqli_query($con, $sql_etnia);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $etnia_n = $row2['detalle'];

                                                $idetnia = $row2['id_etnia'];
                                                echo "<option value='" . $idetnia. "' " .  ">" . ($etnia_n) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>                                
                        </div>
                            

<!--............................................Discapacidad........................................................-->
                        <div class="form-group">
                          <label for="date">Discapacidad :</label> 
                            <script type="text/javascript">
                                function mostrar_discapacidad(a) {
                                    if (a== "No") {
                                        $("#no_discap").show();
                                        $("#si_discap").hide();                                                
                                    }
                                    if (a == "Si") {
                                        $("#no_discap").hide();
                                        $("#si_discap").show();
                                    }                 
                                }    
                            </script>    

                            <div class="form-group">
                              <label for="n_discap">¿Tiene algún tipo de discapacidad?</label> 
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" id="n_discap" name="n_discap" onChange="mostrar_discapacidad(this.value);" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>                                                
                                        </select>
                                    </div>
                                </div>
                            </div>                            
            
                            <div id="no_discap" style="display: none;"></div>                  
            
                            <div id="si_discap" style="display: none;">
                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="n_tipo_disca">Especifíque:</label> 
                                <div class="row" >                          
                                    <div class="col-md-6">
                                        <select name="n_tipo_disca" class="form-control" id="especificar">
                                            <option value="0" selected>Seleccione</option>  
                                            <?php
                                                $sql_tdiscap = "SELECT * FROM tbl_tipos_discapacidad WHERE id_tipo_discapacidad != 0 order by detalle asc";
                                                $ejecutar_tdiscap = mysqli_query($con, $sql_tdiscap);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar_tdiscap) > 0) {
                                                    while ($row_tdiscap = mysqli_fetch_array($ejecutar_tdiscap)) {
                                                        
                                                        $nom_tdiscap = $row_tdiscap['detalle'];
                                                        $id_tdisca = $row_tdiscap['id_tipo_discapacidad'];
                                                        echo "<option value='" . $id_tdisca. "' " .  ">" . ($nom_tdiscap) . "</option>";
                                                    }
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div><br>
                               
<!--............................................Porcentaje........................................................-->
                                <div class="form-group">
                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="porcentaje_d">Porcentaje:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" id="n_porcentaje" name="n_porcentaje" maxlength="5" type="range" class="form-control" value="" placeholder="100">
                                                <span class="input-group-addon">%</span>   
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--............................................CONADIS........................................................-->
                                <div class="form-group">
                                    <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="n_conadis">¿Carnet CONADIS?</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="n_conadis" id="n_conadis" class="form-control">
                                                <option value="Si">Si</option>
                                                <option value="No" selected>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                               

<!--............................................ESTABLECIMIENTO DISCAPACIDAD........................................................-->
                                <script type="text/javascript">
                                    function mostrar_establecimiento_discapacidad(a) {
                                        if (a== "No") {
                                            $("#no_establecimiento").show();
                                            $("#si_establecimiento").hide();
                                        }

                                        if (a == "Si") {
                                            $("#no_establecimiento").hide();
                                            $("#si_establecimiento").show();
                                        }                 
                                    }    
                                </script>    

                                <div class="form-group">
                                    <label  for="n_establec_dis" style="padding-left: 2%" >¿Asiste a algún establecimiento de Educación Especial?</label> 
                                    <div class="row">
                                        <div class="col-md-3" style="padding-left: 4%">
                                            <select class="form-control" id="n_establec_dis" name="n_establec_dis" onChange="mostrar_establecimiento_discapacidad(this.value);">
                                                <option value="Si">Si</option>
                                                <option value="No" Selected>No</option>                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>                            
            
                                <div id="no_establecimiento" style="display: none;"></div>                    
                    
                                <div id="si_establecimiento" style="display: none;">
                                    <div class="form-group" style="padding-left: 4%">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for="nom_establec">Nombre:</label>
                                                <input type="text" id="nom_establec" name="nom_establec" class="form-control" value= "" placeholder="Nombre">
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                            </div>  
                     

 <!--............................................Peso........................................................-->
                                    <label for="n_peso">Peso:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">                                                
                                                <input type="text" id="n_peso" name="n_peso" maxlength="7" class="form-control" value="" placeholder="00.000" required>
                                                <span class="input-group-addon">kg</span>   
                                            </div>
                                        </div>
                                    </div>


<!--............................................Talla........................................................-->
                                    <label for="n_talla">Talla:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">                                            
                                                <input type="text" id="n_talla" name="n_talla" maxlength="3" class="form-control" value="" placeholder="123" required>
                                                <span class="input-group-addon">cm</span>   
                                            </div>
                                        </div>
                                    </div>                            

<!--............................................Nivel niño.......................................................-->                            
                                    <div class="row">                             
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              <label for="role">Nivel académico:</label>
                                                <select class="form-control" name="ninio_nivel" id="ninio_nivel" required>
                                                  <option value="">Seleccione</option>
                                                    <?php
                                                    $sql_nivel_ninio = "select * from tbl_niveles_estudio_ninio order by detalle asc";
                                                    $ejecutar = mysqli_query($con, $sql_nivel_ninio);//ejecutar consulta
                                                    
                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                            
                                                            $detalle_nivel = $row2['detalle'];

                                                            $id_nivel = $row2['id_niveles_ninio'];
                                                            echo "<option value='" . $id_nivel. "' " .  ">" . ($detalle_nivel) . "</option>";
                                                        }
                                                    } 
                                                    ?>
                                                </select>
                                            </div> 
                                        </div> 
                                    </div>                           

<!--............................................Sobrenombre........................................................-->
                                    <div class="row">                             
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sobrenombre_n">¿Como lo llaman en casa?</label>
                                                <input type="text" id="sobrenombre_n" name="sobrenombre_n" class="form-control" value="" placeholder="Sobrenombre" required>
                                            </div>
                                        </div>                                
                                    </div>

<!--............................................CDI.......................................................-->                                
                                    <div class="row">                             
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="role">Nombre del CDI:</label>
                                                <select class="form-control" name="cdi" id="cdi" required>
                                                <option value="">Seleccione</option>
                                                    <?php
                                                    $sql_cdi = "SELECT * FROM `tbl_cdi` WHERE id = $num_cdi";
                                                    $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                                    
                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                            
                                                            $cdi = $row2['nombre'];

                                                            $idcdi = $row2['id'];
                                                            echo "<option value='" . $idcdi. "' " .  ">" . ($cdi) . "</option>";
                                                        }
                                                    } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

<!--............................................PEriodo........................................................-->                       
                                    <div class="row">                             
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="periodo_ni">Período académico:</label>
                                                <select class="form-control" name="periodo_ni" id="periodo_ni" required>
                                                    <option value="">Seleccione</option>
                                                    <?php
                                                    $sql_periodo_n = "select * from tbl_periodo WHERE id_periodo = $num_per";
                                                    $ejecutar = mysqli_query($con, $sql_periodo_n);//ejecutar consulta
                                                    
                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {                                                           
                                                            $periodo_ini = $row2['inicio'];
                                                            $periodo_fin = $row2['fin'];
                                                            $id_periodo_n = $row2['id_periodo'];
                                                            echo "<option value='" . $id_periodo_n. "' " .  ">" . ("$periodo_ini $periodo_fin") . "</option>";
                                                        }
                                                    } 
                                                    ?>
                                                </select>                                    
                                            </div>
                                        </div>
                                    </div>                                    
<!--............................................estado........................................................-->

                                    <input type="hidden" name="estado_n" class="form-control" value= "Activo">

<!--............................................estado EI........................................................-->

<input type="hidden" name="estado_ent_inicial" class="form-control" value= "0">  

<!--............................................estado SE........................................................-->

<input type="hidden" name="estado_socio_eco" class="form-control" value= "0">                                      

<!--............................................Imagen........................................................-->
                                    <div class="form-group">
                                        <label for="image">Fotografía</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                
                                <input type="submit" value="Agregar Datos Personales del Niño(a)" name="submit" class="btn btn-primary">
                                <a href="menuprincipaldatosninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <button type="button" class="btn btn-primary">Regresar</button>
                                </a>
                    </form>
                </div>
                                <!--    <div class="col-md-4">  -->
                                        <?php
                                        //if (isset($check_image)) {
                                        //   echo "<img src='img/$check_image' width='50%'>";
                                        //}
                                        ?>
                                <!--    </div>   -->
            </div>
        </div>
    </div>
    
<?php require_once('inc/footer.php'); ?>
    