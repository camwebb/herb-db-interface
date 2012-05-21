
<div style="width: 120px; height: 150px; float: left; margin-right:10px ">
    <fieldset style="padding: 3px 3px 3px 3px; width: 100px; height: 120px; box-shadow:3px 3px 3px #000; border-radius:5px 5px 5px 5px">
        <img src="img/icon/administrator.png" width="100" height="120" alt="ovan">
    </fieldset>
    
</div>
<div style="">
	<div align="left" style="float:left; width:83%">
	   
			
			<fieldset style="width:100%; border-radius:20px 0px 0px 0px; background-color: aliceblue">
			<table border="0">
				<th colspan="2" align="center" height="40px">
						Selamat Datang
				</th>
				<tr>
					
					<td width="100" align="right">
						Username :
					</td>
					<td width="200">
						<?php echo $_SESSION['userName']; ?>
					</td>
				</tr>
				<tr>
					<td align="right">
						Level Access :
					</td>
					<td>
						<?php 
						if ($_SESSION['userLevel'] ==1) echo 'System Administrator';else
						if ($_SESSION['userLevel'] == 2) echo 'Network Manager'; else
						if ($_SESSION['userLevel'] == 3) echo 'Database Manager'; else
						if ($_SESSION['userLevel'] == 4) echo 'Collection Manager'; else
						if ($_SESSION['userLevel'] == 5) echo 'Data Validator'; else
						if ($_SESSION['userLevel'] == 6) echo 'Data Accurator'; else
						if ($_SESSION['userLevel'] == 7) echo 'Data Entry Operator'; else
						if ($_SESSION['userLevel'] == 8) echo 'Guest';
						
						?>
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2">
						<a href="logout.php">Logout</a>
					</td>
					
				</tr>
				
			</table>
			</fieldset>
	   
	</div>
<!--
	<div>
		<fieldset style="background-color: aliceblue">
			<table border="0">
				<th colspan="2" align="left" height="40px">
						<p style="font-size:12px;">Last Activity</p>
				</th>
				
			</table>
			<?php //get_user_info();?>
		</fieldset>
	</div>-->
	<div style="clear:both"></div>
</div>
