<?php
function get_data_from_table($dataRecord){ 
	
	
	//cek record filter 
	$compareSymbol = array(
						'compareSymbol_0',
						'compareSymbol_1',
						'compareSymbol_2',
						'compareSymbol_3',
						'compareSymbol_4',
						);
				
	$varFieldQuery = array(
						'queryField_0',
						'queryField_1',
						'queryField_2',
						'queryField_3',
						'queryField_4',
						);
	$varFieldResult = array(
						'resultField_0',
						'resultField_1',
						'resultField_2',
						'resultField_3',
						'resultField_4',
						);
	$varDataField = array(
						'dataField_0',
						'dataField_1',
						'dataField_2',
						'dataField_3',
						'dataField_4',
						);					
	$varDataTable = array(
						'dataTable_0',
						'dataTable_1',
						'dataTable_2',
						'dataTable_3',
						'dataTable_4',
						);
	$varQueryColl = array(
						'queryColl_0',
						'queryColl_1',
						'queryColl_2',
						'queryColl_3',
						'queryColl_4',
						);
	$varResultColl = array(
						'resultColl_0',
						'resultColl_1',
						'resultColl_2',
						'resultColl_3',
						'resultColl_4',
						);
	$varDataColl = array(
						'dataColl_0',
						'dataColl_1',
						'dataColl_2',
						'dataColl_3',
						'dataColl_4',
						);		
						
	for ($i = 0; $i <= 0; $i++):
	
			
		//$varTableQuery[$i] = "SELECT * FROM view_table WHERE tableID =" .$dataRecord['table_'.$i];
		$varFieldQuery[$i] = "SELECT * FROM view_field WHERE ID_Field =" .$dataRecord['field_'.$i];
	
	
	
	if (($dataRecord['field_'.$i] == 1)){
		
		$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
		$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
		
		
			if ($dataRecord['data_'.$i] != ''){
				$varQueryColl[$i] = "SELECT * FROM " .$varDataField[$i]['FromTable']. " WHERE ID =". $dataRecord['data_'.$i]; 
				//print_r($queryColl);
				//$varResultColl[$i] = mysql_query($varQueryColl[$i]) or die (mysql_error);
				//$varDataColl[$i] = mysql_fetch_assoc($varResultColl[$i]);
				//break;
			}
		
	}
	endfor;
				
	if (!empty($dataRecord['compare_0'])){ 
		if (!empty($dataRecord['compare_0']) and ($dataRecord['compare_1'])){
			if (!empty($dataRecord['compare_0']) and ($dataRecord['compare_1']) and ($dataRecord['compare_2'])){
				if (!empty($dataRecord['compare_0']) and ($dataRecord['compare_1']) and ($dataRecord['compare_2']) and ($dataRecord['compare_3'])){
					if (!empty($dataRecord['compare_0']) and ($dataRecord['compare_1']) and ($dataRecord['compare_2']) and ($dataRecord['compare_3']) and ($dataRecord['compare_4'])){
						
						$loop = 4;
						
							if (($dataRecord['operator_1'] !='') and ($dataRecord['operator_2'] !='') 
								and ($dataRecord['operator_3'] !='') and ($dataRecord['operator_4'] !='')){
							
							
								for ($i = 0; $i <= $loop; $i++):
								
								include './compare_replace.php';
								
								$varFieldQuery[$i] = "SELECT * FROM view_field WHERE Field = '" .$dataRecord['field_'.$i]."'";
								print_r($varFieldQuery[$i]);
								$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
								$varSum = mysql_num_rows($varFieldResult[$i]);
								$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
								
								endfor;
								
								print_r($dataRecord);
								
									
									if (($dataRecord['field_0']!=='') and ($dataRecord['field_1']!=='') 
										and ($dataRecord['field_2']!=='') and ($dataRecord['field_3']!=='')
										and ($dataRecord['field_4']!=='')){
									
									list ($jmlRec, $specimenID) = filter_five(
												array (
													'table_0' => $dataRecord['table_0'],
													'where_0' => $where[0],
													'field_0' => $varDataField[0][Specimen_View],
													'condition_0' => $compareSymbol[0],
													'data_0' => $dataRecord['data_0'],
													'persen_0' => $persen[0],
													'operator_1' => $dataRecord['operator_1'],
													
													'table_1' => $dataRecord['table_1'],
													'where_1' => $where[1],
													'field_1' => $varDataField[1][Specimen_View],
													'condition_1' => $compareSymbol[1],
													'data_1' => $dataRecord['data_1'],
													'persen_1' => $persen[1],
													'operator_2' => $dataRecord['operator_1'],
													
													'table_2' => $dataRecord['table_2'],
													'where_2' => $where[2],
													'field_2' => $varDataField[2][Specimen_View],
													'condition_2' => $compareSymbol[2],
													'data_2' => $dataRecord['data_2'],
													'persen_2' => $persen[2],
													
													'table_3' => $dataRecord['table_3'],
													'where_2' => $where[3],
													'field_3' => $varDataField[3][Specimen_View],
													'condition_3' => $compareSymbol[3],
													'data_3' => $dataRecord['data_3'],
													'persen_3' => $persen[3],
													
													'table_4' => $dataRecord['table_4'],
													'where_4' => $where[4],
													'field_4' => $varDataField[4][Specimen_View],
													'condition_4' => $compareSymbol[4],
													'data_4' => $dataRecord['data_4'],
													'persen_4' => $persen[4]
													
												));
									
									return array($jmlRec, $specimenID);
									
									}
									
								
								
								
							}else{
								echo '<script type=text/javascript>alert("Gunakan Operator"); window.location="./?page=filter"</script>';
							}
					}else{
						$loop = 3; //3
						
							if (($dataRecord['operator_1'] !='') and ($dataRecord['operator_2'] !='') 
								and ($dataRecord['operator_3'] !='')){
							
							
							for ($i = 0; $i <= $loop; $i++):
							
							include './compare_replace.php';
							
							$varFieldQuery[$i] = "SELECT * FROM view_field WHERE Field = '" .$dataRecord['field_'.$i]."'";
							print_r($varFieldQuery[$i]);
							$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
							$varSum = mysql_num_rows($varFieldResult[$i]);
							$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
							
							endfor;
							
							print_r($dataRecord);
							
								
								if (($dataRecord['field_0']!=='') and ($dataRecord['field_1']!=='') 
									and ($dataRecord['field_2']!=='') and ($dataRecord['field_3']!=='')){
								
								list ($jmlRec, $specimenID) = filter_four(
											array (
												'table_0' => $dataRecord['table_0'],
												'where_0' => $where[0],
												'field_0' => $varDataField[0][Specimen_View],
												'condition_0' => $compareSymbol[0],
												'data_0' => $dataRecord['data_0'],
												'persen_0' => $persen[0],
												'operator_1' => $dataRecord['operator_1'],
												
												'table_1' => $dataRecord['table_1'],
												'where_1' => $where[1],
												'field_1' => $varDataField[1][Specimen_View],
												'condition_1' => $compareSymbol[1],
												'data_1' => $dataRecord['data_1'],
												'persen_1' => $persen[1],
												'operator_2' => $dataRecord['operator_1'],
												
												'table_2' => $dataRecord['table_2'],
												'where_2' => $where[2],
												'field_2' => $varDataField[2][Specimen_View],
												'condition_2' => $compareSymbol[2],
												'data_2' => $dataRecord['data_2'],
												'persen_2' => $persen[2],
												
												'table_3' => $dataRecord['table_3'],
												'where_2' => $where[3],
												'field_3' => $varDataField[3][Specimen_View],
												'condition_3' => $compareSymbol[3],
												'data_3' => $dataRecord['data_3'],
												'persen_3' => $persen[3]
												
											));
								
								return array($jmlRec, $specimenID);
								
								}
								
							
							
							
						}else{
							echo '<script type=text/javascript>alert("Gunakan Operator"); window.location="./?page=filter"</script>';
						}
					}
				}else{
					$loop = 2;//2
					
						if (($dataRecord['operator_1'] !='') and ($dataRecord['operator_2'] !='')){
						
						
						for ($i = 0; $i <= $loop; $i++):
						
						include './compare_replace.php';
						
						$varFieldQuery[$i] = "SELECT * FROM view_field WHERE Field = '" .$dataRecord['field_'.$i]."'";
						print_r($varFieldQuery[$i]);
						$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
						$varSum = mysql_num_rows($varFieldResult[$i]);
						$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
						
						endfor;
						
						print_r($dataRecord);
						
							
							if (($dataRecord['field_0']!=='') and ($dataRecord['field_1']!=='') 
								and ($dataRecord['field_2']!=='')){
							
							list ($jmlRec, $specimenID) = filter_triple(
										array (
											'table_0' => $dataRecord['table_0'],
											'where_0' => $where[0],
											'field_0' => $varDataField[0][Specimen_View],
											'condition_0' => $compareSymbol[0],
											'data_0' => $dataRecord['data_0'],
											'persen_0' => $persen[0],
											'operator_1' => $dataRecord['operator_1'],
											
											'table_1' => $dataRecord['table_1'],
											'where_1' => $where[1],
											'field_1' => $varDataField[1][Specimen_View],
											'condition_1' => $compareSymbol[1],
											'data_1' => $dataRecord['data_1'],
											'persen_1' => $persen[1],
											'operator_2' => $dataRecord['operator_1'],
											
											'table_2' => $dataRecord['table_2'],
											'where_2' => $where[2],
											'field_2' => $varDataField[2][Specimen_View],
											'condition_2' => $compareSymbol[2],
											'data_2' => $dataRecord['data_2'],
											'persen_2' => $persen[2]
											
										));
							
							return array($jmlRec, $specimenID);
							
							}
							
						
						
						
					}else{
						echo '<script type=text/javascript>alert("Gunakan Operator"); window.location="./?page=filter"</script>';
					}
				
				}
			}else{
				
				$loop = 1;
				
				if ($dataRecord['operator_1'] !=''){
					
					
					for ($i = 0; $i <= $loop; $i++):
					
					include './compare_replace.php';
					
					$varFieldQuery[$i] = "SELECT * FROM view_field WHERE Field = '" .$dataRecord['field_'.$i]."'";
					print_r($varFieldQuery[$i]);
					$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
					$varSum = mysql_num_rows($varFieldResult[$i]);
					$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
					
					endfor;
					
					print_r($dataRecord);
					
						
						if (($dataRecord['field_0']!=='') and ($dataRecord['field_1']!=='')){
						
						list ($jmlRec, $specimenID) = filter_double(
									array (
										'table_0' => $dataRecord['table_0'],
										'table_1' => $dataRecord['table_1'],
										'where_0' => $where[0],
										'where_1' => $where[1],
										'field_0' => $varDataField[0][Specimen_View],
										
										'condition_0' => $compareSymbol[0],
										
										'data_0' => $dataRecord['data_0'],
										'persen_0' => $persen[0],
										'operator' => $dataRecord['operator_1'],
										'field_1' => $varDataField[1][Specimen_View],
										'condition_1' => $compareSymbol[1],
										
										'data_1' => $dataRecord['data_1'],
										'persen_1' => $persen[1]
										
									));
						
						return array($jmlRec, $specimenID);
						
						}
						
					
					
					
				}else{
					echo '<script type=text/javascript>alert("Gunakan Operator"); window.location="./?page=filter"</script>';
				}
				
			
				
				
			}
		}else{ 
			
			$loop = 0;
			for ($i = 0; $i <= $loop; $i++):
			
			include './compare_replace.php';
			$varFieldQuery[$i] = "SELECT * FROM view_field WHERE Field = '" .$dataRecord['field_'.$i]."'";
			//print_r($varFieldQuery[$i]);
			$varFieldResult[$i] = mysql_query($varFieldQuery[$i]) or die (mysql_error);
			$varSum = mysql_num_rows($varFieldResult[$i]);
			$varDataField[$i] = mysql_fetch_assoc($varFieldResult[$i]);
			endfor;
			
			
			
			if ($varSum){
				
						list ($jmlRec, $specimenID) = filter_single(
								array (
									'table_0' => $dataRecord['table_0'],
									'where_0' => $where[0],
									'field_0' => $varDataField[0]['Specimen_View'],
									'condition_0' => $compareSymbol[0],
									'data_0' => $dataRecord['data_0'],
									'persen_0' => $persen[0]
									)
								);
								
						return array($jmlRec, $specimenID);
						
					}
					
				}
				
			}
			//endfor;
			
	}
	
function filter_five($dataFilter){
	echo "<pre>"; 
	print_r($dataFilter);
	echo "</pre>";
	
	if (($dataFilter['table_0']=='Specimen') and ($dataFilter['table_1']=='Specimen') 
		and ($dataFilter['table_2']=='Specimen') and ($dataFilter['table_3']=='Specimen')
		and ($dataFilter['table_4']=='Specimen')){
			
	$query = "SELECT * FROM Specimen AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " s.".
			 
			 $dataFilter['field_1']. " ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']." ".
			 
			 $dataFilter['operator_2']. " s.".
			
			 $dataFilter['field_2']. " ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']." ".
			 $dataFilter['persen_2']." ".
			 
			 $dataFilter['operator_3']. " s.".
			
			 $dataFilter['field_3']. " ".
			 $dataFilter['condition_3']. " ".
			 $dataFilter['data_3']." ".
			 $dataFilter['persen_3']." ".
			 
			 $dataFilter['operator_4']. " s.".
			
			 $dataFilter['field_4']. " ".
			 $dataFilter['condition_4']. " ".
			 $dataFilter['data_4']." ".
			 $dataFilter['persen_4'];
	}else{ 
		
		$query = "SELECT * FROM ".$dataFilter['table_0']." AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_1']." 
			 ".$dataFilter['where_1']." ".$dataFilter['field_1']." ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']."))".
			 
			 $dataFilter['operator_2']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_2']." 
			 ".$dataFilter['where_2']." ".$dataFilter['field_2']." ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']. " ".
			 $dataFilter['persen_2']."))".
			 
			 $dataFilter['operator_3']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_3']." 
			 ".$dataFilter['where_3']." ".$dataFilter['field_3']." ".
			 $dataFilter['condition_3']. " ".
			 $dataFilter['data_3']. " ".
			 $dataFilter['persen_3']."))".
			 
			 $dataFilter['operator_4']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_4']." 
			 ".$dataFilter['where_4']." ".$dataFilter['field_4']." ".
			 $dataFilter['condition_4']. " ".
			 $dataFilter['data_4']. " ".
			 $dataFilter['persen_4']."))";
			
	}		 
	print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result); echo '</br>'.$sumRec;
	if ($sumRec){ 
		while ($data = mysql_fetch_assoc($result)){
			$specimenID = $data['ID_Specimen'];
		}
	}else{ 
		$sumRec = '';
	}
	
	return array ($sumRec, $specimenID);
	
}

function filter_four($dataFilter){
	echo "<pre>"; 
	print_r($dataFilter);
	echo "</pre>";
	
	if (($dataFilter['table_0']=='Specimen') and ($dataFilter['table_1']=='Specimen') 
		and ($dataFilter['table_2']=='Specimen') and ($dataFilter['table_3']=='Specimen')){
	$query = "SELECT * FROM Specimen AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " s.".
			 
			 $dataFilter['field_1']. " ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']." ".
			 
			 $dataFilter['operator_2']. " s.".
			
			 $dataFilter['field_2']. " ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']." ".
			 $dataFilter['persen_2']." ".
			 
			 $dataFilter['operator_3']. " s.".
			
			 $dataFilter['field_3']. " ".
			 $dataFilter['condition_3']. " ".
			 $dataFilter['data_3']." ".
			 $dataFilter['persen_3'];
	}else{ 
		
		$query = "SELECT * FROM ".$dataFilter['table_0']." AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_1']." 
			 ".$dataFilter['where_1']." ".$dataFilter['field_1']." ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']."))".
			 
			 $dataFilter['operator_2']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_2']." 
			 ".$dataFilter['where_2']." ".$dataFilter['field_2']." ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']. " ".
			 $dataFilter['persen_2']."))".
			 
			 $dataFilter['operator_3']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_3']." 
			 ".$dataFilter['where_3']." ".$dataFilter['field_3']." ".
			 $dataFilter['condition_3']. " ".
			 $dataFilter['data_3']. " ".
			 $dataFilter['persen_3']."))";
			
	}		 
	print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result); echo '</br>'.$sumRec;
	if ($sumRec){ 
		while ($data = mysql_fetch_assoc($result)){
			$specimenID = $data['ID_Specimen'];
		}
	}else{ 
		$sumRec = '';
	}
	
	return array ($sumRec, $specimenID);
	
}

function filter_triple($dataFilter){
	echo "<pre>"; 
	print_r($dataFilter);
	echo "</pre>";
	
	if (($dataFilter['table_0']=='Specimen') and ($dataFilter['table_1']=='Specimen') 
		and ($dataFilter['table_2']=='Specimen')){
	$query = "SELECT * FROM Specimen AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " s.".
			 
			 $dataFilter['field_1']. " ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']." ".
			 
			 $dataFilter['operator_2']. " s.".
			
			 $dataFilter['field_2']. " ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']." ".
			 $dataFilter['persen_2'];
	}else{ 
		
		$query = "SELECT * FROM ".$dataFilter['table_0']." AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 
			 $dataFilter['operator_1']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_1']." 
			 ".$dataFilter['where_1']." ".$dataFilter['field_1']." ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']."))".
			 
			 $dataFilter['operator_2']. " ".
			 
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_2']." 
			 ".$dataFilter['where_2']." ".$dataFilter['field_2']." ".
			 $dataFilter['condition_2']. " ".
			 $dataFilter['data_2']. " ".
			 $dataFilter['persen_2']."))";
			
	}		 
	print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result); echo '</br>'.$sumRec;
	if ($sumRec){ 
		while ($data = mysql_fetch_assoc($result)){
			$specimenID = $data['ID_Specimen'];
		}
	}else{ 
		$sumRec = '';
	}
	
	return array ($sumRec, $specimenID);
	
}

function filter_double($dataFilter){
	echo "<pre>"; 
	print_r($dataFilter);
	echo "</pre>";
	
	if (($dataFilter['table_0']=='Specimen') and ($dataFilter['table_1']=='Specimen')){
	$query = "SELECT * FROM Specimen AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 $dataFilter['operator']. " s.".
			 $dataFilter['field_1']. " ".
			 $dataFilter['condition_1']. " ".
			
			 $dataFilter['data_1'].
			 $dataFilter['persen_1'];
	}else{ 
		
		$query = "SELECT * FROM ".$dataFilter['table_0']." AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. " ".
			 
			 $dataFilter['data_0']. " ".
			 $dataFilter['persen_0']. " ".
			 $dataFilter['operator']. "".
			 "(s.ID_Specimen in (SELECT ID_Specimen FROM ".$dataFilter['table_1']." 
			 ".$dataFilter['where_1']." ".$dataFilter['field_1']." ".
			 $dataFilter['condition_1']. " ".
			 $dataFilter['data_1']. " ".
			 $dataFilter['persen_1']."))";
			
	}		 
	print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result); echo '</br>'.$sumRec;
	if ($sumRec){ 
		while ($data = mysql_fetch_assoc($result)){
			$specimenID = $data['ID_Specimen'];
		}
	}else{ 
		$sumRec = '';
	}
	
	return array ($sumRec, $specimenID);
}

function filter_single($dataFilter){ 
	echo "<pre>"; 
	print_r($dataFilter);
	echo "</pre>";
	
	$query = "SELECT * FROM ".$dataFilter['table_0']." AS s 
			 ".$dataFilter['where_0']." 
			 s.".$dataFilter['field_0']. " ".
			 $dataFilter['condition_0']. "".
			 $dataFilter['data_0']. "".
			 $dataFilter['persen_0'];
			 
			 
	print_r($query);
	$result = mysql_query($query) or die (mysql_error);
	$sumRec = mysql_num_rows($result);
	if ($sumRec){ 
		while ($data = mysql_fetch_assoc($result)){
			$specimenID[] = $data['ID_Specimen'];
		}
	}else{ 
		$sumRec = '';
	}
	
	return array ($sumRec, $specimenID);
}

function get_table(){
	$query = "SELECT * FROM view_table";
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		while ($data = mysql_fetch_array($result)){
			echo "<option value=".$data['tableName'].">" . $data['tableName']. "</option>";
		}	
	}
}
?>
