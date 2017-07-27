<?php
global $user_array;

if(permitido($user_array['person_id'],$_GET['mod'])){
load_template('partial','header');
load_template('partial','menu');
$config_items=select_mysql("*",'app_config');
$items=$config_items['result'];
?>


<form action="?mod=config&proc=save" method="post" accept-charset="utf-8" id="item_form" class="form-horizontal">
	<div class="row" id="form">
		<div class="col-md-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="fa fa-align-justify"></i>									
					</span>
					<h5><?php echo label_me('config'); ?> <?php echo label_me('of'); ?> <?php echo label_me('system'); ?></h5>
				</div>
				<div class="widget-content nopadding">
					<div class="row">
					<div class="span7 ">


<?php 

foreach($items as $i){



if($i['key']=='resolucionActual'){$i['label']='Resolución Para Venta Estándar';}
if($i['key']=='company'){$i['label']='Información de Empresa y Régimen';}
if($i['key']=='inicioResolucionActual'){$i['label']='Inicio de Resolucion Actual';}
if($i['key']=='finResolucionActual'){$i['label']='Fin de Resolucion Actual';}
if($i['key']=='company_logo'){$i['label']='Número de Cajas de Cobro';}
if($i['key']=='sale_prefix'){$i['label']='Prefijo de Folio de Facturación';}
if($i['key']=='additional_payment_types'){$i['label']="Formas de Pago [separadas por ; ] si el método de pago requiere ingreso de voucher, por favor agregue ':voucher' por ejemplo Visa TDC:voucher (Efectivo está definido por defecto)";}
if($i['key']=='date_format'){$i['label']='Texto de Banner Superior';}
if($i['key']=='averaging_method'){$i['label']='Permitir a los Cajeros Cerrar su Día [para NO permitirlo escriba "NO" de lo contrario escriba cualquier cosa o deje el valor en blanco]';}

if($i['key']=='config_invoice_header_title'){$i['label']='Titulo de Comprobante de Pago [Factura por defecto]';}

if($i['key']=='config_invoice_footer_addon'){$i['label']='Agregar Leyenda al Final del Comprobante de Pago';}







if(isset($i['label'])){
?>

					<div class="form-group">
						<label for="<?php echo $i['key'];?>" class="col-sm-3 col-md-3 col-lg-2 control-label wide"><?php echo $i['label'];?>:</label>						<div class="col-sm-9 col-md-9 col-lg-10">
							<input type="text" name="<?php echo $i['key'];?>" value="<?php echo utf8_encode($i['value']);?>" id="product_id" class="form-control form-inps"  />						</div>
					</div>



<?php
}


}



?>


 


					
                    <div class="clear"></div>
				</div>
					
								
		
				
			
					<div class="form-actions">
				<input type="submit" name="submitf" value="<?php echo label_me('accept'); ?>" id="submitf" class="submit_button btn btn-primary"  />				</div>
			</form>			
			<div class="item_navigation">
				
							</div>
			
			</div>
		</div>
	</div>
</div>
		

	
		
<?php
load_template('partial','footer');
}


?>
