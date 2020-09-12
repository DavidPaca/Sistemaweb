<?php
require_once('inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
?>

<script type="text/javascript" src="js/jquery.js"></script>


<!--script provincia-->
<script >
    
    $(document).ready(function(e){
        $("#provincia").change(function(){
            var parametros ="id="+$("#provincia").val();
            
            $.ajax({
                data:parametros,
                url: 'ajax_canton.php',
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
                url: 'ajax_parroquia.php',
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
                url: 'ajax_fechaedad.php',
                type: 'post',
                beforeSend: function(){
                   
                },
                success: function(response){
                  //  alert(response);
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
                url: 'ajax_fechames.php',
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
                url: 'ajax_fechadias.php',
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
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>/Datos Personales del Niño/Niña </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Ingresar Datos Personales del Niño/Niña</li>
                    </ol>
                    
                    
                    <?php
                    
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                            //$date = time();
                        $tipo_docide = ( $_POST['ti_docide']);
                        $ci = ( $_POST['ci']);
                        $n_apellidos = ( $_POST['apellidos_n']);
                        $n_nombres = ( $_POST['nombres_n']);     /*first name es el nombre del cajon*/
                        $fechanaci = ( $_POST['fecha_nac']);
                        $n_anio = ( $_POST['anio_n']);
                        $n_mes = ( $_POST['mes_n']);
                        $n_dia = ( $_POST['dia_n']);
                        $n_pais = ( $_POST['pais_nom']);                                             
                        $n_ciudad = ( $_POST['ciudad_n']);
                        $provincianac= ( $_POST['provincia_n']);
                        $cantonnac= ( $_POST['canton_no']);
                        $parroquia_n= ( $_POST['parroquia_ni']);
                        $direccion_domic= ( $_POST['direcion_do']);
                        $referencia_dom= ( $_POST['referencia_domi']);
                        $genero_ni =  ( $_POST['genero_n']);
                        $getnico_n  = ( $_POST['grupoetnico']);
                        $n_discapacidad= ( $_POST['n_discap']);
                        $porcentaje_n = ( $_POST['n_porcentaje']);
                        $c_conadis_n = ( $_POST['n_conadis']);
                        $t_discapa_n = ( $_POST['n_tipo_disca']);
                        $establec_disca= ( $_POST['n_establec_dis']);
                        $nombre_establec = ( $_POST['nom_establec']);
                        $peso_n = ( $_POST['n_peso']);
                        $talla_n = ( $_POST['n_talla']);
                        $nivel_ninio = ( $_POST['ninio_nivel']);
                        $sobrenombre = ( $_POST['sobrenombre_n']);
                             // $role = $_POST['role'];
                            // $docide_n=$_POST['docide'];
                        $cdi =  ($_POST['cdi']);
                        $n_estado = ( $_POST['estado_n']);
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                //      echo($first_name.$last_name.$ci.$fechanaci.$paisnac.$provincianac.$parroquianac.$genero_ni.$grupoetnico_n.$discapacidad_n.$pocentajedisc. $sobrenombre);

                        
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($n_nombres) or empty($n_apellidos) or empty($ci)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else 
                        
                        {
   //echo ($last_name+$first_name+$docide_n+$ci+$fechanaci+$lugarnac+$genero_ni+$grupoetnico_n+$nombre_ma+$nombre_pa+$direccion_domic+$discapacidad_n+$pocentajedisc+$carnetcon+$sobrenombre+$cdi);
                            
                            
                $insert_query = "  INSERT INTO tbl_datos_personales_ninio(apellidos, nombres, id_docide, numero_docide, fecha_nac, anio, mes, dia , pais, ciudad, id_provincia, id_canton, id_parroquia, direccion_dom, referencia_ubicacion, id_genero, id_etnia, discapacidad, porcentaje, carnet_conadis, id_tipo_discapacidad, asiste_estableci_personas_discapacidad, nombre_establecimiento, peso, talla, id_niveles_ninio, como_lo_llaman, id_cdi, estado, imagen_ninio) VALUES ('$n_apellidos','$n_nombres','$tipo_docide','$ci','$fechanaci','$n_anio','$n_mes','$n_dia','$n_pais','$n_ciudad','$provincianac','$cantonnac','$parroquia_n','$direccion_domic','$referencia_dom','$genero_ni','$getnico_n','$n_discapacidad','$porcentaje_n','$c_conadis_n','$t_discapa_n','$establec_disca','$nombre_establec','$peso_n','$talla_n','$nivel_ninio','$sobrenombre','$cdi','$n_estado','$image')";
                            if (mysqli_query($con, $insert_query)) {
                               $msg = "Datos ingresados";
                             //  $path="img/$image";

                              
                                move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                              //  move_uploaded_file($image_tmp, $path);
                              // copy($path,"../$path");
                              $msg = "Datos ingresados";
                              $first_name = "";
                                $last_name = "";
                                $ci  = "";
                                $username = "";
                          // header("Location: niniosregistrados.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Datos no ingresados";
                            }
                        }
                    }
                    ?>

<form action="" method="post" enctype="multipart/form-data">

<!--............................................Documento Identidad........................................................-->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group ">
                                    <label for="ti_docide">Tipo de Documento de Identificación :</label>
                                    <select class="form-control" name="ti_docide" id="ti_docide">
                                    <option value="seleccione">Seleccione</option>
                                        <?php
                                        $sql_cdi = "select * from tbl_documento_identidad";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $detalledocu = $row2['detalle'];

                                                $iddocu = $row2['id_docide'];
                                                echo "<option value='" . $iddocu. "' " .  ">" . ucfirst($detalledocu) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
<!--............................................CI........................................................-->
                                <div class="form-group">
                                    <label for="ci">Número de Documento de Identificación:</label>
                                    <input type="text" id="username" name="ci" class="form-control" maxlength="10" value="" placeholder="CI">
                                </div>


<!--............................................Apellidos........................................................-->
                                <div class="form-group">
                                    <label for="apellidos_n">Apellidos:</label>
                                    <input type="text" id="apellidos_n" name="apellidos_n" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Apellidos">
                                </div>

<!--............................................Nombre........................................................-->                    
                <!--    <div class="row">
                        <div class="col-md-8">  -->
                                <div class="form-group">
                                    <label for="nombres_n">Nombres :</label>                                   
                                    <input type="text" id="nombres_n" name="nombres_n" class="form-control" value= "<?php
                                   ?>" placeholder="Nombres">
                                </div>


<!--............................................Fecha nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="fecha_nac">Fecha de Nacimiento :</label>  
                                   <!-- <input  class="form-control" placeholder="Fecha de Nacimiento">-->
                                    <input type="date"  name="fecha_nac" class="form-control" id="fecha_nac">
                                </div>


<!--............................................Edad........................................................-->
                           <!-- <label for="porcentaje_d">Peso:</label> -->
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group" id="calculafecha">
                                                                                          
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="input-group" id="calculames">
                                                                                          
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="input-group" id="calculadias">
                                                                                          
                                            </div>
                                    </div>
                                    
                                </div>
                                
                                </div> 
                                                          <!--  <div class="form-group">
                                                                    <div>
                                                                    <input type="date" class="form-control"name="naci" id="fecha" >
                                                                    <label id="calculafecha"></label>
                                                                    </div>
                                                            </div>  -->


<!--............................................Lugar de Nacimiento........................................................-->

                           
                <div class="form-group">
                    <label for="pais_n">Lugar de Nacimiento :</label> 

                    <script type="text/javascript">

                        function mostrar(a) {
                            if (a== "otro") {
                                $("#otro").show();
                                $("#Ecuador").hide();
                            
                            }

                            if (a == "Ecuador") {
                                $("#otro").hide();
                                $("#Ecuador").show();
                        
                            }

                           
                        }    
                    </script>    

            <!--     <div class="form-group">
                     <label for="pais_n">Seleccione Pais:</label> 
                        <select name="pais_nom" id="pais_n" class="form-control" onChange="mostrar(this.value);">
                            <option value="seleccione">Seleccione</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="otro">Otro</option>
                        
                        </select>
                    </div>  -->
                    
                    <select  class="form-control" onChange="mostrar(this.value);" >
                            <option value="seleccione">Seleccione</option>
                            <option name="pais_nom" value="Ecuador">Ecuador</option>
                            <option value="otro">Otro</option>
                        
                        </select>
                    
                    <div id="otro" style="display: none;">
                        
                        <div class="form-group">
                         <label for="pais_n">País:</label> 
                            <input type="text" name="pais_nom" class="form-control">  
                            <label for="ciudad_n">Ciudad:</label> 
                            <input type="text" name="ciudad_n" class="form-control">
                        </div>
                    </div>
                    
                    
                        <div id="Ecuador" style="display: none;" >
                          <label for="provincia_n">Provincia:</label> 
                            <select name="provincia_n" class="form-control" id="provincia">
                              <option value="seleccione">Seleccione</option>  
                                <?php
                                    $sql_provincia = "select * from tbl_provincia";
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



                                <label for="canton_no">Cantón:</label>                            
                                <select name="canton_no" id="canton" class="form-control" >
                                        <option value="seleccione" selected>Seleccione</option>
                                </select>
                                   
                                   <label for="parroquia_ni">Parroquia:</label>
                                    <select name="parroquia_ni" class="form-control" id="parroquia">
                                         <option value="seleccione" selected>Seleccione</option>                                        
                                    </select>
                        </div>    
                    
                </div>
        



<!--............................................Direccion domiciliaria........................................................-->
                                <div class="form-group">
                                    <label for="direcion_do">Dirección Domiciliaria:</label>
                                    <input type="text" id="direcion_do" name="direcion_do" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Dirección Domiciliaria">
                                </div>


<!--............................................Referencia de Unbicación........................................................-->
                                <div class="form-group">
                                    <label for="referencia_domi">Referencia de Unbicación:</label>
                                    <input type="text" id="referencia_domi" name="referencia_domi" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Referencia de Unbicación">
                                </div>

<!--............................................Genero........................................................-->
                       
                               
                                <div class="form-group">
                                    <label for="genero_n">Género :</label>
                                    <select class="form-control" name="genero_n" id="genero_n">
                                     <option value="seleccione">Seleccione</option>
                                        <?php
                                        $sql_genero = "select * from tbl_genero";
                                        $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $genero_n = $row2['detalle'];

                                                $id_genero = $row2['id_genero'];
                                                echo "<option value='" . $id_genero. "' " .  ">" . ucfirst($genero_n) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>
                                    
                                </div>
                         

<!--............................................Etnia........................................................-->
                        
                                <div class="form-group">
                                    <label for="grupoetnico">Grupo Étnico</label>
                                    <select class="form-control" name="grupoetnico" id="grupoetnico">
                                      <option value="seleccione">Seleccione</option>
                                        <?php
                                        $sql_etnia = "select * from tbl_etnia";
                                        $ejecutar = mysqli_query($con, $sql_etnia);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $etnia_n = $row2['detalle'];

                                                $idetnia = $row2['id_etnia'];
                                                echo "<option value='" . $idetnia. "' " .  ">" . ucfirst($etnia_n) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>
                                </div>
                            
<!--............................................Nombre de la madre........................................................-->
                              <!--  <div class="form-group">
                                    <label for="nombre_mad">Nombre de la madre:</label>
                                    <input type="text" id="last-name" name="nombre_mad" class="form-control" value= "<?php
                                    //if (isset($last_name)) {
                                      //  echo $last_name;
                                   // }
                                    ?>//" placeholder="Nombre de la madre">
                                </div> -->

<!--............................................Nombre del padre........................................................-->
                              <!--  <div class="form-group">
                                    <label for="nombre_pad">Nombre del padre:</label>
                                    <input type="text" id="last-name" name="nombre_pad" class="form-control" value= "<?php
                                    //if (isset($last_name)) {
                                      //  echo $last_name;
                                   // }
                                    ?>// //placeholder="Nombre del padre">
                                </div> -->




<!--............................................Discapacidad........................................................-->

    <div class="form-group">
                    <label for="date">Discapacidad :</label> 

                    <script type="text/javascript">
                        function mostrar_discapacidad(a) {
                            if (a== "no_discap") {
                                $("#no_discap").show();
                                $("#si_discap").hide();
                            
                            }

                            if (a == "si_discap") {
                                $("#no_discap").hide();
                                $("#si_discap").show();
                            }                 
                        }    
                    </script>    

                    <div class="form-group">
                      <label for="n_discap">¿Tiene algún tipo de discapacidad?</label> 
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="n_discap" name="n_discap" onChange="mostrar_discapacidad(this.value);">
                                    <option value="seleccione">Seleccione</option>
                                    <option value="si_discap">Si</option>
                                    <option value="no_discap">No</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                            
                    
                <div id="no_discap" style="display: none;">                        
                    <div class="form-group">
                         <label for="n_discap">***************No tienes DISCAPACIDADES***************</label>                             
                        </div>
                    </div>
                    
                    
                        <div id="si_discap" style="display: none;">
                          <label for="n_tipo_disca">Especifíque:</label> 
                            <select name="n_tipo_disca" class="form-control">
                              <option value="seleccione">Seleccione</option>  
                                <?php
                                    $sql_tdiscap = "select * from tbl_tipos_discapacidad";
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
                                                           
                            
                                 <label for="porcentaje_d">Porcentaje:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group">
                                            
                                                <input type="text" id="n_porcentaje" name="n_porcentaje" maxlength="3" type="range" value="" min="1" max="100"class="form-control" value="<?php                                    
                                                ?>" placeholder="Porcentaje">
                                                <span class="input-group-addon">%</span>   
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                     <label for="n_conadis">Tiene Carnet del CONADIS:</label>
                                    <div class="row">
                                            <div class="col-md-3">
                                                    <select name="n_conadis" id="n_conadis" class="form-control">
                                                        <option value="seleccione">Seleccione</option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                    </div>
                                </div>


                                <script type="text/javascript">
                        function mostrar_establecimiento_discapacidad(a) {
                            if (a== "no_establecimiento") {
                                $("#no_establecimiento").show();
                                $("#si_establecimiento").hide();
                            
                            }

                            if (a == "si_establecimiento") {
                                $("#no_establecimiento").hide();
                                $("#si_establecimiento").show();
                            }                 
                        }    
                    </script>    

                    <div class="form-group">
                      <label for="n_establec_dis">¿Asiste a algún establecimiento de Educación Especial?</label> 
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="n_establec_dis" name="n_establec_dis" onChange="mostrar_establecimiento_discapacidad(this.value);">
                                    <option value="seleccione">Seleccione</option>
                                    <option value="si_establecimiento">Si</option>
                                    <option value="no_establecimiento">No</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                            
                    
                    <div id="no_establecimiento" style="display: none;">                        
                        <div class="form-group">
                         <label for="n_establec_dis">***************No ASISTE NADIE***************</label>                             
                        </div>
                    </div>
                    
                    
                        <div id="si_establecimiento" style="display: none;">
                                <div class="form-group">
                                    <label for="nom_establec">Nombre/Lugar:</label>
                                    <input type="text" id="nom_establec" name="nom_establec" class="form-control" value= "<?php
                                    ?>" placeholder="Nombre/Lugar">
                                </div>


                </div>  
    </div>

 <!--............................................Peso........................................................-->
                           <label for="n_peso">Peso:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group">
                                            
                                                <input type="text" id="n_peso" name="n_peso" maxlength="3" type="range" value="" min="1" max="100"class="form-control" value="<?php                                    
                                                ?>" placeholder="Peso">
                                                <span class="input-group-addon">kg</span>   
                                            </div>
                                    </div>
                                </div>


<!--............................................Talla........................................................-->
                            <label for="n_talla">Talla:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group">
                                            
                                                <input type="text" id="n_talla" name="n_talla" maxlength="3" type="range" value="" min="1" max="100"class="form-control" value="<?php                                    
                                                ?>" placeholder="Talla">
                                                <span class="input-group-addon">cm</span>   
                                            </div>
                                    </div>
                                </div>                            

<!--............................................Nivel niño.......................................................-->
                            
                                <div class="form-group">
                                    <label for="role">Nivel:</label>
                                    <select class="form-control" name="ninio_nivel" id="ninio_nivel">
                                      <option value="seleccione">Seleccione</option>
                                        <?php
                                        $sql_nivel_ninio = "select * from tbl_niveles_estudio_ninio";
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
                            

<!--............................................Sobrenombre........................................................-->

                                <div class="form-group">
                                    <label for="sobrenombre_n">Como lo llaman en casa:</label>
                                    <input type="text" id="sobrenombre_n" name="sobrenombre_n" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Sobrenombre">
                                </div>
                                

<!--............................................CDI.......................................................-->                                
                                <div class="form-group">
                                    <label for="role">CDI :*</label>
                                    <select class="form-control" name="cdi" id="categories">
                                        <?php
                                        $sql_cdi = "SELECT * FROM `tbl_cdi` WHERE id != 7";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $cdi = $row2['nombre'];

                                                $idcdi = $row2['id'];
                                                echo "<option value='" . $idcdi. "' " .  ">" . ucfirst($cdi) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>
                                </div>
                                
<!--............................................estado........................................................-->

                       <input type="hidden" name="estado_n" class="form-control" value= "Activo">
                                   

<!--............................................Imagen........................................................-->
                                <div class="form-group">
                                    <label for="image">Fotografía</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Datos Personales del Niño(a)" name="submit" class="btn btn-primary">
                            </form>

                        </div>
                        <div class="col-md-4">
                            <?php
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='50%'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php'); ?>