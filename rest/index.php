<?php
define ('_REST', TRUE);
/*
@mysql_pconnect('localhost', 'ambar274_root','root') or die (mysql_error);
@mysql_select_db('ambar274_db_herbarium') or die (mysql_error);

$app['path']['config_path'] = './config/';
require '../config/database.php';
*/
@mysql_pconnect('localhost', 'root','root') or die (mysql_error);
@mysql_select_db('db_herbarium') or die (mysql_error);

require 'function_rest.php';

if (isset($_GET['search'])){
	$search_by = htmlspecialchars($_GET['search']);
	
	switch ($search_by){
		case 'specimen':
		{
			if (isset($_GET['param'])){
				$param = htmlspecialchars($_GET['param']);
				
				switch ($param){
					case 'getAllSpecimen':
					{
						if (isset($_GET['limit'])){
							getAllSpecimen(array ('limit' => htmlspecialchars((int)$_GET['limit'])));
						}else{
							echo '<script type=text/javascript>alert("Data terlalu banyak, silahkan gunakan limit");</script>';
						}
					}
					break;
					case 'getSpecimenSchema':
					{
						getSpecimenSchema();
					}
					break;
				}
			}
		}
		break;
	}
}else{
	echo '<title>Web Services</title>';
	echo '<h2 align=center>Selamat datang di Web servis Herbarium</h2>';
	echo '<h6 align=center>Silahkan kontak <a href=http://ambaratan.com>Administrator</a> untuk menggunakan fungsi ini, <br>Terimakasih</h6>';
}
?>
