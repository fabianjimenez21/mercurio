<?php

global $user_array;
global $current_sale_array;
if(permitido($user_array['person_id'],$_GET['mod'])){

$item_id=$_POST['line'];
$new_cost=$_POST['quantity'];


$current_sale_array['cart']['items'][$item_id]['quantity']=$new_cost;


load_process("sales","reload_sale");
}

?>
