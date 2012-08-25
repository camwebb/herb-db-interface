<?php defined('_IBIS') or die ('Forbidden Access'); 

if (isset($_POST[$randomSave]) or ($_POST[$randomUpdate])){
	
	if (!empty($_POST['Current_Determination_Flag'])) $Current_Determination_Flag = $_POST['Current_Determination_Flag']; else $Current_Determination_Flag = $_POST['Current_Determination_Flag'] = 'null';
	if (!empty($_POST['Species_Code'])) $Species_Code = $_POST['Species_Code']; else $Species_Code = $_POST['Species_Code'] = 'null';
	if (!empty($_POST['Genus_Code'])) $Genus_Code = $_POST['Genus_Code']; else $Genus_Code = $_POST['Genus_Code'] = 'null';
	if (!empty($_POST['Species_Author_Code'])) $Species_Author_Code = $_POST['Species_Author_Code']; else $Species_Author_Code = $_POST['Species_Author_Code'] = 'null';
	$dataSpecimen = array 
						(
							'table_name' => 'Determination',
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
													'Data_Value' 					=> 'Data_Value'	
												  ),
												  
							'field_data' => array (
													'Collector_Field_Number' 		=> trim(htmlspecialchars($_POST['Collector_Field_Number'])),
													'Collector_Name' 				=> trim(htmlspecialchars($_POST['Collector_Name'])),
													'Coll_Date_From' 				=> trim(htmlspecialchars($_POST['Coll_Date_From'])),
													'Coll_Date_To' 					=> trim(htmlspecialchars($_POST['Coll_Date_To'])),
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
													'Data_Value' 					=> trim(htmlspecialchars($_POST['Data_Value']))
												  ),
							'page_id' => $_POST['pid']	
							
						);
				
	if ($_POST[$randomSave]){
		insert_tab_determination($dataSpecimen);
	}else{
		update_tab_determination($dataSpecimen);
	}
	
	//masukkan data ke fungsi insert
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
                            <input type="text" name="Taxonomical_Validator_By" value="<?php echo $Taxonomical_Validator_By?>"/>
			</td>
			<td width="" align="right">Date</td>
			<td width="">
                            <input type="text" name="Det_Date" size="10" value="<?php echo $Det_Date?>"/>
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
                            <input type="text" name="Taxonomical_Confirmed_By" value="<?php echo $Taxonomical_Confirmed_By?>"/>
			</td>
			<td align="right">Date</td>
                        <td>
                            <input type="text" name="Conf_Date" size="10"/>
			</td>
			<td align="right">Current Determination </td>
			<td>
                            <input type="checkbox" name="Current_Determination_Flag" value="" />
			</td>
                    </tr>
		</table>

		<!--tabel konten 2-->
		<table  border="0">
                    <td width="300" align="right">
                    <!--tabel 1 sub konten 2-->
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
                                        if (isset($_SESSION['specimenID_Filter'])){ 
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
																	'selectedID' 				=> $Genus_Code
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
                                        if (isset($_SESSION['specimenID_Filter'])){
											//load_id('Species_Text', 'ID', 'Species', $Species_Code);
											get_specimen_code(array 
																	(
																	'id_parent' 				=> $Genus_Code, 
																	'table_parent' 				=> 'Species',
																	'table_parent_condition' 	=> 'Genus_ID',
																	'field_parent' 				=> 'Species',
																	'table_child' 				=> 'Species_Text',
																	'field_child_1' 			=> 'ID',
																	'field_child_2' 			=> 'Species',
																	'selectedID' 				=> $Species_Code
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
                                        <option value="null"></option>

                                        <?php 
                                        if (isset($_SESSION['specimenID_Filter'])){
											//load_id('Species_Author_Text', 'ID', 'Species_Author', $Species_Author_Code); 
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
					<table border="1" width="">
						<tr>
							<td align="center" width="130">Rank</td>
							<td align="center">Name</td>
							<td align="center">Author</td>
						</tr>
						<tr>
							<td>
								<select name="select6" class="combobox">
								<option value="null"></option>
								<?php load_id('xRank', 'ID', 'Text')?>
								</select>
							</td>
							<td>
								<input type="text" name="textfield5" size="7" class="max_size"/>
							</td>
							<td>
								<input type="text" name="textfield9" size="7" class="max_size"/>
							</td>
						</tr>
					</table>
				</td>

			</table>

			<!--tabel konten 3-->
			<table width="" border="0">
				<tr>
					<td width="90" align="right" rowspan="2" valign="top">Publication</td>
					<td rowspan="2">
						<textarea name="Publication" cols="20" rows="" class="max_size"><?php echo $Publication?></textarea>
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
onClick=window.open("./view/page_taxon_list.php","Ratting","width=550,height=170,left=150,top=200,toolbar=1,status=1,");>Taxon List</a> 
                  <!--          <a href="./view/page_taxon_list.php" target="Details" onclick="return popWindow(this.target)">Taxon List</a>-->


			</p>
		</td>
		</table>

		<!--tabel footer-->
		
</fieldset>
    <?php require 'page_footer_info.php';?>
    </form>
    <!--
<form action="./view/page_taxon_list.php" method="post" target="Details" onSubmit="return popWindow(this.target)">
				<input type="hidden" name ="data" value="<?php //echo 'tes'; ?>">
				<input type="submit" value="View To PDF">
</form>
-->
