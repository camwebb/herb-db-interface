

<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
<table border="0" width="700" style="font-size:10px">
			<tr>
				<td width="100" class="user_info_text">Current User</td>
				<td class="user_info_value" width="150">: <?php echo $Current_User?></td>

				<td width="130" class="user_info_text">Edited By</td>
                <td class="user_info_value" width="">: <?php echo $Last_Edited_By?></td>
                <td align="right" width="100">Data Value :</td>
				<td align="right" width="100">
				
				<select name="Data_Value" class="combobox">
					<option value="null"></option>
					<?php load_id('xData_Value', 'ID', 'Text', $Data_Value)?>
                                </select>
                                </td>
			</tr>
			<tr>
				<td class="user_info_text">Connect As</td>
				<td class="user_info_value">: 
					<?php 
					if ($Current_Connect_As == 1) echo 'System Administrator';else
					if ($Current_Connect_As == 2) echo 'Network Manager'; else
					if ($Current_Connect_As == 3) echo 'Database Manager'; else
					if ($Current_Connect_As == 4) echo 'Collection Manager'; else
					if ($Current_Connect_As == 5) echo 'Data Validator'; else
					if ($Current_Connect_As == 6) echo 'Data Accurator'; else
					if ($Current_Connect_As == 7) echo 'Data Entry Operator'; else
					if ($Current_Connect_As == 8) echo 'Guest';
					?>
				
				</td>

				<td class="user_info_text">Connect As</td>
                <td class="user_info_value">: 
                <?php 
					if ($Last_Connect_As ==1) echo 'System Administrator';else
					if ($Last_Connect_As == 2) echo 'Network Manager'; else
					if ($Last_Connect_As == 3) echo 'Database Manager'; else
					if ($Last_Connect_As == 4) echo 'Collection Manager'; else
					if ($Last_Connect_As == 5) echo 'Data Validator'; else
					if ($Last_Connect_As == 6) echo 'Data Accurator'; else
					if ($Last_Connect_As == 7) echo 'Data Entry Operator'; else
					if ($Last_Connect_As == 8) echo 'Guest';
					?>
                </td>
				<td></td>
			</tr>
			<tr>
				<td class="user_info_text">Start Logon</td>
				<td class="user_info_value">: <?php echo $_SESSION['login_time'];?></td>

				<td class="user_info_text" width="130">Last Edited Date</td>
                                <td class="user_info_value">: <?php echo $Last_Edited_Date?></td>
				<td></td>
			</tr>
			<tr>

			</tr>

		</table>

    <hr>
<table width="700" border="0">
    <tr>
		<td>
		<?php
		if (isset($_SESSION['specimenID_Filter'])){	
		echo 'Record :';
			
				echo $current_id. ' Of '. count($_SESSION['specimenID_Filter']); 
				if ($current_id <= 1){
					$prevDisable = 'Disabled';
					$prevIndexDisable = 'Disabled';
					$nextDisable = '';
					$nextIndexDisable = '';
				}else if ($current_id >= count($_SESSION['specimenID_Filter'])){
					$prevDisable = '';
					$prevIndexDisable = '';
					$nextDisable = 'Disabled';
					$nextIndexDisable = 'Disabled';
				}
				
		?>
			<input type="button" <?php echo $prevIndexDisable; ?> value="<<" onclick="window.location='./?page=<?php echo $_GET['page']?>&id=1'"/>
			<input type="button" <?php echo $prevDisable; ?> value="Prev." onclick="window.location='./?page=<?php echo $_GET['page']?>&id=<?php echo ($_GET['id']-1); ?>'"/>
			<input type="button" <?php echo $nextDisable; ?> value="Next" onclick="window.location='./?page=<?php echo $_GET['page']?>&id=<?php echo ($_GET['id']+1); ?>'"/>
			<input type="button" <?php echo $nextIndexDisable; ?> value=">>" onclick="window.location='./?page=<?php echo $_GET['page']?>&id=<?php echo (count($_SESSION['specimenID_Filter'])); ?>'"/>
		<?php } ?>
        </td>
        <td width="" align="right">
        <?php
			$rule = explode(',', $_SESSION['userRule']);
			
			
			if (isset($_GET['page'])){
				switch (htmlspecialchars($_GET['page'])){
					case 'specimen':
					{
						
						//cek rule dari user
						for ($loop = 0; $loop <= count($rule); $loop++):
							if (trim($rule[$loop])=='save_specimen'){
								$ruleAuth = 1;
							}
						endfor;		
								
								if ($ruleAuth){
									if (isset($_SESSION['specimenID_Filter']) or ($_SESSION['ID_Specimen'])){
										$name_submit_save = $randomUpdate;
										$value_submit_save = 'Update Data';
										
									}else{
										$name_submit_save = $randomSave;
										$value_submit_save = 'Save Data';
									}
									
									$value_submit_new = 'New Data';
									$name_submit_new = $randomNew;
									
								}else{
									//for guest view
									$name_submit_save = str_shuffle($random);
									$value_submit_save = 'New Data';
									$value_submit_new = 'Save Data';
									$name_submit_new = $random;
									$save_disabled = 'disabled';
									$new_disabled = 'disabled';
								}
							
						
					}
					break;
					case 'locality':
					{	
						//cek rule dari user
						//print_r($rule);
						for ($loop = 0; $loop <= count($rule); $loop++):
							if (trim($rule[$loop]) == 'save_locality'){  
							$ruleAuth = 1;
							}	
						endfor;		
								
								if ($ruleAuth){
									if (isset($_SESSION['specimenID_Filter']) or ($_SESSION['ID_Specimen'])){
										$name_submit_save = $randomUpdate;
										$value_submit_save = 'Update Data';
										
									}else{
										$name_submit_save = $randomSave;
										$value_submit_save = 'Save Data';
									}
									
									$value_submit_new = 'New Data';
									$name_submit_new = $randomNew;
									
									if (isset($_SESSION['ID_Specimen'])){
										$save_disabled = '';
										//$new_disabled = '';
									}else{
										
										$save_disabled = '';
										$new_disabled = '';
									}
								}else{
									//for guest view
									$name_submit_save = str_shuffle($random);
									$value_submit_save = 'New Data';
									$value_submit_new = 'Save Data';
									$name_submit_new = $random;
									$save_disabled = 'disabled';
									$new_disabled = 'disabled';
								}
								
							
					}
					break;
					case 'determination':
					{
						//cek rule dari user
						for ($loop = 0; $loop <= count($rule); $loop++):
							if (trim($rule[$loop])=='save_determination'){
								$ruleAuth = 1;
							}
						endfor;		
								
								if ($ruleAuth){
									if (isset($_SESSION['specimenID_Filter']) or ($_SESSION['ID_Determination'])){
										$name_submit_save = $randomUpdate;
										$value_submit_save = 'Update Data';
										
									}else{
										$name_submit_save = $randomSave;
										$value_submit_save = 'Save Data';
									}
									
									$value_submit_new = 'New Data';
									$name_submit_new = $randomNew;
									
								}else{
									//for guest view
									$name_submit_save = str_shuffle($random);
									$value_submit_save = 'New Data';
									$value_submit_new = 'Save Data';
									$name_submit_new = $random;
									$save_disabled = 'disabled';
									$new_disabled = 'disabled';
								}
					}
					break;
					case 'component':
					{
						//cek rule dari user
						for ($loop = 0; $loop <= count($rule); $loop++):
							if (trim($rule[$loop])=='save_component'){
								$ruleAuth = 1;
							}
						endfor;		
								
								if ($ruleAuth){
									if (isset($_SESSION['specimenID_Filter']) or ($_SESSION['ID_Component'])){
										$name_submit_save = $randomUpdate;
										$value_submit_save = 'Update Data';
										
									}else{
										$name_submit_save = $randomSave;
										$value_submit_save = 'Save Data';
									}
									
									$value_submit_new = 'New Data';
									$name_submit_new = $randomNew;
									
								}else{
									//for guest view
									$name_submit_save = str_shuffle($random);
									$value_submit_save = 'New Data';
									$value_submit_new = 'Save Data';
									$name_submit_new = $random;
									$save_disabled = 'disabled';
									$new_disabled = 'disabled';
								}
					}
					break;
					default:
					{
						$name_submit_save = 'not_defined';
						$value_submit_save = '';
						$value_submit_new = 'Clear Form';
					}
				}
			}
        ?>
            <?php
				if (isset($_GET['page'])){
					if ($_GET['page'] == 'specimen'){
            ?>
            <input type="submit" value="<?php echo $value_submit_new; ?>" name="<?php echo $name_submit_new; ?>" <?php echo $new_disabled;?>>
            <?php } } ?>
            <input type="submit" value="<?php echo $value_submit_save; ?>" name="<?php echo $name_submit_save;?>" <?php echo $save_disabled; ?>>
        </td>
    </tr>
</table>
	<input type="hidden" name="pid" value="<?php echo $_GET['id']?>"/>
	<input type="hidden" name="ID_Specimen" value="<?php echo $_SESSION['specimenID_Filter'][$_GET['id']-1]?>"/>
    <input type="hidden" name="Start_Logon" value="<?php echo $Start_Logon?>">
    <input type="hidden" name="Current_User" value="<?php echo $Current_User?>">
    <input type="hidden" name="Connect_As" value="<?php echo $Connect_as?>">

 </fieldset>
