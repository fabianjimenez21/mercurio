<?php
global $user_array;

if(permitido($user_array['person_id'],$_GET['mod'])){
load_template('partial','header');
load_template('partial','menu');


$sups=select_mysql("t1.person_id, t2.last_name, t2.first_name ","employees as t1 inner join ".DBPREFIX."people as t2 ON t1.person_id = t2.person_id","t1.supervisor='1'");

$sup_options="<option value='0' SELECTED  >Nadie</option>";

foreach($sups['result'] as $sm){

$sup_options.="<option value='".$sm['person_id']."'  >".$sm['last_name']." , ".$sm['first_name']."</option>";

}


///////opciones de Metas

$metass=select_mysql("*","metas","status!=3");
$metas_opciones="<option value='0'>Ninguno</option>";
foreach($metass['result'] as $met){
$selected=($met['id']==$info['info']['metas_id'])?' SELECTED ':'';
$metas_opciones.="<option value='".$met['id']."' $selected>".$met['name']."</option>";

}

$esquemass=select_mysql("*","esquemas","status!=3");
$esquemas_opciones="<option value='0'>Ninguno</option>";
foreach($esquemass['result'] as $met){
$selected=($met['id']==$info['info']['esquema_id'])?' SELECTED ':'';
$esquemas_opciones.="<option value='".$met['id']."' $selected>".$met['name']."</option>";

}



?>


<form action="?mod=employees&proc=save" method="post" accept-charset="utf-8" id="item_form" class="form-horizontal">
<input type="hidden" name='redirect' value="<?php echo ($_GET['redirect']) ? $_GET['redirect'] : '' ; ?>">
	<div class="row" id="form">
		<div class="col-md-12">
			Los campos en rojo son requeridos			
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="fa fa-align-justify"></i>									
					</span>
					<h5>Infomación del Usuario</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="row">
					<div class="span7 ">


 					<div class="form-group">
					<label for="first_name" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Nombre:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="first_name" value="" id="first_name" class="form-control form-inps"  />						</div>
					</div>

 					<div class="form-group">
					<label for="last_name" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Apellidos:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="last_name" value="" id="last_name" class="form-control form-inps"  />						</div>
					</div>






					<div class="form-group">
					<label for="phone_number" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Telefono:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="phone_number" value="" id="phone_number" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="email" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Email:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="email" value="" id="email" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="username" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Usuario de Ingreso:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="username" value="" id="username" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="password" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Clave de Ingreso:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="password" value="" id="password" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="meta_diaria" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Meta de Ventas (Diarias):</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="meta_diaria" value="" id="meta_diaria" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="meta_mensual" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Meta de Ventas (Mensual):</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="meta_mensual" value="" id="meta_mensual" class="form-control form-inps"  />						</div>
					</div>


 					<div class="form-group">
					<label for="supervisor" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Es Supervisor:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" name="supervisor" value="1" id="supervisor"  />						</div>
					</div>



 					<div class="form-group">
				<label for="supervisor_who" class="col-sm-3 col-md-3 col-lg-2 control-label wide">¿Quien es su Supervisor?:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<select name="supervisor_who"  id="supervisor_who">
							<?php echo $sup_options; ?>
						</select>
						</div>
					</div>


 					<div class="form-group">
				<label for="esquema_id" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Esquema de Pagos:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<select name="esquema_id"  id="esquema_id">
							<?php echo $esquemas_opciones; ?>
						</select>
						</div>
					</div>



 					<div class="form-group">
				<label for="metas_id" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Esquema de Metas:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<select name="metas_id"  id="metas_id">
							<?php echo $metas_opciones; ?>
						</select>
						</div>
					</div>


					<div class="form-group offset1">
					<label for="creacion_fecha_real" class="col-sm-3 col-md-3 col-lg-2 control-label text-info wide">Fecha de Ingreso:</label>					<div class="col-sm-9 col-md-9 col-lg-10">
					   
			
				    <div class="input-group" >
  					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" name="creacion_fecha_real" value="<?php echo date('Y-m-d'); ?>" id="creacion_fecha_real" class="datepicker"  /> </div>

				    </div>
				</div>




				<div class="widget-title">
					<span class="icon">
						<i class="fa fa-align-justify"></i>									
					</span>
					<h5>Permisos de Usuario</h5>
				</div>



<?php

$modulos=select_mysql('*','modules');
include(APPDIR."modules/modules_name.php");



foreach($modulos['result'] as $m){

$nombre=str_replace(" de ", " ",$MODULES_NAMES_ARRAY[$m['module_id']]);
$icono_a=select_mysql("*","modules","module_id='".$m['module_id']."'");
$icono=$icono_a['result'][0]['icon'];
$checked='';

?>

				<div class="form-group override-taxes-container">
					<label class="col-sm-3 col-md-3 col-lg-2 control-label wide"><i class="fa fa-<?php echo $icono; ?>"></i> <?php echo $nombre; ?>:</label>					
					<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" <?php echo $checked ?> name="modules[]"  value="<?php echo $m['module_id']; ?>" />
					</div>
				</div>



<?php


}

?>



				
				</div>




					


				


				</div>
					
								
		
				
			
					<div class="form-actions">
				<input type="submit" name="submitf" value="Aceptar" id="submitf" class="submit_button btn btn-primary"  />				</div>
			</form>			
			<div class="item_navigation">
				
							</div>
			
			</div>
		</div>
	</div>
</div>
		

<script type='text/javascript'>
//validation and submit handling
$(document).ready(function()
{
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd"	});

	$('#item_form').validate({
		submitHandler:function(form)
		{

						doItemSubmit(form);

		},
		errorClass: "text-danger",
		errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
			},
		rules:
		{
				
			password: "required",
			first_name:"required",
			last_name:"required",
			username:
			{
				required : true ,
				remote: 
				    { 
					url: "?mod=employees&proc=account_exists",  
					type: "post"
					
				    } 
			},

			email:"required"

   		},
		messages:
		{			
						
						
			password:"Campo Requerido",												
			first_name:"Campo Requerido",
			last_name:"Campo Requerido",
			username:"Este Campo es Obligatorio y no debe existir para otro Usuario",
			email:"Campo Requerido"

			
		}
	});
});

var submitting = false;

function doItemSubmit(form)
{

	if (submitting) return;
	submitting = true;
	$(form).ajaxSubmit({
	success:function(response)
	{
		
		submitting = false;
		gritter("\u00c9xito"+' #' + response.location_id,response.message,response.success ? 'gritter-item-success' : 'gritter-item-error',false,false);

		if(response.success)
		{
			if(response.redirect=='none'){
			alert(response.message);
			window.location.href = '?mod=employees&proc=main';}

			if(response.redirect=='presales'){
			alert(response.message);
			window.location.href = '?mod=presales&proc=main';}

			if(response.redirect=='sales'){
			alert(response.message);
			window.location.href = '?mod=sales&proc=main';}



		}

	
			},
		resetForm: true,
		dataType:'json'
	});
}

</script>




		
		
<?php
load_template('partial','footer');
}


?>
