<?php

defined('_IBIS') or die ('Forbidden Access');

if (isset($_POST['save_locality'])){
	
	if (!empty ($_POST['Lat_From'])) $Lat_From = $_POST['Lat_From']; else $Lat_From = 'null';
	if (!empty ($_POST['Lat_To'])) $Lat_To = $_POST['Lat_To']; else $Lat_To = 'null';
	if (!empty ($_POST['Lon_From'])) $Lon_From = $_POST['Lon_From']; else $Lon_From = 'null';
	if (!empty ($_POST['Lon_To'])) $Lon_To = $_POST['Lon_To']; else $Lon_To = 'null';
	if (!empty ($_POST['Alt_From'])) $Alt_From = $_POST['Alt_From']; else $Alt_From = 'null';
	if (!empty ($_POST['Alt_To'])) $Alt_To = $_POST['Alt_To']; else $Alt_To = 'null';
	if (!empty ($_POST['NNP_Distance'])) $NNP_Distance = $_POST['NNP_Distance']; else $NNP_Distance = 'null';
	
$dataSpecimen = array 
						(
							'table_name' => 'Specimen',
							'field_name' => array (
													'ID_Specimen' 				=> 'ID_Specimen',
													'Collector_Field_Number' 	=> 'Collector_Field_Number',
													'Collector_Name' 			=> 'Collector_Name',
													'Coll_Date_From' 			=> 'Coll_Date_From',
													'Coll_Date_To' 				=> 'Coll_Date_To',
													'Habitat_Code' 				=> 'Habitat_Code',
													'Substrate_Code' 			=> 'Substrate_Code',
													'Lat_From'					=> 'Lat_From',
													'Lat_To' 					=> 'Lat_To',
													'Habitat_Detail' 			=> 'Habitat_Detail',
													'Lon_From' 					=> 'Lon_From',
													'Lon_To' 					=> 'Lon_To',
													'Locality_Detail' 			=> 'Locality_Detail',
													'Country_Name' 				=> 'Country_Name',
													'Sub_District_Name' 		=> 'Sub_District_Name',
													'NNP_Code' 					=> 'NNP_Code',
													'Major_Island_Code' 		=> 'Major_Island_Code',
													'Island_Name' 				=> 'Island_Name',
													'NNP_Distance' 				=> 'NNP_Distance',
													'Province_Code' 			=> 'Province_Code',
													'NNP_Direction' 			=> 'NNP_Direction',
													'District_Code' 			=> 'District_Code',
													'Geocode_Source' 			=> 'Geocode_Source',
													'Alt_From' 					=> 'Alt_From',
													'Alt_To' 					=> 'Alt_To',
													'Geocode_Method' 			=> 'Geocode_Method',
													'Data_Value' 				=> 'Data_Value'
												  ),
												  
							'field_data' => array (
													'Collector_Field_Number' 	=> trim(htmlspecialchars($_POST['Collector_Field_Number'])),
													'Collector_Name' 			=> trim(htmlspecialchars($_POST['Collector_Name'])),
													'Coll_Date_From' 			=> trim(htmlspecialchars($_POST['Coll_Date_From'])),
													'Coll_Date_To' 				=> trim(htmlspecialchars($_POST['Coll_Date_To'])),
													'Habitat_Code' 				=> trim(htmlspecialchars($_POST['Habitat_Code'])),
													'Substrate_Code' 			=> trim(htmlspecialchars($_POST['Substrate_Code'])),
													'Lat_From' 					=> trim(htmlspecialchars($Lat_From)),
													'Lat_To' 					=> trim(htmlspecialchars($Lat_To)),
													'Habitat_Detail' 			=> trim(htmlspecialchars($_POST['Habitat_Detail'])),
													'Lon_From' 					=> trim(htmlspecialchars($Lon_From)),
													'Lon_To' 					=> trim(htmlspecialchars($Lon_To)),
													'Locality_Detail' 			=> trim(htmlspecialchars($_POST['Locality_Detail'])),
													'Country_Name' 				=> trim(htmlspecialchars($_POST['Country_Name'])),
													'Sub_District_Name' 		=> trim(htmlspecialchars($_POST['Sub_District_Name'])),
													'NNP_Code' 					=> trim(htmlspecialchars($_POST['NNP_Code'])),
													'Major_Island_Code' 		=> trim(htmlspecialchars($_POST['Major_Island_Code'])),
													'Island_Name' 				=> trim(htmlspecialchars($_POST['Island_Name'])),
													'NNP_Distance' 				=> trim(htmlspecialchars($NNP_Distance)),
													'Province_Code' 			=> trim(htmlspecialchars($_POST['Province_Code'])),
													'NNP_Direction'				=> trim(htmlspecialchars($_POST['NNP_Direction'])),
													'District_Code' 			=> trim(htmlspecialchars($_POST['District_Code'])),
													'Geocode_Source' 			=> trim(htmlspecialchars($_POST['Geocode_Source'])),
													'Alt_From' 					=> trim(htmlspecialchars($Alt_From)),
													'Alt_To' 					=> trim(htmlspecialchars($Alt_To)),
													'Geocode_Method' 			=> trim(htmlspecialchars($_POST['Geocode_Method'])),
													'Data_Value' 				=> trim(htmlspecialchars($_POST['Data_Value']))
												  )
						);
						
	insert_tab_locality($dataSpecimen);
}	
?>




<title>Locality</title>



<form method="post" action="">
		<?php require 'page_header_info.php'?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
			
					<table border="0">
						<tr>
							<td width="120" align="right" >Habitat
							</td>
							<td width="360">
								
										<select name="Habitat_Code" style="width:150px;">
										<option value="null"></option>
										<?php load_id('xHabitat_Classification', 'ID', 'Text', $Habitat_Code)?>
										</select>
									Substrate
									
									  <select name="Substrate_Code" style="width:;">
										<option value="null"></option>
										<?php load_id('xSubstrate_Classification', 'ID', 'Text', $Substrate_Code)?>
									  </select>
								
							</td>
							<td width="" align="right" >Latitude From </td>
							<td width="170">
								<input name="Lat_From" type="text" size="3" <?php echo $readonly;?> value="<?php //echo $Lat_From;?>"/>to<input name="Lat_To" type="text" size="3" <?php echo $readonly;?> value="<?php //echo $Lat_To;?>"/>
							</td>
						</tr>
						<tr>
							<td align="right">Habitat Detail </td>
							<td>

								<textarea name="Habitat_Detail" class="max_size" cols="41" rows="3" <?php echo $readonly;?>><?php echo $Habitat_Detail;?></textarea>

							</td>
							<td align="right" width="">Longitude From </td>
							<td width="">
								<input name="Lon_From"  type="text" size="3" <?php echo $readonly;?> value="<?php //echo $Lon_From;?>"/>to<input name="Lon_To" type="text" size="3" <?php echo $readonly;?> value="<?php //echo $Lon_To;?>"/>
							</td>
						</tr>
						<tr>
							<td align="right">Locality Detail </td>
							<td>

								<textarea name="Locality_Detail" class="max_size" <?php echo $readonly;?> rows="3" cols="41"><?php echo $Locality_Detail;?></textarea>

							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Country</td>
							<td>
							<input type="text" name="Country_Name" size="13" <?php echo $readonly;?> value="<?php echo $Country_Name;?>" />Sub District<input type="text" name="Sub_District_Name" size="13" <?php echo $readonly;?> value="<?php echo $Sub_District_Name;?>" />

							</td>
							<td align="right">Nearest Name Place </td>
							<td>
								<select name="NNP_Code" class="combobox">
								<option value="null"></option>
								<?php load_id(' xNNP', 'ID', 'Text', $NNP_Code)?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Major Island</td>
							<td>
								
										<select name="Major_Island_Code">
										  <option value="null"></option>
										  <?php load_id('xMajor_Island', 'ID', 'Text', $Major_Island_Code)?>
										</select>
									Island
									<input class="textbox" type="text" name="Island_Name" size="14" <?php echo $readonly;?> value="<?php echo $Island_Name?>"/>
									
							</td>
							<td align="right">Distance From NNP </td>
							<td>
								<input name="NNP_Distance" type="text" size="3" <?php echo $readonly;?> value="<?php echo $NNP_Distance?>"/>
							  km
							</td>
						</tr>
						<tr>
							<td align="right">Province</td>
							<td>
								
										<select name="Province_Code" >
										<option value="null"></option>
										<?php load_id(' xProvince', 'ID', 'Text', $Province_Code)?>
										</select>
									
							</td>
							<td align="right">Direction From NNP </td>
							<td>
								<select name="NNP_Direction" class="combobox">
								<option value="null"></option>
									<?php load_id(' xDirection', 'ID', 'Text', $NNP_Direction)?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">District</td>
							<td width="">
								<select name="District_Code" >
								  <option value="null"></option>
								  <?php load_id(' xDistrict', 'ID', 'Text', $District_Code)?>
								</select>
							</td>
							<td align="right">Source of Geocode </td>
							<td>
								<select name="Geocode_Source" class="combobox">
								  <option value="null"></option>
								   <?php load_id(' xSource_of_Geocode', 'ID', 'Text', $Geocode_Source)?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>

							<td align="left" width="55">Altitude From :<input type="text" name="Alt_From" size="4" <?php echo $readonly;?>/> To :<input name="Alt_To" type="text" value="" size="1" maxlength="4" <?php echo $readonly;?>/><input name="textfield12" type="text" size="1" maxlength="1" <?php echo $readonly;?>/>
							</td>

							<td align="right">Method of Geocode </td>
							<td>
								<select name="Geocode_Method" class="combobox">
								 <option value="null"></option>
								<?php load_id('xMethod_of_Geocode', 'ID', 'Text', $Geocode_Method)?>
								</select>
							</td>
						</tr>
					</table>
		
		

		
</fieldset>
    <?php require 'page_footer_info.php';?>

</form>
