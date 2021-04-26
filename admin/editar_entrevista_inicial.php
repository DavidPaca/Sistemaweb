<?php
require_once('../admin/inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS

if (!isset($_SESSION['username'])) {
    header('Location: login.php');

   
}

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);

    $edit_query = "SELECT * FROM tbl_entrevista_inicial WHERE id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
             
        $id_ninio = $edit_row['id_ninio'];
        $tiene_alergia_alimento = $edit_row['tiene_alergia_alimento'];
        //echo $tiene_alergia_alimento;
        $rechaza_alimento = $edit_row['rechaza_alimento'];
        $come_solo = $edit_row['come_solo'];
        $usa_mamadera = $edit_row['usa_mamadera'];
        $control_esfinteres = $edit_row['control_esfinteres'];
        $actual_va_banio_solo = $edit_row['actual_va_banio_solo'];
        $presencia_enfermedades_graves = $edit_row['presencia_enfermedades_graves'];
        $intervensiones_q = $edit_row['intervensiones_q'];
        $toma_medicamentos = $edit_row['toma_medicamentos'];
        $es_alergico = $edit_row['es_alergico'];
        $sifrio_accidentes = $edit_row['sifrio_accidentes'];
        $enfermedades_padecio = $edit_row['enfermedades_padecio'];
        $lado_predominante_ninio = $edit_row['lado_predominante_ninio'];
        $ha_gateado = $edit_row['ha_gateado'];
        $problemas_vista = $edit_row['problemas_vista'];
        $usa_lentes = $edit_row['usa_lentes'];
        $escucha_bien = $edit_row['escucha_bien'];
        $usa_audifonos = $edit_row['usa_audifonos'];
        $duerme_solo = $edit_row['duerme_solo'];
        $hora_acostarse = $edit_row['hora_acostarse'];
        $hora_despertarse = $edit_row['hora_despertarse'];
        $vocabulario_ninio = $edit_row['vocabulario_ninio'];
        $Expresa_gestos_palabras = $edit_row['Expresa_gestos_palabras'];
        $dependencia_adultos = $edit_row['dependencia_adultos'];
        $esta_contacto_otros_ninios = $edit_row['esta_contacto_otros_ninios'];
        $sociable_actitud_negativa = $edit_row['sociable_actitud_negativa'];
        $comparte_juguete	 = $edit_row['comparte_juguete'];
        $tiene_mascotas = $edit_row['tiene_mascotas'];
        $llora_con_facilidad = $edit_row['llora_con_facilidad'];
        $miedo_a_algo = $edit_row['miedo_a_algo'];
        $alguien_lee_cuentos = $edit_row['alguien_lee_cuentos'];
        $referencia_del_cdi_n = $edit_row['referencia_del_cdi_n'];
        $experiencia_cdi = $edit_row['experiencia_cdi'];
        $acuerdo_contribucion_cdi = $edit_row['acuerdo_contribucion_cdi'];
        $nombre_entrevistado = $edit_row['nombre_entrevistado'];
        $parentesco = $edit_row['parentesco'];
        $nombre_entrevistador = $edit_row['nombre_entrevistador'];
        $tipo_usuario = $edit_row['tipo_usuario'];
        $fecha_entrevista = $edit_row['fecha_entrevista'];
        $estado_ei = $edit_row['estado_ei'];

   // } else {
       // header('location: index.php');
  /*  }*/
} else {
    header("location: index.php");
}

$num_ci = $_SESSION['username'];
//echo $num_ci;

if (isset($_SESSION['username'])) {//si esque hay la variable edit
    $edt_id = $_SESSION['username'];//get y post sirven para atrapar datos.
    //echo $edt_id;
    $edt_query = "SELECT tbl_usuario.id_docide, tbl_usuario.ci, tbl_usuario.apellidos, tbl_usuario.nombres, tbl_usuario.fecha_ingreso,
    tbl_usuario.direccion_dom, tbl_usuario.telefono, tbl_usuario.correo_e, tbl_usuario.contrasenia, tbl_usuario.id_cdi,
    tbl_usuario.id_periodo_usuario, tbl_usuario.estado_us, tbl_usuario.imagen_usuario, tbl_usuario.tipo, tbl_usuario_nombre.detalle 
    AS detalle_user
    FROM tbl_usuario
    INNER JOIN tbl_usuario_nombre ON tbl_usuario_nombre.id_usuario_nombre = tbl_usuario.tipo
    WHERE tbl_usuario.ci = $num_ci";
    $edt_query_run = mysqli_query($con, $edt_query);
        $edt_row = mysqli_fetch_array($edt_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        $apellidos_user =$edt_row['apellidos'];
        $nombre_users = $edt_row['nombres'];
        $tipo_user_ei = $edt_row['detalle_user'];
        
    }

   // echo($edt_id);

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);



        $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
        $edit_query_run = mysqli_query($con, $edit_query);
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
       
          
            
            //$idninio = $edit_row['id_ninio'];
            $c_i = $edit_row['numero_docide'];
            $last_name = $edit_row['apellidos'];
            $first_name = $edit_row['nombres'];
       }


?>

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
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>/Entrevista Inicial del Niño </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="nientrevistaregistrada.php"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Entrevista Inicial</li>
                    </ol>
                    <?php

/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/

                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        $id_ninio_ei = ( $_POST['id_de_ninios']);
                        $tiene_alergia = ( $_POST['alergias_ninio']);     /*first name es el nombre del cajon*/
                        $rechaza_alimentos = ( $_POST['rechaza_alimentos_ninio']);     
                        $come_solo_n = ( $_POST['come_solo_ei']);     
                        $usa_mamadera_n = ( $_POST['usa_mamadera_ei']);     
                        $cont_esfinteres_n = ( $_POST['cont_esfinteres_ei']);     
                        $banio_solo_n = ( $_POST['banio_solo_ei']);     
                        $tiene_enfer_graves = ( $_POST['enfermedades_graves_ninio']);     
                        $interven_quirurgica = ( $_POST['intervensiones_quirurg']);     
                        $toma_medicamento_ni = ( $_POST['tom_medicamentos']);     
                        $presenta_alergias = ( $_POST['tiene_alergias']);     
                        $tiene_accidentes = ( $_POST['sufrio_accidentes']);     
                        $padecio_enfer_n = ( $_POST['enfermedad_padece_ninio']);     
                        $lado_predominante_n = ( $_POST['lado_predominante']);     
                        $gateo_el_ni = ( $_POST['gatea_ninio']);     
                        $problem_vista_ni = ( $_POST['problema_vista']);     
                        $usa_lentes_ni = ( $_POST['usa_lentes']);     
                        $problem_oido_ni = ( $_POST['problemas_oido']);     
                        $usa_audifonos_ni = ( $_POST['usa_audifonos']);
                        $duerme_solo_ninio = ( $_POST['duerme_solo_ni']);
                        $hora_se_acuesta = ( $_POST['h_acostarse']);
                        $hora_se_despierta = ( $_POST['h_despertarse']);
                        $vocabulario_nin = ( $_POST['vocabulario_ninio']);
                        $expresa_nin = ( $_POST['expresa_ninio']);
                        $dependencia_nin = ( $_POST['dependencia_adultos_n']);
                        $contacto_nin = ( $_POST['contacto_con_ninios']);
                        $sociable_act_neg_nin = ( $_POST['sociable_act_neg']);
                        $comparte_sus_jueguetes = ( $_POST['Comparte_juguetes']);
                        $tiene_mascotas_ninio = ( $_POST['tiene_mascotas_ninio']);
                        $facilmente_llora = ( $_POST['llora_facilmente']);
                        $miedos_ninio_a_algo = ( $_POST['miedos_del_ninio']);
                        $quien_le_lee_cuentos = ( $_POST['leen_cuentos']);
                        $refer_de_cdi = ( $_POST['referencia_cdi_ninio']);
                        $elec_cdi_ninio = ( $_POST['eleccion_cdi']);
                        $acuer_contribucion_ninio = ( $_POST['acuerdos_de_contribucion']);
                        $nombre_entrevistado_ei = ( $_POST['nombre_entrevistado_ninio']);
                        $parentesc_entrevistado_ei = ( $_POST['parentesc_entrevistado_ei']);
                       // $nombres_usuario_ei = ( $_POST['nombres_user']);
                       // $tipo_usuario_ei = ( $_POST['rol_usuario']);
                        $fecha_inscripcion_ei = ( $_POST['fecha_inscrip']);                        
                        

                        $consulta="UPDATE tbl_entrevista_inicial SET id_ninio='$id_ninio_ei', tiene_alergia_alimento='$tiene_alergia',rechaza_alimento='$rechaza_alimentos',
                        come_solo='$come_solo_n', usa_mamadera='$usa_mamadera_n', control_esfinteres='$cont_esfinteres_n', actual_va_banio_solo='$banio_solo_n',
                        presencia_enfermedades_graves='$tiene_enfer_graves',intervensiones_q='$interven_quirurgica', toma_medicamentos='$toma_medicamento_ni',
                        es_alergico='$presenta_alergias', sifrio_accidentes='$tiene_accidentes',    
                        enfermedades_padecio='$padecio_enfer_n', lado_predominante_ninio='$lado_predominante_n',ha_gateado='$gateo_el_ni', 
                        problemas_vista='$problem_vista_ni', usa_lentes='$usa_lentes_ni', escucha_bien='$problem_oido_ni', usa_audifonos='$usa_audifonos_ni', 
                        duerme_solo='$duerme_solo_ninio',hora_acostarse='$hora_se_acuesta', hora_despertarse='$hora_se_despierta', 
                        vocabulario_ninio='$vocabulario_nin', Expresa_gestos_palabras='$expresa_nin',
                        dependencia_adultos='$dependencia_nin', esta_contacto_otros_ninios='$contacto_nin',sociable_actitud_negativa='$sociable_act_neg_nin', 
                        comparte_juguete='$comparte_sus_jueguetes', tiene_mascotas='$tiene_mascotas_ninio', llora_con_facilidad='$facilmente_llora', 
                        miedo_a_algo='$miedos_ninio_a_algo', alguien_lee_cuentos='$quien_le_lee_cuentos',referencia_del_cdi_n='$refer_de_cdi', 
                        experiencia_cdi='$elec_cdi_ninio', acuerdo_contribucion_cdi='$acuer_contribucion_ninio', nombre_entrevistado='$nombre_entrevistado_ei',
                        parentesco='$parentesc_entrevistado_ei',fecha_entrevista='$fecha_inscripcion_ei'
                        WHERE id_ninio = '$edit_id'";
                        //$ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $consulta)) {
                            
                            $msg = "Registro modificado";
                        } else {
                            $error = "Registro no modificado";
                        }
                        
                        
                        //$password = crypt($password, $salt);

                       
                    }
                    ?>

<!--------------------------------------------------Tamaño cajones------------------------------------------------------------>
                    
                            <form action="" method="post" enctype="multipart/form-data">     
                            

<!--............................................Numero_ci/Apellidos/Nombres........................................................-->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!-- <label for="ci_ninio">Número de Documento de Identificación:</label> -->
                                                    <input type="text" id="ci_ninio" name="ci_ninio" class="form-control" maxlength="10" disabled value="<?php echo($c_i); ?>" >
                                                </div>
                                                
                                                <div class="col-md-7">
                                                    <input type="text" id="apellidos_n" name="apellidos_n" class="form-control"  disabled value= "<?php                                    
                                                        echo "$last_name $first_name";                                
                                                    ?>">
                                                    <?php
                                if (isset($error)) {
                                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                                } else if (isset($msg)) {
                                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                }
                            ?>
                                                </div>
                                            
                                            </div>
                                        </div>     

<!--*********************************************** TITULO ALIMENTOS **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_alimentos" style="font-size:1.5rem">ALIMENTOS</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ID PRINCIPAL DEL NIÑO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                        <input type="hidden" name="id_de_ninios" id = "id_de_ninios" value= "<?php echo $edit_id ?>">
                                        

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax alergia alimentos XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listAlergia = function(){
                                                    var id_nin =$("#id_de_ninios_alergia").val();
                                                //alert(id_nin);
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'../admin/ajax_archivos/ajax_mostrar_alergias.php',
                                                        data:{
                                                            'id_nin':id_nin,
                                                        },
                                                        success: function(data){
                                                            //alert(data);
                                                            $('#list-user').empty().html(data);
                                                        }
                                                    })
                                                }

                                                                //eliminar
                                                    $(document).on("click","#eliminar",function(){
                                                        if(confirm("Está seguro que desea eliminar")){

                                                            var id= $(this).data("id");
                                                        //  alert(id_prod);
                                                         //alert(id);                                
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "../admin/ajax_archivos/ajax_eliminar_alergias.php",
                                                                data:{
                                                                    'id':id,                          
                                                                },
                                                                success:function(response){
                                                                //  alert(response);
                                                                    listAlergia();                                        
                                                                },
                                                                error:function(){
                                                                alert("error")
                                                            }
                                                            });
                                                            return false;
                                                        };
                                                    })

                                                //fin eliminar
                                                 
                                                $(document).ready(function(){ 
                                                     //esta funcion carga todos los elemetos de la pagina y esta lista pas usarse
                                                    $("#btn_alergia").click(function (){    //funcion que se va a utlizar
                                                        var id_alimento =$("#ninio_alergia").val();
                                                        var id_ninios =$("#id_de_ninios_alergia").val();
                                                        //alert(id_alimento);
                                                        //alert(id_ninios);
                                                    $.ajax({   //Ajax sirve para hacer un crud y trabajar por partes y ya no se necesita agregar muchos forms
                                                        
                                                        type: 'POST',
                                                        url: '../admin/ajax_archivos/ajax_alim_alergias.php',
                                                        data: {
                                                            'id_alimento': id_alimento,
                                                            'id_ninios': id_ninios,
                                                        },
                                                        success: function (respuesta){
                                                        // alert (respuesta);
                                                            listAlergia();  
                                                        },
                                                        error: function (){
                                                            alert("error");
                                                        }
                                                    });
                                                    return false;
                                                    });
                                                });

                                            </script>

<!--------------------------------------------------Ha tenido alergias------------------------------------------------------------>                             

                                         <!--   <script type="text/javascript">
                                                function mostrar_nombre_alergias(a) {
                                                    if (a== "No") {
                                                        $("#No_tiene_alergia").show();
                                                        $("#Si_tiene_alergia").hide();                            
                                                    }
                                                    if (a == "Si") {
                                                        $("#No_tiene_alergia").hide();
                                                        $("#Si_tiene_alergia").show();
                                                    }                 
                                                }    
                                            </script>     -->

                                            <div class="form-group">
                                                <label for="alergias_ninio">¿Tiene alérgia a algún(os) alimento(s)?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="alergias_ninio" name="alergias_ninio">
                                                        <option value="<?php echo $tiene_alergia_alimento ?>"><?php echo $tiene_alergia_alimento ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>                                                    
                                            
                                          <!--  <div id="No_tiene_alergia" style="display: none;">                    
                                                
                                            </div>  -->   
                                            
                                        <!--    <div id="Si_tiene_alergia" style="display: none;"> -->
                                               <!-- <form id="frmajax" method="POST">  -->
                                                    <div class="form-group">
                                                        <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="ninio_alergia" id="ninio_alergia">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_alrgia_ninio = "select * from tbl_alimentos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_alrgia_ninio);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_alergia_ninio = $row2['detalle'];
                                                                            $id_alrgia_ninio = $row2['id_alimentos'];
                                                                            echo "<option value='" . $id_alrgia_ninio. "' " .  ">" . ($detalle_alergia_ninio) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                <input type="hidden" name="id_de_ninios_alergia" id = "id_de_ninios_alergia" value= "<?php echo $edit_id ?>"> 
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_alergia">Ver / Agregar</button>
                                                        </div>   
                                                 <!--   </div>  -->
                                                 <br>
                                                    <div class="row">
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list-user">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>    
                                               <!-- </form>         -->
                                            </div>
                                           
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax rechaza alimentos (No le gusta) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_rechaza_alimentos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_rech_alim = $("#id_de_ninios_rechaza_alim").val();
                                                         //alert(id_ninio_list_rech_alim); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_rechaza_alimentos_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_rech_alim': id_ninio_list_rech_alim,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_rechaza_alim').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_rech_alim",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar = $(this).data("id_eliminar");
                                                         //alert(id_eliminar);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_rechaza_alimentos_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_rech_alim': id_eliminar,
                                                             },
                                                             success: function(respuesta){
                                                                // alert(respuesta);
                                                                listar_rechaza_alimentos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_rechaza_alim").click(function (){
                                                      var id_rechaza_alimento_ninino = $("#rechaza_alimentos").val();
                                                      var id_ninio_rechaza_alim = $("#id_de_ninios_rechaza_alim").val();
                                                      //alert(id_rechaza_alimento_ninino);
                                                      //alert(id_ninio_rechaza_alim);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_rechaza_alimentos.php',
                                                          data: {
                                                                'id_ajax_rechaza_alimento_ninino':id_rechaza_alimento_ninino,
                                                                'id_ajax_ninio_rechaza_alim':id_ninio_rechaza_alim,
                                                          },
                                                          success: function (respuesta){
                                                            listar_rechaza_alimentos();
                                                          },
                                                          error: function (){
                                                              alert("error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO recheza alimentos ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="rechaza_alimentos_ninio">¿Rechaza algún(os) alimento(s)?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="rechaza_alimentos_ninio" name="rechaza_alimentos_ninio">
                                                            <option value="<?php echo $rechaza_alimento ?>"><?php echo $rechaza_alimento ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                       
                                               <!-- <form id="frmajax" method="POST"> -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="rechaza_alimentos" id="rechaza_alimentos">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_rechaza_alim = "select * from tbl_alimentos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_rechaza_alim);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_rechaza_alim = $row2['detalle'];
                                                                            $id_rechaza_alimento = $row2['id_alimentos'];
                                                                            echo "<option value='" . $id_rechaza_alimento. "' " .  ">" . ($detalle_rechaza_alim) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                <input type="hidden" name="id_de_ninios_rechaza_alim" id = "id_de_ninios_rechaza_alim" value= "<?php echo $edit_id ?>"> 
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_rechaza_alim">Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_rechaza_alim">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <!-- </form>       -->
                                            

<!--*********************************************************** COME SOLO ******************************************************************-->
                                <div class="form-group">
                                  <label for="come_solo_ei">¿Come solo?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="come_solo_ei" name="come_solo_ei" >
                                                <option value="<?php echo $come_solo ?>"><?php echo $come_solo ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--*********************************************************** USA MAMADERA ******************************************************************-->
                                <div class="form-group">
                                  <label for="usa_mamadera_ei">¿Usa mamadera?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="usa_mamadera_ei" name="usa_mamadera_ei">
                                                <option value="<?php echo $usa_mamadera ?>"><?php echo $usa_mamadera ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>  

<!--*********************************************************** CONTROL ESFINTERES ******************************************************************-->
                                <div class="form-group">
                                  <label for="cont_esfinteres_ei">¿Control de esfínteres?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="cont_esfinteres_ei" name="cont_esfinteres_ei" >
                                            <option value="<?php echo $control_esfinteres ?>"><?php echo $control_esfinteres ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>  

<!--*********************************************************** VA A AL BAÑO SOLO ******************************************************************-->
                                <div class="form-group">
                                  <label for="banio_solo_ei">¿Actualemnte va al baño solo?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="banio_solo_ei" name="banio_solo_ei">
                                                <option value="<?php echo $actual_va_banio_solo ?>"><?php echo $actual_va_banio_solo ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                                <option value="Con ayuda">Con ayuda</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 

<!--*********************************************** TITULO SALUD **************************************************** -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">SALUD</label>
                                </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax Presencia Enfermedades Graves XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_enfermedades_graves = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_enfer_graves = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_enfer_graves); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_enfermedades_graves_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_enfer_graves': id_ninio_list_enfer_graves,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_pre_enfer_grave').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_pre_enfermedades_greaves",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_enf_grav = $(this).data("id_eliminar_eg");
                                                         //alert(id_eliminar_enf_grav);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_enfermedades_graves_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_enf_grav': id_eliminar_enf_grav,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_enfermedades_graves();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_enfermedad_grave").click(function (){
                                                      var id_enfermedades_graves = $("#pre_enfermedades_graves").val();
                                                      var id_ninio_enfer_graves = $("#id_de_ninios").val();
                                                      //alert(id_enfermedades_graves);
                                                      //alert(id_ninio_enfer_graves);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_enfermedades_guardar.php',
                                                          data: {
                                                                'id_ajax_enfermedades_graves':id_enfermedades_graves,
                                                                'id_ajax_ninio_enfer_graves':id_ninio_enfer_graves,
                                                          },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_enfermedades_graves();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO presencia enfermedades ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="enfermedades_graves_ninio">¿Ha tenido alguna enfermedad grave?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="enfermedades_graves_ninio" name="enfermedades_graves_ninio">
                                                            <option value="<?php echo $presencia_enfermedades_graves ?>"><?php echo $presencia_enfermedades_graves ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                          
                                               <!-- <form id="frmajax" method="POST"> -->
                                                    <div class="form-group">
                                                      <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="pre_enfermedades_graves" id="pre_enfermedades_graves">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_enfermedades_graves = "select * from tbl_enfermedades order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_enfermedades_graves);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_enfer_graves = $row2['detalle'];
                                                                            $id_enferme_graves = $row2['id_enfermedades'];
                                                                            echo "<option value='" . $id_enferme_graves. "' " .  ">" . ($detalle_enfer_graves) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_enfermedad_grave">Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_pre_enfer_grave">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                              <!--  </form>       -->
                                          
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax Intervensiones quirurgicas XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_intervensiones_quirurgicas = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_inter_quir = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_inter_quir); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_intervensiones_q_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_interven_quir': id_ninio_list_inter_quir,
                                                             },
                                                             success: function(data){
                                                                // alert(data);
                                                                 $('#list_interven_quir').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_interven_quirur",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_inter_quir = $(this).data("id_eliminar_iq");
                                                         //alert(id_eliminar_inter_quir);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_intervensiones_q_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_inter_quir': id_eliminar_inter_quir,
                                                             },
                                                             success: function(respuesta){
                                                                // alert(respuesta);
                                                                 listar_intervensiones_quirurgicas();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_interven_quir").click(function (){
                                                      var id_intervension_q = $("#intervenciones_quir").val();
                                                      var id_ninio_inter_quir = $("#id_de_ninios").val();
                                                      //alert(id_intervension_q);
                                                      //alert(id_ninio_inter_quir);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_intervensiones_q_guardar.php',
                                                          data: {
                                                                'id_ajax_intervension_q':id_intervension_q,
                                                                'id_ajax_ninio_inter_quir':id_ninio_inter_quir,
                                                          },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_intervensiones_quirurgicas();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO intervensiones quirug ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="intervensiones_quirurg">¿Ha tenido alguna intervensión quirúrgica?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="intervensiones_quirurg" name="intervensiones_quirurg" >
                                                        <option value="<?php echo $intervensiones_q ?>"><?php echo $intervensiones_q ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

                                              <!--  <form id="frmajax" method="POST">  -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="intervenciones_quir" id="intervenciones_quir">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_intervensiones_q = "select * from tbl_intervensionesq order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_intervensiones_q);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_intervensiones_q = $row2['detalle'];
                                                                            $id_intervensiones_q = $row2['id_intervensionesq'];
                                                                            echo "<option value='" . $id_intervensiones_q. "' " .  ">" . ($detalle_intervensiones_q) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_interven_quir">Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_interven_quir">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                             <!--   </form>        -->              

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax Toma medicina XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_toma_medicamentos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_medicamento = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_medicamento); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_medicamentos_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_medicamento': id_ninio_list_medicamento,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_medicamentos').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_medicamento",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_toma_medic = $(this).data("id_eliminar_tm");
                                                         //alert(id_eliminar_toma_medic);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_medicamentos_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_toma_medic': id_eliminar_toma_medic,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_toma_medicamentos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_medicamentos").click(function (){
                                                      var id_medicina = $("#_toma_medicamentos").val();
                                                      var id_ninio_medicina = $("#id_de_ninios").val();
                                                      //alert(id_medicina);
                                                      //alert(id_ninio_medicina);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_medicamentos_guardar.php',
                                                          data: {
                                                                'id_ajax_medicina':id_medicina,
                                                                'id_ajax_ninio_medicina':id_ninio_medicina,
                                                          },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_toma_medicamentos();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO toma medicina ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="tom_medicamentos">¿Toma algún tipo de medicamentos de forma regular?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="tom_medicamentos" name="tom_medicamentos">
                                                            <option value="<?php echo $toma_medicamentos ?>"><?php echo $toma_medicamentos ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                      
                                               <!-- <form id="frmajax" method="POST">  -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="_toma_medicamentos" id="_toma_medicamentos">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_medicamentos = "select * from tbl_medicamentos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_medicamentos);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_medicamentos = $row2['detalle'];
                                                                            $id_medicamentos = $row2['id_medicamentos'];
                                                                            echo "<option value='" . $id_medicamentos. "' " .  ">" . ($detalle_medicamentos) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_medicamentos"> Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_medicamentos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <!-- </form>       -->

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax alergico a algo XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_es_alergico = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_alergia = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_alergia); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_es_alergico_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_alergia': id_ninio_list_alergia,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_es_alergico').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_alergia",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_alergia = $(this).data("id_eliminar_ea");
                                                         //alert(id_eliminar_alergia);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_es_alergico_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_alergia': id_eliminar_alergia,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_es_alergico();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_es_alergico").click(function (){
                                                      var id_alergia_del_ninio = $("#es_alergico").val();
                                                      var id_ninio_alergia = $("#id_de_ninios").val();
                                                      //alert(id_alergia_del_ninio);
                                                      //alert(id_ninio_alergia);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_es_alergico_guardar.php',
                                                          data: {
                                                                'id_ajax_alergia_del_ninio':id_alergia_del_ninio,
                                                                'id_ajax_ninio_alergia':id_ninio_alergia,
                                                          },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_es_alergico();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO es alergico a algo ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="tiene_alergias">¿Es alérgico?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="tiene_alergias" name="tiene_alergias">
                                                        <option value="<?php echo $es_alergico ?>"><?php echo $es_alergico ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                            
                                             <!--   <form id="frmajax" method="POST"> -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="es_alergico" id="es_alergico">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_alergia = "select * from tbl_alergias order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_alergia);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_alergia = $row2['detalle'];
                                                                            $id_alergia = $row2['id_alergias'];
                                                                            echo "<option value='" . $id_alergia. "' " .  ">" . ($detalle_alergia) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_es_alergico">Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_es_alergico">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                             <!--   </form>       -->
                                            
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax HA tenido accidentes XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_sufrio_accidentes = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_accidente = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_accidente); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_sufrio_accidentes_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_accidente': id_ninio_list_accidente,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_accidentes').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_accidente",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_accident = $(this).data("id_eliminar_sa");
                                                         //alert(id_eliminar_accident);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_sufrio_accidentes_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_accident': id_eliminar_accident,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_sufrio_accidentes();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_accidentes").click(function (){
                                                      var id_sifrio_accidentes_n = $("#accidentes").val();
                                                      var id_ninio_accidentes = $("#id_de_ninios").val();
                                                      //alert(id_sifrio_accidentes_n);
                                                      //alert(id_ninio_accidentes);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_sufrio_accidentes_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_accidentes':id_ninio_accidentes,
                                                                'id_ajax_sifrio_accidentes_n':id_sifrio_accidentes_n,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_sufrio_accidentes();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO es alergico a algo ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="sufrio_accidentes">¿Ha sufrido algún tipo de accidente?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="sufrio_accidentes" name="sufrio_accidentes">
                                                            <option value="<?php echo $sifrio_accidentes ?>"><?php echo $sifrio_accidentes ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                   
                                               <!-- <form id="frmajax" method="POST">  -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="accidentes" id="accidentes">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_accidentes = "select * from tbl_accidentes order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_accidentes);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_accidentes = $row2['detalle'];
                                                                            $id_accidentes = $row2['id_accidentes'];
                                                                            echo "<option value='" . $id_accidentes. "' " .  ">" . ($detalle_accidentes) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_accidentes"> Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_accidentes">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <!--    </form>       --> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Enfermedades Padecio XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_sufrio_enfer_padece = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_enfermed_padecio = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_accidente); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_enfermedades_padecio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_enfermed_padecio': id_ninio_enfermed_padecio,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_enefer_padecio').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_enfer_padece",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_enfer_padecio = $(this).data("id_eliminar_ep");
                                                         //alert(id_eliminar_accident);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_enfermedades_padecio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_enfer_padecio': id_eliminar_enfer_padecio,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_sufrio_enfer_padece();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_enfer_padecio").click(function (){
                                                      var id_enfer_padecio_n = $("#enfer_padece").val();
                                                      var id_ninio_enfer_padecio = $("#id_de_ninios").val();
                                                      //alert(id_enfer_padecio_n);
                                                      //alert(id_ninio_enfer_padecio);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_enfermedades_padecio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_enfer_padecio':id_ninio_enfer_padecio,
                                                                'id_ajax_enfer_padecio_n':id_enfer_padecio_n,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_sufrio_enfer_padece();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO es alergico a algo ------------------------------------------------------------>                             
                        

                                            <div class="form-group">
                                             <label for="enfermedad_padece_ninio">¿Alguna enfermedad que padeció?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="enfermedad_padece_ninio" name="enfermedad_padece_ninio">
                                                            <option value="<?php echo $enfermedades_padecio ?>"><?php echo $enfermedades_padecio ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                   
                                               <!-- <form id="frmajax" method="POST">  -->
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-8">

                                                                <select class="form-control" name="enfer_padece" id="enfer_padece">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_enf_padece = "select * from tbl_enfermedades order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_enf_padece);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_enf_padece = $row2['detalle'];
                                                                            $id_enf_padece = $row2['id_enfermedades'];
                                                                            echo "<option value='" . $id_enf_padece. "' " .  ">" . ($detalle_enf_padece) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_enfer_padecio">Ver / Agregar</button>
                                                        </div>   
                                                    </div>
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_enefer_padecio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <!--    </form>       -->

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Lado predominante XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="lado_predominante">¿Cuál es su lado predominante?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="lado_predominante" name="lado_predominante" >
                                                        <option value="<?php echo $lado_predominante_ninio ?>"><?php echo $lado_predominante_ninio ?></option>
                                                            <option value="Derecho">Derecho</option>
                                                            <option value="Izquierdo">Izquierdo</option>
                                                            <option value="Ambidiestro">Ambidiestro</option>                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ha gateado XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="gatea_ninio">¿Ha gateado?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="gatea_ninio" name="gatea_ninio">
                                                            <option value="<?php echo $ha_gateado ?>"><?php echo $ha_gateado ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>    
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Problemas de vista XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                
                                            <div class="form-group">
                                             <label for="problema_vista">¿Tiene problemas de vista?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="problema_vista" name="problema_vista">
                                                        <option value="<?php echo $problemas_vista ?>"><?php echo $problemas_vista ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                
                                                <div class="form-group">
                                                  <label class = "col-md-3" style="padding-top: 1%; padding-right: 0%; Width: 15%"  for="role">¿Utiliza lentes?:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-3">
                                                            <select class="form-control" id="usa_lentes" name="usa_lentes" >
                                                                <option value="<?php echo $usa_lentes ?>"><?php echo $usa_lentes ?></option>
                                                                <option value="No">No</option>
                                                                <option value="Si">Si</option>                                                
                                                            </select>
                                                        </div>                                                
                                                    </div>
                                                </div>      
                                              

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Problemas de Oido XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="problemas_oido">¿Tiene problemas de oído?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="problemas_oido" name="problemas_oido">
                                                        <option value="<?php echo $escucha_bien ?>"><?php echo $escucha_bien ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                    
                                                <div class="form-group">
                                                  <label class = "col-md-3" style="padding-top: 1%; padding-right: 0%; Width: 18%"  for="role">¿Utiliza audífonos?:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-3">
                                                            <select class="form-control" id="usa_audifonos" name="usa_audifonos" >
                                                                <option value="<?php echo $usa_audifonos ?>"><?php echo $usa_audifonos ?></option>
                                                                <option value="No">No</option>
                                                                <option value="Si">Si</option>                                                
                                                            </select>
                                                        </div>                                                
                                                    </div>
                                                </div>      
                                            
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX VACUNASS (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_vacunas_ninio = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_vacs = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_habitos); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_vacunas_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_vacs': id_ninio_list_vacs,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_vacunas').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_vacuna_ninio",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_vacunas_ninio = $(this).data("id_eliminar_vacun");
                                                         //alert(id_eliminar_vacunas_ninio);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_vacunas_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_vacunas_ninio': id_eliminar_vacunas_ninio,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_vacunas_ninio();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_vacunas").click(function (){
                                                      var id_vakunas = $("#vacunas_ninio").val();
                                                      var id_ninio_vac = $("#id_de_ninios").val();
                                                      var id_fecha_vacuna = $("#fecha_vacuna").val();
                                                      var id_obcervaciones_vacunas = $("#obcervacion_vacuna").val();
                                                     // alert(id_vakunas);
                                                     // alert(id_ninio_vac);
                                                     // alert(id_fecha_vacuna);
                                                     // alert(id_obcervaciones_vacunas);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_vacunas_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_vac':id_ninio_vac,
                                                                'id_ajax_vacunas':id_vakunas,
                                                                'id_ajax_fecha_vacunas':id_fecha_vacuna,
                                                                'id_ajax_obcervaciones_vacunas':id_obcervaciones_vacunas,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                              document.getElementById("vacunas_ninio").value = "Seleccione";
                                                              document.getElementById("fecha_vacuna").value = "";
                                                              document.getElementById("obcervacion_vacuna").value = "";
                                                            listar_vacunas_ninio();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de Vacunas ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="vacunas_ninio">Vacunas del niño</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="vacunas_ninio" id="vacunas_ninio">
                                                            <option value="seleccione">Seleccione</option>
                                                            <?php
                                                            $sql_habitos = "select * from tbl_vacunas order by detalle asc";
                                                            $ejecutar = mysqli_query($con, $sql_habitos);//ejecutar consulta
                                                            
                                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                    
                                                                    $detalle_vacunass = $row2['detalle'];
                                                                    $id_vacunass = $row2['id_vacunas'];
                                                                    echo "<option value='" . $id_vacunass. "' " .  ">" . ($detalle_vacunass) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>          
                                            </div> 

<!--............................................Fecha de la vacuna........................................................-->
                                                <div class="form-group">
                                                  <label class = "col-md-3" style="padding-top: 1%; padding-left: 0%; Width: 16%"  for="fecha_vacuna">Fecha de la vacuna:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-6">
                                                        <input type="date"  name="fecha_vacuna" class="form-control" id="fecha_vacuna" >
                                                        </div>                                                
                                                    </div>
                                                </div>

<!--............................................Obcervacion vacuna........................................................-->
                                                <div class="form-group">
                                                  <label class = "col-md-3" style="padding-top: 1%; padding-left: 0%; Width: 16%"  for="obcervacion_vacuna">Obcervaciones:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-6">                                                       
                                                            <textarea rows="4" cols="92" name="obcervacion_vacuna" class="form-control" id="obcervacion_vacuna" ></textarea>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" id="btn_vacunas">Ver / Agregar</button>                                                
                                                    </div>
                                                </div>                                          
                                                     
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_vacunas">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                            


<!--*********************************************** TITULO SUEÑO **************************************************** -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">SUEÑO</label>
                                </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DUERME SOLO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                        <div class="form-group">
                                            <label for="duerme_solo_ni">¿Duerme solo?</label> 
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select class="form-control" id="duerme_solo_ni" name="duerme_solo_ni">
                                                        <option value="<?php echo $duerme_solo ?>"><?php echo $duerme_solo ?></option>
                                                        <option value="Si">Si</option>
                                                        <option value="No">No</option>                                                                                                                    
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>                                

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Hora de despertarse XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                
                                        <div class="form-group"> 
                                            <div class="row">                               
                                                <div class="col-md-3"> 
                                                    <label for="fecha_nac">Hora de acostarse :</label>                                       
                                                    <input type="time" class="form-control" name="h_acostarse" id="h_acostarse" value="<?php echo $hora_acostarse ?>">
                                                </div>
                                            </div>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Hora de despertarse XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                
                                        <div class="form-group"> 
                                            <div class="row">                               
                                                <div class="col-md-3"> 
                                                    <label for="fecha_nac">Hora de despertarse :</label>                                       
                                                    <input type="time" class="form-control" name="h_despertarse" id="h_despertarse" value="<?php echo $hora_despertarse ?>">
                                                </div>
                                            </div>
                                        </div>    
                                        
<!--*********************************************** TITULO HABITOS **************************************************** -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">HÁBITOS</label>
                                </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX HABITOS (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_habitos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_habitos = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_habitos); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_habitos_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_habitos': id_ninio_list_habitos,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_habitos').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_habito",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_habitos = $(this).data("id_eliminar_hn");
                                                         //alert(id_eliminar_habitos);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_habitos_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_habitos': id_eliminar_habitos,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_habitos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_habitos").click(function (){
                                                      var id_habitos = $("#habitos_ninio").val();
                                                      var id_ninio_habitos = $("#id_de_ninios").val();
                                                      //alert(id_sifrio_accidentes_n);
                                                      //alert(id_ninio_accidentes);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_habitos_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_habitos':id_ninio_habitos,
                                                                'id_ajax_habitos':id_habitos,
                                                            },
                                                          success: function (respuesta){
                                                             // alert(respuesta);
                                                            listar_habitos();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de Habitos ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="habitos_ninio">¿Cuáles con sus hábitos?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="habitos_ninio" id="habitos_ninio">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_habitos = "select * from tbl_habitos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_habitos);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_habitos = $row2['detalle'];
                                                                            $id_habitos = $row2['id_habitos'];
                                                                            echo "<option value='" . $id_habitos. "' " .  ">" . ($detalle_habitos) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_habitos"> Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_habitos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
<!--*********************************************** TITULO LENGUAJE **************************************************** -->                                             
                                <div class="row">
                                    <label for="titulo_lenguaje" style="font-size:1.5rem">LENGUAJE</label>
                                </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Vocabulario XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="vocabulario_ninio">Tipo de vocabulario</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="vocabulario_ninio" id="vocabulario_ninio">
                                                         <?php
                                                            $sql_vocabulario = "select * from tbl_vocabulario order by detalle asc";
                                                            $ejecutar = mysqli_query($con, $sql_vocabulario);
                                                            $sql_inner_j = "SELECT tbl_entrevista_inicial.vocabulario_ninio, tbl_vocabulario.detalle AS detalle_vocabulario
                                                            from tbl_entrevista_inicial
                                                            INNER JOIN tbl_vocabulario
                                                            ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
                                                            WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                                            $ejecutar2 = mysqli_query($con, $sql_inner_j);
                                                            $row3 = mysqli_fetch_array($ejecutar2);
                                                            $idlltdoc=$row3['vocabulario_ninio'];
                                                                $detallelltdoc=$row3['detalle_vocabulario'];
                                                                echo "<option value='" . $idlltdoc. "' " .  " selected>" . ($detallelltdoc) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                    
                                                                    $detalle_vocab = $row2['detalle'];
                                                                    $id_vocab = $row2['id_vocabulario'];
                                                                    echo "<option value='" . $id_vocab. "' " .  ">" . ($detalle_vocab) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            
 <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Se expresa el ninio XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="expresa_ninio">La mayoría de veces se expresa con:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="expresa_ninio" name="expresa_ninio">
                                                            <option value="<?php echo $Expresa_gestos_palabras ?>"><?php echo $Expresa_gestos_palabras ?></option>
                                                            <option value="Gestos">Gestos</option>
                                                            <option value="Palabras">Palabras</option>
                                                            <option value="Las_dos_formas">Las dos formas</option>
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div> 

<!--*********************************************** TITULO VIDA SOCIAL **************************************************** -->                                             
                                <div class="row">
                                    <label for="titulo_v_social" style="font-size:1.5rem">VIDA SOCIAL</label>
                                </div>                                               
                                            
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Relacion del ninio (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_relacion_ninio = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_parentesco = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_parentesco); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_relacion_ninio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_parentesco': id_ninio_list_parentesco,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_relacion_ninio').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_parentesco",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_pariente = $(this).data("id_eliminar_rn");
                                                         //alert(id_eliminar_pariente);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_relacion_ninio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_pariente': id_eliminar_pariente,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_relacion_ninio();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_relacion_ninio").click(function (){
                                                      var id_parentesco = $("#parentesco_ninio").val();
                                                      var id_ninio_parentesco = $("#id_de_ninios").val();
                                                     // alert(id_ninio_parentesco);
                                                     // alert(id_parentesco);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_relacion_ninio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_parentesco':id_ninio_parentesco,
                                                                'id_ajax_parentesco':id_parentesco,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_relacion_ninio();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Relacion ninio ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="parentesco_ninio">¿Con quién o quiénes se relaciona más el niño?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="parentesco_ninio" id="parentesco_ninio">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_parente = "select * from tbl_parentesco order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_parente);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_paren = $row2['detalle'];
                                                                            $id_paren = $row2['id_parentesco'];
                                                                            echo "<option value='" . $id_paren. "' " .  ">" . ($detalle_paren) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_relacion_ninio">Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_relacion_ninio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Dependencia de adultos XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="dependencia_adultos_n">¿Se muestra dependiente de los adultos?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="dependencia_adultos_n" name="dependencia_adultos_n">
                                                            <option value="<?php echo $dependencia_adultos ?>"><?php echo $dependencia_adultos ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div> 
                                            
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Contacto con otros niños XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="contacto_con_ninios">¿Está en contacto con otros niños?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="contacto_con_ninios" name="contacto_con_ninios">
                                                            <option value="<?php echo $esta_contacto_otros_ninios ?>"><?php echo $esta_contacto_otros_ninios ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div> 
                                            
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Sociable actitud negativa XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="sociable_act_neg">¿Es sociable o presenta una actitud negativa?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="sociable_act_neg" name="sociable_act_neg">
                                                            <option value="<?php echo $sociable_actitud_negativa ?>"><?php echo $sociable_actitud_negativa ?></option>
                                                            <option value="Sociable">Sociable</option>
                                                            <option value="ActitudNegativa">Actitud negativa</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div> 

<!--************************************************************** TITULO JUEGOS ************************************************************* -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">JUEGOS</label>
                                </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX A que juega (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_juegos_ninio = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_juegos = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_juegos); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_juegos_ninio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_juegos': id_ninio_list_juegos,
                                                            },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_juegos_ninio').empty().html(data);
                                                            }
                                                        })
                                                    } 

                                                //eliminar
                                                $(document).on("click","#eliminar_juegos",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_juegos = $(this).data("id_eliminar_jn");
                                                         //alert(id_eliminar_juegos);
                                                        $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_juegos_ninio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_juegos': id_eliminar_juegos,
                                                            },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_juegos_ninio();
                                                            },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                        });
                                                         return false;
                                                    };
                                                })              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_juegos_ninios").click(function (){
                                                      var id_juegos_ninio = $("#juegos_del_ninio").val();
                                                      var id_ninio_juegos = $("#id_de_ninios").val();
                                                      //alert(id_juegos_ninio);
                                                      //alert(id_ninio_juegos);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_juegos_ninio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_juegos':id_ninio_juegos,
                                                                'id_ajax_juegos':id_juegos_ninio,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_juegos_ninio();
                                                          },
                                                          error: function (){                                                              
                                                              alert("Error");
                                                          }
                                                      });
                                                      return false;
                                                  });  
                                                });
                                            </script>

<!-------------------------------------------------- Tabla de juegos ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="juegos_del_ninio">¿A qué juega?</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="juegos_del_ninio" id="juegos_del_ninio">
                                                            <option value="seleccione">Seleccione</option>
                                                            <?php
                                                            $sql_juegos_ninio = "select * from tbl_juegos order by detalle asc";
                                                            $ejecutar = mysqli_query($con, $sql_juegos_ninio);//ejecutar consulta
                                                            
                                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                    
                                                                    $detalle_juegos = $row2['detalle'];
                                                                    $id_juegos = $row2['id_juegos'];
                                                                    echo "<option value='" . $id_juegos. "' " .  ">" . ($detalle_juegos) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                        <button type="button" class="btn btn-primary" id="btn_juegos_ninios">Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_juegos_ninio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Con quien juega el ninio (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_pqjn = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_con_qjuega = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_con_qjuega); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_con_quien_juega_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_con_qjuega': id_ninio_list_con_qjuega,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_persona_q_juega_ninio').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_con_quienj_ninio",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_persona_jninio = $(this).data("id_eliminar_pqjn");
                                                         //alert(id_eliminar_persona_jninio);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_con_quien_juega_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_persona_jninio': id_eliminar_persona_jninio,
                                                             },
                                                             success: function(respuesta){
                                                                // alert(respuesta);
                                                                 listar_pqjn();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_pqjn").click(function (){
                                                      var id_con_quien_juegan = $("#con_quien_juegan").val();
                                                      var id_ninio_persona_q_juega = $("#id_de_ninios").val();
                                                     //alert(id_con_quien_juegan);
                                                     //alert(id_ninio_persona_q_juega);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_con_quien_juega_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_persona_q_juega':id_ninio_persona_q_juega,
                                                                'id_ajax_con_quien_juegan':id_con_quien_juegan,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_pqjn();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de Con quien juega el ninio------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="con_quien_juegan">¿Con quién juega?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="con_quien_juegan" id="con_quien_juegan">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_pqjn = "select * from tbl_personas_que_juega order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_pqjn);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_pqjn = $row2['detalle'];
                                                                            $id_pqjn = $row2['id_personas_q_juega'];
                                                                            echo "<option value='" . $id_pqjn. "' " .  ">" . ($detalle_pqjn) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_pqjn">Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_persona_q_juega_ninio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Dependencia de adultos XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="Comparte_juguetes">¿Comparte con dificultad sus juguetes?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="Comparte_juguetes" name="Comparte_juguetes" >
                                                            <option value="<?php echo $comparte_juguete ?>"><?php echo $comparte_juguete ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>                                                    

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ajax Tinen mascotas XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type = "text/javascript"> 
                                                    var listar_las_mascotas = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_masc = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_masc); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_tiene_mascotas_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_masc': id_ninio_list_masc,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_mascotas_ninio').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_mascota",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_mascota = $(this).data("id_eliminar_tm");
                                                         //alert(id_eliminar_alergia);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_tiene_mascotas_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_mascota': id_eliminar_mascota,
                                                             },
                                                             success: function(respuesta){
                                                                // alert(respuesta);
                                                                 listar_las_mascotas();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_tiene_mascotas").click(function (){
                                                      var id_mascotas_del_ninio = $("#mascotas_ninio").val();
                                                      var id_ninio_mascota = $("#id_de_ninios").val();
                                                      var nombre_mascotita = $("#nombre_macotita").val();
                                                      //alert(id_mascotas_del_ninio);
                                                      //alert(id_ninio_mascota);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_tiene_mascotas_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_mascota':id_ninio_mascota,
                                                                'id_ajax_mascotas_del_ninio':id_mascotas_del_ninio,
                                                                'id_ajax_nombre_mascotita':nombre_mascotita,
                                                          },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                              document.getElementById("nombre_macotita").value = "";                                                              
                                                            listar_las_mascotas();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- SI/NO Tinen mascotas ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="tiene_mascotas_ninio">¿Tiene mascotas?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="tiene_mascotas_ninio" name="tiene_mascotas_ninio" >
                                                            <option value="<?php echo $tiene_mascotas ?>"><?php echo $tiene_mascotas ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                                                            
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                                                        <div class="row" >                          
                                                            <div class="col-md-7">

                                                                <select class="form-control" name="mascotas_ninio" id="mascotas_ninio">
                                                                <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_mascotas = "select * from tbl_mascotas order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_mascotas);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_mascota = $row2['detalle'];
                                                                            $id_mascota = $row2['id_mascota'];
                                                                            echo "<option value='" . $id_mascota. "' " .  ">" . ($detalle_mascota) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                                
                                                            </div>
                                                            
                                                        </div>   
                                                    </div>

<!--............................................Nombre mascota........................................................-->
                                                    <div class="form-group">
                                                      <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="nombre_macotita">Nombre:</label>  
                                                        <div class="row">                          
                                                            <div class="col-md-6">
                                                            <input type="text"  name="nombre_macotita" class="form-control" id="nombre_macotita" >
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_tiene_mascotas">Agregar</button>                                                
                                                        </div>
                                                    </div>

                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_mascotas_ninio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
<!--************************************************************** TITULO PERSONALIDAD ************************************************************* -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">PERSONALIDAD</label>
                                </div>   

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Llora con facilidad XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="llora_facilmente">¿Llora con facilidad?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="llora_facilmente" name="llora_facilmente">
                                                            <option value="<?php echo $llora_con_facilidad ?>"><?php echo $llora_con_facilidad ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXGustos ninio (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_los_gustos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_gusto = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_gusto); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_gustos_ninio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_gusto': id_ninio_list_gusto,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_que_le_gusta').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_gustos_ninio",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_gusto = $(this).data("id_eliminar_gn");
                                                         //alert(id_eliminar_persona_jninio);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_gustos_ninio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_gusto': id_eliminar_gusto,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                listar_los_gustos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_que_le_gusta").click(function (){
                                                      var id_gustos = $("#q_le_gusta").val();
                                                      var id_ninio_gustos = $("#id_de_ninios").val();
                                                     //alert(id_gustos);
                                                     //alert(id_ninio_gustos);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_gustos_ninio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_gustos':id_ninio_gustos,
                                                                'id_ajax_gustos':id_gustos,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_los_gustos();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de gustos ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="q_le_gusta">¿Qué le gusta?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="q_le_gusta" id="q_le_gusta">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_gustos = "select * from tbl_gustos_disgustos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_gustos);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_gustos = $row2['detalle'];
                                                                            $id_gustos = $row2['id_gustos_disgustos'];
                                                                            echo "<option value='" . $id_gustos. "' " .  ">" . ($detalle_gustos) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_que_le_gusta">Ver/ Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_que_le_gusta">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Disgustos ninio (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var listar_los_disgustos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_disgustos = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_disgustos); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_disgustos_ninio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_disgustos': id_ninio_list_disgustos,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_que_le_disgusta').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_disgustos",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_disgustos = $(this).data("id_eliminar_disgu");
                                                         //alert(id_eliminar_disgustos);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_disgustos_ninio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_disgustos': id_eliminar_disgustos,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_los_disgustos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_que_le_disgusta").click(function (){
                                                      var id_disgustos = $("#q_le_disgusta_ninio").val();
                                                      var id_ninio_disgustos = $("#id_de_ninios").val();
                                                      //alert(id_sifrio_accidentes_n);
                                                      //alert(id_ninio_accidentes);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_disgustos_ninio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_disgustos':id_ninio_disgustos,
                                                                'id_ajax_disgustos':id_disgustos,
                                                            },
                                                          success: function (respuesta){
                                                             // alert(respuesta);
                                                            listar_los_disgustos();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de disgustos------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="q_le_disgusta_ninio">¿Qué le disgusta?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="q_le_disgusta_ninio" id="q_le_disgusta_ninio">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_gustos = "select * from tbl_gustos_disgustos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_gustos);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_disgustos = $row2['detalle'];
                                                                            $id_disgustos = $row2['id_gustos_disgustos'];
                                                                            echo "<option value='" . $id_disgustos. "' " .  ">" . ($detalle_disgustos) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_que_le_disgusta">Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_que_le_disgusta">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MIEDOS (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                                <script type = "text/javascript"> 
                                                    var listar_los_miedos = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_miedos = $("#id_de_ninios").val();
                                                         //alert(id_ninio_list_habitos); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_miedos_ninio_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_miedos': id_ninio_list_miedos,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_miedos').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_miedos",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_miedosn = $(this).data("id_eliminar_miedon");
                                                         //alert(id_eliminar_habitos);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_ei_miedos_ninio_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_miedosn': id_eliminar_miedosn,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 listar_los_miedos();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_miedo").click(function (){
                                                      var id_miedos = $("#miedos_ninio").val();
                                                      var id_ninio_miedos = $("#id_de_ninios").val();
                                                      //alert(id_ninio_miedos);
                                                      //alert(id_miedos);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_ei_miedos_ninio_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_miedos':id_ninio_miedos,
                                                                'id_ajax_miedos':id_miedos,
                                                            },
                                                          success: function (respuesta){
                                                              //alert(respuesta);
                                                            listar_los_miedos();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de miedoss ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="miedos_del_ninio">¿Tiene miedo a algo?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="miedos_del_ninio" name="miedos_del_ninio" onChange="mostrar_los_miedos_del_ninio(this.value);">
                                                            <option value="<?php echo $miedo_a_algo ?>"><?php echo $miedo_a_algo ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                             
                                                    <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label> 
                                                        <div class="row">
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="miedos_ninio" id="miedos_ninio">
                                                                    <option value="seleccione">Seleccione</option>
                                                                        <?php
                                                                        $sql_miedos = "select * from tbl_miedos order by detalle asc";
                                                                        $ejecutar = mysqli_query($con, $sql_miedos);//ejecutar consulta
                                                                        
                                                                        if (mysqli_num_rows($ejecutar) > 0) {
                                                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                                
                                                                                $detalle_miedos = $row2['detalle'];
                                                                                $id_miedos_ninio = $row2['id_miedos'];
                                                                                echo "<option value='" . $id_miedos_ninio. "' " .  ">" . ($detalle_miedos) . "</option>";
                                                                            }
                                                                        } 
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            <button type="button" class="btn btn-primary" id="btn_miedo">Ver / Agregar</button>
                                                        </div>          
                                                    </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_miedos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                          
<!--************************************************************** TITULO OTROS DATOS DE INTERES ************************************************************* -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">OTROS DATOS DE INTERÉS</label>
                                </div>   

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Le leen cuentos XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="leen_cuentos">¿Le leen cuentos?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="leen_cuentos" name="leen_cuentos" >
                                                        <option value="<?php echo $alguien_lee_cuentos ?>"><?php echo $alguien_lee_cuentos ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                                                                                                    
                                                            <option value="Aveces">Aveces</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div> 

<!--************************************************************** TITULO OBSERVACIONES ************************************************************* -->                                             
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">OBSERVACIONES</label>
                                </div>
                                <div class="row">
                                    <label for="nom_alimentos" style="font-size:1.5rem">Estamos muy contentos de que haya elegido nuestra Institución para su niño/niña</label>
                                </div>    

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX REFERENCIA CDI XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="referencia_cdi_ninio">¿Cuál fue el motivo de su elección?</label> 
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <select class="form-control" id="referencia_cdi_ninio" name="referencia_cdi_ninio" >
                                                            <option value="<?php echo $referencia_del_cdi_n ?>"><?php echo $referencia_del_cdi_n ?></option>
                                                            <option value="Cercanía">Cercanía</option>
                                                            <option value="Buenas_referencias">Buenas referencias</option>                                                                                                                    
                                                            <option value="Conocía_la_Institución">Conocía la Institución</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ELECCION CDI XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">                
                                             <label for="eleccion_cdi">¿Cómo calificaría de acuerdo a su experiencia? El Centro de Desarrollo Infantil es:</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="eleccion_cdi" name="eleccion_cdi" >
                                                        <option value="<?php echo $experiencia_cdi ?>"><?php echo $experiencia_cdi ?></option>
                                                            <option value="Excelente">Excelente</option>
                                                            <option value="Muy_bueno">Muy bueno</option>                                                                                                                    
                                                            <option value="Bueno">Bueno</option>                                                                                                                    
                                                            <option value="Regular">Regular</option>                                                                                                                    
                                                            <option value="Insuficiente">Insuficiente</option>                                                                                                                    
                                                            <option value="Reprobado">Reprobado</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ACUERDO CONTRIBUCION CDI XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="acuerdos_de_contribucion">Está Usted de acuerdo en realizar autogestión o contribuir para el bienestar de su niño/niña 
                                                                               y para el mejoramiento de las instalaciones del Centro de Desarrollo Infantil</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="acuerdos_de_contribucion" name="acuerdos_de_contribucion">
                                                            <option value="<?php echo $acuerdo_contribucion_cdi ?>"><?php echo $acuerdo_contribucion_cdi ?></option>
                                                            <option value="Acuerdo">Si estoy de acuerdo</option>
                                                            <option value="Desacuerdo">No estoy de acuerdo</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>                                             

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX NOMBRE ENTREVISTADO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-8" >
                                                        <label for="nombre_entrevistado_ninio">Nombre del entrevistado(a):</label>
                                                        <input type="text" id="nombre_entrevistado_ninio" name="nombre_entrevistado_ninio" class="form-control" value= "<?php echo $nombre_entrevistado ?>" placeholder="Nombre del entrevistado(a)">
                                                    </div>
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX PARENTESCO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            
                                            <div class="row">
                                                <div class="col-md-8" >
                                                    <div class="form-group">
                                                      <label for="parentesc_entrevistado_ei">Parentesco :</label>
                                                        <select class="form-control" name="parentesc_entrevistado_ei" id="parentesc_entrevistado_ei">
                                                            <?php                                                            
                                                            $sql_parentesco_nin = "select * from tbl_parentesco order by detalle asc";
                                                            $ejecutar = mysqli_query($con, $sql_parentesco_nin);
                                                            $sql_mostrar = "SELECT tbl_entrevista_inicial.parentesco, tbl_parentesco.detalle
                                                            FROM tbl_entrevista_inicial
                                                            INNER JOIN tbl_parentesco
                                                            ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
                                                            WHERE tbl_entrevista_inicial.id_ninio = $edit_id";
                                                            $ejecutar2 = mysqli_query($con, $sql_mostrar);
                                                            $row3 = mysqli_fetch_array($ejecutar2);
                                                            $id_camp=$row3['parentesco'];
                                                            $detalle_camp=$row3['detalle'];
                                                                echo "<option value='" . $id_camp. "' " .  " selected>" . ($detalle_camp) . "</option>";
                                                            
                                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                    
                                                                    $detalle_parent = $row2['detalle'];
                                                                    $id_parent = $row2['id_parentesco'];
                                                                    echo "<option value='" . $id_parent. "' " .  ">" . ($detalle_parent) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX FECHA INSCRIPCION XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                        <div class="form-group"> 
                                              <label for="fecha_inscrip" >Fecha de Inscripción:</label> 
                                            <div class="row">
                                                <div class="col-md-3" >
                                                    <input type="datetime" id="fecha_inscrip" name="fecha_inscrip" class="form-control"  value="<?php echo($fecha_entrevista);?>">                                                                                                                                                    
                                                </div>
                                            </div>
                                        </div>                                          

 <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++ AQUI ESE EL FIN DEL FORMULARIO (FORM) +++++++++++++++++++++++++++++++++++++++++-->
                                  
                                    <input type="submit" value="Terminar edición" name="submit" class="btn btn-primary">
                                    
                                    <a href="nientrevistaregistrada.php">
                                    <button type="button" class="btn btn-primary">Regresar</button>
                                    </a>   
                                    
                            </form>
                            
                      
            </div>
        </div>
    </div>

<!--*************************************************************************************************************************************************-->
  



    <?php require_once('inc/footer.php'); ?>