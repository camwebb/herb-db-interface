<?php
function get_table(){
	$query = "SELECT * FROM view_table";
	$result = mysql_query($query) or die (mysql_error);
	if (mysql_num_rows($result)){
		while ($data = mysql_fetch_array($result)){
			echo "<option value=$data[tableID]>" . $data['tableName']. "</option>";
		}	
	}
}
?>
