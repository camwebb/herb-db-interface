<?php defined('_IBIS') or die ('Forbidden Access'); 

if ($_SESSION['ID_Specimen'] !=''):
$query = "SELECT s.ID_Specimen, d.ID_Determination, d.Det_Date, d.Conf_Date, d.Determination_Qualifier,
					d.Taxonomical_Validator_By, d.Taxonomical_Confirmed_By,
					d.Publication, d.Informal_Group_Code, d.Other_Name,
					d.Family_Code, d.Genus_Code, d.Species_Code, d.Species_Author_Code
					FROM Specimen AS s 
				 LEFT JOIN Determination AS d
				 ON s.ID_Specimen = d.ID_Specimen 
				 WHERE s.ID_Specimen = ". 
				 $_SESSION['ID_Specimen'].
				 " ORDER BY ID_Determination ASC";

$result = mysql_query($query) or die (error());
while ($data = mysql_fetch_object($result))
{
	$dataDetermination = $data;
}

endif;


$_SESSION['ID_Determination'] = $dataDetermination->ID_Determination;

if (isset($_POST[$randomSave]) or ($_POST[$randomUpdate])){
	//pr($_POST);
	
	if (!empty($_SESSION['ID_Determination'])) $ID_Determination = $_SESSION['ID_Determination']; else $ID_Determination = 'null';
	if (!empty($_POST['Current_Determination_Flag'])) $Current_Determination_Flag = $_POST['Current_Determination_Flag']; else $Current_Determination_Flag = 'null';
	if (!empty($_POST['Species_Code'])) $Species_Code = $_POST['Species_Code']; else $Species_Code = 'null';
	if (!empty($_POST['Genus_Code'])) $Genus_Code = $_POST['Genus_Code']; else $Genus_Code = 'null';
	if (!empty($_POST['Species_Author_Code'])) $Species_Author_Code = $_POST['Species_Author_Code']; else $Species_Author_Code = 'null';
	$dataSpecimen = array 
						(
							'table_name' => array ('Determination' => 'Determination', 'Rank' => 'Rank'),
							'field_name' => array (
													'Collector_Field_Number' 		=> 'Collector_Field_Number',
													'Collector_Name' 				=> 'Collector_Name',
													'Coll_Date_From' 				=> 'Coll_Date_From',
													'Coll_Date_To' 					=> 'Coll_Date_To',
													'ID_Determination'				=> 'ID_Determination',
													'ID_Specimen' 					=> 'ID_Specimen',
													'Taxonomical_Validator_By' 		=> 'Taxonomical_Validator_By',
													'Det_Date' 						=> 'Det_Date',
													'Determination_Qualifier' 		=> 'Determination_Qualifier',
													'Taxonomical_Confirmed_By' 		=> 'Taxonomical_Confirmed_By',
													'Conf_Date' 					=> 'Conf_Date',
													'Current_Determination_Flag' 	=> 'Current_Determination_Flag',
													'Family_Code' 					=> 'Family_Code',
													'Genus_Code' 					=> 'Genus_Code',
													'Species_Code' 					=> 'Species_Code',
													'Species_Author_Code' 			=> 'Species_Author_Code',
													'Publication' 					=> 'Publication',
													'Informal_Group_Code' 			=> 'Informal_Group_Code',
													'Other_Name' 					=> 'Other_Name',
													'Data_Value' 					=> 'Data_Value',
													'Infraspecific_Rank'			=> 'Infraspecific_Rank',
													'Infraspecific_Name'			=> 'Infraspecific_Name',
													'Infraspecific_Author'			=> 'Infraspecific_Author',
													'Species_Author_Code'			=> 'Species_Author_Code'
												  ),
												  
							'field_data' => array (
													'Collector_Field_Number' 		=> trim(htmlspecialchars($_POST['Collector_Field_Number'])),
													'Collector_Name' 				=> trim(htmlspecialchars($_POST['Collector_Name'])),
													'Coll_Date_From' 				=> trim(htmlspecialchars($_POST['Coll_Date_From'])),
													'Coll_Date_To' 					=> trim(htmlspecialchars($_POST['Coll_Date_To'])),
													'ID_Determination' 				=> trim(htmlspecialchars($ID_Determination)),
													'Taxonomical_Validator_By' 		=> trim(htmlspecialchars($_POST['Taxonomical_Validator_By'])),
													'Det_Date'						=> trim(htmlspecialchars($_POST['Det_Date'])),
													'Determination_Qualifier' 		=> trim(htmlspecialchars($_POST['Determination_Qualifier'])),
													'Taxonomical_Confirmed_By' 		=> htmlspecialchars($_POST['Taxonomical_Confirmed_By']),
													'Conf_Date' 					=> trim(htmlspecialchars($_POST['Conf_Date'])),
													'Current_Determination_Flag' 	=> trim(htmlspecialchars($Current_Determination_Flag)),
													'Family_Code' 					=> trim(htmlspecialchars($_POST['Family_Code'])),
													'Genus_Code' 					=> trim(htmlspecialchars($Genus_Code)),
													'Species_Code' 					=> trim(htmlspecialchars($Species_Code)),
													'Species_Author_Code' 			=> trim(htmlspecialchars($Species_Author_Code)),
													'Publication' 					=> htmlspecialchars($_POST['Publication']),
													'Informal_Group_Code' 			=> trim(htmlspecialchars($_POST['Informal_Group_Code'])),
													'Other_Name' 					=> htmlspecialchars($_POST['Other_Name']),
													'Data_Value' 					=> htmlspecialchars($_POST['Data_Value']),
													'Infraspecific_Rank' 			=> $_POST['rank'],
													'Infraspecific_Name' 			=> $_POST['rank_name'],
													'Infraspecific_Author' 			=> $_POST['rank_author'],
													'Species_Author_Code' 			=> $_POST['Species_Author_Code'],
												  ),
							'page_id' => $_POST['pid']	
							
						);
	//pr($_POST);			
	if ($_POST[$randomSave]){
		
		insert_tab_determination($dataSpecimen);
	}else{
		
		update_tab_determination($dataSpecimen);
	}
	
	//masukkan data ke fungsi insert
}

//pr($_SESSION);

//pr($dataDetermination);
							 
if ($dataDetermination->ID_Determination !='') $load_rank = get_rank_data(array('ID_Determination'=>$dataDetermination->ID_Determination));


/* untuk reset form determination */


if (isset($_POST['new_determinan']))
{
	$Taxonomical_Validator_By = '';
	$Det_Date = '';
	$Determination_Qualifier = '';
	$Taxonomical_Confirmed_By = '';
	$Conf_Date = '';
	$Family_Code = '';
	$Genus_Code = '';
	$Species_Code = '';
	$Species_Author_Code = '';
	$Publication = '';
	$Informal_Group_Code = '';
	$Other_Name = '';
	
}
else
{
	$Taxonomical_Validator_By = $dataDetermination->Taxonomical_Validator_By;
	$Det_Date = $dataDetermination->Det_Date;
	$Determination_Qualifier = $dataDetermination->Determination_Qualifier;
	$Taxonomical_Confirmed_By = $dataDetermination->Taxonomical_Confirmed_By;
	$Conf_Date = $dataDetermination->Conf_Date;
	$Family_Code = $dataDetermination->Family_Code;
	if ($dataDetermination->Genus_Code !='') $Genus_ID = get_data_genus(array('Genus_ID'=>$dataDetermination->Genus_Code)); //filter_function.php
	if ($dataDetermination->Species_Code !='') $Species_ID = get_data_species(array('Species_ID'=>$dataDetermination->Species_Code));
	if ($dataDetermination->Species_Author_Code !='') $Species_Author_Code = get_data_species_author(array('Species_ID'=>$dataDetermination->Species_Code, 'Author_ID' => $dataDetermination->Species_Author_Code));
	$Publication = $dataDetermination->Publication;
	$Informal_Group_Code = $dataDetermination->Informal_Group_Code;
	$Other_Name = $dataDetermination->Other_Name;	
	
									
}

?>
<script type="text/javascript" language="JavaScript">
<!--
function popWindow(wName){
	features = 'width=400,height=400,toolbar=no,location=no,directories=no,menubar=no,scrollbars=no,copyhistory=no,resizable=no';
	pop = window.open('',wName,features);
	if(pop.focus){ pop.focus(); }
	return true;
}
-->
</script>

    <form method="POST" action="" name="frm_determination">
<!--tabel frame-->

    <!--tabel header-->
        <?php require 'page_header_info.php';?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
	<!--table frame konten-->
	<table border="0" width="700">
            <td>
                <!--table konten 1-->
		<table width="100%" border="0">
                    <tr>
                        <td width="100" align="right">Determiner BY </td>
			<td width="100">
                            <input type="text" name="Taxonomical_Validator_By" value="<?=$Taxonomical_Validator_By?>"/>
			</td>
			<td width="" align="right">Date</td>
			<td width="">
                            <input type="date" name="Det_Date" size="" value="<?=$Det_Date?>"/>
			</td>
			<td width="" align="right">Determination Qualifier </td>
			<td width="150">
                            <select name="Determination_Qualifier" >
                                <option value="null"></option>
                                <?php load_id('xQualifier', 'ID', 'Text', $Determination_Qualifier)?>
                            </select>
			</td>
                    </tr>
                    <tr>
                        <td align="right">Confirmed By </td>
			<td>
                            <input type="text" name="Taxonomical_Confirmed_By" value="<?=$Taxonomical_Confirmed_By?>"/>
			</td>
			<td align="right">Date</td>
                        <td>
                            <input type="date" name="Conf_Date" size="" value="<?=$Conf_Date?>"/>
			</td>
			<!--
			<td align="right">Current Determination </td>
			<td>
                            <input type="checkbox" name="Current_Determination_Flag" value="" />
			</td>-->
                    </tr>
		</table>

		<!--tabel konten 2-->
		<table  border="0">
                    <td width="300" align="right">
                    <!--tabel 1 id_det konten 2-->
                        <table border="0" width="300">
                            <tr>
                                <td align="right" width="85">Family</td>
								<td>
								
                                    <select name='Family_Code' id="Family_Code" onChange='DinamisFamily(this)' class="combobox">
                                        <option value="null"></option>
										<?php 
										
											load_id('Family_Text','ID','Family', $Family_Code)
										
										?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Genus</td>
                                <td>
                                   
                                    <select name="Genus_Code" id="Genus_Code" onChange='DinamisGenus(this)' class="combobox">
                                         
                                        <?php 
                                        if ((isset($_SESSION['specimenID_Filter'])) OR (isset($_SESSION['ID_Specimen']))){
											//load_id('Genus_Text', 'ID', 'Genus', $Genus_Code); 
											
											get_specimen_code(array 
																	(
																	'id_parent' 				=> $Family_Code, 
																	'table_parent' 				=> 'Genus',
																	'table_parent_condition' 	=> 'Family_ID',
																	'field_parent' 				=> 'Genus',
																	'table_child' 				=> 'Genus_Text',
																	'field_child_1'				=> 'ID',
																	'field_child_2' 			=> 'Genus',
																	'selectedID' 				=> $Genus_ID
																	));
										}
                                        
                                        ?>
                                    </select>
									

								</td>
                            </tr>
                            <tr>
                                <td align="right">Species</td>
                                <td>
                                   
                                    <select name="Species_Code" id="Species_Code" onChange='DinamisSpecies(this)' class="combobox">
                                       
                                        <?php 
                                        if ((isset($_SESSION['specimenID_Filter'])) OR (isset($_SESSION['ID_Specimen']))){
											//load_id('Species_Text', 'ID', 'Species', $Species_Code);
											get_specimen_code(array 
																	(
																	'id_parent' 				=> $dataDetermination->Genus_Code, 
																	'table_parent' 				=> 'Species',
																	'table_parent_condition' 	=> 'Genus_ID',
																	'field_parent' 				=> 'Species',
																	'table_child' 				=> 'Species_Text',
																	'field_child_1' 			=> 'ID',
																	'field_child_2' 			=> 'Species',
																	'selectedID' 				=> $Species_ID
																	));
										}
                                        ?>
                                    </select>
                                   
                               </td>
                            </tr>
                            <tr>
                                <td align="right">Author</td>
								<td>
                                   
                                    <select name="Species_Author_Code" id="Species_Author_Code" onChange='DinamisAuthor(this)' class="combobox">
                                        
                                        <?php 
                                        if ((isset($_SESSION['specimenID_Filter'])) OR (isset($_SESSION['ID_Specimen']))){
											//load_id('Species_Author_Text', 'ID', 'Species_Author', $Species_Author_Code); 
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
																	));
                                        }
                                        ?>
                                    </select>
                                   
								</td>
                            </tr>
					</table>
			    </td>
				<td width="">
				</td>
				<td width="400" align="right" valign="top">
					<!--tabel 2 sub konten 2-->
					<script>
					function appendRow() {
						var tbl = document.getElementById('rank'), // table reference
							row = tbl.insertRow(tbl.rows.length),      // append table row
							i;
						// insert table cells to the new row
						for (i = 0; i < tbl.rows[0].cells.length; i++) {
							createCell(row.insertCell(i), i, 'row');
						}
						//createCell(row.insertCell(i), i, 'row');
					}

					function createCell(cell, text, style) {
						var div = document.createElement('div'), // create DIV element
							txt = document.createTextNode(text); // create text node
							select = document.createElement("select");
							input = document.createElement("input");
							
							
						if (text == 0){
							//div.appendChild(select);                    // append text node to the DIV
							
							$(document).ready(function(){
								//$("select").change(function(){
									$.get("func/load_combobox_value.php?token=true",function(data,status){
										//alert("Data: " + data + "\nStatus: " + status);
										var obj = eval('(' + data + ')');
										//alert(obj.ID);
										
										
										for (i = 0; i < obj.ID.length; i++)
										{
											option = document.createElement("option");
											
											select.appendChild(option);
											select.setAttribute('class', 'combobox');
											select.setAttribute('name', 'rank[]');
											option.setAttribute('value', obj.ID[i]);
											option.appendChild(document.createTextNode(obj.Text[i]));
											cell.appendChild(select);
										}
									});
								//});
							});
							
							 
						}else if (text == 1){
							//div.appendChild(input);                    // append text node to the DIV
							input.setAttribute('name','rank_name[]');
							input.setAttribute('size','7');
							input.setAttribute('class','max_size');
							cell.appendChild(input);  
						}
						else if (text == 2){
							//div.appendChild(input);                    // append text node to the DIV
							input.setAttribute('name','rank_author[]');
							input.setAttribute('size','7');
							input.setAttribute('class','max_size');
							cell.appendChild(input);  
						}
						
						
						//div.setAttribute('class', style);        // set DIV class attribute
						//div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
										 // append DIV to the table cell
					}
					
					function deleteRow(id)
					{
						//alert(id);
						$(document).ready(function(){
								//$("select").change(function(){
									$.get("func/load_combobox_value.php?del=true&id="+id,function(data,status){
										//alert("Data: " + data + "\nStatus: " + status);
										<?php
										if (isset($_GET['id'])){
											if ($_GET['id'] !='') $id = $_GET['id']; else $id=0;
										}else{
											$id = '1';
										}
										?>
										window.location.href='?page=determination&id='+<?=$id?>;
										
									});
								//});
							});
					}
					</script>
					<style>
						.row{
							height:20px;
						}
					</style>
					
					<table border="1" width="" id="rank" style="border-collapse:collapse">
						<tbody>
						<tr>
							<td align="center" width="130">Rank</td>
							<td align="center">Name</td>
							<td align="center">Author</td>
						</tr>
						<?php
						
						if (isset($_POST['new_determinan']))
						{
							$load_rank = array();
							$Infraspecific_Rank = '';
							$Infraspecific_Name = '';
							$Infraspecific_Author = '';
							
						}
						else
						{
							$load_rank = $load_rank;
						}
						
						pr($load_rank);
						if (is_array($load_rank)):
						
						foreach ($load_rank as $rank):
							$Infraspecific_Rank = $rank->Infraspecific_Rank;
							$Infraspecific_Name = $rank->Infraspecific_Name;
							$Infraspecific_Author = $rank->Infraspecific_Author;
							//$Infraspecific_Rank = $rank->Infraspecific_Rank;
						?>
						<tr>
							<td align="center">
								
								<select name="rank[]" class="combobox" onchange="">
								<option value="null"></option>
								<?php load_id('xRank', 'ID', 'Text', $Infraspecific_Rank);?>
								</select>
								
							</td>
							<td align="center">
								<input type="text" name="rank_name[]" size="7" class="max_size" value="<?=$Infraspecific_Name?>"/>
							</td>
							<td align="center">
								<input type="text" name="rank_author[]" size="7" class="max_size" value="<?=$Infraspecific_Author?>"/>
							</td>
							<td align="center">
								<input type="button" value="-" onclick="javascript:deleteRow(<?=$Infraspecific_Rank?>)">
							</td>
						</tr>
						<?php
						endforeach;
						endif;
						?>
						</tbody>
						
					</table>
					<input type="button" value="+" onclick="javascript:appendRow()">
				</td>

			</table>

			<!--tabel konten 3-->
			<table width="" border="0">
				<tr>
					<td width="90" align="right" rowspan="2" valign="top">Publication</td>
					<td rowspan="2">
						<textarea name="Publication" cols="20" rows="" class="max_size"><?=$Publication?></textarea>
					</td>
					<td align="right" colspan="3" width="">Informal Group </td>
					<td width="200">
						<select name="Informal_Group_Code" style="width:100%">
						<option value="null"></option>
						<?php load_id('xInformal_Group', 'ID', 'Text', $Informal_Group_Code)?>
						</select>
					</td>
				</tr>
				<tr>
					
					<td align="right" colspan="3">Other Name </td>
					<td>
						<input type="text" name="Other_Name" value="<?php echo $Other_Name?>"/>
					</td>
				</tr>
			</table>
			<p>
                          
                 <a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
onClick=window.open("./view/page_taxon_list.php","Ratting","width=550,height=170,left=150,top=200,toolbar=1,status=1,");><!--Taxon List--></a> 
                  <!--          <a href="./view/page_taxon_list.php" target="Details" onclick="return popWindow(this.target)">Taxon List</a>-->


			</p>
		</td>
		</table>
		<!-- paging determination -->
		<!--
		<hr>
		<div align="right" style="padding:5px">
		<script>
			function det_prev(id, id_det)
			{
				window.location.href='?page=determination&id='+id+'&id_det='+id_det;
			}
			function det_next(id, id_det)
			{
				window.location.href='?page=determination&id='+id+'&id_det='+id_det;
			}
		</script>
		
		
		<input type="button" value=" << Prev" onclick="javascript:det_prev(<?=$_GET['id']?>, 1)">
		<input type="button" value="Next >>" onclick="javascript:det_next(<?=$_GET['id']?>, 2)">
		<input type="id_detmit" value="New Detemination" name="new_determinan">
		</div>-->
		<!--tabel footer-->
		
</fieldset>
    <?php require 'page_footer_info.php';?>
    </form>
    <!--
<form action="./view/page_taxon_list.php" method="post" target="Details" onid_detmit="return popWindow(this.target)">
				<input type="hidden" name ="data" value="<?php //echo 'tes'; ?>">
				<input type="id_detmit" value="View To PDF">
</form>
-->
