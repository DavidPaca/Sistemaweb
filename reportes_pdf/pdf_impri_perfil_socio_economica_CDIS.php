<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_perfil_socio_economica.php');

//echo 'HOLA';

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;
//if (isset($_GET['edit'])) {//si esque hay la variable edit
$edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
//echo $edit_id;
   

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado10 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado11 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado12 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado13 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado14 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado15 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado16 = mysqli_query($con, $query);


$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado17 = mysqli_query($con, $query);


$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado18 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado19 = mysqli_query($con, $query);

$query = "SELECT tbl_inter_se_servicio_basico.id_ninio_sb, tbl_inter_se_servicio_basico.id_servicio_basicos_sv,
tbl_servicios_basicos.detalle AS detalle_sb
FROM tbl_inter_se_servicio_basico
INNER JOIN tbl_servicios_basicos ON tbl_servicios_basicos.id_servi_basicos = tbl_inter_se_servicio_basico.id_servicio_basicos_sv
WHERE tbl_inter_se_servicio_basico.id_ninio_sb = $edit_id";                
$resultado_ti19 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20a = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20b = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20c = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20d = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20e = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado20f = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado21 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado22 = mysqli_query($con, $query);


$query = "SELECT tbl_inter_se_miembros_hogar.id_ninio_mh, tbl_inter_se_miembros_hogar.apellidos_mh, tbl_inter_se_miembros_hogar.nombres_mh,
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
$resultado23 = mysqli_query($con, $query);


$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado_ti23 = mysqli_query($con, $query);

$query = "SELECT tbl_inter_se_miembros_hogar.id_ninio_mh, tbl_inter_se_miembros_hogar.apellidos_mh, tbl_inter_se_miembros_hogar.nombres_mh,
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
$resultado24 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado_ti24 = mysqli_query($con, $query);

$query = "SELECT tbl_inter_se_miembros_hogar.id_ninio_mh, tbl_inter_se_miembros_hogar.apellidos_mh, tbl_inter_se_miembros_hogar.nombres_mh,
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
$resultado25 = mysqli_query($con, $query);

$query = "SELECT tbl_socio_economica.id_ninio_se, tbl_socio_economica.num_documide, tbl_socio_economica.apellidos_se, tbl_socio_economica.nombres_se,
tbl_socio_economica.edad_se, tbl_socio_economica.direccion_dom_se, tbl_socio_economica.telefono_dom_se, tbl_socio_economica.vinculo_laboral,
tbl_socio_economica.direccion_laboral_se, tbl_socio_economica.telefono_trabajo_se, tbl_socio_economica.num_habitaciones_se,
tbl_socio_economica.recibe_bono_se, tbl_socio_economica.miembros_hogar_se, tbl_socio_economica.num_hijos_se, 
tbl_socio_economica.num_hijas_se, tbl_socio_economica.consume_bebidas_se, tbl_socio_economica.fuma_se, 
tbl_socio_economica.tiene_disca_miembro_familia,tbl_socio_economica.fami_discap_va_manuela_espejo, 
tbl_socio_economica.miembros_hogar_trabajan, tbl_socio_economica.ingreso_mensual, tbl_socio_economica.egreso_mensual,
tbl_socio_economica.Acti_genera_ingresos, tbl_socio_economica.especifique_actividad, tbl_socio_economica.nivel_vida,
tbl_socio_economica.nivel_ingresos,
tbl_documento_identidad.id_docide, tbl_documento_identidad.detalle AS detalle_docum,
tbl_estado_civil.id_estado_civil, tbl_estado_civil.detalle AS detalle_estado_c,
tbl_etnia.id_etnia, tbl_etnia.detalle AS detalle_etnias,
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parentes,
tbl_instruccion.id_instruccion, tbl_instruccion.detalle AS detalle_istruc,
tbl_ocupacion.id_ocupacion, tbl_ocupacion.detalle AS detalle_ocupation,
tbl_vivienda.id_vivienda, tbl_vivienda.detalle AS detalle_vivi,
tbl_tipo_vivienda.id_tipo_vivienda, tbl_tipo_vivienda.detalle AS detalle_tvivienda,
tbl_tipo_piso.id_tipo_piso, tbl_tipo_piso.detalle AS detalle_pisos,
tbl_tipo_pared.id_tipo_pared, tbl_tipo_pared.detalle AS detalle_paredes,
tbl_tipo_techo.id_tipo_techo, tbl_tipo_techo.detalle AS detalle_techos
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
$resultado_ti25 = mysqli_query($con, $query);


$query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id "; 
$resultado1 = mysqli_query($con, $query);

//* MUESTRA CDI Y PERIODO
$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $num_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $num_per 
AND tbl_datos_personales_ninio.estado = 'Activo' ORDER BY apellidos ASC "; 
$resultado2 = mysqli_query($con, $query);



$pdf = new PDF_SE();
$pdf -> AliasNbPages();
$pdf -> AddPage ();


$pdf -> SetFont('Arial', 'B', 10 );
//$pdf -> Cell(-1);  
//$pdf -> tbl_cdi(25);
$pdf -> Cell(120, 10, 'CDI:' );
$pdf -> Ln(5);
$pdf -> Cell(120, 10, 'Periodo:' );
while ($row1 = mysqli_fetch_array($resultado2)){
//if($row1 == $resultado2){
$cdi_nomb = $row1['nombre'];
$inic = $row1['inicio']; 
$finc = $row1['fin'];
$pdf -> Cell(-110); 
$pdf -> SetFont('Arial', '', 10 );
$pdf -> Cell(10, 0, $cdi_nomb, 0, 0, 0 );

}
$pdf -> Ln(15);
$pdf -> Cell(61, -20, "$inic $finc", 0, 0, 0);
//}
$pdf -> Ln(-3);

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(50, 6, utf8_decode('DATOS PERSONALES DEL NIÑO'), 0, 1, 'C'); 
$pdf -> SetTextColor (0, 0, 0);
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Sety(48);
$pdf -> Cell(95, 8, utf8_decode('Número de documento de identificación del niños'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Apellidos/Nombres del niño'), 0, 1, '', 1);

$pdf -> SetFont ('Arial', '', 9);
//echo 'Hola';
//$cont = 0;
while ($row = mysqli_fetch_array($resultado1)){
            $idninio = $row['id_ninio'];
            $c_i = $row['numero_docide'];
            $last_name = ($row['apellidos']);
            $first_name = ($row['nombres']);

  $pdf -> Cell(95, 8, utf8_decode($c_i), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode("$last_name $first_name"), 0, 1, 1 );
}


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(70, 6, utf8_decode('DATOS PERSONALES DEL REPRESENTANTE'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Tipo de Documento de Identificación:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Número de Documento de Identificación:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado10)){
    $num_documide = $row['num_documide'];  
    $detalle_docum = $row['detalle_docum'];  
     
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($detalle_docum), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($num_documide), 0, 1, 1 );

  
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Apellidos:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('	Nombres:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado11)){
    $apellidos_se = $row['apellidos_se'];
    $nombres_se = $row['nombres_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($apellidos_se), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($nombres_se), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Edad:'), 0, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Estado civil:'), 0, 0, '', 1 );
$pdf -> Cell(45, 8, utf8_decode('Etnia:'), 0, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Parentesco:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado12)){
    $edad_se = $row['edad_se'];
    $detalle_estado_c = $row['detalle_estado_c'];
    $detalle_etnias = $row['detalle_etnias'];
    $detalle_parentes = $row['detalle_parentes'];
   
$pdf -> SetFont ('Arial', '', 9);
$pdf -> Cell(45, 8, utf8_decode($edad_se), 0, 0, 1 );
$pdf -> Cell(50, 8, utf8_decode($detalle_estado_c), 0, 0, 1 );
$pdf -> Cell(45, 8, utf8_decode($detalle_etnias), 0, 0, 1 );
$pdf -> Cell(50, 8, utf8_decode($detalle_parentes), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Dirección domiciliaria:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('	Teléfono domicilio:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado13)){
    $direccion_dom_se = $row['direccion_dom_se'];
    $telefono_dom_se = $row['telefono_dom_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($direccion_dom_se), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($telefono_dom_se), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Instrucción:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Ocupación:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado14)){
    $detalle_istruc = $row['detalle_istruc'];
    $detalle_ocupation = $row['detalle_ocupation'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($detalle_istruc), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($detalle_ocupation), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Vínculo laboral:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Dirección trabajo:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado15)){
    $vinculo_laboral = $row['vinculo_laboral'];
    $direccion_laboral_se = $row['direccion_laboral_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($vinculo_laboral), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($direccion_laboral_se), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('Teléfon trabajo:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado16)){
    $telefono_trabajo_se = $row['telefono_trabajo_se'];
          
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(190, 8, utf8_decode($telefono_trabajo_se), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(60, 6, utf8_decode('MIEMBROS DEL HOGAR Y EDUCACIÓN'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Cuátos miembros de su hogar componen su familia?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado21)){
    $miembros_hogar_se = $row['miembros_hogar_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(190, 8, utf8_decode($miembros_hogar_se), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Número de hijos varones'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Numero de hijas mujeres'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado22)){
    $num_hijos_se = $row['num_hijos_se'];
    $num_hijas_se = $row['num_hijas_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($num_hijos_se), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($num_hijas_se), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('Registro de los miembros del hogar:'),0, 1, '', 1);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(30, 8, utf8_decode('Parentesco'),0, 0, '', 1);
$pdf -> Cell(50, 8, utf8_decode('Apellidos/Nombres'),0, 0, '', 1);
$pdf -> Cell(10, 8, utf8_decode('Edad'),0, 0, '', 1);
$pdf -> Cell(50, 8, utf8_decode('Instrucción'),0, 0, '', 1);
$pdf -> Cell(50, 8, utf8_decode('Ocupación'),0, 1, '', 1);


while ($row = mysqli_fetch_assoc($resultado23)){
    $detalle_parentesco_mh = $row['detalle_parentesco_mh'];
    $apellidos_mh = $row['apellidos_mh'];
    $nombres_mh = $row['nombres_mh'];
    $edad = $row['edad'];
    $detalle_instruccion_mh = $row['detalle_instruccion_mh'];
    $detalle_ocupcion_mh = $row['detalle_ocupcion_mh'];
    
   
    $pdf -> SetFont ('Arial', '', 8);
    $pdf -> Cell(30, 8, utf8_decode($detalle_parentesco_mh), 0, 0, 1 );
    $pdf -> Cell(50, 8, utf8_decode("$apellidos_mh $nombres_mh"), 0, 0, 1 );
    $pdf -> Cell(10, 8, utf8_decode($edad), 0, 0, 1 );
    $pdf -> Cell(50, 8, utf8_decode($detalle_instruccion_mh), 0, 0, 1 );
    $pdf -> Cell(50, 8, utf8_decode($detalle_ocupcion_mh), 0, 1, 1 );
     
  }
  while ($row_ti = mysqli_fetch_array($resultado_ti23)){
    $detalle_parentes = $row_ti['detalle_parentes']; 
    $apellidos_se = $row_ti['apellidos_se']; 
    $nombres_se = $row_ti['nombres_se']; 
    $edad_se = $row_ti['edad_se']; 
    $detalle_istruc = $row_ti['detalle_istruc']; 
    $detalle_ocupation = $row_ti['detalle_ocupation']; 
      
  $pdf -> SetFont ('Arial', '', 8);
  $pdf -> Cell(30, 8, utf8_decode($detalle_parentes), 0, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode("$apellidos_se $nombres_se"), 0, 0, 1 );
  $pdf -> Cell(10, 8, utf8_decode($edad_se), 0, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($detalle_istruc), 0, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($detalle_ocupation), 0, 1, 1 );
  }


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(55, 6, utf8_decode('BONO DE DESARROLLO HUMANO'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Recibe bono de desarrollo humano?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20)){   
    $recibe_bono_se = $row['recibe_bono_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(190, 8, utf8_decode($recibe_bono_se), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(31, 6, utf8_decode('INGRESO FAMILIAR'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Cuátos miembros del hogar trabajan?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Cuál es el ingreso mensual total de su familia?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20c)){
    $miembros_hogar_trabajan = $row['miembros_hogar_trabajan'];
    $ingreso_mensual = $row['ingreso_mensual'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($miembros_hogar_trabajan), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode('$ '.$ingreso_mensual), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Cuál es el egreso mensual total de su familia?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20d)){
    $egreso_mensual = $row['egreso_mensual'];
        
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(190, 8, utf8_decode('$ '.$egreso_mensual), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Realiza otra actividad que le generan ingresos?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20e)){
    $Acti_genera_ingresos = $row['Acti_genera_ingresos'];
    $especifique_actividad = $row['especifique_actividad'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($Acti_genera_ingresos), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($especifique_actividad), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(90, 8, utf8_decode('En los útimos 12 meses, su nivel de vida:'), 0, 0, '', 1 );
$pdf -> Cell(100, 8, utf8_decode('Considera usted, que los ingresos mensuales de su hogar son:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20f)){
    $nivel_vida = $row['nivel_vida'];
    $nivel_ingresos = $row['nivel_ingresos'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(90, 8, utf8_decode($nivel_vida), 0, 0, 1 );
  $pdf -> Cell(100, 8, utf8_decode($nivel_ingresos), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(50, 6, utf8_decode('DATOS DE VIVIENDA Y HOGAR'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('La vivienda que ocupa es:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Tipo de vivienda:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado17)){
    $detalle_vivi = $row['detalle_vivi'];
    $detalle_tvivienda = $row['detalle_tvivienda'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($detalle_vivi), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($detalle_tvivienda), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(63, 8, utf8_decode('Número de habitaciones:'), 0, 0, '', 1 );
$pdf -> Cell(64, 8, utf8_decode('Tipo de pisos:'), 0, 0, '', 1 );
$pdf -> Cell(63, 8, utf8_decode('Tipo de pared:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado18)){
    $num_habitaciones_se = $row['num_habitaciones_se'];
    $detalle_pisos = $row['detalle_pisos'];
    $detalle_paredes = $row['detalle_paredes'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(63, 8, utf8_decode($num_habitaciones_se), 0, 0, 1 );
  $pdf -> Cell(64, 8, utf8_decode($detalle_pisos), 0, 0, 1 );
  $pdf -> Cell(63, 8, utf8_decode($detalle_paredes), 0, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Tipo de techo:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Servicios básicos:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado19)){
    $detalle_techos = $row['detalle_techos'];
    $direccion_laboral_se = $row['direccion_laboral_se'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($detalle_techos), 0, 0, 1 );
 
  while ($row_ti = mysqli_fetch_array($resultado_ti19)){
    $detalle_sb = $row_ti['detalle_sb'];  //detalle_alimentos   
   
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10, $detalle_sb.", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(52, 6, utf8_decode('PRESENCIA DE ENFERMEDADES'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(60, 8, utf8_decode('¿Consume bebidas alcohólicas?'), 0, 0, '', 1 );
$pdf -> Cell(35, 8, utf8_decode('¿Usted fuma?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Sufre algún miembro de la familia alguna discapacidad?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20a)){
    $consume_bebidas_se = $row['consume_bebidas_se'];
    $fuma_se = $row['fuma_se'];
    $tiene_disca_miembro_familia = $row['tiene_disca_miembro_familia'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(60, 8, utf8_decode($consume_bebidas_se), 0, 0, 1 );
  $pdf -> Cell(35, 8, utf8_decode($fuma_se), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($tiene_disca_miembro_familia), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('	¿El/los miembro(s) de la familia con discapacidad accede a la Misión Manuela Espejo?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado20b)){
    $fami_discap_va_manuela_espejo = $row['fami_discap_va_manuela_espejo'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($fami_discap_va_manuela_espejo), 0, 1, 1 );
}








ob_end_clean();
$pdf -> Output ();

?>


