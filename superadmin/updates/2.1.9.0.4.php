<?php

global $server;
global $x;

$server[$x]['version']='2.1.9.0.4 - Agrega Fecha de Aprobacion';
$server[$x]['type']='MySQL';
$server[$x]['status']='Iniciando Revisión';

$tiendas_a=select_mysql("*","tiendas","deleted!=1");

foreach($tiendas_a['result'] as $tt){

$server[$x]['status'].='<br/> - Revisando en tienda '.$tt['name'] . ' por campo aprobacion_fecha';


$result = ejecutar("SHOW COLUMNS FROM `".$tt['prefix']."sales_items` LIKE 'aprobacion_fecha'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;

if($exists==TRUE){
$result = ejecutar("SHOW COLUMNS FROM `".$tt['prefix']."sales_items` LIKE 'aprobacion_fecha_real'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;

}

if($exists==FALSE){

ejecutar("alter table ".$tt['prefix']."sales_items add aprobacion_fecha timestamp not null");
ejecutar("alter table ".$tt['prefix']."sales_items add aprobacion_fecha_real timestamp not null");



$server[$x]['status'].=" - Necesita Actualizar";
}else{

$server[$x]['status'].=" - Actualizado";

}

}








?>
