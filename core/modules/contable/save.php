<?php
global $user_array;

if(permitido($user_array['person_id'],$_GET['mod'])){
load_template('partial','header');
load_template('partial','menu');
unset($_POST['submitf']);

foreach($_POST as $k=>$v){

$km=update_mysql('app_config',array('`value`'=>$v),'`key`=\''.$k.'\'');


}
?>
<script>
alert('<?php echo label_me('saved_info'); ?>');
window.location.href = '?mod=contable&proc=config';

</script>
<?php


load_template('partial','footer');
}


?>
