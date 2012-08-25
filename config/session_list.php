<?php
defined('_IBIS') or die ('Forbidden Access'); 

function set_session_user($data){ 
	$_SESSION['userName'] 	= $data['user_name'];
	$_SESSION['userID'] 	= $data['user_id']; 
	$_SESSION['userRefKey'] = $data['user_number'];
	$_SESSION['userLevel'] 	= $data['user_level'];
	$_SESSION['userRule'] 	= $data['user_rule'];
	$_SESSION['token']		= $data['token'];
	$_SESSION['login_time']	= $data['login_time'];
	
}

function unset_session_specimen(){
	unset ($_SESSION['specimenID_Filter']);
	unset ($_SESSION['ID_Specimen']);
	unset ($_SESSION['ID_Determination']);
	unset ($_SESSION['ID_Component']);
}
?>
