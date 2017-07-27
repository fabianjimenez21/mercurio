<?php

global $user_array;
global $current_traslado;
global $application_config;

if(permitido($user_array['person_id'],$_GET['mod'])){
$cancelados=select_mysql("*","traslados","state='Cerrado' and show_comments=0 and traslados_id=".$_GET['traslados_id']);
if($cancelados['count']>0){

update_mysql("traslados",array('state'=>'Enviado','sent_by'=>$user_array['person_id'],'sent_at'=>date('Y-m-d H:i:s')),'traslados_id='.$_GET['traslados_id']);


$person_trasladado_array=select_mysql("*","people","person_id=".$user_array['person_id']);
$person_trasladado=$person_trasladado_array['result'][0];
$comentarios_adicionales="
---------------------------------------------------------
Usuario: ".$user_array['username']."
Personal: ".$person_trasladado['first_name']." ".$person_trasladado['last_name']."
Operación: Envío de la Órden de Traslado con ID Interno ".$_GET['traslados_id']."
Fecha / Hora: ".date("d-m-Y H:i:s")."
---------------------------------------------------------
";
insert_mysql("traslados_history",array('traslados_id'=>$_GET['traslados_id'] , 'cuando'=>date("Y-m-d H:i:s"),'comments'=>$comentarios_adicionales));

load_template('partial','header');
load_template('partial','menu');
?>

<div class="clear"></div>
	<div class="row" id="form">
		<div class="col-md-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="fa fa-align-justify"></i>									
					</span>
					<h5>Envío de Órden de Traslado Exitoso</h5>
					
				</div>
				<div class="widget-content">
					<ul class="text-error" id="error_message_box"></ul>
					<h2>Felicidades!! </h2>
					<p>Acaba de Envíar una Órden de Traslado</p>
										<a class="btn btn-info btn-sm " href="?mod=traslados&proc=statuses">Regresar</a>	
									
				</div>
			</div>
		</div>
	</div>

<?php
load_template('partial','footer');
}else{
header('Location: ?mod=traslados&proc=statuses');

}

}
