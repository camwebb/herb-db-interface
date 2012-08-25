<?php
//final output ke pdf
include 'database.php';
require_once('plugin/html2fpdf/html2pdf.class.php');
	
	
$html2pdf = new HTML2PDF('P', 'A4', 'en');	
	//$htmlFile = "http://localhost/herbarium/tes.php";
	//$html2pdf->AddPage(); 
	//$buffer = file_get_contents($htmlFile); 
	//$html2pdf->WriteHTML("<h6 align=center>Selamat bekerja</h6>");
	//$html2pdf->WriteHTML($buffer);
	
	//$html2pdf->Output("Soal Laporan.pdf");
	



?>
<?php 

$query = "SELECT s.*, d.*, c.* FROM Specimen AS s LEFT JOIN Determination AS d
							 ON s.ID_Specimen = d.ID_Specimen 
							 LEFT JOIN Component AS c 
							 ON s.ID_Specimen = c.ID_Specimen
							 WHERE s.ID_Specimen = ". 
							 $_GET['id'].
							 " LIMIT 1";
$result = mysql_query($query) or die (mysql_error);
if (mysql_num_rows($result)){
	
	while ($data = mysql_fetch_array($result)){
					//header info
					//$data = mysql_fetch_array($result);
					
					
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
				

if (!empty($Family_Code)){
	$query_family = "SELECT * FROM Family_Text WHERE ID = ".$Family_Code;
	//print_r($query_family);
	$result_family = mysql_query($query_family) or die (mysql_error);
	if (mysql_num_rows($result_family)){
		$data_family = mysql_fetch_assoc($result_family);
		$Family_Name = $data_family['Family'];
	}
}											 


if (!empty($Genus_Code)){
	$query_genus = "SELECT * FROM Genus_Text WHERE ID = ".$Genus_Code;
	//print_r($query_genus);
	$result_genus = mysql_query($query_genus) or die (mysql_error);
	if (mysql_num_rows($result_family)){
		$data_genus = mysql_fetch_assoc($result_genus);
		$Genus_Name = $data_genus['Genus'];
	}
}

if (!empty($Species_Code)){
	$query_species = "SELECT * FROM Family_Text WHERE ID = ".$Species_Code;
	//print_r($query_species);
	$result_species = mysql_query($query_species) or die (mysql_error);
	if (mysql_num_rows($result_species)){
		$data_species = mysql_fetch_assoc($result_species);
		$Species_Name = $data_species['Species'];
	}
}


//write html
$date = date('Y-m-d H:i:s');
$html2pdf->WriteHTML("
<div style=width:650px;>
<div style=>
  
  <table border=0 width=650>
		<td width=300>
	  	<fieldset>
		  	<table border=0 align=center>
			  	<tr>
				  	<td style=padding:5px; align=center><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>	
  		  	</tr>

			  	<tr>
  					<td align=center><p><b>$Family_Name, $Genus_Name, $Species_Name</b></p></td>
  				</tr>
  			</table><hr>

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Locality</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230><span style=font-size:10px>$Locality_Detail</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Latitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Longitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Altitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td width=85><span style=font-size:10px>Habitat</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230><span style=font-size:10px>$Habitat_Detail</span></td>
				</tr>
			</table><hr>

			<table border=0>
				<tr>
					<td width=85><span style=font-size:10px>Collector(s)</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230 colspan=2><span style=font-size:10px>$Collector_Name</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>No.</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$Collector_Field_Number</span></td>
					<td align=right><span style=font-size:10px>Date : $Coll_Date_From</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Local Name</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Habit</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2>$Habit_Detail</td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Uses</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Determined By</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td></td>
					<td align=right><span style=font-size:10px>Date :</span></td>
				</tr>
			</table><hr>	

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Duplicate Sent to : $Distribution_of_Duplicates</span><br>
					 <span style=font-size:10px>Date Printed : $date</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Notes :</span></td>
					<td width=230><span style=font-size:10px></span></td>
				</tr>

    </table>
    </fieldset>
		</td>

      <td width=10></td>

		<td width=300>
			<fieldset>
		  	<table border=0 align=center>
			  	<tr>
				  	<td style=padding:5px; align=center><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>	
  		  	</tr>

			  	<tr>
  					<td align=center><p><b>$Family_Name, $Genus_Name, $Species_Name</b></p></td>
  				</tr>
  			</table><hr>

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Locality</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230><span style=font-size:10px>$Locality_Detail</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Latitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Longitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Altitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px></span></td>
				</tr>
				<tr>
					<td width=85><span style=font-size:10px>Habitat</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230><span style=font-size:10px>$Habitat_Detail</span></td>
				</tr>
			</table><hr>

			<table border=0>
				<tr>
					<td width=85><span style=font-size:10px>Collector(s)</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=230 colspan=2><span style=font-size:10px>$Collector_Name</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>No.</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$Collector_Field_Number</span></td>
					<td align=right><span style=font-size:10px>Date : $Coll_Date_From</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Local Name</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Habit</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2>$Habit_Detail</td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Uses</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Determined By</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td></td>
					<td align=right><span style=font-size:10px>Date :</span></td>
				</tr>
			</table><hr>	

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Duplicate Sent to : $Distribution_of_Duplicates</span><br>
					 <span style=font-size:10px>Date Printed : $date</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Notes :</span></td>
					<td width=230><span style=font-size:10px></span></td>
				</tr>

    </table>
    </fieldset>
		</td>
	</table>
</div>
</div>
");
$html2pdf->Output("Soal Laporan.pdf");

}


//$html2pdf->WriteHTML("<h6 align=center>Selamat bekerja</h6>");

?>


