<?php defined('_IBIS') or die ('Forbidden Access');?>

<title>Filter</title>



			<table border="0" align="center">
				<td>
				<table width=100% border="0" align="center">

					<tr>
						<td width="60" align="center" height="30"></td>
						<td width="110" align="center" bgcolor="#ffffff">Table</td>
						<td width="150" align="center" bgcolor="#ffffff">Field</td>
						<td width="100" align="center" bgcolor="#ffffff">Compare</td>
						<td width="200" align="center" bgcolor="#ffffff">Data</td>
					</tr>
					<tr>
						<form name="form1" method="POST" action="">

						<input type="hidden" name="page" value="specimen" />
						<input type="hidden" name="pid" value="1" />
						<?php for ($i=0;$i<=4;$i++) { ?>
						<div >

						<input type="hidden" id="<?php echo $i ?>" name="<?php echo $i ?>" value ="<?php echo $i ?>" />
								<tr>
									<td>

									<select name="operator" id="operator_<?php echo $i?>">
										<option value=""></option>
										<option value="and">AND</option>
										<option value="or">OR</option>
									</select>
									</td>
									<td>
                                                                           
										<select name='table'  class="combobox" id="table_<?php echo $i;?>" onChange="DinamisTable(document.getElementById('table_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											<option value=""></option>
                                             <?php get_table();?>
										</select>
                                                                            
									</td>
									<td>
                                                                             
										<select class="combobox" name='field' id='fieldSelect_<?php echo $i?>' onChange="DinamisField(document.getElementById('fieldSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											<option value=""></option>

										</select>
                                                                           
									</td>
									<td>
                                                                            
										<select class="combobox" name='compare' id='compareSelect_<?php echo $i?>' onChange="DinamisCompare(document.getElementById('compareSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											<option value=""></option>
										</select>
                                                                            
									</td>
									<td>
                                                                            
										<select class="combobox" name='data' id='dataSelect_<?php echo $i?>' onChange="DinamisData(document.getElementById('dataSelect_<?php echo $i?>'),document.getElementById('<?php echo $i?>'))">
											<option value=""></option>
										</select>
                                                                                
									</td>

								</tr>

						</div>
						<?php }?>
						</form>
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



