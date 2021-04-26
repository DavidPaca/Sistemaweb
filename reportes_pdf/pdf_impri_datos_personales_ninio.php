<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_datos_personales_ninio.php');

//echo 'HOLA';

//echo 'HOLA';
$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;
//if (isset($_GET['edit'])) {//si esque hay la variable edit
$edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
//echo $edit_id;
   


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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado = mysqli_query($con, $query);


$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo 
AND tbl_datos_personales_ninio.estado = 'Activo' ORDER BY apellidos ASC "; 
$resultado2 = mysqli_query($con, $query);


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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado3 = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado4 = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado4a = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado4b = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado5 = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado6 = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado7 = mysqli_query($con, $query);

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
                    Where tbl_datos_personales_ninio.estado ='Activo' AND tbl_datos_personales_ninio.id_ninio = $edit_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo";
$resultado8 = mysqli_query($con, $query);

$query = "SELECT * FROM tbl_socio_economica WHERE id_ninio_se = $edit_id";
$resultado_repre9 = mysqli_query($con, $query);

                                        

$pdf = new PDF_DPN();
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

//$pdf -> Image('../admin/img/31706.jpg', 80 , 45 , 'C', 30); 
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Sety(92);
$pdf -> Cell(45, 8, 'Tipo de documento', 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Número. de documento'), 1, 0, '', 1);
$pdf -> Cell(45, 8, 'Apellidos', 1, 0, '', 1 );
$pdf -> Cell(50, 8, 'Nombres', 1, 1, '', 1 );


$pdf -> SetFont ('Arial', '', 10);

//echo 'Hola';
//$cont = 0;
while ($row = mysqli_fetch_array($resultado)){
                                        $idninio = $row['id_ninio'];
                                        $idTipodocumento = $row['detalle_di'];
                                        $c_i = $row['numero_docide'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        //$fecha_nac = $row['fecha_nac'];
                                        //$anio_ninio = $row['anio'];
                                        //$mes_ninio = $row['mes'];
                                        //$dia_ninio = $row['dia'];
                                        //$pais_nac = $row['detalle_pais'];
                                        //$provincia_nac = $row['detalle_provincia'];
                                        //$canton_nac = $row['detalle_canton'];
                                        //$parroquia_nac = $row['detalle_parroquia'];
                                        //$dir = $row['direccion_dom'];
                                       // $Referencia_dom = $row['referencia_ubicacion'];
                                       // $idgenero_n = $row['detalle_genero'];
                                       // $idetnia_n = $row['detalle_etnia'];
                                       // $ni_discapacidad = $row['discapacidad'];
                                       // $ni_porcentaje = $row['porcentaje'];
                                        //$carnet_conadis = $row['carnet_conadis'];
                                       // $tip_discapacidad_n = $row['detalle_tdicapacidad'];
                                       // $estable_discap = $row['asiste_estableci_personas_discapacidad'];
                                       // $nombre_estable = $row['nombre_establecimiento'];
                                       // $n_peso = $row['peso'];
                                       // $n_talla = $row['talla'];
                                       // $n_nivel = $row['detalle_nivel_ninio'];                               
                                       // $sobrenombre = $row['como_lo_llaman'];
                                        //$cdi = $row['detalle_cdi'];
                                        $imagen_n = $row['imagen_ninio'];                      
                                        
                                        
  $pdf -> Image('../admin/img/'.$imagen_n.'', 83 , 45 , 'C', 45);
  $pdf -> Cell(45, 8, utf8_decode($idTipodocumento), 1, 0, 1 );
  $pdf -> Cell(50, 8, $c_i, 1, 0, 1 );  
  $pdf -> Cell(45, 8, utf8_decode($last_name), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($first_name), 1, 1, 1 );
}

//$pdf -> Image('../admin/img/31706.jpg', 80 , 45 , 'C', 30); 
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Fecha de nacimiento'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Edad'), 1, 0, '', 1);
$pdf -> Cell(45, 8, utf8_decode('Nacionalidad'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Provincia'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado3)){
    $fecha_nac = $row['fecha_nac'];
    $anio_ninio = $row['anio'];
    $mes_ninio = $row['mes'];
    $dia_ninio = $row['dia'];
    $pais_nac = $row['detalle_pais'];
    $provincia_nac = $row['detalle_provincia'];
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(45, 8, utf8_decode($fecha_nac), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($anio_ninio), 1, 0, 1 );  
  $pdf -> Cell(45, 8, utf8_decode($pais_nac), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($provincia_nac), 1, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(95, 8, utf8_decode('Cantón'), 1, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Parroquia'), 1, 1, '', 1);

while ($row = mysqli_fetch_array($resultado4)){
    $canton_nac = $row['detalle_canton'];
    $parroquia_nac = $row['detalle_parroquia'];

    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(95, 8, utf8_decode($canton_nac), 1, 0, 1 );
  $pdf -> Cell(95, 8, utf8_decode($parroquia_nac), 1, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('Dirección domiciliaria'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado4a)){
    $dir = $row['direccion_dom'];
   
    $pdf -> SetFont ('Arial', '', 9);
    $pdf -> Cell(190, 8, utf8_decode($dir), 1, 1, 1 );
  }

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(190, 8, utf8_decode('Referencia domiciliaria'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado4b)){
    $Referencia_dom = $row['referencia_ubicacion'];

    $pdf -> SetFont ('Arial', '', 9);
    $pdf -> Cell(190, 8, utf8_decode($Referencia_dom), 1, 1, 1 );
}
$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Género'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Etnia'), 1, 0, '', 1);
$pdf -> Cell(45, 8, utf8_decode('Discapacidad'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Porcentaje'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado5)){
    $idgenero_n = $row['detalle_genero'];
    $idetnia_n = $row['detalle_etnia'];
    $ni_discapacidad = $row['discapacidad'];
    $ni_porcentaje = $row['porcentaje'];
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(45, 8, utf8_decode($idgenero_n), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($idetnia_n), 1, 0, 1 );  
  $pdf -> Cell(45, 8, utf8_decode($ni_discapacidad), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($ni_porcentaje), 1, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Carnet del CONADIS'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Tipo de discapacidad'), 1, 0, '', 1);
$pdf -> Cell(45, 8, utf8_decode('¿Asiste a estable. de EE?'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Nombre/Lugar'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado6)){
    $carnet_conadis = $row['carnet_conadis'];
    $tip_discapacidad_n = $row['detalle_tdicapacidad'];
    $estable_discap = $row['asiste_estableci_personas_discapacidad'];
    $nombre_estable = $row['nombre_establecimiento'];
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(45, 8, utf8_decode($carnet_conadis), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($tip_discapacidad_n), 1, 0, 1 );  
  $pdf -> Cell(45, 8, utf8_decode($estable_discap), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($nombre_estable), 1, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Peso'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('Talla'), 1, 0, '', 1);
$pdf -> Cell(45, 8, utf8_decode('Nivel académico'), 1, 0, '', 1 );
$pdf -> Cell(50, 8, utf8_decode('¿Como lo llaman en casa?'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado7)){
    $n_peso = $row['peso'];
    $n_talla = $row['talla'];
    $n_nivel = $row['detalle_nivel_ninio'];                               
    $sobrenombre = $row['como_lo_llaman'];
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(45, 8, utf8_decode($n_peso), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($n_talla), 1, 0, 1 );  
  $pdf -> Cell(45, 8, utf8_decode($n_nivel), 1, 0, 1 );
  $pdf -> Cell(50, 8, utf8_decode($sobrenombre), 1, 1, 1 );
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(45, 8, utf8_decode('Centro de Desarrollo Infantil'), 1, 0, '', 1 );
$pdf -> Cell(95, 8, utf8_decode('Apellidos/Nombres del representante'), 1, 0, '', 1);
$pdf -> Cell(50, 8, utf8_decode('Teléfono'), 1, 1, '', 1 );
//$pdf -> Cell(50, 8, utf8_decode('¿Como lo llaman en casa?'), 1, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado8)){
    $cdi = $row['detalle_cdi'];
    $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(45, 8, utf8_decode($cdi), 1, 0, 1 );

 while ($row_ti = mysqli_fetch_array($resultado_repre9)){
  $apellidos_se = $row_ti['apellidos_se']; 
  $nombres_se = $row_ti['nombres_se']; 
  $telefono_dom_se = $row_ti['telefono_dom_se']; 
  
}
$pdf -> SetFont ('Arial', '', 9);
$pdf -> Cell(95, 8, utf8_decode("$apellidos_se $nombres_se"), 1, 0, 1 );
$pdf -> Cell(50, 8, utf8_decode($telefono_dom_se), 1, 1, 1 );

$pdf -> Cell(95, 8, '', 0, 1, 0 );
}


/*echo $alimento_id;
echo ($detalleali_name);*/
ob_end_clean();
$pdf -> Output ();

?>


