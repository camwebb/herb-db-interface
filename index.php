<?php
session_start();
define('_IBIS', TRUE);

include 'database.php'; 
include 'func/references_func.php';
include 'session_list.php';
include 'func/filter_func.php';

?>
<head>
    <link rel="stylesheet" type="text/css" href="css/ibis_style.css">
    <script type="text/JavaScript" src="combobox_dinamis.js"></script>
    <!--tabs-->
    <link type="text/css" href="plugin/tabs/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="plugin/tabs/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="plugin/tabs/js/jquery-ui-1.8.18.custom.min.js"></script>
	<!--end tabs-->
	<!--map-->
	
	<!--end map-->
            <script type="text/javascript" language="javascript">
            $(function() {
				$( "#tabs" ).tabs();
			});
			
                function validasi_login(){
                    var username = document.form_login.username.value;
                    var password = document.form_login.password.value;

                    if ((username == null || username == '') || (password == null || password == '')){
                        document.getElementById("warning").innerHTML = 'Silahkan masukan account anda';
                        return false;
                    }
                    
                    
                }
            </script>
</head>
<?php
if ($_SESSION['userID']){
    
    
    //require 'load_data.php';
    ?>
        
        <div id="container">
        <div>
            <fieldset  id="menu">
				
					<div align="right" style="">
						<fieldset id="info_menu">
							Welcome <?php echo $_SESSION['username']?>,
							<label><a href="logout.php"> Logout</a></label>
						   
						</fieldset>
						
					</div>
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">User</a></li>
							<li><a href="#tabs-2">Filter</a></li>
							<li><a href="#tabs-3">Specimen</a></li>
							<li><a href="#tabs-4">Locality</a></li>
							<li><a href="#tabs-5">Determination</a></li>
							<li><a href="#tabs-6">Component</a></li>
							<li><a href="#tabs-7">Map</a></li>
							<li><a href="#tabs-8">Report</a></li>
						</ul>
						<div id="tabs-1">
							<?php include  'page_user.php';?>
						</div>
						<div id="tabs-2">
							<?php require 'page_filter.php';?>
						</div>
						<div id="tabs-3">
							<?php echo '3';require 'page_specimen.php';?>
						</div>
						<div id="tabs-4">
							<?php echo '4';require 'page_locality.php';?>
						</div>
						<div id="tabs-5">
							<?php echo '5';require 'page_determination.php';?>
						</div>
						<div id="tabs-6">
							<?php echo '6';require 'page_component.php';?>
						</div>
						<div id="tabs-7">
							<?php echo '7';require 'page_map.php';?>
						</div>
						<div id="tabs-8">
							<?php echo '8';require 'page_report.php';?>
						</div>
					</div>
	
			</fieldset>
        </div>
            
            
        </div>
        <div id="footer" align="center">
                <label>Created by Cop</label>
        </div>
        
    <?php
}else{
    require 'page_login.php';
}
?>
