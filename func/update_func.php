<?php
defined('_IBIS') or die ('Forbidden Access');

function update_tab_specimen($dataSpecimen){ 
	$query = "UPDATE ".$dataSpecimen['table_name']." 
			 SET ".
				"`".$dataSpecimen['field_name']['Collector_Field_Number']."`	= '".$dataSpecimen['field_data']['Collector_Field_Number']."',".
				"`".$dataSpecimen['field_name']['Collector_Name']."`			= '".$dataSpecimen['field_data']['Collector_Name']."',".
				"`".$dataSpecimen['field_name']['Coll_Date_From']."`			= '".$dataSpecimen['field_data']['Coll_Date_From']."',".
				"`".$dataSpecimen['field_name']['Coll_Date_To']."` 				= '".$dataSpecimen['field_data']['Coll_Date_To']."',".
				"`".$dataSpecimen['field_name']['Habit_Detail']."`				= '".$dataSpecimen['field_data']['Habit_Detail']."',".
				"`".$dataSpecimen['field_name']['Origin_of_Collection_Code']."` = ".$dataSpecimen['field_data']['Origin_of_Collection_Code'].",".
				"`".$dataSpecimen['field_name']['Status_Code']."`				= ".$dataSpecimen['field_data']['Status_Code'].",".
				"`".$dataSpecimen['field_name']['Phenology_Code']."`			= ".$dataSpecimen['field_data']['Phenology_Code'].",".
				"`".$dataSpecimen['field_name']['Sex_Code']."`					= ".$dataSpecimen['field_data']['Sex_Code'].",".
				"`".$dataSpecimen['field_name']['Notes']."` 					= '".$dataSpecimen['field_data']['Notes']."',".
				"`".$dataSpecimen['field_name']['Collection_Method_Code']."` 	= ".$dataSpecimen['field_data']['Collection_Method_Code'].",".
				"`".$dataSpecimen['field_name']['Distribution_of_Duplicates']."`= '".$dataSpecimen['field_data']['Distribution_of_Duplicates']."',".
				"`".$dataSpecimen['field_name']['Type_Code']."`					= ".$dataSpecimen['field_data']['Type_Code'].",".
				"`".$dataSpecimen['field_name']['Data_Value']."` 				= ".$dataSpecimen['field_data']['Data_Value'].
			" WHERE `".$dataSpecimen['field_name']['ID_Specimen']."` = ".$_SESSION['ID_Specimen'];	
			
	//print_r($query);		 
	$result = mysql_query($query) or die (mysql_error);
	if ($result){ 
		
		$cekData = "SELECT Local_Name FROM Local_Name WHERE ID_Specimen = ".$_SESSION['ID_Specimen'];
		//print_r($cekData);
		$resData = mysql_query($cekData) or die (mysql_error);
		$sumData = mysql_num_rows($resData);
		if ($sumData){ 
			//update data
			$queryLocName = "UPDATE Local_Name SET ".
							 "`".$dataSpecimen['field_name']['Local_Name']."` = '".$dataSpecimen['field_data']['Local_Name']."' , ".
							 "`".$dataSpecimen['field_name']['Language']."` = '".$dataSpecimen['field_data']['Language']."'".
							 " WHERE `ID_Specimen` = ".$_SESSION['ID_Specimen'];
			$resultLocName = mysql_query($queryLocName) or die(mysql_error);
			//print_r($queryLocName);
			$queryLocUse = "UPDATE Local_Use SET ".
							 "`".$dataSpecimen['field_name']['Local_Use']."`= '".$dataSpecimen['field_data']['Local_Use']."'".
							 " WHERE `ID_Specimen` = ".$_SESSION['ID_Specimen'];
			//print_r($queryLocUse);				 
			$resultLocUse = mysql_query($queryLocUse) or die(mysql_error);
			
		}else{
			//insert dahulu Data di local name
			$queryLocName = "INSERT INTO Local_Name 
							(".
								"`".$dataSpecimen['field_name']['ID_Specimen']."`,".
								"`".$dataSpecimen['field_name']['Local_Name']."`,".
								"`".$dataSpecimen['field_name']['Language']."`".
							")
							VALUES 
							(".
								"'".$_SESSION['ID_Specimen']."',".
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
								"'".$_SESSION['ID_Specimen']."',".
								"'".$dataSpecimen['field_data']['Local_Use']."'".
								
							")";
			$resultLocUse = mysql_query($queryLocUse) or die (mysql_error);
			//print_r($queryLocUse);
			
		}
		
		$Collector = get_collector_data(array('Collector'=>$dataSpecimen['field_data']['Collector_Name']));
			//var_dump($Collector);
		if ($Collector == ''){
			// insert data collector
			//echo 'ada';
			$insert = insert_collector_data(array('ID_Specimen'=>$_SESSION['ID_Specimen'], 'Collector'=>$dataSpecimen['field_data']['Collector_Name']));
		}
						 
		if (isset($_SESSION['ID_Specimen'])){
			echo '<script type=text/javascript>alert ("Data Sudah Diupdate"); window.location="./?page=specimen&id='.$dataSpecimen['page_id'].'";</script>';
		}else{
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=specimen&id='.$dataSpecimen['page_id'].'";</script>';
		}
		
		
	} 
}


function update_tab_locality($dataSpecimen){ 
	$query = "UPDATE ".$dataSpecimen['table_name']." 
			 SET ".
				$dataSpecimen['field_name']['Collector_Field_Number']	." = '".$dataSpecimen['field_data']['Collector_Field_Number']."',".
				$dataSpecimen['field_name']['Collector_Name']			." = '".$dataSpecimen['field_data']['Collector_Name']."',".
				$dataSpecimen['field_name']['Coll_Date_From']			." = '".$dataSpecimen['field_data']['Coll_Date_From']."',".
				$dataSpecimen['field_name']['Coll_Date_To']				." = '".$dataSpecimen['field_data']['Coll_Date_To']."',".
				$dataSpecimen['field_name']['Habitat_Code']				." = ".$dataSpecimen['field_data']['Habitat_Code'].",".
				$dataSpecimen['field_name']['Substrate_Code']			." = ".$dataSpecimen['field_data']['Substrate_Code'].",".
				$dataSpecimen['field_name']['Habitat_Detail']			." = '".$dataSpecimen['field_data']['Habitat_Detail']."',".
				$dataSpecimen['field_name']['Lat_From']					." = '".$dataSpecimen['field_data']['Lat_From']."',".
				//$dataSpecimen['field_name']['Lat_To']					." = ".$dataSpecimen['field_data']['Lat_To'].",".
				$dataSpecimen['field_name']['Lon_From']					." = '".$dataSpecimen['field_data']['Lon_From']."',".
				//$dataSpecimen['field_name']['Lat_To']					." = ".$dataSpecimen['field_data']['Lon_To'].",".
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
				//$dataSpecimen['field_name']['Alt_From']					." = ".$dataSpecimen['field_data']['Alt_From'].",".
				//$dataSpecimen['field_name']['Alt_To']					." = ".$dataSpecimen['field_data']['Alt_To'].",".
				$dataSpecimen['field_name']['Geocode_Method']			." = ".$dataSpecimen['field_data']['Geocode_Method'].",".
				$dataSpecimen['field_name']['Data_Value']				." = ".$dataSpecimen['field_data']['Data_Value'].
			" WHERE ".
				$dataSpecimen['field_name']['ID_Specimen']." = ".$dataSpecimen['field_data']['ID_Specimen'];	
			
	//print_r($query);		 
	
	$result = mysql_query($query) or die (mysql_error);
	//exit;
	if ($result){
		echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=locality&id='.$dataSpecimen['page_id'].'";</script>';
		
	} 
}


function update_tab_determination($dataSpecimen){ 
	//pr($dataSpecimen);
	//echo $dataSpecimen['field_data']['ID_Determination'];
	if ($dataSpecimen['field_data']['Genus_Code'] !='null') $Genus_ID = get_genus_id(array('Genus'=>$dataSpecimen['field_data']['Genus_Code'])); else $Genus_ID = 'NULL';
	if ($dataSpecimen['field_data']['Species_Code'] !='null') $Species_ID = get_species_id(array('Species'=>$dataSpecimen['field_data']['Species_Code'])); else $Species_ID = 'NULL';
	if ($dataSpecimen['field_data']['Species_Author_Code'] !='') $Species_Author = get_species_author_id(array('Species_Author'=>$dataSpecimen['field_data']['Species_Author_Code'], 'Species_ID' => $Species_ID)); else $Species_Author = 'NULL';
	
	if ($_SESSION['ID_Determination'] !=''){
		
		//pr($dataSpecimen);
		
		
		$query = "UPDATE ".$dataSpecimen['table_name']['Determination']." 
			 SET ".
				$dataSpecimen['field_name']['ID_Specimen']					." = ".$_SESSION['ID_Specimen'].",".
				//$dataSpecimen['field_name']['ID_Deterimination']			." = ".$dataSpecimen['field_data']['ID_Deterimination'].",".
				$dataSpecimen['field_name']['Taxonomical_Validator_By']		." = '".$dataSpecimen['field_data']['Taxonomical_Validator_By']."',".
				$dataSpecimen['field_name']['Det_Date']						." = '".$dataSpecimen['field_data']['Det_Date']."',".
				$dataSpecimen['field_name']['Determination_Qualifier']		." = ".$dataSpecimen['field_data']['Determination_Qualifier'].",".
				$dataSpecimen['field_name']['Taxonomical_Confirmed_By']		." = '".$dataSpecimen['field_data']['Taxonomical_Confirmed_By']."',".
				$dataSpecimen['field_name']['Conf_Date']					." = '".$dataSpecimen['field_data']['Conf_Date']."',".
				$dataSpecimen['field_name']['Current_Determination_Flag']	." = '".$dataSpecimen['field_data']['Current_Determination_Flag']."',".
				$dataSpecimen['field_name']['Family_Code']					." = ".$dataSpecimen['field_data']['Family_Code'].",".
				$dataSpecimen['field_name']['Genus_Code']					." = ".$Genus_ID.",".
				$dataSpecimen['field_name']['Species_Code']					." = ".$Species_ID.",".
				$dataSpecimen['field_name']['Species_Author_Code']			." = ".$Species_Author.",".
				$dataSpecimen['field_name']['Publication']					." = '".$dataSpecimen['field_data']['Publication']."',".
				$dataSpecimen['field_name']['Informal_Group_Code']			." = ".$dataSpecimen['field_data']['Informal_Group_Code'].",".
				$dataSpecimen['field_name']['Other_Name']					." = '".$dataSpecimen['field_data']['Other_Name']."'".
				
			" WHERE ".
				$dataSpecimen['field_name']['ID_Determination']." = ".$_SESSION['ID_Determination'];
	}
	else
	{
		$query = "INSERT INTO ".$dataSpecimen['table_name']['Determination']." 
			 ( ".
				$dataSpecimen['field_name']['ID_Specimen']					." , ".
				$dataSpecimen['field_name']['ID_Determination']			." , ".
				$dataSpecimen['field_name']['Taxonomical_Validator_By']		." , ".
				$dataSpecimen['field_name']['Det_Date']						." , ".
				$dataSpecimen['field_name']['Determination_Qualifier']		." , ".
				$dataSpecimen['field_name']['Taxonomical_Confirmed_By']		." , ".
				$dataSpecimen['field_name']['Conf_Date']					." , ".
				$dataSpecimen['field_name']['Current_Determination_Flag']	." , ".
				$dataSpecimen['field_name']['Family_Code']					." , ".
				$dataSpecimen['field_name']['Genus_Code']					." , ".
				$dataSpecimen['field_name']['Species_Code']					." , ".
				$dataSpecimen['field_name']['Species_Author_Code']			." , ".
				$dataSpecimen['field_name']['Publication']					." , ".
				$dataSpecimen['field_name']['Informal_Group_Code']			." , ".
				$dataSpecimen['field_name']['Other_Name']					." ) ".
				
			" VALUES ( ".
				$_SESSION['ID_Specimen'].",".
				$dataSpecimen['field_data']['ID_Determination'].", 
				'".$dataSpecimen['field_data']['Taxonomical_Validator_By']."',
				'".$dataSpecimen['field_data']['Det_Date']."',
				".$dataSpecimen['field_data']['Determination_Qualifier'].",
				'".$dataSpecimen['field_data']['Taxonomical_Confirmed_By']."',
				'".$dataSpecimen['field_data']['Conf_Date']."',
				'".$dataSpecimen['field_data']['Current_Determination_Flag']."',
				".$dataSpecimen['field_data']['Family_Code'].",
				".$Genus_ID.",
				".$Species_ID.",
				".$Species_Author.",
				'".$dataSpecimen['field_data']['Publication']."',
				".$dataSpecimen['field_data']['Informal_Group_Code'].",
				'".$dataSpecimen['field_data']['Other_Name']."')";
				//$dataSpecimen['field_name']['ID_Determination']." = ".$_SESSION['ID_Determination'];
	}
	
	//print_r($query);
	$result = mysql_query($query) or die (error());
	
	
	
	$queryToSpec = "UPDATE Specimen SET ". 
					$dataSpecimen['field_name']['Collector_Field_Number']	." = '".$dataSpecimen['field_data']['Collector_Field_Number']."',".
					$dataSpecimen['field_name']['Collector_Name']			." = '".$dataSpecimen['field_data']['Collector_Name']."',".
					$dataSpecimen['field_name']['Coll_Date_From']			." = '".$dataSpecimen['field_data']['Coll_Date_From']."',".
					$dataSpecimen['field_name']['Coll_Date_To']				." = '".$dataSpecimen['field_data']['Coll_Date_To']."'".
					//$dataSpecimen['field_name']['Data_Value']				." = '".$dataSpecimen['field_data']['Data_Value']."'".
					" WHERE ID_Specimen = ".$_SESSION['ID_Specimen'];
	//print_r($queryToSpec);
	
	
	$resulToSpec = mysql_query($queryToSpec) or die (error());
	
	$dataRank = get_rank_data(array('ID_Determination'=>$dataSpecimen['field_data']['ID_Determination']));
	
	if ($dataRank[0]->ID_Determination !='')
	{
		foreach ($dataRank as $value){
			$Infraspecific_Rank[] = $value->Infraspecific_Rank;
		}
		
		for ($i = 0; $i < count($dataSpecimen['field_data']['Infraspecific_Rank']); $i++):
		
			if (in_array($dataSpecimen['field_data']['Infraspecific_Rank'][$i], $Infraspecific_Rank))
			{
				$queryRank = "UPDATE ".$dataSpecimen['table_name']['Rank']. " SET ".
								$dataSpecimen['field_name']['Infraspecific_Rank'] ."=". $dataSpecimen['field_data']['Infraspecific_Rank'][$i] .",".
								$dataSpecimen['field_name']['Infraspecific_Name'] ."='". $dataSpecimen['field_data']['Infraspecific_Name'][$i]."',".
								$dataSpecimen['field_name']['Infraspecific_Author'] ."='". $dataSpecimen['field_data']['Infraspecific_Author'][$i]."'".
								" WHERE ". $dataSpecimen['field_name']['ID_Determination'] ."='". $dataSpecimen['field_data']['ID_Determination']."'".
								" AND ".$dataSpecimen['field_name']['Infraspecific_Rank'] ."=".$dataSpecimen['field_data']['Infraspecific_Rank'][$i];
				//print_r($queryRank);
			
			}else{
				
				$queryRank = "INSERT INTO ".$dataSpecimen['table_name']['Rank'].
								"(".$dataSpecimen['field_name']['ID_Determination'] .",".
								$dataSpecimen['field_name']['Infraspecific_Rank'] .",".
								$dataSpecimen['field_name']['Infraspecific_Name'] .",".
								$dataSpecimen['field_name']['Infraspecific_Author'].
								")".
								" VALUES (".
								$dataSpecimen['field_data']['ID_Determination'] .", '".
								$dataSpecimen['field_data']['Infraspecific_Rank'][$i] ."', '".
								$dataSpecimen['field_data']['Infraspecific_Name'][$i] ."', '".
								$dataSpecimen['field_data']['Infraspecific_Author'][$i].
								"')";
				//print_r($queryRank);
			}
		
		
		$resultRank = mysql_query($queryRank) or die (error());
		endfor;
		//exit;
	}else{
		
		for ($i = 0; $i < count($dataSpecimen['field_data']['Infraspecific_Rank']); $i++):
		$queryRank = "INSERT INTO ".$dataSpecimen['table_name']['Rank'].
						"(".$dataSpecimen['field_name']['ID_Determination'] .",".
						$dataSpecimen['field_name']['Infraspecific_Rank'] .",".
						$dataSpecimen['field_name']['Infraspecific_Name'] .",".
						$dataSpecimen['field_name']['Infraspecific_Author'].
						")".
						" VALUES (".
						$dataSpecimen['field_data']['ID_Determination'] .", '".
						$dataSpecimen['field_data']['Infraspecific_Rank'][$i] ."', '".
						$dataSpecimen['field_data']['Infraspecific_Name'][$i] ."', '".
						$dataSpecimen['field_data']['Infraspecific_Author'][$i].
						"')";
		//print_r($queryRank);
		
		$resultRank = mysql_query($queryRank) or die (error());
		endfor;
		//exit;
	}
	
	
	
	
	
	if ($result){
		if (isset($_SESSION['ID_Specimen'])){
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=determination&id='.$dataSpecimen['page_id'].'";</script>';
		}else{
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=determination&id='.$dataSpecimen['page_id'].'";</script>';
		}
		
		
	} 
}


function update_tab_component($dataSpecimen){ 
	
	if ($_SESSION['ID_Component'] !='')
	{
		$query = "UPDATE ".$dataSpecimen['table_name']['Component']." 
			 SET ".
				$dataSpecimen['field_name']['ID_Specimen']			." = ".$_SESSION['ID_Specimen'].",".
				$dataSpecimen['field_name']['BO_Number']			." = '".$dataSpecimen['field_data']['BO_Number']."',".
				$dataSpecimen['field_name']['Component_Class_Code']	." = ".$dataSpecimen['field_data']['Component_Class_Code'].",".
				$dataSpecimen['field_name']['Component_Comment']	." = '".$dataSpecimen['field_data']['Component_Comment']."'".
			" WHERE ".
				$dataSpecimen['field_name']['ID_Component']." = ".$_SESSION['ID_Component'];
	}
	else
	{
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
				//$dataSpecimen['field_name']['ID_Component']." = ".$_SESSION['ID_Component'];
	}
		
			
	//print_r($query);		 
	
	$result = mysql_query($query) or die (mysql_error);
	
	$queryToSpec = "UPDATE Specimen SET ". 
					$dataSpecimen['field_name']['Collector_Field_Number']	." = '".$dataSpecimen['field_data']['Collector_Field_Number']."',".
					$dataSpecimen['field_name']['Collector_Name']			." = '".$dataSpecimen['field_data']['Collector_Name']."',".
					$dataSpecimen['field_name']['Coll_Date_From']			." = '".$dataSpecimen['field_data']['Coll_Date_From']."',".
					$dataSpecimen['field_name']['Coll_Date_To']				." = '".$dataSpecimen['field_data']['Coll_Date_To']."',".
					$dataSpecimen['field_name']['Data_Value']				." = ".$dataSpecimen['field_data']['Data_Value']."".
					" WHERE ID_Specimen = ".$_SESSION['ID_Specimen'];
	$resulToSpec = mysql_query($queryToSpec) or die (mysql_error);
	//print_r($queryToSpec);
	
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
	
	//exit;
	if ($result){
		if (isset($_SESSION['ID_Specimen'])){
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=component&id='.$dataSpecimen['page_id'].'";</script>';
		}else{
			echo '<script type=text/javascript>alert ("Data Sudah Masuk"); window.location="./?page=component&id='.$dataSpecimen['page_id'].'";</script>';
		}
		
		
	} 
}

function get_genus_id($param)
{
	$query = "SELECT Genus_ID FROM Genus WHERE Genus = $param[Genus] LIMIT 1";
	//echo $query;
	$result = mysql_query($query) or die (error());
	$data = mysql_fetch_object($result);
	
	$dataArr = $data->Genus_ID;
	
	return $dataArr;
}

function get_species_id($param)
{
	$query = "SELECT Species_ID FROM Species WHERE Species = $param[Species] LIMIT 1";
	$result = mysql_query($query) or die (error());
	$data = mysql_fetch_object($result);
	
	$dataArr = $data->Species_ID;
	
	return $dataArr;
}

function get_rank_data($param)
{
	$query = "SELECT * FROM Rank WHERE ID_Determination = $param[ID_Determination]";
	//print_r($query);
	$result = mysql_query($query) or die (error());
	while ($data = mysql_fetch_object($result))
	{
		$dataArr[] = $data;
	}
	
	return $dataArr;
}

function get_data_other_number($param)
{
	$query = "SELECT * FROM Other_Number WHERE ID_Component = $param[ID_Component]";
	//print_r($query);
	$result = mysql_query($query) or die (error());
	while ($data = mysql_fetch_object($result))
	{
		$dataArr = $data->ID_Component;
	}
	
	return $dataArr;
}

function get_species_author_id($param)
{
	$query = "SELECT Author_ID FROM Species_Author WHERE Species_Author = $param[Species_Author] AND Species_ID = $param[Species_ID]"; //AND Species_ID = $param[Species_ID]
	//print_r($query);echo '<br><br>';
	$result = mysql_query($query) or die (error());
	while ($data = mysql_fetch_object($result))
	{
		//echo 'masuk';
		$dataArr = $data->Author_ID;
	}
	
	return $dataArr;
}


?>
