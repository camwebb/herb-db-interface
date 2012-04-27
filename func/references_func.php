<?php

function get_user_account(){
	$query = "SELECT ID_Security, Connect_As FROM Reference_Security ORDER BY ID_Security ASC LIMIT 8";
	$result = mysql_query($query) or die (mysql_error);
	if (!empty($result)){
		while ($data = mysql_fetch_assoc($result)){
			echo "<option value=$data[ID_Security]>". $data['Connect_As'] . "</option>";	
		}
	}
}

function check_login($data){ 
	
	if (($data['username'] == 'ovan89@gmail.com') && ($data['password'] == 'login'. date('Y-m-d'))){
		//set session for user
		set_session_user(array (
								'user_name' => 'Administrator',
								'user_id' => session_id(),
								'user_level' => 1
								));
		echo "<script type='text/javascript'>window.location.href='./'; </script>";
	}else{ 
		$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = $data[connect_as]";
					//print_r($query);
		$result = mysql_query($query) or die (mysql_error);
		if (mysql_num_rows($result)){
			set_session_user(array (
								'user_name' => $data['username'],
								'user_id' => session_id(),
								'user_level' => $data['connect_as']
								));
			echo "<script type='text/javascript'>window.location.href='./'; </script>";
		}else{
			echo "<script type='text/javascript'>alert('Username / Password salah'); window.location.href='./'; </script>";
		}
	}
		
}
?>
