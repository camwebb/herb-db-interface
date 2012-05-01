<?php
include '../database.php';

if (isset ($_GET['data'])){ 
	
	//get_data(array ('id_field' => $_GET['field']));
	
}else if (isset ($_GET['compare'])){ 
	get_data(array (
					'kode' => $_GET['kode'],
					'id_field' => $_GET['field'],
					'id_compare' => $_GET['id_compare']
					)
					);
}else if (isset ($_GET['field'])){ 
	get_compare(array ('id_field' => $_GET['kode']));
}else if (isset ($_GET['table'])){ 
	get_field(array ('id_table' => $_GET['kode']));
}

function get_table(){
	$query = "SELECT * FROM view_table";
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		while ($data = mysql_fetch_array($result)){
			echo "<option value=$data[tableID]>" . $data['tableName']. "</option>";
		}	
	}
}

function get_field($dataTable){
	$query = "SELECT * FROM view_field WHERE ID_Table = '" .$dataTable['id_table']. "'"; //print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		echo "<option value=''></option>";
		while ($data = mysql_fetch_array($result)){
			echo "<option value=$data[ID_Field]>". $data['Field']."</option>";	
		}
	} 
}

function get_compare($dataCompare){
	$query = "SELECT Compares FROM view_field WHERE ID_Field = '". $dataCompare['id_field']."'";//print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		echo "<option value=''></option>";
		$data = mysql_fetch_assoc($result);
		$exp = explode (',', $data['Compares']);
		
		foreach ($exp as $value){
			echo "<option value='".$value."'>" .$value. "</option>";
		}
	}
}

function get_data($dataData){ 
	$query = "SELECT * FROM view_field WHERE ID_Field = '".$dataData['id_field']."'"; //print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	
	if (mysql_num_rows($result)){ 
		$dataTable = mysql_fetch_assoc($result);
		$field_1 = $dataTable['Get_Field_FromTable_1'];
		$field_2 = $dataTable['Get_Field_FromTable_2'];
		
		if (($dataData['kode'] == '=') or ($dataData['kode'] == '<>')){
			$getToTable = "SELECT * FROM ". $dataTable[FromTable]. " ORDER BY $field_1 ASC"; //print_r($getToTable);
		}
		
		$resToTable = mysql_query($getToTable) or die (mysql_error);
		if (mysql_num_rows($resToTable)){ 
			echo "<option value=''></option>";
			while ($dataToTable = mysql_fetch_array($resToTable)){ 
				echo "<option value=$dataToTable[$field_1]>".$dataToTable[$field_2]."</option>";
			}
		}
	}
	
	
}


?>
