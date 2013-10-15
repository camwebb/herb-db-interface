<?php
ob_start();
//final output ke pdf
//defined('_IBIS') or die ('Forbidden Access');

include '../config/database.php';
/*
require_once('../plugin/tcpdf/config/lang/ind.php');
require_once('../plugin/tcpdf/tcpdf.php');
*/
define("_JPGRAPH_PATH", "../plugin/mpdf/jpgraph/src/"); // must define this before including mpdf.php file
$JpgUseSVGFormat = true;
define('_MPDF_URI',"http://localhost/herbarium/plugin/mpdf/"); 	// must be  a relative or absolute URI - not a file system path
require_once('../plugin/mpdf/mpdf.php');

function generate_report($parameter)
{
	
	/*
	$query = "SELECT s.*, d.*, c.* FROM Specimen AS s LEFT JOIN Determination AS d
			ON s.ID_Specimen = d.ID_Specimen 
			LEFT JOIN Component AS c 
			ON s.ID_Specimen = c.ID_Specimen
			WHERE s.ID_Specimen = ". 
			$parameter.
			" LIMIT 1";
	*/
	$query = "SELECT s.*, 
								d.ID_Determination, d.Det_Date, d.Determination_Qualifier,
								d.Taxonomical_Validator_By, d.Taxonomical_Confirmed_By,
								d.Publication, d.Informal_Group_Code, d.Other_Name,
								d.Family_Code, d.Genus_Code, d.Species_Code, d.Species_Author_Code, 
								c.ID_Component, c.BO_Number, c.Component_Class_Code, 
								n.Local_Name, n.Language, 
								u.Local_Use FROM Specimen AS s 
							 LEFT JOIN Determination AS d
							 ON s.ID_Specimen = d.ID_Specimen 
							 LEFT JOIN Component AS c 
							 ON s.ID_Specimen = c.ID_Specimen
							 LEFT JOIN Local_Name As n
							 ON s.ID_Specimen = n.ID_Specimen
							 LEFT JOIN Local_Use As u
							 ON s.ID_Specimen = u.ID_Specimen
							 WHERE s.ID_Specimen = ". 
							 $parameter.
							 " LIMIT 1";
	//print_r($query);						 
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		
		while ($data = mysql_fetch_array($result)){
						//header info
						//$data = mysql_fetch_array($result);
						
						/*
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
						*/
				$dataArr = $data;
					}
	//print_r($dataArr);				
	
	if (!empty($dataArr['Family_Code'])){
		$query_family = "SELECT * FROM Family_Text WHERE ID = ".$dataArr['Family_Code'];
		//print_r($query_family);
		$result_family = mysql_query($query_family) or die (mysql_error);
		if (mysql_num_rows($result_family)){
			$data_family = mysql_fetch_assoc($result_family);
			$dataArr['Family'] = $data_family['Family'];
		}
	}											 
	
	
	if (!empty($dataArr['Genus_Code'])){
		$query_genus = "SELECT Genus FROM Genus WHERE Genus_ID = ".$dataArr['Genus_Code'];
		//print_r($query_genus);
		
		$result_genus = mysql_query($query_genus) or die (mysql_error);
		if (mysql_num_rows($result_family)){
			
			$data_genus = mysql_fetch_assoc($result_genus);
			//$Genus_Name = $data_genus['Genus'];
			$query_ = "SELECT Genus FROM Genus_Text WHERE ID = $data_genus[Genus] LIMIT 1";
			//print_r($query_);
			$result_ = mysql_query($query_) or die (mysql_error());
			$data = mysql_fetch_object($result_);
			
			$dataArr['Genus'] = $data->Genus;
			
		}
	}
	
	if (!empty($dataArr['Species_Code'])){
		$query_species = "SELECT * FROM Family_Text WHERE ID = ".$dataArr['Species_Code'];
		//print_r($query_species);
		$result_species = mysql_query($query_species) or die (mysql_error);
		if (mysql_num_rows($result_species)){
			$data_species = mysql_fetch_assoc($result_species);
			$dataArr  = $data_species['Species'];
		}
	}
	}

	return $dataArr;
}

function show_status_download()
{
	?>
	<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Herbarium</title>
			
	</head>
	<body>
	<div id="frame_header">
			<div id="header"></div>
	</div>
	<div id="list_header">
	   
	</div>
	<div style="border-style:solid; width:40%; margin:20px auto; border-width:1px; box-shadow:5px 5px 5px #ccd" align="center">
		<table border="0">
			<tr>
				<th height="50px" valign=""><p style="font-size:25px;">Terimakasih sudah mendownload laporan</p><hr></th>
			</tr>
			<tr>
				<td><p style="font-size: 12px; color: red">Cat : Bila file tidak bisa di download, kemungkinan data tidak ditemukan</p></td>
			</tr>
			
		</table>
	
	</body>
	</html>
	<?php
}

//$html2pdf = new HTML2PDF('P', 'A4', 'en');	
	//$htmlFile = "http://localhost/herbarium/tes.php";
	//$html2pdf->AddPage(); 
	//$buffer = file_get_contents($htmlFile); 
	//$html2pdf->WriteHTML("<h6 align=center>Selamat bekerja</h6>");
	//$html2pdf->WriteHTML($buffer);
	
	//$html2pdf->Output("Soal Laporan.pdf");

if (isset($_GET['id']))
{
	if ($_GET['id'] !='')
	{
		$load_data = generate_report($_GET['id']);
	}
	else
	{
		echo "<script>alert('Data tidak tersedia')</script>";
		exit;
	}
}
else
{
	echo "<script>alert('Maaf parameter tidak diizinkan')</script>";
	exit;
}

//print_r($load_data);

foreach ($load_data as $value)
{
	
}

show_status_download();
$mpdf=new mPDF('','','','',15,15,16,16,9,9,'L');
$mpdf->AddPage('L','','','','',15,15,16,16,9,9);
$mpdf->setFooter('{PAGENO}') ;
$mpdf->progbar_heading = '';
$mpdf->StartProgressBarOutput(2);
$mpdf->useGraphs = true;
$mpdf->list_number_suffix = ')';
$mpdf->hyphenate = true;


//echo '<pre>';
//print_r($load_data);

//exit;
//write html
$date = date('Y-m-d H:i:s');

$data_html = <<<EOF
<div style=width:650px;>
<div>
  
  <table border=1 width=400 style=border-collapse:collapse>
  <tr>
		<td width=300>
	  	<fieldset>
		  	<table border=0 align=center>
			  	<tr>
				  	<td style=padding:5px; align=center><h4>Herbarium Dummy Report</h4>Testing Report - Generate By MPDF<hr></td>	
  		  	</tr>

			  	<tr>
  					<td align=center><p><b>$load_data[Family], $load_data[Genus], $load_data[Species]</b></p></td>
  				</tr>
  			</table><hr>

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Locality</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=><span style=font-size:10px>$load_data[Locality_Detail]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Latitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$load_data[Lat_FROM] - $load_data[Lat_To]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Longitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$load_data[Lon_From] - $load_data[Lon_To]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Altitude</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$load_data[Alt_From] - $load_data[Alt_To]</span></td>
				</tr>
				<tr>
					<td width=85><span style=font-size:10px>Habitat</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width=><span style=font-size:10px>$load_data[Habitat_Detail]</span></td>
				</tr>
			</table><hr>

			<table border=0>
				<tr>
					<td width=85><span style=font-size:10px>Collector(s)</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td width= colspan=2><span style=font-size:10px>$load_data[Collector_Name]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>No.</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$load_data[Collector_Field_Number]</span></td>
					<td align=right><span style=font-size:10px>Date : $load_data[Coll_Date_From]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Local Name</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2><span style=font-size:10px>$load_data[Local_Name]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Habit</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2><span style=font-size:10px>$load_data[Habit_Detail]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Uses</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td colspan=2><span style=font-size:10px>$load_data[Local_Use]</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Determined By</span></td>
					<td valign=top><span style=font-size:10px>:</span></td>
					<td><span style=font-size:10px>$load_data[Determiner_by]</span></td>
					<td align=right><span style=font-size:10px>Date : $load_data[Det_Date]</span></td>
				</tr>
			</table><hr>	

			<table border=0>
				<tr>
					<td><span style=font-size:10px>Duplicate Sent to : $load_data[Distribution_of_Duplicates]</span><br>
					 <span style=font-size:10px>Date Printed : $date</span></td>
				</tr>
				<tr>
					<td><span style=font-size:10px>Notes :</span></td>
					<td width=230><span style=font-size:10px>$load_data[Notes]</span></td>
				</tr>

    </table>
    </fieldset>
		</td>
<!--
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
		</td>-->
		</tr>
	</table>
</div>
</div>
EOF;

//echo $data_html;
//exit;
$mpdf->WriteHTML($data_html);
$mpdf->Output("/virtual/data/project/herbarium/report/Report.pdf",'F');
//$html2pdf->Output("Soal Laporan.pdf");
$namafile_web="http://localhost/herbarium/report/Report.pdf";
echo "<script>window.location.href='$namafile_web';</script>";


//$html2pdf->WriteHTML("<h6 align=center>Selamat bekerja</h6>");

?>


