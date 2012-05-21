<<<<<<< HEAD
<?php 
defined('_IBIS') or die ('Forbidden Access');

?>
<div style="width:100%;">
	<div style="width:25%; border-style:none; float:left; margin-right:10px;" align="center">
		<fieldset>
			<legend><span style="font-size:12px;">Print Single Data</span></legend>
				<a href="JavaScript:window.print();"><img src="img/icon/printer.png" width="80px" height="90px"/></a><br>
				<a <?php //if (!empty($_SESSION['specimenID_Filter'])) ?>href="./download_report.php?id=<?php echo $_SESSION['specimenID_Filter'][$_GET['id']-1]; ?>" target="main"><img src="img/icon/pdf.png" width="80px" height="90px"/></a>
		</fieldset>
		<br>
		<fieldset>
			<legend><span style="font-size:12px;">Print Multiple Data</span></legend>
				<a href="JavaScript:window.print();"><img src="img/icon/printer.png" width="80px" height="90px"/></a><br>
				<a href=""><img src="img/icon/pdf.png" width="80px" height="90px"/></a>
		</fieldset>
		
	</div>
	<div style="float:left; width:60%; border-style:none; background-color:#fff" align="right">
		<div style="">
		  
		  <table border="0">
				<td>
				<fieldset style="border-width:3px;">
					<table border="0" align="center">
						<tr>
							<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>	
					</tr>

						<tr>
							<td align="center"><p><b><?php echo $Family_Name.','.$Genus_Name.','.$Species_Name;?></p></td>
						</tr>
					</table><hr>

					<table border="0" width="100%">
						<tr>
							<td width="25%" valign="top"><span style="font-size:12px;">Locality</span></td>
							<td width="1px" valign="top">:</td>
							<td width=""><span style="font-size:12px;"><?php echo $Locality_Detail; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Latitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Longitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Altitude</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td valign="top"><span style="font-size:12px;">Habitat</span></td>
							<td valign="top">:</td>
							<td><span style="font-size:12px;"><?php echo $Habitat_Detail; ?></span></td>
						</tr>
					</table><hr>

					<table border="0" width="100%">
						<tr>
							<td width="25%" valign="top"><span style="font-size:12px;">Collector(s)</span></td>
							<td width="1px" valign="top">:</td>
							<td width="40%"><span style="font-size:12px;"><?php echo $Collector_Name; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">No.</span></td>
							<td>:</td>
							<td><?php echo $Collector_Field_Number; ?></td>
							<td><span style="font-size:12px;">Date : <?php echo $Coll_Date_From; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Local Name</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Habit</span></td>
							<td>:</td>
							<td><span style="font-size:12px;"><?php echo $Habit_Detail; ?></span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Uses</span></td>
							<td>:</td>
							<td><span style="font-size:12px;">-</span></td>
						</tr>
						<tr>
							<td><span style="font-size:12px;">Determined By</span></td>
							<td>:</td>
							<td><span style="font-size:12px;"><?php ?></span></td>
							<td><span style="font-size:12px;">Date :</span></td>
						</tr>
					</table>
					<hr>	
					<table border="0" valign="top">
						<tr>
							<td><p><b>Duplicate Sent to </b>: <?php echo $Distribution_of_Duplicates; ?></p>Date Printed : <?php echo date('Y-m-d H:i:s'); ?></td>
						</tr>
						<tr>
							<td><p><b>Notes</b></p></td>
						</tr>
						<tr>
							<td><?php echo $Notes; ?></td>
						</tr>
					</table>
			
				</fieldset>
			</table>
		</div>
	</div>
	<div style="clear:both"></div>
</div>


=======
<div style="width:650px;">
<div style="">
  
  <table border="0">
		<td>
	  	<fieldset>
		  	<table border="0" align="center">
			  	<tr>
				  	<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>	
  		  	</tr>

			  	<tr>
  					<td align="center"><p><b>Nama Tumbuhan <br/> Nama Jenis</b></p></td>
  				</tr>
  			</table><hr>

			<table border="0">
				<tr>
					<td>Locality</td>
					<td>:</td>
					<td width="242">1</td>
				</tr>
				<tr>
					<td>Latitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Longitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Altitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habitat</td>
					<td>:</td>
					<td>1</td>
				</tr>
			</table><hr>

			<table border="0">
				<tr>
					<td>Collector(s)</td>
					<td>:</td>
					<td width="100">1</td>
				</tr>
				<tr>
					<td>No.</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
				<tr>
					<td>Local Name</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habit</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Uses</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Determined By</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
			</table><hr>	

			<table border=0>
				<tr>
					<td><p><b>Duplicate Sent to</b></p>Date Printed :</td>
				</tr>
				<tr>
					<td><p><b>Notes</b></p></td>
				</tr>

    </table>
    </fieldset>
		</td>

      <td width="50"></td>

		<td>
			<fieldset>
			<table border="0" align="center">
				<tr>
					<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>
				</tr>
				<tr>
					<td align="center"><p><b>Nama Tumbuhan <br/> Nama Jenis</b></p></td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Locality</td>
					<td>:</td>
					<td width="242">1</td>
				</tr>
				<tr>
					<td>Latitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Longitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Altitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habitat</td>
					<td>:</td>
					<td>1</td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Collector(s)</td>
					<td>:</td>
					<td width="100">1</td>
				</tr>
				<tr>
					<td>No.</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
				<tr>
					<td>Local Name</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habit</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Uses</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Determined By</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
			</table><hr>	
			<table border=0>
				<tr>
					<td><p><b>Duplicate Sent to</b></p>Date Printed :</td>
				</tr>
				<tr>
					<td><p><b>Notes</b></p></td>
				</tr>
			</table>
			</fieldset>
		</td>
	</table>
</div>
</div>
<br>
<div style="width:650px;">

<div style="">
	<table border="0">
		<td>
		<fieldset>
			<table border="0" align="center">
				<tr>
					<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>
				</tr>
				<tr>
					<td align="center"><p><b>Nama Tumbuhan <br/> Nama Jenis</b></p></td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Locality</td>
					<td>:</td>
					<td width="242">1</td>
				</tr>
				<tr>
					<td>Latitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Longitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Altitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habitat</td>
					<td>:</td>
					<td>1</td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Collector(s)</td>
					<td>:</td>
					<td width="100">1</td>
				</tr>
				<tr>

				<td>No.</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
				<tr>
					<td>Local Name</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habit</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Uses</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Determined By</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
			</table><hr>	
			<table border=0>
				<tr>
					<td><p><b>Duplicate Sent to</b></p>Date Printed :</td>
				</tr>
				<tr>
					<td><p><b>Notes</b></p></td>
				</tr>
			</table>
			</fieldset>
		</td>
  <td width="50">
			
		</td>
		<td>
			<fieldset>
			<table border="0" align="center">
				<tr>
					<td style="padding:5px;" align="center"><h4>Herbarium Bogoriense</h4>PUSLIT BIOLOGI - LIPI INDONESIA<hr></td>
					
				</tr>
				<tr>
					<td align="center"><p><b>Nama Tumbuhan <br/> Nama Jenis</b></p></td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Locality</td>
					<td>:</td>
					<td width="242">1</td>
				</tr>
				<tr>
					<td>Latitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Longitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Altitude</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habitat</td>
					<td>:</td>
					<td>1</td>
				</tr>
			</table><hr>
			<table border="0">
				<tr>
					<td>Collector(s)</td>
					<td>:</td>
					<td width="100">1</td>
				</tr>
				<tr>
					<td>No.</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
				<tr>
					<td>Local Name</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Habit</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Uses</td>
					<td>:</td>
					<td>1</td>
				</tr>
				<tr>
					<td>Determined By</td>
					<td>:</td>
					<td>1</td>
					<td>Date</td>
				</tr>
			</table><hr>	
			<table border=0>
				<tr>
					<td><p><b>Duplicate Sent to</b></p>Date Printed :</td>
				</tr>
				<tr>
					<td><p><b>Notes</b></p></td>
				</tr>
			</table>
			</fieldset>
		</td>
	</table>
</div>
</div>
>>>>>>> 80ac24adc91b0e43801b48e83710c5f11b6b96d1

