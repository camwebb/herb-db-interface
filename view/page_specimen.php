<?php 
defined('_IBIS') or die ('Forbidden Access');
//print_r($_SESSION['specimenID_Filter']);
//variabel random ini duginakan untuk mengacak nama tombol save, update dan new

//echo $randomSave;
//if (!isset($_SESSION['ID_Specimen'])){
	if (isset($_POST[$randomSave]) or ($_POST[$randomUpdate])){
	
		$dataSpecimen = array 
							(
								'table_name' => 'Specimen',
								'field_name' => array (
														'ID_Specimen' 					=> 'ID_Specimen',
														'Collector_Field_Number' 		=> 'Collector_Field_Number',
														'Collector_Name' 				=> 'Collector_Name',
														'Coll_Date_From' 				=> 'Coll_Date_From',
														'Coll_Date_To' 					=> 'Coll_Date_To',
														'Habit_Detail' 					=> 'Habit_Detail',
														'Origin_of_Collection_Code' 	=> 'Origin_of_Collection_Code',
														'Status_Code' 					=> 'Status_Code',
														'Local_Name' 					=> 'Local_Name',
														'Language' 						=> 'Language',
														'Local_Use' 					=> 'Local_Use',
														'Phenology_Code' 				=> 'Phenology_Code',
														'Sex_Code' 						=> 'Sex_Code',
														'Notes' 						=> 'Notes',
														'Collection_Method_Code' 		=> 'Collection_Method_Code',
														'Distribution_of_Duplicates' 	=> 'Distribution_of_Duplicates',
														'Type_Code' 					=> 'Type_Code',
														'Data_Value' 					=> 'Data_Value'	
													  ),
													  
								'field_data' => array (
														'ID_Specimen'					=> trim(htmlspecialchars($_POST['ID_Specimen'])),
														'Collector_Field_Number' 		=> trim(htmlspecialchars($_POST['Collector_Field_Number'])),
														'Collector_Name' 				=> trim(htmlspecialchars($_POST['Collector_Name'])),
														'Coll_Date_From' 				=> trim(htmlspecialchars($_POST['Coll_Date_From'])),
														'Coll_Date_To' 					=> trim(htmlspecialchars($_POST['Coll_Date_To'])),
														'Habit_Detail' 					=> trim(htmlspecialchars($_POST['Habit_Detail'])),
														'Origin_of_Collection_Code' 	=> trim(htmlspecialchars($_POST['Origin_of_Collection_Code'])),
														'Status_Code' 					=> trim(htmlspecialchars($_POST['Status_Code'])),
														'Local_Name' 					=> trim(htmlspecialchars($_POST['Local_Name'])),
														'Language' 						=> trim(htmlspecialchars($_POST['Language'])),
														'Local_Use' 					=> trim(htmlspecialchars($_POST['Local_Use'])),
														'Phenology_Code' 				=> trim(htmlspecialchars($_POST['Phenology_Code'])),
														'Sex_Code' 						=> trim(htmlspecialchars($_POST['Sex_Code'])),
														'Notes' 						=> trim(htmlspecialchars($_POST['Notes'])),
														'Collection_Method_Code' 		=> trim(htmlspecialchars($_POST['Collection_Method_Code'])),
														'Distribution_of_Duplicates' 	=> trim(htmlspecialchars($_POST['Distribution_of_Duplicates'])),
														'Type_Code' 					=> trim(htmlspecialchars($_POST['Type_Code'])),
														'Data_Value' 					=> trim(htmlspecialchars($_POST['Data_Value']))
													  ),
								'page_id' => $_POST['pid']
								
							);
		if ($_POST[$randomSave]){
			insert_tab_specimen($dataSpecimen);
		}else{  
			update_tab_specimen($dataSpecimen);
		}
		
		
	}
//}

//hapus sesion ID_Specimen
if (isset($_POST[$randomNew])){
	
	unset_session_specimen();
	header ('location:./?page=specimen');
}

?>

<form method="POST" name="specimen" action="">

<?php require 'page_header_info.php'?>
 <fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px;">
		<table border="0" width="100%">
			<tr>
				<td>
					<table width="" border="0">
						<tr>
							<td width="170" align="right" valign="top" rowspan="2">Habit Detail</td>
							<td width="300" rowspan="2">
                                <textarea name="Habit_Detail" class="textarea" cols="33" rows="3" <?php echo $readonly;?>><?php echo $Habit_Detail;?></textarea>
							</td>
							<td width="" align="right" valign="top">Origin of Collection </td>
							<td width="170" valign="top" rowspan="">
								<select name="Origin_of_Collection_Code" size="1" class="combobox">
									<option value="null"></option>
                                    <?php load_id('xOrigin_of_Collection', 'ID','Text', $Origin_of_Collection_Code)?>
								</select>
                            </td>
                        </tr>
                        <tr>

							<td align="right">Status of Collection </td>
							<td>
								<select name="Status_Code" class="combobox">
								<option value="null"></option>
								   <?php load_id('xStatus_of_Collection', 'ID', 'Text', $Status_Code)?>
								</select>
							</td>
                        </tr>

						<tr>
							<td align="right">Local Name</td>
							<td>
								<input name="Local_Name" type="text" <?php echo $readonly;?> value="<?php echo $Local_Name?>" class="textfield"/>
                            </td>
						</tr>
						<tr>
							<td align="right">Language</td>
								<td>
									<input type="text" name="Language" size="26" <?php echo $readonly;?> value="<?php echo $Language?>" class="textfield"/>
								</td>
								<td align="right">Status Specimen </td>
								<td>
									<select name="Phenology_Code" class="combobox">
									<option value="null"></option>
										<?php load_id('xPhenology', 'ID', 'Text', $Phenology_Code)?>
									</select>
								</td>
						</tr>
						<tr>
							<td align="right">Local Use </td>
							<td>
								<input type="text" name="Local_Use" size="26" <?php echo $readonly;?> value="<?php echo $Local_Use?>" class="textfield"/>
							</td>
							<td align="right">Sex</td>
							<td>
								<select name="Sex_Code" class="combobox">
								   <option value="null"></option>
									<?php load_id('xSex', 'ID', 'Text', $Sex_Code)?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Notes</td>
							<td><input type="text" name="Notes" size="26" <?php echo $readonly;?> value="<?php echo $Notes;?>" class="textfield"></td>
							<td align="right">Collection Method </td>
							<td>
								<select name="Collection_Method_Code" class="combobox">
								   <option value="null"></option>
								   <?php load_id(' xCollection_Method', 'ID', 'Text', $Collection_Method_Code)?>
								</select>

							</td>
						</tr>
						<tr>
							<td align="right">Distribution of Duplicates</td>
							<td><input type="text" name="Distribution_of_Duplicates" size="30" <?php echo $readonly;?> value="<?php echo $Distribution_of_Duplicates;?>" class="textfield"></td>
							<td align="right">Type</td>
							<td>
								<select name="Type_Code" class="combobox">
									<option value="null"></option>
									<?php load_id('xType', 'ID', 'Text', $Type_Code)?>
								</select>
							</td>
						</tr>
					</table>
				</td>


		</table>
		

 </fieldset>

<?php require 'page_footer_info.php';?>

<?php

?>
</form>

