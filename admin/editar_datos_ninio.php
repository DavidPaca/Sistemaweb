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
                        $imagen_n = ($_POST['imagen_del_ninio']);

                                             
                        
                        //echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);


                        $consulta="update tbl_datos_personales_ninio set id_docide='$tipo_docide', numero_docide ='$ci',apellidos='$n_apellidos',nombres='$n_nombres', fecha_nac='$fechanaci',anio='$anio_n',mes='$n_mes',dia='$n_dia',pais='$n_pais',id_provincia='$provincianac', id_canton='$cantonnac',id_parroquia='$parroquia_n',
                        direccion_dom='$direccion_domic', referencia_ubicacion='$referencia_domic', id_genero='$genero_ni', id_etnia='$getnico_n',discapacidad='$n_discapacidad', porcentaje='$porcentaje_n', carnet_conadis='$c_conadis_n',id_tipo_discapacidad='$t_discapa_n', asiste_estableci_personas_discapacidad='$establec_disca',
                        nombre_establecimiento='$nombre_estableci', peso='$peso_n', talla='$talla_n', id_niveles_ninio='$nivel_ninio', como_lo_llaman='$sobrenombre_ninio', id_cdi='$cdi_ninio', imagen_ninio = '$imagen_n' where id_ninio = '$edit_id'";
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
                                    <label for="apellidos_n">Apellidos:</label>
                                    <input type="text" id="apellidos_n" name="apellidos_n" class="form-control" value= "<?php
                                    
                                        echo $last_name;
                                
                                    ?>">
                                </div>                                
<!--............................................Nombre........................................................-->                    
                                                 
                                <div class="form-group">
                                    <label for="nombres_n">Nombres :</label>
                                    <input type="text" id="nombres_n" name="nombres_n" class="form-control" value= "<?php
                                        
                                            echo $first_name;
                                        
                                        ?>">
                                </div>
                            
<!--............................................Fecha nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="fecha_naci">Fecha de Nacimiento :</label>  
                                   
                                    <input type="date"  name="fecha_naci" class="form-control" id="fecha_naci" value="<?php echo($fecha_nac); ?>" >
                                </div>                                

<!--............................................Edad........................................................-->
<!--********************************************Fecha Año*********************************************-->



    <script>
    
        $(document).ready(function(e){
        $("#fecha_naci").blur(function(){
            var parametros ="fecha="+$("#fecha_naci").val();
          alert(parametros)
            $.ajax({
                data:parametros,
                url: 'ajax_edit_fecha_anio.php',
                type: 'post',
                beforeSend: function(){
                   
                },
                success: function(response){
                    alert(response);
                    $("#editcalculafecha").html(response);
                },
                error:function(){
                    alert("error")
                }
            });            
        })       

    })
    </script>


                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group" id="editcalculafecha" >
                                                                                          
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="input-group" id="calculames" required>
                                                                                          
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="input-group" id="calculadias" required>
                                                                                          
                                            </div>
                                    </div>
                                    
                                </div>
                                
                                 



<!--............................................Lugar de Nacimiento........................................................-->

                           
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

                     <!--     <div class="form-group">
                     <label for="pais_n">Seleccione Pais:</label> 
                        <select name="pais_nom" id="pais_n" class="form-control" onChange="mostrar(this.value);">
                            <option value="seleccione">Seleccione</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="otro">Otro</option>
                        
                        </select>
                    </div>  -->
                    <?php 
                    //echo $pais_nac;
                        $conpais="SELECT * from tbl_pais where id_pais = $pais_nac";
                        $runpais=mysqli_query($con,$conpais);
                        $rowpais=mysqli_fetch_array($runpais);
                        $idpais=$rowpais["detalle"];

                    ?>
                    <?php echo $pais_nac;?><?php echo  $idpais;?>

                    
                    <select  class="form-control" onChange="mostrar(this.value); " name="pais_nom" >
                            <option value="<?php echo $pais_nac?>">Seleccione</option>
                            <option name="pais_nom" value="1">Ecuador</option>
                            <option value="otro">Otro</option>
                        
                    </select>
                    
                    <div id="otro" style="display: none;"> <br>
                        
                        <div class="form-group" >
                        <label class = "col-md-3" style= padding-top: 1%;padding-right: 10% for="role">Seleccione el país:</label>  
                            <div class="row" >                          
                                <div class="col-md-8">                     
                                 
                                    <select class="form-control" name="pais_nom" id="pais_nom">
                                                <option value="seleccione">Seleccione</option>
                                                <?php
                                                    $sql_pais_n = "select * from tbl_pais";
                                                    $ejecutar = mysqli_query($con, $sql_pais_n);//ejecutar consulta
                                                    $sql_llenar_pais = "SELECT tbl_datos_personales_ninio.pais,tbl_pais.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_pais ON tbl_datos_personales_ninio.pais = tbl_pais.id_pais Where tbl_datos_personales_ninio.id_ninio=$edit_id";
                                                    $ejecutar_llenarpais = mysqli_query($con, $sql_llenar_pais);
                                                    $row_paisni = mysqli_fetch_array($ejecutar_llenarpais);
                                                    $detalle_llenar_pais = $row_paisni['detalle'];
                                                    $id_llenar_pais = $row_paisni['id_pais'];
                                                    echo "<option value='" . $id_llenar_pais. "' " .  "selected>" . ($detalle_llenar_pais) . "</option>";
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

                    <br>
                    
                    
                        <div id="Ecuador" style="display: none;" >
                          <!--<label for="provincia_n">Provincia:</label> 
                            <select name="provincia_n" class="form-control" id="provincia">
                              <option value="seleccione">Seleccione</option>  
                                <?php
                                    $sql_provincia = "select * from tbl_provincia";
                                    $ejecutar_prov = mysqli_query($con, $sql_provincia);//ejecutar consulta
                                    $sql_llenar_provin = "SELECT tbl_datos_personales_ninio.pais,tbl_provincia.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_provincia ON tbl_datos_personales_ninio.id_provincia = tbl_provincia.id_provincia Where tbl_datos_personales_ninio.id_ninio=$edit_id";
                                                    $ejecutar_llenarprovin = mysqli_query($con, $sql_llenar_provin);
                                                    $row_provni = mysqli_fetch_array($ejecutar_llenarprovin);
                                                    $detalle_llenar_provi = $row_provni['detalle'];
                                                    $id_llenar_provi = $row_provni['id_provincia'];
                                                    echo "<option value='" . $id_llenar_provi. "' " .  "selected>" . ($detalle_llenar_provi) . "</option>";
                                    if (mysqli_num_rows($ejecutar_prov) > 0) {
                                        while ($row_prov = mysqli_fetch_array($ejecutar_prov)) {
                                            
                                            $nom_prov = $row_prov['detalle'];
                                            $id_prov = $row_prov['id_provincia'];
                                            echo "<option value='" . $id_prov. "' " .  ">" . ($nom_prov) . "</option>";
                                        }
                                    } 
                                ?>

                            </select>-->
                            

                            <?php 
                                      $conprov="SELECT * from tbl_provincia where id_provincia = $provincia_nac";
                                      $runprov=mysqli_query($con,$conprov);
                                      $rowprov=mysqli_fetch_array($runprov);
                                      $detprov=$rowprov["detalle"];
                                      //echo $detprov;
                                     
                                      
                                  ?> 
                            
                            <label for="provincia_n" class = "col-md-1" style="padding-top: 1%;padding-right: 10%" >Provincia:</label> 
                            <div class="row" >                          
                                <div class="col-md-8"> 
                                    <select name="provincia_n" class="form-control" id="provincia">
                                    <option value="<?php echo $provincia_nac?>"><?php echo $detprov?></option>  
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
                                </div>
                            </div>
                            

                            <br>
                                  <?php 
                                      $concanton="SELECT * from tbl_canton where id_canton = $canton_nac";
                                      $runcanton=mysqli_query($con,$concanton);
                                      $rowcanton=mysqli_fetch_array($runcanton);
                                      $detcanton=$rowcanton["detalle"];
                                     
                                      
                                  ?> 

                                <label for="canton_no" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Cantón:</label>                            
                                <div class="row" >                          
                                    <div class="col-md-8">
                                        <select name="canton_no" id="canton" class="form-control" >
                                        <option value="<?php echo $canton_nac; ?>" selected> <?php echo $detcanton;?></option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <?php 
                                      $conparroquia="SELECT * from tbl_parroquia where id_parroquia = $parroquia_nac";
                                      $runparroquia=mysqli_query($con,$conparroquia);
                                      $rowparroquia=mysqli_fetch_array($runparroquia);
                                      $detparroquia=$rowparroquia["detalle"];
                                     
                                      
                                  ?> 
                                   <label for="parroquia_ni" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Parroquia:</label>
                                    <div class="row" >                          
                                        <div class="col-md-8">
                                            <select name="parroquia_ni" class="form-control" id="parroquia">
                                            <option value="<?php echo $parroquia_nac; ?>" selected> <?php echo $detparroquia;?></option>
                                            </select>
                                        </div>
                                    </div>
                                  <!--****--> 
                                
                        </div>    
                    
                </div>


<!--............................................Direccion domiciliaria........................................................-->
<div class="form-group">
                                    <label for="direcion_do">Dirección Domiciliaria:</label>
                                    <input type="text" id="direcion_do" name="direcion_do" class="form-control" value= "<?php
                                    echo($dir);
                                    ?>" >
                                </div>


<!--............................................Referencia de Unbicación........................................................-->
                                <div class="form-group">
                                    <label for="referencia_domi">Referencia de Unbicación:</label>
                                    <input type="text" id="referencia_domi" name="referencia_domi" class="form-control" value= "<?php
                                    echo($Referencia_dom);
                                    ?>" >
                                </div>

<!--............................................Genero........................................................-->
                                <div class="form-group">
                                    <label for="genero_n">Género :</label>
                                    <select class="form-control" name="genero_n" id="categories">
                                        <?php
                                        $sql_genero = "select * from tbl_genero";
                                        $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                        $sql_llenar_genero = "SELECT tbl_datos_personales_ninio.id_genero,tbl_genero.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_genero ON tbl_datos_personales_ninio.id_genero = tbl_genero.id_genero Where tbl_datos_personales_ninio.id_ninio=$edit_id";
                                                    $ejecutar_llenargenero = mysqli_query($con, $sql_llenar_genero);
                                                    $row_genero = mysqli_fetch_array($ejecutar_llenargenero);
                                                    $detalle_llenar_genero = $row_genero['detalle'];
                                                    $id_llenar_genero = $row_genero['id_genero'];
                                                    echo "<option value='" . $id_llenar_genero. "' " .  "selected>" . ($detalle_llenar_genero) . "</option>";
                               
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
                                        $sql_llenar_genero = "SELECT tbl_datos_personales_ninio.id_etnia,tbl_etnia.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_etnia ON tbl_datos_personales_ninio.id_etnia = tbl_etnia.id_etnia Where tbl_datos_personales_ninio.id_ninio=$edit_id";
                                                    $ejecutar_llenaretnia = mysqli_query($con, $sql_llenar_genero);
                                                    $row_etnia = mysqli_fetch_array($ejecutar_llenaretnia);
                                                    $detalle_llenar_etnia = $row_etnia['detalle'];
                                                    $id_llenar_etnia = $row_etnia['id_etnia'];
                                                    echo "<option value='" . $id_llenar_etnia. "' " .  "selected>" . ($detalle_llenar_etnia) . "</option>";
                               
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
<?php echo($ni_discapacidad);?>
                    <div class="form-group">
                      <label for="n_discap">¿Tiene algún tipo de discapacidad?</label> 
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="n_discap" name="n_discap" onChange="mostrar_discapacidad(this.value);">
                                    <option value="<?php echo($ni_discapacidad);?>"></option>
                                    <option value="No">No</option>
                                    <option value="Si">Si</option>
                                    
                                
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
                            <select name="n_tipo_disca" class="form-control" id="especificar">
                              <option value="seleccione">Seleccione</option>  
                                <?php
                                    $sql_tdiscap = "select * from tbl_tipos_discapacidad";
                                    $ejecutar_tdiscap = mysqli_query($con, $sql_tdiscap);//ejecutar consulta
                                    $sql_llenart_dicapa = "SELECT tbl_datos_personales_ninio.id_docide,tbl_tipos_discapacidad.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_tipos_discapacidad ON tbl_datos_personales_ninio.id_tipo_discapacidad = tbl_tipos_discapacidad.id_tipo_discapacidad Where id_ninio = $edit_id";
                                            $ejecutar_llenar_tdiscap = mysqli_query($con, $sql_llenart_dicapa);
                                            $row_tdiscap = mysqli_fetch_array($ejecutar_llenar_tdiscap);
                                            $idlltdiscap=$row_tdiscap['id_tipo_discapacidad'];
                                                $detallelltdiscap=$row_tdiscap['detalle'];
                                                echo "<option value='" . $idlltdiscap. "' " .  " selected>" . ($detallelltdiscap) . "</option>";
  
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
                                            
                                                <input type="text" id="n_porcentaje" name="n_porcentaje" maxlength="3" type="range" min="1" max="100"class="form-control" value="<?php echo($ni_porcentaje); ?>" >
                                                <span class="input-group-addon">%</span>   
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                     <label for="n_conadis">Tiene Carnet del CONADIS:</label>
                                    <div class="row">
                                            <div class="col-md-3">
                                                    <select name="n_conadis" id="n_conadis" class="form-control" value="<?php echo($carnet_conadis); ?>" >
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                    </div>
                                </div>


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
                      <label for="n_establec_dis">¿Asiste a algún establecimiento de Educación Especial?</label> 
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="n_establec_dis" name="n_establec_dis" onChange="mostrar_establecimiento_discapacidad(this.value);" value="<?php echo($estable_discap); ?>">
                                    <option value="Si">Si</option>
                                    <option value="No" Selected>No</option>
                                
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
                                    <input type="text" id="nom_establec" name="nom_establec" class="form-control" value="<?php echo($nombre_estable); ?>" >
                                </div>


                </div>  
    </div>


<!--............................................Peso........................................................-->
                                <label for="n_peso">Peso:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group">
                                            
                                                <input type="text" id="n_peso" name="n_peso" maxlength="3" type="range" min="1" max="100"class="form-control" value="<?php                                    
                                               echo($n_peso); ?>" >
                                                <span class="input-group-addon">kg</span>   
                                            </div>
                                    </div>
                                </div>


<!--............................................Talla........................................................-->
                            <label for="n_talla">Talla:</label>
                                <div class="row">
                                    <div class="col-md-3">
                                            <div class="input-group">
                                            
                                                <input type="text" id="n_talla" name="n_talla" maxlength="3" type="range" min="1" max="100"class="form-control" value="<?php                                    
                                                echo($n_talla);?>">
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
                                        $sql_llenarniveln = "SELECT tbl_datos_personales_ninio.id_niveles_ninio,tbl_niveles_estudio_ninio.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_niveles_estudio_ninio ON tbl_datos_personales_ninio.id_niveles_ninio = tbl_niveles_estudio_ninio.id_niveles_ninio Where id_ninio = $edit_id";
                                        $ejecutarllenarniveln2 = mysqli_query($con, $sql_llenarniveln);
                                        $rowniveln = mysqli_fetch_array($ejecutarllenarniveln2);
                                        $idllniveln=$rowniveln['id_niveles_ninio'];
                                            $detalleniveln=$rowniveln['detalle'];
                                            echo "<option value='" . $idllniveln. "' " .  " selected>" . ($detalleniveln) . "</option>";

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
                                    <label for="sobrenombre_n">¿Como lo llaman en casa?</label>
                                    <input type="text" id="sobrenombre_n" name="sobrenombre_n" class="form-control" value="<?php
                                    echo($sobrenombre);
                                    ?>" >
                                </div>
                                


<!--............................................CDI.......................................................-->                                
                                <div class="form-group">
                                    <label for="cdi_n">CDI:</label>
                                    <select class="form-control" name="cdi_n" id="cdi_n">
                                        <?php
                                        $sql_cdi = "select * from tbl_cdi";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        $sql_llenarcdi = "SELECT tbl_datos_personales_ninio.id_cdi,tbl_cdi.nombre FROM tbl_datos_personales_ninio INNER JOIN tbl_cdi ON tbl_datos_personales_ninio.id_cdi = tbl_cdi.id Where id_ninio = $edit_id";
                                        $ejecutarllenarcdi2 = mysqli_query($con, $sql_llenarcdi);
                                        $rowcdi = mysqli_fetch_array($ejecutarllenarcdi2);
                                        $idllcdi=$rowcdi['id'];
                                            $detallecdi=$rowcdi['nombre'];
                                            echo "<option value='" . $idllcdi. "' " .  " selected>" . ($detallecdi) . "</option>";
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $cdi = $row2['nombre'];

                                                $idcdi = $row2['id'];
                                                echo "<option value='" . $idcdi. "' " .  ">" . ($cdi) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                      
<!--............................................Imagen........................................................-->
                                <div class="form-group">
                                    <label for="imagen_del_ninio">Fotografía</label>
                                    <input type="file" id="imagen_del_ninio" name="imagen_del_ninio" value="<?php echo($imagen_n); ?>">
                                </div>       
                                
                                    <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                                    <a href="niniosregistrados.php">
                                            <button type="button" class="btn btn-primary">Cancelar</button>
                                        </a>
                                        <a href="profile_datos_ninio.php?edit=<?php echo $idninio; ?>">
                                            <button type="button" class="btn btn-primary">Regresar</button>
                                        </a>
                                        

                </form>             
                                
                           
                           
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php require_once('inc/footer.php'); ?>
                    