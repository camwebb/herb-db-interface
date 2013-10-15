<?php

function load_data_with_condition($table, $field1, $field2, $where, $data_condition){
    $query = "SELECT `$field1`,`$field2` FROM $table WHERE $where = $data_condition";//print_r($query);
    $result = mysql_query($query) or die (mysql_error());
    while ($data = mysql_fetch_object($result)){
        echo "<option value =".$data->$field1.">".$data->$field2."</option>";
    }
}
/*
function load_id($table, $field1, $field2, $selected){
	print_r('adadadad');
	exit;
    $query = "SELECT $field1, $field2 FROM $table LIMIT 10";print_r($query);
    $result = mysql_query($query) or die (mysql_error());
    while ($data = mysql_fetch_object($result)){
		if($data->$field2 !='') :
		
		?>
        <option value ="<?php echo $data->$field1; ?>" <?php if ($data->$field1 == $selected) echo 'Selected'; ?> ><?php echo $data->$field2; ?></option>
        <?php
        endif;
    }
}
*/
if (isset($_GET['token']))
{
	function load_data(){
		
		/* database static config */
		//mysql_connect('localhost','root','root');
		//mysql_select_db('db_herbarium');
		
		include '../config/database.php';
		
		$query = "SELECT ID, Text FROM xRank";
		$result = mysql_query($query) or die (mysql_error());
		while ($data = mysql_fetch_object($result))
		{
			$dataArr ['ID'][] = $data->ID;
			$dataArr ['Text'][] = $data->Text;
		}
		
		return $dataArr;
	}
	
	$hasil = load_data();
	
	echo json_encode($hasil);
}
else if (isset($_GET['del'])){
	function load_data($param){
		
		/* database static config */
		//mysql_connect('localhost','root','root');
		//mysql_select_db('db_herbarium');
		
		include '../config/database.php';
		
		if ($_GET['id'] !='')
		{
			$query = "DELETE FROM Rank WHERE Infraspecific_Rank = $param[id]";
			print_r($query);
			$result = mysql_query($query) or die (mysql_error());
			if ($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
	}
	
	echo load_data(array('id'=>$_GET['id']));
}

//untuk query select Family pada tab determination
/*
function get_specimen_code($data){
	if (!empty($data['id_parent'])){
		$querySpec = "SELECT ".$data['field_parent']." 
					FROM ".$data['table_parent']." 
					WHERE ".$data['table_parent_condition']." = ".$data['id_parent'];
		print_r($querySpec);
		$resultSpec = mysql_query($querySpec) or die (mysql_error);
		
		echo "<option value='null'></option>";
		
		while ($dataSpec = mysql_fetch_array($resultSpec)){
			$querySpecText = "SELECT * FROM ".$data['table_child']." 
								WHERE ".$data['field_child_1']." = ".$dataSpec[$data['field_parent']];
			print_r($querySpecText);
			$resultSpecText = mysql_query($querySpecText) or die (mysql_error);
			while ($dataSpecText = mysql_fetch_assoc($resultSpecText)){
				echo "<option value=".$dataSpecText[$data['field_child_1']].">".$dataSpecText[$data['field_child_2']]."</option>";
			}	
		}
	}
	
	
}
*/
?>
