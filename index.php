<?php
session_start();
define('_IBIS', TRUE);
$app['path']['root_path'] = './';
$app['path']['config_path'] = './config/';
require $app['path']['config_path'].'config.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
	<link rel="stylesheet" type="text/css" href="<?php echo $app['path']['css_path'].'ibis_style'.$file['ext']['css_ext']; ?>">
	<link rel="stylesheet" href="<?php echo $app['path']['css_path'].'fancybox'.$file['ext']['css_ext']; ?>" />
	
    <script type="text/JavaScript" src="<?php echo $app['path']['js_path'].'combobox_dinamis'.$file['ext']['js_ext'];?>"></script>
    <script type="text/JavaScript" src="<?php echo $app['path']['js_path'].'form_validation'.$file['ext']['js_ext'];?>"></script>
    <script type="text/JavaScript" src="<?php echo $app['path']['jquery_path'].'jquery-1.7.1.min'.$file['ext']['js_ext'];?>"></script>
    <script type="text/JavaScript" src="<?php echo $app['path']['jquery_path'].'jquery.fancybox-1.3.4'.$file['ext']['js_ext'];?>"></script>
     <script type="text/JavaScript" src="<?php echo $app['path']['jquery_path'].'jquery.maskedinput-1.2.2'.$file['ext']['js_ext'];?>"></script>
    <!--fancy box script-->
    <script type="text/javascript">
		$(document).ready(function() {
			$("a#specimen_image").fancybox({
				'opacity'		: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'fade'
			});
			
		});
		
	</script>
	<!-- masking date -->
	<script type="text/javascript">
	jQuery(function($){
	   $("#Coll_Date_From").mask("9999/99/99");
	   $("#Coll_Date_To").mask("9999/99/99");
	});
</script>
    <title>
    <?php 
		$pageList = array('User', 'Filter', 'Specimen', 'Locality', 'Determination', 'Component', 'Map', 'Report');
		
		if (isset($_GET['page'])){
			if ($_GET['page'] == 'user') echo $pageList[0];else
			if ($_GET['page'] == 'filter') echo $pageList[1];else
			if ($_GET['page'] == 'specimen') echo $pageList[2];else
			if ($_GET['page'] == 'locality') echo $pageList[3];else
			if ($_GET['page'] == 'determination') echo $pageList[4];else
			if ($_GET['page'] == 'component') echo $pageList[5];else
			if ($_GET['page'] == 'map') echo $pageList[6];else
			if ($_GET['page'] == 'report') echo $pageList[7];
			
			$page = $_GET['page'];
				
		}else{
			echo 'Dashboard';
		}
		
     ?>
    
    </title>
  </head>
  
<body>

<?php

//include all function here
//require $app['path']['config_path'].'db_helper.php';
require $app['path']['config_path'].'database.php';
require $app['path']['func_path'].'references_func.php'; 
require $app['path']['config_path'].'session_list.php'; 
require $app['path']['func_path'].'insert_func.php';
require $app['path']['func_path'].'filter_search.php'; 
require $app['path']['func_path'].'update_func.php';
require $app['path']['func_path'].'filter_func.php';

// Membuat object baru

//$DBVAR = new DB();

// cek apakah user sudah login atau belum
if (isset($_SESSION['userID'])){
	require $app['path']['view_path'].'dashboard.php';
}else{
	require $app['path']['view_path'].'page_login.php';
}
?>

</body>
</html>

