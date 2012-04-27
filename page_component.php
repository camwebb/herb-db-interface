<?php defined('_IBIS') or die ('Forbidden Access'); ?>
<title>Untitled Document</title>


<body>
  
		<?php require 'page_header_info.php';?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
	<table  border="0">
		<tr>
			<td>
				<table width="350" border="0">
					<tr>
						<td width="137" align="right">BO Number </td>
						<td>
							<input type="text" name="textfield5" value="<?php echo $BO_Number;?>" />
						</td>
					</tr>
					<tr>
						<td align="right">Other Number </td>
						<td>
							<input type="text" name="textfield6" value="<?php echo $other_number;?>" />
						</td>
					</tr>
					<tr>
						<td align="right">Component Class </td>
						<td>
							<select name="select" >
                                                            <option value=""></option>
                                                            <?php //load_id('xComponent_Class', 'ID', 'Text')?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Notes</td>
						<td>
							<textarea name="textarea" cols="26" rows="5" class="textarea"><?php echo $Notes;?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
			

</fieldset>
        <?php require 'page_footer_info.php';?>
   
</body>

