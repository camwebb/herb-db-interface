<?php
defined('_IBIS') or die ('Forbidden Access'); 

function set_session_user($data){ 
	$_SESSION['userName'] = $data['user_name'];
	$_SESSION['userID'] = $data['user_id']; 
	$_SESSION['userLevel'] = $data['user_level'];
}
?>
