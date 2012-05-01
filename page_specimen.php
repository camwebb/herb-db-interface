<?php
defined('_IBIS') or die ('Forbidden Access');
//print_r($_SESSION['specimenID_Filter']);


?>

<form method="POST" name="specimen" action="">

		<?php require 'page_header_info.php'?>
 <fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
		<table border="0">
			<tr>
				<td>
					<table width="" border="0">
						<tr>
							<td width="170" align="right" valign="top" rowspan="2">Habit Detail</td>
							<td width="300" rowspan="2">
                                <textarea name="Habit_Detail" class="max_size" cols="33" rows="3" <?php echo $readonly;?>><?php echo $Habit_Detail;?></textarea>
							</td>
							<td width="" align="right" valign="top">Origin of Collection </td>
							<td width="170" valign="top" rowspan="">
								<select name="Origin_of_Collection_Code" size="1" class="combobox">
                                                                    <option value=""></option>
                                                                    <?php load_id('xOrigin_of_Collection', 'ID','Text')?>
								</select>
                                                        </td>
                                                </tr>
                                                <tr>



							<td align="right">Status of Collection </td>
							<td>
								<select name="Status_Code1" class="combobox">
								<option></option>
								   <?php load_id('xStatus_of_Collection', 'ID', 'Text')?>
								</select>
							</td>
                                                </tr>

						<tr>
							<td align="right">Local Name</td>
							<td>
								<input name="Local_Name" type="text" <?php echo $readonly;?> value="<?php echo $Local_Name?>" class="max_size"/>
                                                        </td>
						</tr>
						<tr>
							<td align="right">Language</td>
								<td>
									<input type="text" name="Language" size="26" <?php echo $readonly;?> value="<?php echo $Language?>" class="max_size"/>
								</td>
								<td align="right">Status Specimen </td>
								<td>
									<select name="Status_Code" class="combobox">
									<option></option>
										<?php load_id('xStatus_Specimen', 'ID', 'Text')?>
									</select>
								</td>
						</tr>
						<tr>
							<td align="right">Local Use </td>
							<td>
								<input type="text" name="Local_Use" size="26" <?php echo $readonly;?> value="<?php echo $Local_Use?>" class="max_size"/>
							</td>
							<td align="right">Sex</td>
							<td>
								<select name="Sex_Code" class="combobox">
								   <option></option>
									<?php load_id('xSex', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Notes</td>
							<td><input type="text" name="Notes" size="26" <?php echo $readonly;?> value="<?php echo $Notes;?>" class="max_size"></td>
							<td align="right">Collection Method </td>
							<td>
								<select name="Collection_Method_Code" class="combobox">
								   <option></option>
								   <?php load_id(' xCollection_Method', 'ID', 'Text')?>
								</select>

							</td>
						</tr>
						<tr>
							<td align="right">Distribution of Duplicates</td>
							<td><input type="text" name="Distribution_of_Duplicates" size="30" <?php echo $readonly;?> value="<?php echo $Distribution_of_Duplicates;?>" class="max_size"></td>
							<td align="right">Type</td>
							<td>
								<select name="Type_Code" class="combobox">
									<option></option>
									<?php load_id('xType', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
					</table>
				</td>


		</table>
		

 </fieldset>

<?php require 'page_footer_info.php';?>

</form>


