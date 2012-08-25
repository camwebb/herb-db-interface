<?php 

/* Class Name = DB
 * Variabel Input : query, result, connect, numRec
 * Variabel Input Type : Protected
 * Created By : Ovan Cop
 * Class Desc : Kumpulan fungsi database (db helper)
 */

 
class DB
{
	protected $query;
	protected $result;
	protected $connect;
	protected $numRec;
	
	public function __construct()
	{
		$this->connect = connect_db();
	}
	
	
	
	public function query($data)
	{
		
		$this->query = mysql_query($data) or die (mysql_error());
		
		return $this->query;
	}
	
	public function fetch_object($data)
	{
		$this->result = $data;
		return mysql_fetch_object($this->result);
		
	}
	
	public function _fetch_object($data, $param)
	{
		$this->result = $this->query($data) or die ($this->error);
		if ($this->num_rows($this->result))
		{
			if ($param == true)
			{
				while ($data = $this->fetch_object($this->result))
				{
					$dataArray[] = $data;
				}
			}
			else
			{
				$data = $this->fetch_object($this->result);
				$dataArray[] = $data;
			}
			
			
			return $dataArray;
		}
	}
	
	public function fetch_array($data)
	{
		$this->result = $data;
		return mysql_fetch_array($this->result);
		
	}
	
	public function fetch_field($data)
	{
		$this->result = $data;
		
		return mysql_fetch_field($this->result);
	}
	
	public function num_rows($data)
	{
		$this->numRec = mysql_num_rows($data);
		
		return $this->numRec;
	}
	
	public function insert_id($data)
	{
		return mysql_insert_id();
	}
	
	public function close_connection()
	{
		return mysql_close();
	}
	
	public function error()
	{
		$message = 'Your query error, please check again';
		return $message;
	}
	
	public function clear_var($data)
	{
		return $$data = '';
	}
	
	
	public function form_validation($data)
	{
		$valid_post_vars = $data;
							
		$dataArr = array ();			
		foreach ($valid_post_vars as $key => $value) {
			//echo $key;
			//echo $value;
			//$prefix_post_vars = "p_";
			//$valid_post_var_name = $prefix_post_vars . $i_vpv;
			
			$valid_post_var_value = trim(htmlspecialchars($value));
			
			//$$valid_post_var_name = $valid_post_var_value;

			$dataArr[$key] = $valid_post_var_value;
			
		}
		
		return $dataArr;
		//print_r($dataArr);
	}
	
}
?>