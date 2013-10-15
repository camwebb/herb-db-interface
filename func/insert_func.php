<?php 
defined('_IBIS') or die ('Forbidden Access');

function insert_tab_specimen($dataSpecimen){
	
	
	$query = "INSERT INTO ".$dataSpecimen['table_name']." 
			 ( ".
				$dataSpecimen['field_name']['ID_Specimen'].",".
				$dataSpecimen['field_name']['Collector_Field_Number'].",".
				$dataSpecimen['field_name']['Collector_Name'].",".
				$dataSpecimen['field_name']['Coll_Date_From'].",".
				$dataSpecimen['field_name']['Coll_Date_To'].",".
				$dataSpecimen['field_name']['Habit_Detail'].",".
				$dataSpecimen['field_name']['Origin_of_Collection_Code'].",".
				$dataSpecimen['field_name']['Status_Code'].",".
				$dataSpecimen['field_name']['Phenology_Code'].",".
				$dataSpecimen['field_name']['Sex_Code'].",".
				$dataSpecimen['field_name']['Notes'].",".
				$dataSpecimen['field_name']['Collection_Method_Code'].",".
				$dataSpecimen['field_name']['Distribution_of_Duplicates'].",".
				$dataSpecimen['field_name']['Type_Code'].",".
				$dataSpecimen['field_name']['Data_Value'].
				
			 ") 
			 VALUES 
			 (
				null,
				'". $dataSpecimen['field_data']['Collector_Field_Number']."',
				'". $dataSpecimen['field_data']['Collector_Name']."',
				'". $dataSpecimen['field_data']['Coll_Date_From']."',
				'". $dataSpecimen['field_data']['Coll_Date_To']."',
				'". $dataSpecimen['field_data']['Habit_Detail']."',
				". $dataSpecimen['field_data']['Origin_of_Collection_Code'].",
				". $dataSpecimen['field_data']['Status_Code'].",
				". $dataSpecimen['field_data']['Phenology_Code'].",
				". $dataSpecimen['field_data']['Sex_Code'].",
				'". $dataSpecimen['field_data']['Notes']."',
				". $dataSpecimen['field_data']['Collection_Method_Code'].",
				'". $dataSpecimen['field_data']['Distribution_of_Duplicates']."',
				". $dataSpecimen['field_data']['Type_Code'].",
				". $dataSpecimen['field_data']['Data_Value']."
			 )";
	print_r($query);		 
	
	$result = mysql_query($query) or die (mysql_error);
	$lastID = mysql_insert_id();
	
	if ($result){
			$queryLocName = "INSERT INTO Local_Name 
							(".
								"`".$dataSpecimen['field_name']['ID_Specimen']."`,".
								"`".$dataSpecimen['field_name']['Local_Name']."`,".
								"`".$dataSpecimen['field_name']['Language']."`".
							")
							VALUES 
							(".
								"'".$lastID."',".
								"'".$dataSpecimen['field_data']['Local_Name']."',".
								"'".$dataSpecimen['field_data']['Language']."'".
							")";
			$resultLocName = mysql_query($queryLocName) or die (mysql_error);
			//print_r($queryLocName);
			
			$queryLocUse = "INSERT INTO Local_Use 
							(".
								"`".$dataSpecimen['field_name']['ID_Specimen']."`,".
								"`".$dataSpecimen['field_name']['Local_Use']."`".
							")
							VALUES 
							(".
								"'".$lastID."',".
								"'".$dataSpecimen['field_data']['Local_Use']."'".
								
							")";
			$resultLocUse = mysql_query($queryLocUse) or die (mysql_error);
			
			
			
			$Collector = get_collector_data(array('Collector'=>$dataSpecimen['field_data']['Collector_Name']));
			//var_dump($Collector);
			if ($Collector == ''){
				// insert data collector
				//echo 'ada';
				$insert = insert_collector_data(array('ID_Specimen'=>$lastID, 'Collector'=>$dataSpecimen['field_data']['Collector_Name']));
			}
			
			//print_r($queryLocUse);
			$_SESSION['ID_Specimen'] = $lastID;
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=locality";</script>';
		
		
	}
}

function insert_tab_locality($dataSpecimen){
	$query = "UPDATE ".$dataSpecimen['table_name']." 
			 SET ".
				$dataSpecimen['field_name']['Collector_Field_Number']	." = '".$dataSpecimen['field_data']['Collector_Field_Number']."',".
				$dataSpecimen['field_name']['Collector_Name']			." = '".$dataSpecimen['field_data']['Collector_Name']."',".
				$dataSpecimen['field_name']['Coll_Date_From']			." = '".$dataSpecimen['field_data']['Coll_Date_From']."',".
				$dataSpecimen['field_name']['Coll_Date_To']				." = '".$dataSpecimen['field_data']['Coll_Date_To']."',".
				$dataSpecimen['field_name']['Habitat_Code']				." = ".$dataSpecimen['field_data']['Habitat_Code'].",".
				$dataSpecimen['field_name']['Substrate_Code']			." = ".$dataSpecimen['field_data']['Substrate_Code'].",".
				$dataSpecimen['field_name']['Lat_From']					." = ".$dataSpecimen['field_data']['Lat_From'].",".
				$dataSpecimen['field_name']['Lat_To']					." = ".$dataSpecimen['field_data']['Lat_To'].",".
				$dataSpecimen['field_name']['Habitat_Detail']			." = '".$dataSpecimen['field_data']['Habitat_Detail']."',".
				$dataSpecimen['field_name']['Lon_From']					." = ".$dataSpecimen['field_data']['Lon_From'].",".
				$dataSpecimen['field_name']['Lon_To']					." = ".$dataSpecimen['field_data']['Lon_To'].",".
				$dataSpecimen['field_name']['Locality_Detail']			." = '".$dataSpecimen['field_data']['Locality_Detail']."',".
				$dataSpecimen['field_name']['Country_Name']				." = '".$dataSpecimen['field_data']['Country_Name']."',".
				$dataSpecimen['field_name']['Sub_District_Name']		." = '".$dataSpecimen['field_data']['Sub_District_Name']."',".
				$dataSpecimen['field_name']['NNP_Code']					." = ".$dataSpecimen['field_data']['NNP_Code'].",".
				$dataSpecimen['field_name']['Major_Island_Code']		." = ".$dataSpecimen['field_data']['Major_Island_Code'].",".
				$dataSpecimen['field_name']['Island_Name']				." = '".$dataSpecimen['field_data']['Island_Name']."',".
				$dataSpecimen['field_name']['NNP_Distance']				." = ".$dataSpecimen['field_data']['NNP_Distance'].",".
				$dataSpecimen['field_name']['Province_Code']			." = ".$dataSpecimen['field_data']['Province_Code'].",".
				$dataSpecimen['field_name']['NNP_Direction']			." = ".$dataSpecimen['field_data']['NNP_Direction'].",".
				$dataSpecimen['field_name']['District_Code']			." = ".$dataSpecimen['field_data']['District_Code'].",".
				$dataSpecimen['field_name']['Geocode_Source']			." = ".$dataSpecimen['field_data']['Geocode_Source'].",".
				$dataSpecimen['field_name']['Alt_From']					." = ".$dataSpecimen['field_data']['Alt_From'].",".
				$dataSpecimen['field_name']['Alt_To']					." = ".$dataSpecimen['field_data']['Alt_To'].",".
				$dataSpecimen['field_name']['Geocode_Method']			." = ".$dataSpecimen['field_data']['Geocode_Method'].",".
				$dataSpecimen['field_name']['Data_Value']				." = ".$dataSpecimen['field_data']['Data_Value'].
			" WHERE ".
				$dataSpecimen['field_name']['ID_Specimen']." = ".$_SESSION['ID_Specimen'];	
			
	//print_r($query);		 
	$result = mysql_query($query) or die (mysql_error);
	if ($result){
		echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=determination";</script>';
		
	}
}


function insert_tab_determination($dataSpecimen){
	$query = "INSERT INTO ".$dataSpecimen['table_name']." 
			 ( ".
				$dataSpecimen['field_name']['ID_Determination'].",".
				$dataSpecimen['field_name']['ID_Specimen'].",".
				$dataSpecimen['field_name']['Taxonomical_Validator_By'].",".
				$dataSpecimen['field_name']['Det_Date'].",".
				$dataSpecimen['field_name']['Determination_Qualifier'].",".
				$dataSpecimen['field_name']['Taxonomical_Confirmed_By'].",".
				$dataSpecimen['field_name']['Conf_Date'].",".
				$dataSpecimen['field_name']['Current_Determination_Flag'].",".
				$dataSpecimen['field_name']['Family_Code'].",".
				$dataSpecimen['field_name']['Genus_Code'].",".
				$dataSpecimen['field_name']['Species_Code'].",".
				$dataSpecimen['field_name']['Species_Author_Code'].",".
				$dataSpecimen['field_name']['Publication'].",".
				$dataSpecimen['field_name']['Informal_Group_Code'].",".
				$dataSpecimen['field_name']['Other_Name'].
				
			 ") 
			 VALUES 
			 (
				null,
				". $_SESSION['ID_Specimen'].",
				'". $dataSpecimen['field_data']['Taxonomical_Validator_By']."',
				'". $dataSpecimen['field_data']['Det_Date']."',
				". $dataSpecimen['field_data']['Determination_Qualifier'].",
				'". $dataSpecimen['field_data']['Taxonomical_Confirmed_By']."',
				'". $dataSpecimen['field_data']['Conf_Date']."',
				". $dataSpecimen['field_data']['Current_Determination_Flag'].",
				". $dataSpecimen['field_data']['Family_Code'].",
				". $dataSpecimen['field_data']['Genus_Code'].",
				". $dataSpecimen['field_data']['Species_Code'].",
				". $dataSpecimen['field_data']['Species_Author_Code'].",
				'". $dataSpecimen['field_data']['Publication']."',
				". $dataSpecimen['field_data']['Informal_Group_Code'].",
				'". $dataSpecimen['field_data']['Other_Name']."'
			 )";
	//print_r($query);		 
	$result = mysql_query($query) or die (mysql_error);
	$lastID = mysql_insert_id();
	
	if ($result){
			
			$_SESSION['ID_Determination'] = $lastID;
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=component";</script>';
		
		
	}
}

function insert_tab_component($dataSpecimen){
	$query = "INSERT INTO ".$dataSpecimen['table_name']['Component']." 
			 ( ".
				$dataSpecimen['field_name']['ID_Specimen']			." , ".
				$dataSpecimen['field_name']['ID_Component']			." , ".
				$dataSpecimen['field_name']['BO_Number']			." , ".
				$dataSpecimen['field_name']['Component_Class_Code']	." , ".
				$dataSpecimen['field_name']['Component_Comment']	." ) ".
				
			" VALUES (".
				$_SESSION['ID_Specimen'].",".
				$dataSpecimen['field_data']['ID_Component'].",
				'".$dataSpecimen['field_data']['BO_Number']."',
				".$dataSpecimen['field_data']['Component_Class_Code'].",'
				".$dataSpecimen['field_data']['Component_Comment']."')";
				
	//print_r($query);		 
	$result = mysql_query($query) or die (mysql_error);
	$lastID = mysql_insert_id();
	
	$Other_Number = get_data_other_number(array('ID_Component' => $dataSpecimen['field_data']['ID_Component']));
	if ($Other_Number !='')
	{
		$queryOtherNum = "UPDATE Other_Number SET ". 
						$dataSpecimen['field_name']['Other_Number']	." = '".$dataSpecimen['field_data']['Other_Number']."'".
						" WHERE ID_Component = ".$_SESSION['ID_Component'];
	}
	else
	{
		$queryOtherNum = "INSERT INTO Other_Number ( ". 
						$dataSpecimen['field_name']['ID_Component'] .",".
						$dataSpecimen['field_name']['Other_Number']	.") VALUES ( ".
						$dataSpecimen['field_data']['ID_Component'].",'".
						$dataSpecimen['field_data']['Other_Number']."')";
						
	}
	//print_r($queryOtherNum);
	$resultOtherNum = mysql_query($queryOtherNum) or die (mysql_error);
	
	
	if ($result){
			
			$_SESSION['ID_Component'] = $lastID;
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=component";</script>';
		
		
	}
}

function get_collector_data($param)
{
	//$data_coll_explode = explode(',', $param['Collector']);
	
	//foreach ($data_coll_explode as $value) :
		//$query = "SELECT ID_Collector FROM Collector WHERE Collector = '$param[Collector]' LIMIT 1";
		$query = "SELECT ID FROM Reference_Collector WHERE Text = '$param[Collector]' LIMIT 1";
		$result = mysql_query($query) or die (error());
		$data = mysql_fetch_object($result);
		
		$dataArr = $data->ID;
	//endforeach;
	return $dataArr;
}

function insert_collector_data($param)
{
	$query_ = "INSERT INTO Reference_Collector (ID, Text) 
				VALUES (null, '$param[Collector]')";
	//print_r($query_);
	$result_ = mysql_query($query_) or die (error());
	if ($result_)
	{
		$query = "INSERT INTO Collector (ID_Specimen, ID_Collector, Collector) 
					VALUES ($param[ID_Specimen], null, '$param[Collector]')";
		//print_r($query);
		$result = mysql_query($query) or die (error());
		if ($result){
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
	
}

function insert_data_nnp($param)
{
	$query = "INSERT INTO xNNP (ID, Text) 
				VALUES (null, '$param[NNP]')";
	//print_r($query);
	$result = mysql_query($query) or die (error());
	if ($result){
		return true;
	}
	else
	{
		return false;
	}
}
?>

													

