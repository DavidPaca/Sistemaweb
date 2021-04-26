<?php
require_once('../admin/inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS



if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);

    $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
      
        
        $idninio = $edit_row['id_ninio'];
        //echo $idninio;
        //echo 'HOLA';
        /*$idTipodocumento = $edit_row['id_docide'];
        $c_i = $edit_row['numero_docide'];
        $last_name = $edit_row['apellidos'];
        $first_name = $edit_row['nombres'];*/
        $fecha_nac = $edit_row['fecha_nac'];
       /* $anio_ninio = $edit_row['anio'];
        $mes_ninio = $edit_row['mes'];
        $dia_ninio = $edit_row['dia'];
        $pais_nac = $edit_row['pais'];
        $provincia_nac = $edit_row['id_provincia'];
        $canton_nac = $edit_row['id_canton'];
        $parroquia_nac = $edit_row['id_parroquia'];
        $dir = $edit_row['direccion_dom'];
        $Referencia_dom = $edit_row['referencia_ubicacion'];
        $idgenero_n = $edit_row['id_genero'];
        $idetnia_n = $edit_row['id_etnia'];*/
        //$ni_discapacidad = $edit_row['discapacidad'];
        //echo $ni_discapacidad;
        //echo "HOLA SI";
        /*$ni_porcentaje = $edit_row['porcentaje'];
        $carnet_conadis = $edit_row['carnet_conadis'];
        $tip_discapacidad_n = $edit_row['id_tipo_discapacidad'];
        $estable_discap = $edit_row['asiste_estableci_personas_discapacidad'];
        $nombre_estable = $edit_row['nombre_establecimiento'];*/
        /*$n_peso = $edit_row['peso'];
        $n_talla = $edit_row['talla'];
        $n_nivel = $edit_row['id_niveles_ninio'];
        $sobrenombre = $edit_row['como_lo_llaman'];
        $cdi = $edit_row['id_cdi'];
        $id_periodo_ninio = $edit_row['id_periodo_ninio'];
        $imagen_n = $edit_row['imagen_ninio'];*/

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
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Fecha de nacimiento del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                    
                        $fechanaci = ($_POST['fecha_naci']);
                        $n_anio = ($_POST['anio_n']);
                        $n_mes = ($_POST['mes_n']);
                        $n_dia = ($_POST['dia_n']);
                       

                        $consulta="UPDATE tbl_datos_personales_ninio SET fecha_nac='$fechanaci', anio='$n_anio',mes='$n_mes',dia='$n_dia'
                        WHERE id_ninio = $edit_id";
                        //$ejecutar1 = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $consulta)) {
                            //header("Location: profile_datos_ninio_CDIS.php");
                            $msg = "Fecha y edad modificado";
                        } else {
                            $error = "Fecha y edad no modificado";
                        }
                        
                        
                        //$password = crypt($password, $salt);

                       
                    }
                    ?>



<!--*****************************************************************************************-->

       
                    <form action="" method="post" enctype="multipart/form-data">
                                        
<!--............................................Fecha nacimiento........................................................-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                            if (isset($error)) {
                                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                            }        
                                        ?>
                                        <label for="fecha_naci">Fecha de Nacimiento :</label>                                      
                                        <input type="date"  name="fecha_naci" class="form-control" id="fecha_naci" value="<?php echo $fecha_nac; ?>" required>
                                    </div>
                                </div>                                
                            </div>

<!--............................................Edad........................................................-->
<!--********************************************Fecha Año*********************************************-->


                                    <script>
                                    
                                        $(document).ready(function(e){
                                        $("#fecha_naci").blur(function(){
                                            var parametros ="fecha="+$("#fecha_naci").val();
                                        // alert(parametros)
                                            $.ajax({
                                                data:parametros,
                                                url: '../admin/ajax_edit_fecha_anio.php',
                                                type: 'post',
                                                beforeSend: function(){
                                                
                                                },
                                                success: function(response){
                                                // alert(response);
                                                    $("#editcalculafecha").html(response);
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
                                    $("#fecha_naci").blur(function(){
                                        var parametros ="fecha="+$("#fecha_naci").val();
                                    // alert(parametros)
                                        $.ajax({
                                            data:parametros,
                                            url: '../admin/ajax_edit_fechames.php',
                                            type: 'post',
                                            beforeSend: function(){
                                            
                                            },
                                            success: function(response){
                                            // alert(response);
                                                $("#editcalculames").html(response);
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
                                    $("#fecha_naci").blur(function(){
                                        var parametros ="fecha="+$("#fecha_naci").val();
                                    // alert(parametros)
                                        $.ajax({
                                            data:parametros,
                                            url: '../admin/ajax_edit_fechadias.php',
                                            type: 'post',
                                            beforeSend: function(){
                                            
                                            },
                                            success: function(response){
                                            // alert(response);
                                                $("#editcalculadias").html(response);
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
                                            <div class="input-group" id="editcalculames" required>
                                                                                          
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="input-group" id="editcalculadias" required>
                                                                                          
                                            </div>
                                    </div>
                                    
                                </div>
                                
                                      
                                <br>
                                        <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                                        <a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>">
                                            <button type="button" class="btn btn-primary">Cancelar</button>
                                        </a>
                                        <a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>">
                                            <button type="button" class="btn btn-primary">Regresar</button>
                                        </a>
                                        

                    </form>              
                
            </div>
        </div>
    </div>

    <?php require_once('inc/footer.php'); ?>
                    