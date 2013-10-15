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
	
	$Species_ID = get_species_id(array('Species'=>$_GET['kode'])); //filter_function.php
	get_specimen_code(array 
					(
					'id_parent' => $Species_ID, 
					'table_parent' => 'Species_Author',
					'table_parent_condition' => 'Species_ID',
					'field_parent' => 'Species_Author',
					'table_child' => 'Species_Author_Text',
					'field_child_1' => 'ID',
					'field_child_2' => 'Species_Author'
					));
					/*
					get_specimen_code(array 
											(
											'id_parent' 				=> $dataDetermination->Species_Code, 
											'table_parent' 				=> 'Species_Author',
											'table_parent_condition' 	=> 'Species_ID',
											'field_parent' 				=> 'Species_Author',
											'table_child' 				=> 'Species_Author_Text',
											'field_child_1' 			=> 'ID',
											'field_child_2' 			=> 'Species_Author',
											'selectedID' 				=> $Species_Author_Code
											));*/
																	
}else if (isset($_GET['genus'])){
	
	$Genus_ID = get_genus_id(array('Genus'=>$_GET['kode'])); //filter_function.php
	
	//print_r($Genus_ID);
	//exit;
	get_specimen_code(array 
					(
					'id_parent' => $Genus_ID, 
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
			echo "<option value='".$data['Field_Mirror']."'>". $data['Field']."</option>";	
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
	$query = "SELECT * FROM view_field WHERE Field_Mirror LIKE '".$dataData['id_field']."'"; 
	//print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	
	if (mysql_num_rows($result)){
		$dataTable = mysql_fetch_assoc($result);
		$field_1 = $dataTable['Get_Field_FromTable_1'];
		$field_2 = $dataTable['Get_Field_FromTable_2'];
		
		if (($dataData['kode'] == '=') or ($dataData['kode'] == '<>')){
			
			if ($dataTable['FromTable'] == 'Specimen')
			{
				$getToTable = "SELECT DISTINCT ($dataTable[Get_Field_FromTable_1]) FROM ". $dataTable['FromTable']. " ORDER BY $field_1 ASC LIMIT 50"; //print_r($getToTable);
			}
			else
			{
				$getToTable = "SELECT * FROM ". $dataTable['FromTable']. " ORDER BY $field_1 ASC"; //print_r($getToTable);
			}
			
		}
		//print_r($getToTable);
		$resToTable = mysql_query($getToTable) or die (mysql_error);
		if (mysql_num_rows($resToTable)){ 
			echo "<option value=''></option>";
			if ($dataData['id_field']=='Collector'){
				while ($dataToTable = mysql_fetch_array($resToTable)){ 
					echo "<option value='".$dataToTable[$field_2]."'>".$dataToTable[$field_2]."</option>";
				}
			}else{
				while ($dataToTable = mysql_fetch_array($resToTable)){
					if ($dataToTable[$field_2] !='')
					{
						echo "<option value=".htmlentities($dataToTable[$field_1]).">".htmlentities($dataToTable[$field_2])."</option>";
					}
					
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
				?>
				<option value="<?=$dataSpecText[$data['field_child_1']]?>" <?php if ($dataSpecText[$data['field_child_1']] == $data['selectedID']) echo 'selected';?>><?=$dataSpecText[$data['field_child_2']]?></option>
				<?php
			}	
		}
	}
	
	
}

function get_data_genus($param)
{
	$query = "SELECT Genus FROM Genus WHERE Genus_ID = $param[Genus_ID] LIMIT 1";
	$result = mysql_query($query) or die (mysql_error());
	$data = mysql_fetch_object($result);
	
	$dataArr = $data->Genus;
	
	return $dataArr;
}

function get_data_species($param)
{
	$query = "SELECT Species FROM Species WHERE Species_ID = $param[Species_ID] LIMIT 1";
	//print_r($query);
	$result = mysql_query($query) or die (mysql_error());
	$data = mysql_fetch_object($result);
	
	$dataArr = $data->Species;
	
	return $dataArr;
}


function get_data_species_author($param)
{
	$query = "SELECT Species_Author FROM Species_Author WHERE Species_ID = $param[Species_ID] AND Author_ID = $param[Author_ID] LIMIT 1";
	//print_r($query);echo 'ada';
	$result = mysql_query($query) or die (mysql_error());
	$data = mysql_fetch_object($result);
	
	$dataArr = $data->Species_Author;
	
	return $dataArr;
}
?>

