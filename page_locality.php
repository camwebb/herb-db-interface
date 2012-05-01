<?php

defined('_IBIS') or die ('Forbidden Access');
?>




<title>Locality</title>




		<?php require 'page_header_info.php'?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
			
					<table border="0">
						<tr>
							<td width="120" align="right" >Habitat
							</td>
							<td width="360">
								
										<select name="select" style="width:150px;">
										<option></option>
										<?php load_id('xHabitat_Classification', 'ID', 'Text')?>
										</select>
									Substrate
									
									  <select name="select2" style="width:;">
										<option></option>
										<?php load_id('xSubstrate_Classification', 'ID', 'Text')?>
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
								<select name="select6" class="combobox">
								<option value=""></option>
								<?php load_id(' xNNP', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Major Island</td>
							<td>
								
										<select name="select3">
										  <option></option>
										  <?php load_id('xMajor_Island', 'ID', 'Text')?>
										</select>
									Island
									<input class="textbox" type="text" name="Island_Name" size="14" <?php echo $readonly;?> value="<?php echo $Island_Name?>"/>
									
							</td>
							<td align="right">Distance From NNP </td>
							<td>
								<input name="NNP_Distance" type="text" size="3" <?php echo $readonly;?>/>
							  km
							</td>
						</tr>
						<tr>
							<td align="right">Province</td>
							<td>
								
										<select name="select4" >
										<option></option>
										<?php load_id(' xProvince', 'ID', 'Text')?>
										</select>
									
							</td>
							<td align="right">Direction From NNP </td>
							<td>
								<select name="select7" class="combobox">
								<option value=""></option>
									<?php load_id(' xDirection', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">District</td>
							<td width="">
								<select name="select5" >
								  <option></option>
								  <?php load_id(' xDistrict', 'ID', 'Text')?>
								</select>
							</td>
							<td align="right">Source of Geocode </td>
							<td>
								<select name="select8" class="combobox">
								  <option></option>
								   <?php load_id(' xSource_of_Geocode', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>

							<td align="left" width="55">Altitude From :<input type="text" name="Alt_From" size="4" <?php echo $readonly;?>/> To :<input name="Alt_To" type="text" value="" size="1" maxlength="4" <?php echo $readonly;?>/><input name="textfield12" type="text" size="1" maxlength="1" <?php echo $readonly;?>/>
							</td>

							<td align="right">Method of Geocode </td>
							<td>
								<select name="select9" class="combobox">
								 <option></option>
								<?php load_id('xMethod_of_Geocode', 'ID', 'Text')?>
								</select>
							</td>
						</tr>
					</table>
		
		

		
</fieldset>
    <?php require 'page_footer_info.php';?>


