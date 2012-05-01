
<body>
    <fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
<table border="0">
    <tr>
        <td align="right" width="130"><label class="label"><b>Specimen Id </b></label>:</td>
	<td width="200">
            <label><?php echo $ID_Specimen; ?></label>

	</td>
        <td width="250" rowspan="4" align="center">Test data specimen</td>
	<td width="150" rowspan="4" align="center">
            <img src="images/no_image.jpg" width="100" height="100" alt=""/>
	</td>

    </tr>
    <tr>
        <td align="right"><label class="label">Collector Number :</label></td>
	<td>
            <input name="Collector_Field_Number"  class="max_size" type="text" maxlength="" <?php echo $readonly;?> value="<?php echo $Collector_Field_Number;?>" />
	</td>
    </tr>
    <tr>
        <td align="right"><label class="label">Collector Names :</label></td>
	<td>
            <input name="Collector_Name" class="max_size" type="text" maxlength="" <?php echo $readonly;?> value="<?php echo $Collector_Name;?>"  />
	</td>
    </tr>
    <tr>
        <td align="right"><label class="label">Collecting Date :</label></td>
	<td width="">
            <input  name="Coll_Date_From" type="text" maxlength="10" size="8" <?php echo $readonly;?> value="<?php echo $Coll_Date_From;?>" />
            to
            <input name="Coll_Date_To" type="text" maxlength="10" size="11" <?php echo $readonly;?> value="<?php echo $Coll_Date_To;?>" />
	</td>

    </tr>
</table>
    </fieldset>
</body>
