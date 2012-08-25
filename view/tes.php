<?php 
include 'database.php';
$query = "SELECT s.*, d.*, c.* FROM Specimen AS s LEFT JOIN Determination AS d
							 ON s.ID_Specimen = d.ID_Specimen 
							 LEFT JOIN Component AS c 
							 ON s.ID_Specimen = c.ID_Specimen
							 WHERE s.ID_Specimen = ". 
							 $_GET['id'].
							 " LIMIT 1";
$result = mysql_query($query) or die (mysql_error);
if (mysql_num_rows($query)){
	while ($data = mysql_fetch_array($result)){
					//header info
					$ID_Specimen = $data['ID_Specimen'];
					$Collector_Name = $data['Collector_Name'];
					$Collector_Field_Number =  $data['Collector_Field_Number'];
					$Coll_Date_From = $data['Coll_Date_From'];
					$Coll_Date_To = $data['Coll_Date_To'];
					//tab specimen
					$Habit_Detail = $data['Habit_Detail'];
					$Distribution_of_Duplicates = $data['Distribution_of_Duplicates'];
					$Origin_of_Collection_Code = $data['Origin_of_Collection_Code'];
					$Status_Code = $data['Status_Code'];
					$Phenology_Code = $data['Phenology_Code'];
					$Sex_Code = $data['Sex_Code'];
					$Collection_Method_Code = $data['Collection_Method_Code'];
					$Type_Code = $data['Type_Code'];
					$Data_Value = $data['Data_Value'];
					//tab locality
					$Habitat_Code = $data['Habitat_Code'];
					$Substrate_Code = $data['Substrate_Code'];
					$Habitat_Detail = $data['Habitat_Detail'];
					$Locality_Detail = $data['Locality_Detail'];
					$Country_Name = $data['Country_Name'];
					$Sub_District_Name = $data['Sub_District_Name'];
					$Major_Island_Code = $data['Major_Island_Code'];
					$Island_Name = $data['Island_Name'];
					$Province_Code = $data['Province_Code'];
					$District_Code = $data['District_Code'];
					$Alt_From = $data['Alt_From'];
					$NNP_Code = $data['NNP_Code'];
					$NNP_Distance = $data['NNP_Distance'];
					$NNP_Direction = $data['NNP_Direction'];
					$Geocode_Source = $data['Geocode_Source'];
					$Geocode_Method = $data['Geocode_Method'];
					//tab determination
					$Det_Date = $data['Det_Date'];
					$Determination_Qualifier = $data['Determination_Qualifier'];
					$Taxonomical_Validator_By = $data['Taxonomical_Validator_By'];
					$Taxonomical_Confirmed_By = $data['Taxonomical_Confirmed_By'];
					$Publication = $data['Publication'];
					$Informal_Group_Code = $data['Informal_Group_Code'];
					$Other_Name = $data['Other_Name'];
					$Family_Code = $data['Family_Code']; 
					$Genus_Code = $data['Genus_Code'];
					$Species_Code = $data['Species_Code'];
					$Species_Author_Code = $data['Species_Author_Code'];
					//tab component
					$BO_Number = $data['BO_Number'];
					$Component_Class_Code = $data['Component_Class_Code'];
					
					//footer info
					$Last_Edited_By = $data['Last_Edited_By'];
					$Last_Connect_As = $data['Connect_As'];
					$Last_Edited_Date = $data['Last_Edited_Date'];
				
				}
}
/*							 
$query_family = "SELECT * FROM Family_Text WHERE ID = ".$Family_Code;
print_r($query_family);
$result_family = mysql_query($query_family) or die (mysql_error);
if (mysql_num_rows($result_family)){
	$data_family = mysql_fetch_assoc($result_family);
	$Family_Name = $data_family['Family'];
}

$query_genus = "SELECT * FROM Genus_Text WHERE ID = ".$Genus_Code;
//print_r($query_genus);
$result_genus = mysql_query($query_genus) or die (mysql_error);
if (mysql_num_rows($result_family)){
	$data_genus = mysql_fetch_assoc($result_genus);
	$Genus_Name = $data_genus['Genus'];
}

$query_species = "SELECT * FROM Family_Text WHERE ID = ".$Species_Code;
//print_r($query_species);
$result_species = mysql_query($query_species) or die (mysql_error);
if (mysql_num_rows($result_species)){
	$data_species = mysql_fetch_assoc($result_species);
	$Species_Name = $data_species['Species'];
}
*/
?>
<div style="width:100%;">
	
	<div style="float:left; width:60%; border-style:none; background-color:#fff" align="right">
		<div style="">
		  
		  <table border="0">
				<td>
				<fieldset style="border-width:3px;">
					<table border="0" align="center">
						<tr>
							<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>	
					</tr>

						<tr>
							<td align="center"><p><b><?php echo $Family_Name.','.$Genus_Name.','.$Species_Name;?></p></td>
						</tr>
					</table><hr>

					<table border="0" width="100%">
						<tr>
							<td width="25%" valign="top"><span style="font-size:12px;">Locality</span></td>
							<td width="1px" valign="top">:</td>
							<td width=""><span style="font-size:12px;"><?php echo $Locality_Detail; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Latitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Longitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Altitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td valign="top"><span style="font-size:12px;">Habitat</span></td>
							<td valign="top">:</td>
							<td><span style="font-size:12px;"><?php echo $Habitat_Detail; ?></span></td>
						</tr>
					</table><hr>

					<table border="0" width="100%">
						<tr>
							<td width="25%" valign="top"><span style="font-size:12px;">Collector(s)</span></td>
							<td width="1px" valign="top">:</td>
							<td width="40%"><span style="font-size:12px;"><?php echo $Collector_Name; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">No.</span></td>
							<td>:</td>
							<td><?php echo $Collector_Field_Number; ?></td>
							<td><span style="font-size:12px;">Date : <?php echo $Coll_Date_From; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Local Name</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Habit</span></td>
							<td>:</td>
							<td><span style="font-size:12px;"><?php echo $Habit_Detail; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Uses</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Determined By</span></td>
							<td>:</td>
							<td><span style="font-size:12px;"><?php ?></span></td>
							<td><span style="font-size:12px;">Date :</span></td>
						</tr>
					</table>
					<hr>	
					<table border="0" valign="top">
						<tr>
							<td><p><b>Duplicate Sent to </b>: <?php echo $Distribution_of_Duplicates; ?></p>Date Printed : <?php echo date('Y-m-d H:i:s'); ?></td>
						</tr>
						<tr>
							<td><p><b>Notes</b></p></td>
						</tr>
						<tr>
							<td><?php echo $Notes; ?></td>
						</tr>
					</table>
			
				</fieldset>
			</table>
		</div>
	</div>
	<div style="clear:both"></div>
</div>



