<?php
global $user_array;

if(permitido($user_array['person_id'],$_GET['mod'])){

foreach($_POST['selected_item'] as $m){

$m=update_mysql("customers",array('deleted'=>1),"person_id=$m");


}

echo label_me('reg_deleted');

}


?>
