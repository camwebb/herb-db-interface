

<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
<table border="0" width="700" style="font-size:10px">
			<tr>
				<td width="100" class="user_info_text">Current User</td>
				<td class="user_info_value" width="150">: <?php echo $Current_User?></td>

				<td width="130" class="user_info_text">Edited By</td>
                <td class="user_info_value" width="170">: <?php echo $Last_Edited_By?></td>
				<td align="right">
				Data Value :
				<select name="Data_Value" class="_combobox">
					<option></option>
					<?php load_id('xData_Value', 'ID', 'Text')?>
                                </select>
                                </td>
			</tr>
			<tr>
				<td class="user_info_text">Connect As</td>
				<td class="user_info_value">: <?php echo $Current_Connect_As?></td>

				<td class="user_info_text">Connect As</td>
                                <td class="user_info_value">: <?php echo $Last_Connect_As?></td>
				<td></td>
			</tr>
			<tr>
				<td class="user_info_text">Start Logon</td>
				<td class="user_info_value">: <?php echo $Start_Logon?></td>

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
        <td>Record :

            


        </td>
        <td width="" align="right">
            <input type="button" value="New Data" onClick="window.location='?page=specimen'">
            <input type="submit" value="Save" name="save">
        </td>
    </tr>
</table>

    <input type="hidden" name="Start_Logon" value="<?php echo $Start_Logon?>">
    <input type="hidden" name="Current_User" value="<?php echo $Current_User?>">
    <input type="hidden" name="Connect_As" value="<?php echo $Connect_as?>">

 </fieldset>
