<?php
defined('_IBIS') or die ('Forbidden Access');
//tab filter

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
//end tab filter

//tab determination
if (isset($_GET['species'])){
	
}else if (isset($_GET['genus'])){
	get_specimen_code(array 
					(
					'id_parent' => $_GET['kode'], 
					'table_parent' => 'Species',
					'table_parent_condition' => 'Genus_ID',
					'field_parent' => 'Species',
					'table_child' => 'Species_Text',
					'field_child_1' => 'ID',
					'field_child_2' => 'Species'
					));
}else if (isset($_GET['family'])){ //echo 'ok';
	get_specimen_code(array 
					(
					'id_parent' => $_GET['kode'], 
					'table_parent' => 'Genus',
					'table_parent_condition' => 'Family_ID',
					'field_parent' => 'Genus',
					'table_child' => 'Genus_Text',
					'field_child_1' => 'ID',
					'field_child_2' => 'Genus'
					));
}
//end tab determination

//main function


function get_field($dataTable){
	
	switch ($dataTable['id_table']){
		case 'Specimen':
		{
			$id_table = 1;
		}
		break;
		case 'Locality':
		{
			$id_table = 2;
		}
		break;
		case 'Determination':
		{
			$id_table = 3;
		}
		break;
		case 'Component':
		{
			$id_table = 4;
		}
		break;
	}
	
	$query = "SELECT * FROM view_field WHERE ID_Table = '" .$id_table. "'"; //print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		echo "<option value=''></option>";
		while ($data = mysql_fetch_array($result)){
			echo "<option value='".$data['Field']."'>". $data['Field']."</option>";	
		}
	} 
}

function get_compare($dataCompare){
	
	
	$query = "SELECT Compares FROM view_field WHERE Field LIKE '". $dataCompare['id_field']."'";//print_r($query);
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
	$query = "SELECT * FROM view_field WHERE Field LIKE '".$dataData['id_field']."'"; //print_r($query);
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
			if ($dataData['id_field']=='Collector'){
				while ($dataToTable = mysql_fetch_array($resToTable)){ 
					echo "<option value='".$dataToTable[$field_2]."'>".$dataToTable[$field_2]."</option>";
				}
			}else{
				while ($dataToTable = mysql_fetch_array($resToTable)){ 
					echo "<option value=".$dataToTable[$field_1].">".$dataToTable[$field_2]."</option>";
				}
			}
			
		}
	}
	
}


function get_specimen_code($data){ 
	if (!empty($data['id_parent'])){
		$querySpec = "SELECT ".$data['field_parent']." 
					FROM ".$data['table_parent']." 
					WHERE ".$data['table_parent_condition']." = ".$data['id_parent'];
		//print_r($querySpec);
		
		$resultSpec = mysql_query($querySpec) or die (mysql_error);
		
		echo "<option value=''></option>";
		
		while ($dataSpec = mysql_fetch_array($resultSpec)){
			$querySpecText = "SELECT * FROM ".$data['table_child']." 
								WHERE ".$data['field_child_1']." = ".$dataSpec[$data['field_parent']];
			//print_r($querySpecText);
			$resultSpecText = mysql_query($querySpecText) or die (mysql_error);
			while ($dataSpecText = mysql_fetch_assoc($resultSpecText)){
				echo "<option value=".$dataSpecText[$data['field_child_1']].">".$dataSpecText[$data['field_child_2']]."</option>";
			}	
		}
	}
	
	
}



?>

