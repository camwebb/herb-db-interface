<?php
session_start();
define('_IBIS', TRUE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
	<link rel="stylesheet" type="text/css" href="css/ibis_style.css">
	<link rel="stylesheet" href="css/fancybox.css" />
	
    <script type="text/JavaScript" src="js/combobox_dinamis.js"></script>
    <script type="text/JavaScript" src="js/form_validation.js"></script>
    <script type="text/JavaScript" src="js/jquery/jquery-1.7.1.min.js"></script>
    <script type="text/JavaScript" src="js/jquery/jquery.fancybox-1.3.4.js"></script>
     <script type="text/JavaScript" src="js/jquery/jquery.maskedinput-1.2.2.js"></script>
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
require 'database.php'; 
require 'func/references_func.php'; 
require 'session_list.php'; 
require 'func/insert_func.php';
require 'func/filter_search.php'; 
require 'func/load_combobox_value.php';
require 'func/update_func.php';

if (isset($_SESSION['userID'])){
	require 'dashboard.php';
}else{
	require 'page_login.php';
}
?>

</body>
</html>

