<?php

global $server;
global $x;

$server[$x]['version']='2.0.3a - Actualizacion adicional para Consignaciones y Datafonos';
$server[$x]['type']='MySQL';
$server[$x]['status']='Iniciando Revisión';


$tiendas_a=select_mysql("*","tiendas","deleted!=1");

foreach($tiendas_a['result'] as $tt){

$server[$x]['status'].='<br/> - Revisando en tienda '.$tt['name'] . ' por campo consignado en sessions';

$result = ejecutar("SHOW COLUMNS FROM `".$tt['prefix']."sessions` LIKE 'consignado'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;


if($exists==FALSE){

ejecutar("ALTER TABLE  `".$tt['prefix']."sessions` ADD  `consignado` DOUBLE NOT NULL ;
");

$server[$x]['status'].=" - Necesita Actualizar";
}else{

$server[$x]['status'].=" - Actualizado";

}




}








?>
