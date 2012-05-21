<?php defined('_IBIS') or die ('Forbidden Access'); 

if (isset($_POST[$randomSave]) or ($_POST[$randomUpdate])){
	
	if (!empty($_POST['Current_Determination_Flag'])) $Current_Determination_Flag = $_POST['Current_Determination_Flag']; else $Current_Determination_Flag = $_POST['Current_Determination_Flag'] = 'null';
	if (!empty($_POST['Species_Code'])) $Species_Code = $_POST['Species_Code']; else $Species_Code = $_POST['Species_Code'] = 'null';
	if (!empty($_POST['Genus_Code'])) $Genus_Code = $_POST['Genus_Code']; else $Genus_Code = $_POST['Genus_Code'] = 'null';
	if (!empty($_POST['Species_Author_Code'])) $Species_Author_Code = $_POST['Species_Author_Code']; else $Species_Author_Code = $_POST['Species_Author_Code'] = 'null';
	$dataSpecimen = array 
						(
							'table_name' => 'Component',
							'field_name' => array (
													'ID_Specimen' 			=> 'ID_Specimen',
													'Collector_Field_Number'=> 'Collector_Field_Number',
													'Collector_Name' 		=> 'Collector_Name',
													'Coll_Date_From' 		=> 'Coll_Date_From',
													'Coll_Date_To' 			=> 'Coll_Date_To',
													'ID_Component' 			=> 'ID_Component',
													'BO_Number' 			=> 'BO_Number',
													'Component_Class_Code' 	=> 'Component_Class_Code',
													'Notes' 				=> 'Notes',
													'Data_Value'			=> 'Data_Value'
												  ),
												  
							'field_data' => array (
													'Collector_Field_Number' 	=> trim(htmlspecialchars($_POST['Collector_Field_Number'])),
													'Collector_Name' 			=> trim(htmlspecialchars($_POST['Collector_Name'])),
													'Coll_Date_From' 			=> trim(htmlspecialchars($_POST['Coll_Date_From'])),
													'Coll_Date_To' 				=> trim(htmlspecialchars($_POST['Coll_Date_To'])),
													'BO_Number' 				=> trim(htmlspecialchars($_POST['BO_Number'])),
													'Component_Class_Code'		=> trim(htmlspecialchars($_POST['Component_Class_Code'])),
													'Notes' 					=> trim(htmlspecialchars($_POST['Notes'])),
													'Data_Value'				=> trim(htmlspecialchars($_POST['Data_Value']))
												  ),
							
							'page_id' => $_POST['pid']	
						);
				
	if ($_POST[$randomSave]){
		insert_tab_component($dataSpecimen);
	}else{
		update_tab_component($dataSpecimen);
	}
	
	//masukkan data ke fungsi insert
}

?>


	<form method="post" action="">
		<?php require 'page_header_info.php';?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
	<table  border="0">
		<tr>
			<td>
				<table width="350" border="0">
					<tr>
						<td width="137" align="right">BO Number </td>
						<td>
							<input type="text" name="BO_Number" value="<?php echo $BO_Number;?>" />
						</td>
					</tr>
					<tr>
						<td align="right">Other Number </td>
						<td>
							<input type="text" name="textfield6" value="<?php echo $other_number;?>" />
						</td>
					</tr>
					<tr>
						<td align="right">Component Class </td>
						<td>
							<select name="Component_Class_Code" >
                                <option value="null"></option>
                                <?php load_id('xComponent_Class', 'ID', 'Text', $Component_Class_Code)?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Notes</td>
						<td>
							<textarea name="Notes" cols="26" rows="5" class=""><?php echo $Notes;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
			

</fieldset>
        <?php require 'page_footer_info.php';?>
</form>   


