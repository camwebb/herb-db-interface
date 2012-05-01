<?php 
session_start();
define('_IBIS', TRUE);



?>
<head>
    <link rel="stylesheet" type="text/css" href="css/ibis_style.css">
    <script type="text/JavaScript" src="js/combobox_dinamis.js"></script>
    <script type="text/JavaScript" src="js/form_validation.js"></script>
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
			
                
            </script>
    <style type="text/css">
		td : hover{background-color:#ccd;}
    </style>
</head>
<?php

include 'database.php'; 
include 'func/references_func.php';
include 'session_list.php';
//include 'func/filter_func.php';
include 'func/filter_search.php';
include 'func/load_combobox_value.php';

if (isset($_SESSION['userID'])){
   
    //require 'load_combobox_value.php';
    ?>
        
        <div id="container">
        <div align="right" style="">
                <fieldset id="info_menu">
                    Welcome <?php echo $_SESSION['userName']; ?>,
                    <label><a href="logout.php"> Logout</a></label>
                   
                </fieldset>
                
            </div>
        <div>
            <fieldset  id="menu">
            <table border="0">
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=user" style="text-decoration:none">User</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=filter" style="text-decoration:none">Filter</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=specimen" style="text-decoration:none">Specimen</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=locality" style="text-decoration:none">Locality</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=determination" style="text-decoration:none">Determination</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=component" style="text-decoration:none">Component</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=map" style="text-decoration:none">Map</a></td>
				<td style="font-size:18px; height:40px; background-color:#cce57f;" align="center"><a href="?page=report" style="text-decoration:none">Report</a></td>
            </table>
             
            </fieldset>

        </div>
            <?php
            
            if (isset($_SESSION['specimenID_Filter'])){
				$query = "SELECT * FROM Specimen WHERE ID_Specimen = ". $_SESSION['specimenID_Filter'][0];
				//print_r($query);
				$result = mysql_query($query) or die (mysql_error);
				while ($data = mysql_fetch_array($result)){
					$ID_Specimen = $data['ID_Specimen'];
					$Collector_Name = $data['Collector_Name'];
					$Collector_Field_Number =  $data['Collector_Field_Number'];
					$Coll_Date_From = $data['Coll_Date_From'];
					$Coll_Date_To = $data['Coll_Date_To'];
				}
			}
				
            ?>
            
            <div id="content">
                <fieldset style="border-width:0px ">
                    <?php
                    if (isset($_GET['page'])){
						$page = $_GET['page'];
                        switch ($page)
                        {
                            case 'user':
                            {
                                require 'page_user.php';
                            }
                            break;
                            case 'filter':
                            {
                                require 'page_filter.php';
                            }
                            break;
                            case 'specimen':
                            {
                                require 'page_specimen.php';
                            }
                            break;
                            case 'locality':
                            {
                                require 'page_locality.php';
                            }
                            break;
                            case 'determination':
                            {
                                require 'page_determination.php';
                            }
                            break;
                            case 'component':
                            {
                                require 'page_component.php';
                            }
                            break;
                            case 'map':
                            {
                                require 'page_map.php';
                            }
                            break;
                            case 'report':
                            {
                                require 'page_report.php';
                            }
                            break;
                            case defaut:
                            {
                                
                                require 'page_user.php';
                            }
                        }
					}else{
						require 'page_user.php';
					}
                    
                    ?>
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
