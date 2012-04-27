<?php
defined('_IBIS') or die ('Forbidden Access');
	
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'db_herbarium';
	

@mysql_pconnect($db_host, $db_user, $db_pass) or die (mysql_error);
@mysql_select_db($db_name) or die (mysql_error);

//@mysql_pconnect($db_host, $db_user, $db_pass) or die (mysql_error);
//@mysql_select_db($db_name) or die (mysql_error);

?>
