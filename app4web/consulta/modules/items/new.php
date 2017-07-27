<?php
global $user_array;

if(permitido($user_array['person_id'],$_GET['mod'])){
load_template('partial','header');
load_template('partial','menu');
?>


<form action="?mod=items&proc=save" method="post" accept-charset="utf-8" id="item_form" class="form-horizontal">
	<div class="row" id="form">
		<div class="col-md-12">
			Los campos en rojo son requeridos			
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="fa fa-align-justify"></i>									
					</span>
					<h5>Infomación del Artículo</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="row">
					<div class="span7 ">
					<div class="form-group">
						<label for="item_number" class="col-sm-3 col-md-3 col-lg-2 control-label wide">UPC/EAN/ISBN:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
							<input type="text" name="item_number" value="" id="item_number" class="form-control form-inps"  />						</div>
					</div>

					<div class="form-group">
						<label for="product_id" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Identificación del producto:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
							<input type="text" name="product_id" value="" id="product_id" class="form-control form-inps"  />						</div>
					</div>

 					<div class="form-group">
					<label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Nombre:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="name" value="" id="name" class="form-control form-inps"  />						</div>
					</div>

					<div class="form-group">
					<label for="category" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Categoría:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="category" value="" id="category" class="form-control form-inps"  />						</div>
					</div>

					<div class="form-group">
					<label for="size" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Tamaño:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="size" value="" id="size" class="form-control form-inps"  />						</div>
					</div>


					<div class="form-group">
					<label for="supplier" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Proveedor:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<select name="supplier_id" class="span3">
<?php

$prov=select_mysql("*","suppliers");

foreach($prov['result'] as $p){

echo "<option value=\"".$p['person_id']."\" >".$p['company_name']."</option>";

}

?>
</select>						</div>
					</div>
					
					<div class="form-group reorder-input ">
					<label for="reorder_level" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Mínimo de productos:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="reorder_level" value="" id="reorder_level" class="form-control form-inps"  />						</div>
					</div>

					<div class="form-group">
					<label for="description" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Descripción:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<textarea name="description" cols="17" rows="5" id="description" class="form-control  form-textarea" ></textarea>						</div>
					</div>


					<div class="form-group">
					<label for="description" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Color:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" name="color" value="" id="color" class="form-control form-inps"  />						</div>
					</div>


					<div class="form-group">
					<label for="is_serialized" class="col-sm-3 col-md-3 col-lg-2 control-label wide">El Artículo tiene Número de Serie o Requiere Número de Contrato (Servicios):</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" name="is_serialized" value="1" id="is_serialized" class="form-control delete-checkbox"  />						</div>
					</div>

					<div class="form-group">
					<label for="is_service" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Es Servicio:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" name="is_service" value="1" id="is_service" class="form-control delete-checkbox"  />						</div>
					</div>


					<div class="form-group">
					<label for="postpay" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Es Post-pago <small>(El primer pago aparecerá con costo 0)</small>:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" name="postpay" value="1" id="postpay" class="form-control delete-checkbox"  />						</div>
					</div>



					<div class="form-group">
					<label for="val_serial" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Validar Serial en Venta:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="checkbox" name="val_serial" value="1" id="val_serial" class="form-control delete-checkbox"  />						</div>
					</div>

					
				</div>


			<div class="widget-title widget-title1 pricing-widget">
				<span class="icon">
					<i class="fa fa-align-justify"></i>									
				</span>
				<h5>Precios e Inventario</h5>
			</div>
											<div class="form-group">
							<label for="cost_price" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Costo (Sin Impuesto):</label>								<div class="col-sm-9 col-md-9 col-lg-10">
									<input type="text" name="cost_price" value="" size="8" id="cost_price" class="form-control form-inps"  />								</div>
						</div>
					
				<div class="form-group">
				<label for="unit_price" class="col-sm-3 col-md-3 col-lg-2 control-label required wide">Precio de venta:</label>					<div class="col-sm-9 col-md-9 col-lg-10">
					<input type="text" name="unit_price" value="" size="8" id="unit_price" class="form-control form-inps"  />					</div>
				</div>

				
				<div class="form-group">
				<label for="promo_price" class="col-sm-3 col-md-3 col-lg-2 control-label wide">Precio promocional:</label>				    <div class="col-sm-9 col-md-9 col-lg-10">
				    <input type="text" name="promo_price" value="" size="8" class="form-inps" id="promo_price"  />				    </div>
				</div>

					<div class="form-group offset1">
					<label for="start_date" class="col-sm-3 col-md-3 col-lg-2 control-label text-info wide">Promo Fecha de Inicio:</label>					<div class="col-sm-9 col-md-9 col-lg-10">
					   
			
				    <div class="input-group date datepicker" data-date="" data-date-format="mm\/dd\/yyyy">
  					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" name="start_date" value="" id="start_date" class="form-control form-inps"  /> </div>

				    </div>
				</div>


					<div class="form-group offset1">
					<label for="end_date" class="col-sm-3 col-md-3 col-lg-2 control-label text-info wide">Promo Fecha de finalización:</label>					<div class="col-sm-9 col-md-9 col-lg-10">
					   
			
				    <div class="input-group date datepicker" data-date="" data-date-format="mm\/dd\/yyyy">
  					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" name="end_date" value="" id="end_date" class="form-control form-inps"  /> </div>

				    </div>
				</div>
				
				<div class="form-group override-taxes-container">
					<label class="col-sm-3 col-md-3 col-lg-2 control-label wide">IVA (Se agregará en Venta):</label>					
					<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="input" name="iva" class="form-control form-inps" value="16" />
					</div>
				</div>


<?php for($xt=1;$xt<=10;$xt++){


?>

				<div class="form-group">
					<label class="col-sm-3 col-md-3 col-lg-2 control-label wide">Precio especial <?php echo $xt?>:</label>					
					<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" value="" name="tier_<?php echo $xt; ?>"  class="form-control form-inps" />
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 col-md-3 col-lg-2 control-label wide">Etiqueta para Precio especial <?php echo $xt?>:</label>					
					<div class="col-sm-9 col-md-9 col-lg-10">
						<input type="text" value="" name="tier_<?php echo $xt; ?>_name"  class="form-control form-inps" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 col-md-3 col-lg-2 control-label wide">Mostrar Precio especial <?php echo $xt?>:</label>					
					<div class="col-sm-9 col-md-9 col-lg-10">
						<select name="tier_<?php echo $xt; ?>_allow"  class="form-control form-inps" >
						  <option value="Y" >Si</option>
						  <option value="N" SELECTED >No</option>
						</select>
					</div>
				</div>

<?php


}?>

				
                    <div class="clear"></div>
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
   	

	
	$( "#category" ).autocomplete({
		source: "?mod=items&proc=suggest_category",
		delay: 10,
		autoFocus: false,
		minLength: 0
	});

	$('#item_form').validate({
		submitHandler:function(form)
		{
			$.post('?mod=items&proc=check_duplicate', {term: $('#name').val()},function(data) {
						if(data.duplicate)
				{
					
					if(confirm("Ya existe un \u00edtem con ese nombre. Continuar?"))
					{
						doItemSubmit(form);
					}
					else 
					{
						return false;
					}
				}
						 {
				doItemSubmit(form);
			 }} , "json")
		     .error(function() {
		 });
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
					item_number:
			{
				remote: 
				    { 
					url: "?mod=items&proc=item_number_exists",  
					type: "post"
					
				    } 
			},
				
				
			name:"required",
			category:"required",
			cost_price:
			{
				required:true,
				number:true
			},

			unit_price:
			{
				required:true,
				number:true
			},
			promo_price:
			{
				number: true
			},
			reorder_level:
			{
				number:true
			},
   		},
		messages:
		{			
						item_number:
			{
				remote: "UPC \/ EAN \/ ISBN que ya existe"				   
			},
						
						
												
			name:"Nombre de Art\u00edculo es requerido",
			category:"Categor\u00eda es requerido",
			cost_price:
			{
				required:"Costo es requerido",
				number:"Costo debe ser n\u00famero"			},
			unit_price:
			{
				required:"Precio es requerido",
				number:"Precio unitario debe ser n\u00famero"			},
			promo_price:
			{
				number: "Este campo debe ser un n\u00famero"			}
		}
	});
});

var submitting = false;

function doItemSubmit(form)
{
	if (submitting) return;
	submitting = true;
	$("#form").mask("por favor espere ...");
	$(form).ajaxSubmit({
	success:function(response)
	{
		$("#form").unmask();
		submitting = false;
		gritter("\u00c9xito"+' #' + response.item_id,response.message,response.success ? 'gritter-item-success' : 'gritter-item-error',false,false);

		if(response.success)
		{
			alert(response.message);
			window.location.href = '?mod=items&proc=main'
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
