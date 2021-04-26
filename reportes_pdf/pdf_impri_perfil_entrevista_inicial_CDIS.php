<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_perfil_entrevista_personal.php');

//echo 'HOLA';

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;
//if (isset($_GET['edit'])) {//si esque hay la variable edit
$edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
//echo $edit_id;


   

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado1212 = mysqli_query($con, $query);

$query = "SELECT tbl_alimentos.detalle AS detalle_alimentos 
FROM tbl_rechaza_alimentos 
INNER JOIN tbl_alimentos 
ON tbl_alimentos.id_alimentos = tbl_rechaza_alimentos.id_alimentos 
WHERE tbl_rechaza_alimentos.id_ninio = 262";                
$resultado_ti1 = mysqli_query($con, $query);



$query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id "; 
$resultado1 = mysqli_query($con, $query);


$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $num_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $num_per 
AND tbl_datos_personales_ninio.estado = 'Activo' ORDER BY apellidos ASC "; 
$resultado2 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado3 = mysqli_query($con, $query);

$query = "SELECT tbl_alimentos.detalle AS detalle_alim_rechaza
FROM tbl_inter_ei_rechaza_alimento_disgusta
INNER JOIN tbl_alimentos
ON tbl_alimentos.id_alimentos = tbl_inter_ei_rechaza_alimento_disgusta.id_alimentos_rech_ali
WHERE tbl_inter_ei_rechaza_alimento_disgusta.id_ninio_rech_ali = $edit_id";                
$resultado_ti2 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado4 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado4a = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado5 = mysqli_query($con, $query);

$query = "SELECT tbl_enfermedades.detalle AS detalle_enfer_graves
FROM tbl_inter_ei_enfermedades_graves
INNER JOIN tbl_enfermedades
ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_graves.id_enfermedades_graves_eg
WHERE tbl_inter_ei_enfermedades_graves.id_ninio_eg = $edit_id";                
$resultado_ti5 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado6 = mysqli_query($con, $query);

$query = "SELECT tbl_intervensionesq.detalle AS detalle_interv_qui
FROM tbl_inter_ei_intervensiones_quirugicas
INNER JOIN tbl_intervensionesq
ON tbl_intervensionesq.id_intervensionesq = tbl_inter_ei_intervensiones_quirugicas.id_intervensiones_q_iq
WHERE tbl_inter_ei_intervensiones_quirugicas.id_ninio_iq = $edit_id";                
$resultado_ti6 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado7 = mysqli_query($con, $query);

$query = "SELECT tbl_medicamentos.detalle AS detalle_toma_med
FROM tbl_inter_ei_toma_medicamentos
INNER JOIN tbl_medicamentos
ON tbl_medicamentos.id_medicamentos = tbl_inter_ei_toma_medicamentos.id_medicamentos_tm
WHERE tbl_inter_ei_toma_medicamentos.id_ninio_tm = $edit_id";                
$resultado_ti7 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado8 = mysqli_query($con, $query);

$query = "SELECT tbl_alergias.detalle AS detalle_alergia
FROM tbl_inter_ei_es_alergico
INNER JOIN tbl_alergias
ON tbl_alergias.id_alergias = tbl_inter_ei_es_alergico.id_alergia_ea
WHERE tbl_inter_ei_es_alergico.id_ninio_ea = $edit_id";                
$resultado_ti8 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado9 = mysqli_query($con, $query);

$query = "SELECT tbl_accidentes.detalle AS detalle_accident
FROM tbl_inter_ei_sifrio_accidentes
INNER JOIN tbl_accidentes
ON tbl_inter_ei_sifrio_accidentes.id_accidentes_sa = tbl_accidentes.id_accidentes
WHERE tbl_inter_ei_sifrio_accidentes.id_ninio_sa = $edit_id";                
$resultado_ti9 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado10 = mysqli_query($con, $query);

$query = "SELECT tbl_enfermedades.detalle AS detalle_enfer_padecio
FROM tbl_inter_ei_enfermedades_padecio
INNER JOIN tbl_enfermedades
ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_padecio.id_enfermedades_padecio_ep
WHERE tbl_inter_ei_enfermedades_padecio.id_ninio_ep = $edit_id";                
$resultado_ti10 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado11 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado12 = mysqli_query($con, $query);

$query = "SELECT tbl_inter_ei_vacunas.id_inter_ei_vacunas, tbl_inter_ei_vacunas.fecha_vac, tbl_inter_ei_vacunas.obcervaciones_vac,
tbl_datos_personales_ninio.id_ninio, tbl_vacunas.id_vacunas, tbl_vacunas.detalle AS detalle_vacunas
FROM tbl_inter_ei_vacunas
INNER JOIN tbl_datos_personales_ninio
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_vacunas.id_ninio_vac
INNER JOIN tbl_vacunas
ON tbl_vacunas.id_vacunas = tbl_inter_ei_vacunas.id_vacunas_vac
WHERE tbl_inter_ei_vacunas.id_ninio_vac = $edit_id ORDER BY fecha_vac ASC ";                
$resultado12a = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado13 = mysqli_query($con, $query);

$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.apellidos, tbl_datos_personales_ninio.nombres,
tbl_habitos.id_habitos, tbl_habitos.detalle AS detalle_habitos
FROM tbl_inter_ei_habitos
INNER JOIN tbl_datos_personales_ninio
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_habitos.id_ninio_hn
INNER JOIN tbl_habitos
ON tbl_habitos.id_habitos = tbl_inter_ei_habitos.id_habitos_hn
WHERE tbl_inter_ei_habitos.id_ninio_hn = $edit_id";                
$resultado14 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado15 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado16 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado17 = mysqli_query($con, $query);


$query = "SELECT tbl_juegos.detalle AS detalle_juegos
FROM tbl_inter_ei_juegos_del_ninio
INNER JOIN tbl_juegos
ON tbl_juegos.id_juegos = tbl_inter_ei_juegos_del_ninio.id_juegos_jn
WHERE tbl_inter_ei_juegos_del_ninio.id_ninio_jn = $edit_id";                
$resultado18 = mysqli_query($con, $query);

$query = "SELECT tbl_personas_que_juega.detalle AS detalle_cqjn
FROM tbl_inter_ei_con_quien_juega
INNER JOIN tbl_personas_que_juega
ON tbl_personas_que_juega.id_personas_q_juega = tbl_inter_ei_con_quien_juega.id_personas_q_juega_cqj
WHERE tbl_inter_ei_con_quien_juega.id_ninio_cqj = $edit_id";                
$resultado19 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado20 = mysqli_query($con, $query);

$query = "SELECT tbl_mascotas.detalle AS detalle_mascotas, tbl_inter_ei_tiene_mascotas.nombre_mascotita
FROM tbl_inter_ei_tiene_mascotas
INNER JOIN tbl_mascotas
ON tbl_mascotas.id_mascota = tbl_inter_ei_tiene_mascotas.id_mascotas_tm
WHERE tbl_inter_ei_tiene_mascotas.id_ninio_tm = $edit_id";                
$resultado_ti20 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado21 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado22 = mysqli_query($con, $query);

$query = "SELECT tbl_gustos_disgustos.detalle AS detalle_gustos
FROM tbl_inter_ei_gustos_ninio
INNER JOIN tbl_gustos_disgustos
ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_gustos_ninio.id_gustos_gn
WHERE tbl_inter_ei_gustos_ninio.id_ninio_gn = $edit_id";                
$resultado_ti22 = mysqli_query($con, $query);

$query = "SELECT tbl_gustos_disgustos.detalle AS detalle_disgustos
FROM tbl_inter_ei_disgustos_ninio
INNER JOIN tbl_gustos_disgustos
ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_disgustos_ninio.id_disgustos_dn
WHERE tbl_inter_ei_disgustos_ninio.id_ninio_dn = $edit_id";                
$resultado_ti23 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado24 = mysqli_query($con, $query);

$query = "SELECT tbl_miedos.detalle AS detalle_miedos
FROM tbl_inter_ei_miedos_ninio
INNER JOIN tbl_miedos
ON tbl_miedos.id_miedos = tbl_inter_ei_miedos_ninio.id_miedos_miedosn
WHERE tbl_inter_ei_miedos_ninio.id_ninio_miedosn = $edit_id";                
$resultado_ti24 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado25 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado26 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado27 = mysqli_query($con, $query);


$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado27_a = mysqli_query($con, $query);


$query = "SELECT tbl_parentesco.detalle AS detalle_parentesco
FROM tbl_entrevista_inicial
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado_ti28 = mysqli_query($con, $query);


$query = "SELECT tbl_usuario.apellidos, tbl_usuario.nombres
FROM tbl_entrevista_inicial
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado_ti29 = mysqli_query($con, $query);


$query = "SELECT tbl_usuario_nombre.detalle AS detalle_tipo_user
FROM tbl_entrevista_inicial
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado_ti30 = mysqli_query($con, $query);

$query = "SELECT tbl_entrevista_inicial.id_ninio, tbl_entrevista_inicial.tiene_alergia_alimento, tbl_entrevista_inicial.rechaza_alimento,
tbl_entrevista_inicial.come_solo, tbl_entrevista_inicial.usa_mamadera, tbl_entrevista_inicial.control_esfinteres, 
tbl_entrevista_inicial.actual_va_banio_solo, tbl_entrevista_inicial.presencia_enfermedades_graves, tbl_entrevista_inicial.intervensiones_q,
tbl_entrevista_inicial.toma_medicamentos, tbl_entrevista_inicial.es_alergico, tbl_entrevista_inicial.sifrio_accidentes,
tbl_entrevista_inicial.enfermedades_padecio, tbl_entrevista_inicial.lado_predominante_ninio, tbl_entrevista_inicial.ha_gateado,
tbl_entrevista_inicial.problemas_vista, tbl_entrevista_inicial.usa_lentes, tbl_entrevista_inicial.escucha_bien, 
tbl_entrevista_inicial.usa_audifonos, tbl_entrevista_inicial.duerme_solo, tbl_entrevista_inicial.hora_acostarse, 
tbl_entrevista_inicial.hora_despertarse, tbl_entrevista_inicial.Expresa_gestos_palabras, tbl_entrevista_inicial.dependencia_adultos,
tbl_entrevista_inicial.esta_contacto_otros_ninios, tbl_entrevista_inicial.sociable_actitud_negativa, 
tbl_entrevista_inicial.comparte_juguete, tbl_entrevista_inicial.tiene_mascotas, tbl_entrevista_inicial.llora_con_facilidad, 
tbl_entrevista_inicial.miedo_a_algo, tbl_entrevista_inicial.alguien_lee_cuentos, tbl_entrevista_inicial.referencia_del_cdi_n,
tbl_entrevista_inicial.experiencia_cdi, tbl_entrevista_inicial.acuerdo_contribucion_cdi, tbl_entrevista_inicial.nombre_entrevistado,
tbl_entrevista_inicial.fecha_entrevista, tbl_vocabulario.id_vocabulario, tbl_vocabulario.detalle AS detalle_vocabulario, 
tbl_parentesco.id_parentesco, tbl_parentesco.detalle AS detalle_parent, tbl_usuario.id_usuario, tbl_usuario.apellidos AS apellidos_user, 
tbl_usuario.nombres AS nombres_user, tbl_usuario_nombre.id_usuario_nombre, tbl_usuario_nombre.detalle
FROM tbl_entrevista_inicial
INNER JOIN tbl_vocabulario
ON tbl_vocabulario.id_vocabulario = tbl_entrevista_inicial.vocabulario_ninio
INNER JOIN tbl_parentesco
ON tbl_parentesco.id_parentesco = tbl_entrevista_inicial.parentesco
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
INNER JOIN tbl_usuario_nombre
ON tbl_usuario_nombre.id_usuario_nombre = tbl_entrevista_inicial.tipo_usuario
WHERE tbl_entrevista_inicial.id_ninio = $edit_id";                
$resultado31 = mysqli_query($con, $query);

$pdf = new PDF_EI();
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
$pdf -> Cell(20, 6, utf8_decode('ALIMENTOS'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Alérgia a algún tipo de alimento:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado1212)){
    $tiene_alergia_alimento = $row['tiene_alergia_alimento'];  //detalle_alimentos
     
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($tiene_alergia_alimento), 0, 0, 1 );

  while ($row_ti = mysqli_fetch_array($resultado_ti1)){
    $detalle = $row_ti['detalle_alimentos'];  //detalle_alimentos   
   
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,$detalle.", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

/************************* */

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Rechaza algún alimento:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado3)){
    $rechaza_alimento = $row['rechaza_alimento'];
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($rechaza_alimento), 0, 0, 1 );

  while ($row_ti = mysqli_fetch_array($resultado_ti2)){
    $detalle_alim_rechaza = $row_ti['detalle_alim_rechaza'];  //detalle_alimentos
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_alim_rechaza).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
  
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Come solo:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Usa mamadera:'), 0, 1, '', 1 );


while ($row = mysqli_fetch_array($resultado4)){
    $come_solo = $row['come_solo'];
    $usa_mamadera = $row['usa_mamadera'];
   
   
$pdf -> SetFont ('Arial', '', 9);
$pdf -> Cell(95, 8, utf8_decode($come_solo), 0, 0, 1 );
$pdf -> Cell(95, 8, utf8_decode($usa_mamadera), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(42, 6, utf8_decode('CONTROL DE ESFÍNTERES'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Control de esfínteres:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Actualemente va al baño solo:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado4a)){
    $control_esfinteres = $row['control_esfinteres'];
    $actual_va_banio_solo = $row['actual_va_banio_solo'];
   
$pdf -> SetFont ('Arial', '', 9);
$pdf -> Cell(95, 8, utf8_decode($control_esfinteres), 0, 0, 1 );
$pdf -> Cell(95, 8, utf8_decode($actual_va_banio_solo), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(11, 6, utf8_decode('SALUD'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Ha tenido alguna enfermedad grave?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado5)){
    $presencia_enfermedades_graves = $row['presencia_enfermedades_graves'];
    

  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($presencia_enfermedades_graves), 0, 0, 1 );

  while ($row_ti = mysqli_fetch_array($resultado_ti5)){
    $detalle_enfer_graves = $row_ti['detalle_enfer_graves'];  
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_enfer_graves).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Ha tenido alguna intervensión quirúrgica?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('	Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado6)){
    $intervensiones_q = $row['intervensiones_q'];
        
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($intervensiones_q), 0, 0, 1 );
  
  while ($row_ti = mysqli_fetch_array($resultado_ti6)){
    $detalle_interv_qui = $row_ti['detalle_interv_qui']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_interv_qui).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Toma algún tipo de medicamentos de forma regular?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado7)){
    $toma_medicamentos = $row['toma_medicamentos'];
   
  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($toma_medicamentos), 0, 0, 1 );
  
  while ($row_ti = mysqli_fetch_array($resultado_ti7)){
    $detalle_toma_med = $row_ti['detalle_toma_med']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_toma_med).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Es alérgico?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado8)){
    $es_alergico = $row['es_alergico'];

  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($es_alergico), 0, 0, 1 );

  while ($row_ti = mysqli_fetch_array($resultado_ti8)){
    $detalle_alergia = $row_ti['detalle_alergia']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_alergia).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Ha sufrido algún tipo de accidente?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado9)){
    $sifrio_accidentes = $row['sifrio_accidentes'];
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($sifrio_accidentes), 0, 0, 1 );
  
  while ($row_ti = mysqli_fetch_array($resultado_ti9)){
    $detalle_accident = $row_ti['detalle_accident']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_accident).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(50, 6, utf8_decode('ENFERMEDADES QUE PADECIÓ'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Alguna enfermedad que padeció?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado10)){
    $enfermedades_padecio = $row['enfermedades_padecio'];
    
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($enfermedades_padecio), 0, 0, 1 );
  
  while ($row_ti = mysqli_fetch_array($resultado_ti10)){
    $detalle_enfer_padecio = $row_ti['detalle_enfer_padecio']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_enfer_padecio).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(50, 8, utf8_decode('Lado predominante:'), 0, 0, '', 1 );
$pdf -> Cell(45, 8, utf8_decode('¿Ha gateado?'), 0, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('¿Tiene problemas de vista?'), 0, 0, '', 1 );
$pdf -> Cell(45, 8, utf8_decode('¿Utiliza lentes?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado11)){
    $lado_predominante_ninio = $row['lado_predominante_ninio'];
    $ha_gateado = $row['ha_gateado'];
    $problemas_vista = $row['problemas_vista'];
    $usa_lentes = $row['usa_lentes'];
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(50, 8, utf8_decode($lado_predominante_ninio), 0, 0, 1 );
  $pdf -> Cell(45, 8, utf8_decode($ha_gateado), 0, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($problemas_vista), 0, 0, 1 );
  $pdf -> Cell(45, 8, utf8_decode($usa_lentes), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Tiene problemas de oído?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Utiliza audífonos?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado12)){
    $escucha_bien = $row['escucha_bien'];
    $usa_audifonos = $row['usa_audifonos'];
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($escucha_bien), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($usa_audifonos), 0, 1, 1 );
}


/*$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(80, 8, utf8_decode('Nombre de la vacuna'), 0, 0, '', 1 );
$pdf -> Cell(20, 8, utf8_decode('Fecha'), 0, 0, '', 1 );
$pdf -> Cell(90, 8, utf8_decode('Obcervación'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado12a)){
    $detalle_vacunas = $row['detalle_vacunas'];
    $fecha_vac = $row['fecha_vac'];
    $obcervaciones_vac = $row['obcervaciones_vac'];

  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(80, 8, utf8_decode($detalle_vacunas), 0, 0, 1 );
  $pdf -> Cell(20, 8, utf8_decode($fecha_vac), 0, 0, 1 );
  $pdf -> MultiCell(90, 7, utf8_decode($obcervaciones_vac), 0 );
}*/

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(11, 6, utf8_decode('SUEÑO'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(63, 8, utf8_decode('¿Duerme solo?'), 0, 0, '', 1 );
$pdf -> Cell(64, 8, utf8_decode('Hora de acostarse:'), 0, 0, '', 1 );
$pdf -> Cell(63, 8, utf8_decode('Hora de despertarse:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado13)){
    $duerme_solo = $row['duerme_solo'];
    $hora_acostarse = $row['hora_acostarse'];
    $hora_despertarse = $row['hora_despertarse'];
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(63, 8, utf8_decode($duerme_solo), 0, 0, 1 );
  $pdf -> Cell(64, 8, utf8_decode($hora_acostarse), 0, 0, 1 );
  $pdf -> Cell(63, 8, utf8_decode($hora_despertarse), 0, 1, 1 );
}


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(15, 6, utf8_decode('HÁBITOS'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Cuáles con sus hábitos?'),0, 1, '', 1);

while ($row = mysqli_fetch_assoc($resultado14)){
    $detalle_habitos = $row['detalle_habitos'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_habitos).", ");
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
  

$pdf -> SetTextColor (6, 82, 132);  
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(17, 6, utf8_decode('LENGUAJE'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Tipo de vocabulario:'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('La mayoría de veces se expresa con:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_assoc($resultado15)){
    $detalle_vocabulario = $row['detalle_vocabulario'];
    $Expresa_gestos_palabras = $row['Expresa_gestos_palabras'];
    $pdf -> SetFont ('Arial', '', 9);
 
    $pdf -> Cell(95, 8, utf8_decode($detalle_vocabulario), 0, 0, 1 );
    $pdf -> Cell(95, 8, utf8_decode($Expresa_gestos_palabras), 0, 1, 1 );
}


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(20, 6, utf8_decode('VIDA SOCIAL'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Con quién o quiénes se relaciona más el niño?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Se muestra dependiente de los adultos?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_assoc($resultado16)){
    $detalle_parent = $row['detalle_parent'];
    $dependencia_adultos = $row['dependencia_adultos'];
    $pdf -> SetFont ('Arial', '', 9);
 
    $pdf -> Cell(95, 8, utf8_decode($detalle_parent), 0, 0, 1 );
    $pdf -> Cell(95, 8, utf8_decode($dependencia_adultos), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Está en contacto con otros niños?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Es sociable o presenta una actitud negativa?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_assoc($resultado17)){
    $esta_contacto_otros_ninios = $row['esta_contacto_otros_ninios'];
    $sociable_actitud_negativa = $row['sociable_actitud_negativa'];
    $pdf -> SetFont ('Arial', '', 9);
 
    $pdf -> Cell(95, 8, utf8_decode($esta_contacto_otros_ninios), 0, 0, 1 );
    $pdf -> Cell(95, 8, utf8_decode($sociable_actitud_negativa), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(15, 6, utf8_decode('JUEGOS'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿A qué juega?'),0, 1, '', 1);

while ($row = mysqli_fetch_assoc($resultado18)){
    $detalle_juegos = $row['detalle_juegos'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_juegos).", ");
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Con quién juega?'),0, 1, '', 1);

while ($row = mysqli_fetch_assoc($resultado19)){
    $detalle_cqjn = $row['detalle_cqjn'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_cqjn).", ");
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );

  
  $pdf -> SetFillColor (232, 232, 232);
  $pdf -> SetFont ('Arial', 'B', 9);
  $pdf -> Cell(190, 8, utf8_decode('¿Tiene mascotas?'), 0, 1, '', 1 );
    
  while ($row = mysqli_fetch_array($resultado20)){
      $tiene_mascotas = $row['tiene_mascotas'];
     
    $pdf -> SetFont ('Arial', '', 9);
    $pdf -> Cell(190, 8, utf8_decode($tiene_mascotas), 0, 1, 1 );
    
  }


  $pdf -> SetFillColor (232, 232, 232);
  $pdf -> SetFont ('Arial', 'B', 9);
  $pdf -> Cell(95, 8, utf8_decode('Especifíque'), 0, 0, '', 1 );
  $pdf -> Cell(95, 8, utf8_decode('Nombre de la mascota:'), 0, 1, '', 1 );
      
    while ($row_ti = mysqli_fetch_array($resultado_ti20)){
    $detalle_mascotas = $row_ti['detalle_mascotas']; 
    $nombre_mascotita = $row_ti['nombre_mascotita']; 
        
    $pdf -> SetFont ('Arial', '', 9);
    $pdf -> Cell(95, 8, utf8_decode($detalle_mascotas), 0, 0, 1 );
    $pdf -> Cell(95, 8, utf8_decode($nombre_mascotita), 0, 1, 1 );
    }
   

    $pdf -> SetFillColor (232, 232, 232);
    $pdf -> SetFont ('Arial', 'B', 9);
    $pdf -> Cell(190, 8, utf8_decode('¿Comparte con dificultad sus juguetes?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_assoc($resultado21)){
    $comparte_juguete = $row['comparte_juguete'];
    
    $pdf -> SetFont ('Arial', '', 9);
 
    $pdf -> Cell(95, 8, utf8_decode($comparte_juguete), 0, 1, 1 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(25, 6, utf8_decode('PERSONALIDAD'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Llora con facilidad?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('¿Qué le gusta?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado22)){
    $llora_con_facilidad = $row['llora_con_facilidad'];
       
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($llora_con_facilidad), 0, 0, 1 );
  while ($row_ti = mysqli_fetch_array($resultado_ti22)){
    $detalle_gustos = $row_ti['detalle_gustos']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_gustos).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Qué le disgusta?'),0, 1, '', 1);

while ($row = mysqli_fetch_assoc($resultado_ti23)){
    $detalle_disgustos = $row['detalle_disgustos'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_disgustos).", ");
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );

  $pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Tiene miedo a algo?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Especifíque:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado24)){
    $miedo_a_algo = $row['miedo_a_algo'];
    
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($miedo_a_algo), 0, 0, 1 );
  
  while ($row_ti = mysqli_fetch_array($resultado_ti24)){
    $detalle_miedos = $row_ti['detalle_miedos']; 
      
  $pdf -> SetFont ('Arial', '', 9);
  $pdf->Write(10,utf8_decode($detalle_miedos).", ");  
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}

$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 6, utf8_decode('OTROS DATOS DE INTERÉS'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('¿Le leen cuentos?'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado25)){
    $alguien_lee_cuentos = $row['alguien_lee_cuentos'];

    $pdf -> SetFont ('Arial', '', 9);


  $pdf -> Cell(190, 8, utf8_decode($alguien_lee_cuentos), 0, 1, 1 );
}


$pdf -> SetTextColor (6, 82, 132);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(30, 6, utf8_decode('OBSERVACIONES'), 0, 1, 'C');
$pdf -> SetTextColor (0, 0, 0);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('¿Cuál fue el motivo de su elección?'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Calificación del Centro de Desarrollo Infantil es:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado26)){
    $referencia_del_cdi_n = $row['referencia_del_cdi_n'];
    $experiencia_cdi = $row['experiencia_cdi'];
    
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(95, 8, utf8_decode($referencia_del_cdi_n), 0, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($experiencia_cdi), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('Acuerdos de contribución al Centro de Desarrollo Infantil:'), 0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado27)){
    $acuerdo_contribucion_cdi = $row['acuerdo_contribucion_cdi'];
    
    $pdf -> SetFont ('Arial', '', 9);

  $pdf -> Cell(190, 8, utf8_decode($acuerdo_contribucion_cdi), 0, 1, 1 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Nombre del entrevistado(a):'), 0, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Parentesco:'),0, 1, '', 1);

while ($row = mysqli_fetch_array($resultado27_a)){
    $nombre_entrevistado = $row['nombre_entrevistado'];    
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($nombre_entrevistado), 0, 0, 1 );

  while ($row = mysqli_fetch_assoc($resultado_ti28)){
    $detalle_parentesco = $row['detalle_parentesco'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_parentesco));
  }
  $pdf -> Cell(95, 8, '', 0, 1, 0 );
}


$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Nombre del Entrevistador(a):'),0, 0, '', 1);  
$pdf -> Cell(95, 8, utf8_decode('Tipo de Usuario:'),0, 1, '', 1);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
while ($row = mysqli_fetch_assoc($resultado_ti29)){
    $apellidos = $row['apellidos'];
    $nombres = $row['nombres'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode("$apellidos $nombres"));
  }

  while ($row = mysqli_fetch_assoc($resultado_ti30)){
    $detalle_tipo_user = $row['detalle_tipo_user'];
   
    $pdf -> Setx (105);
    $pdf -> SetFont ('Arial', '', 9);
    $pdf->Write(10,utf8_decode($detalle_tipo_user));
  }

  $pdf -> Cell(95, 8, '', 0, 1, 0 );

  
  $pdf -> SetFillColor (232, 232, 232);
  $pdf -> SetFont ('Arial', 'B', 9);
  $pdf -> Cell(190, 8, utf8_decode('Fecha de Inscripción:'),0, 1, '', 1);
  
    while ($row = mysqli_fetch_assoc($resultado31)){
      $fecha_entrevista = $row['fecha_entrevista'];
    
      $pdf -> SetFont ('Arial', '', 9);
      $pdf->Write(10,utf8_decode($fecha_entrevista));
    }

ob_end_clean();
$pdf -> Output ();

?>


