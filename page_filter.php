<?php defined('_IBIS') or die ('Forbidden Access');


	if (isset($_POST['apply'])){
		$get_record = array (
							'operator_1' => $_POST['operator_1'],
							'operator_2' => $_POST['operator_2'],
							'operator_3' => $_POST['operator_3'],
							'operator_4' => $_POST['operator_4'],
							'table_0' => $_POST['table_0'],
							'table_1' => $_POST['table_1'],
							'table_2' => $_POST['table_2'],
							'table_3' => $_POST['table_3'],
							'table_4' => $_POST['table_4'],
							'field_0' => $_POST['field_0'],
							'field_1' => $_POST['field_1'],
							'field_2' => $_POST['field_2'],
							'field_3' => $_POST['field_3'],
							'field_4' => $_POST['field_4'],
							'compare_0' => $_POST['compare_0'],
							'compare_1' => $_POST['compare_1'],
							'compare_2' => $_POST['compare_2'],
							'compare_3' => $_POST['compare_3'],
							'compare_4' => $_POST['compare_4'],
							'data_0' => $_POST['data_0'],
							'data_1' => $_POST['data_1'],
							'data_2' => $_POST['data_2'],
							'data_3' => $_POST['data_3'],
							'data_4' => $_POST['data_4'],
							);
		
		list ($rec, $specimenID) = get_data_from_table($get_record);
		
		$_SESSION['specimenID_Filter'] = $specimenID;
		
		//print_r($specimenID);
		
		if($rec > 0) echo '<script>window.onload = function (){alert ("'.$rec.' Data Ditemukan") ; window.location="./?page=specimen&id=1"}</script>';
		else echo '<script>window.onload = function (){alert ("Data Tidak Ditemukan") ;window.location="./?page=filter"}</script>';
		
		
		
	}else if (isset($_POST['remove_filter'])){
		unset($_SESSION['specimenID_Filter']);
		unset($_SESSION['ID_Specimen']);
		unset($_SESSION['ID_Determination']);
		unset($_SESSION['ID_Component']);
		echo '<script type=text/javascript>alert("Filter Removed"); window.location.href="./?page=filter";</script>"';
		
		
	}
	
	
	
?>


<title>Filter</title>

<form method="post" action="" name="from_filter" onsubmit="return validasi_filter()">

			<table border="0" align="center">
				<td>
				<table width=100% border="0" align="center">

					<tr>
						<td width="60" align="center" height="30"></td>
						<td width="130" align="center" bgcolor="#ffffff">Table</td>
						<td width="" align="center" bgcolor="#ffffff">Field</td>
						<td width="100" align="center" bgcolor="#ffffff">Compare</td>
						<td width="300" align="center" bgcolor="#ffffff">Data</td>
					</tr>
					<tr>
						

						<input type="hidden" name="page" value="specimen" />
						<input type="hidden" name="pid" value="1" />
						<?php for ($i=0;$i<=4;$i++) { ?>
						<div >

						<input type="hidden" id="<?php echo $i ?>" name="<?php echo $i ?>" value ="<?php echo $i ?>" />
								<tr>
									<td>
									<?php if ($i !== 0):?>
									<select name="operator_<?php echo $i?>" id="operator_<?php echo $i?>" class="combobox">
										<option value=""></option>
										<option value="AND">AND</option>
										<option value="OR">OR</option>
									</select>
									<?php endif; ?>
									</td>
									<td>
                                                                           
										<select name='table_<?php echo $i?>'  class="combobox" id="table_<?php echo $i;?>" onChange="DinamisTable(document.getElementById('table_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											<option value=""></option>
                                             <?php get_table();?>
										</select>
                                                                            
									</td>
									<td>
                                                                             
										<select class="combobox" name='field_<?php echo $i?>' id='fieldSelect_<?php echo $i?>' onChange="DinamisField(document.getElementById('fieldSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											

										</select>
                                                                           
									</td>
									<td>
                                                                            
										<select class="combobox" name='compare_<?php echo $i?>' id='compareSelect_<?php echo $i?>' onChange="DinamisCompare(document.getElementById('compareSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											
										</select>
                                                                            
									</td>
									<td>
                                                                            
										<select class="combobox" name='data_<?php echo $i?>' id='dataSelect_<?php echo $i?>' onChange="DinamisData(document.getElementById('dataSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											
										</select>
                                                                                
									</td>

								</tr>

						</div>
						<?php } ?>
						
					</tr>


				</table>

			</table>

			<center>


				<input type="submit" name="apply" value="Apply"/>
				<input type="submit" name="remove_filter" value="Remove" />

			</center>

<div id="dataAwal">
	<input type='hidden' id='tableTmp' name='tableTmp' value="" />
	<input type='hidden' id='fieldTmp' name='fieldTmp' value="" />
	<input type='hidden' id='compareTmp' name='compareTmp' value="" />
	<input type='hidden' id='dataTmp' name='dataTmp' value="" />
</div>
</form>
