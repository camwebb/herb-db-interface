
    <fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px; width:885px;">
<table border="0">
    <tr>
        <td align="right" width="130"><label class="label"><b>Specimen Id </b></label>:</td>
	<td width="200">
            <label><?php echo $ID_Specimen; ?></label>

	</td>
        <td width="250" rowspan="4" align="center"><?php echo $Family_Name.' '.$Genus_Name.' '.$Species_Name?></td>
	<td width="150" rowspan="4" align="center">
		
        <a id="specimen_image" href="img/no_image.jpg">
        	<img src="img/no_image.jpg" width="100" height="100"/>
        </a>    
	</td>

    </tr>
    <tr>
        <td align="right"><label class="label">Collector Number :</label></td>
	<td>
            <input name="Collector_Field_Number"  class="textfield" type="text" maxlength="" <?php echo $readonly;?> value="<?php echo $Collector_Field_Number;?>" />
	</td>
    </tr>
    <tr>
        <td align="right"><label class="label">Collector Names :</label></td>
	<td>
            <input name="Collector_Name" class="textfield" type="text" maxlength="" <?php echo $readonly;?> value="<?php echo $Collector_Name;?>"  />
	</td>
    </tr>
    <tr>
        <td align="right"><label class="label">Collecting Date :</label></td>
	<td width="">
            <input  id="Coll_Date_From" name="Coll_Date_From" type="text" maxlength="10" size="8" <?php echo $readonly;?> value="<?php echo $Coll_Date_From;?>" />
            to
            <input id="Coll_Date_To" name="Coll_Date_To" type="text" maxlength="10" size="8" <?php echo $readonly;?> value="<?php echo $Coll_Date_To;?>" />
	</td>

    </tr>
</table>
    </fieldset>

