<?php defined('_IBIS') or die ('Forbidden Access'); 
   //user info
    $Current_User = $_SESSION['userName'];
    $Current_Connect_As = $_SESSION['userLevel'];
    
    //untuk mengacak nama tombol save, update dan new data
    if (isset($_GET['page'])){
		$randomSave = md5('save_data_'.$_GET['page'].'_'.date('y-m-d_H')).md5(session_id().'ovan');
		$randomNew = md5('new_data_'.$_GET['page'].'_'.date('y-m-d_H')).md5(session_id().'cop');
		$randomUpdate = md5('update_data_'.$_GET['page'].'_'.date('y-m-d_H')).md5(session_id().'pulu');
		$random = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
		
	}
    
   
   
   
    ?>
       
        <div id="container">  
			<div align="left" style="background-color:#d3e4f9; border-radius:5px 5px 0px 0px; margin-top:5px;">
                <fieldset id="info_menu">
					<span style="font-size:12px;">Research Centre For Biology - The Indonesian Institute of Sciences</span>
                    <!--
                    Welcome <?php //echo $_SESSION['userName']; ?>,
                    <label><a href="logout.php"> Logout</a></label>
                   -->
                </fieldset>
                
            </div>
        <div>
        <hr>
            <!--<fieldset  id="menu_area">-->
            <table border="0">
				<?php
					if (isset($_SESSION['specimenID_Filter'])){
						$pid = '&id='. htmlspecialchars((int) $_GET['id']);
						$current_id =  htmlspecialchars((int) $_GET['id']);
					}else{
						$pid = '';
						$current_id = 1;
					}
				?>
				<td align="center" class="menu" id="<?php if ($page == 'user') echo 'selected' ?>"><a href="?page=user<?php echo $pid; ?>" style="text-decoration:none; color:#000;" ><img src="img/icon/user.png"/>&nbsp;User</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'filter') echo 'selected' ?>"><a href="?page=filter<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/filter.png"/>&nbsp;Filter</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'specimen') echo 'selected' ?>"><a href="?page=specimen<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/specimen.png"/>&nbsp;Specimen</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'locality') echo 'selected' ?>"><a href="?page=locality<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/locality.png"/>&nbsp;Locality</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'determination') echo 'selected' ?>"><a href="?page=determination<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/determination.png"/>&nbsp;Determination</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'component') echo 'selected' ?>"><a href="?page=component<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/component.png"/>&nbsp;Component</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'map') echo 'selected' ?>"><a href="page_map.php<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/map.png"/>&nbsp;Map</a></td>
				<td align="center" class="menu" id="<?php if ($page == 'report') echo 'selected' ?>"><a href="?page=report<?php echo $pid; ?>" style="text-decoration:none; color:#000;"><img src="img/icon/report.png"/>&nbsp;Report</a></td>
            </table>
             
            <!--</fieldset>-->

        </div>
            <?php
            
            if (isset($_SESSION['specimenID_Filter'])){ 
				if (($current_id < 1) or ($current_id >= (count($_SESSION['specimenID_Filter'])) +1 )){
					echo '<script type=text/javascript>alert ("Record tidak tersedia"); window.location="./?page=specimen&id=1"</script>';
				}else{ 
					
					$query = "SELECT s.*, d.*, c.*, n.*, u.* FROM Specimen AS s 
							 LEFT JOIN Determination AS d
							 ON s.ID_Specimen = d.ID_Specimen 
							 LEFT JOIN Component AS c 
							 ON s.ID_Specimen = c.ID_Specimen
							 LEFT JOIN Local_Name As n
							 ON s.ID_Specimen = n.ID_Specimen
							 LEFT JOIN Local_Use As u
							 ON s.ID_Specimen = u.ID_Specimen
							 WHERE s.ID_Specimen = ". 
							 $_SESSION['specimenID_Filter'][$current_id - 1].
							 " LIMIT 1";
				}
				
				//print_r($query);
				$result = mysql_query($query) or die (mysql_error);
				while ($data = mysql_fetch_array($result)){
					//header info
					$ID_Specimen = $data['ID_Specimen'];
					$Collector_Name = $data['Collector_Name'];
					$Collector_Field_Number =  $data['Collector_Field_Number'];
					$Coll_Date_From = $data['Coll_Date_From'];
					$Coll_Date_To = $data['Coll_Date_To'];
					//tab specimen
					$Habit_Detail = $data['Habit_Detail'];
					$Distribution_of_Duplicates = $data['Distribution_of_Duplicates'];
					$Origin_of_Collection_Code = $data['Origin_of_Collection_Code'];
					$Status_Code = $data['Status_Code'];
					$Phenology_Code = $data['Phenology_Code'];
					$Local_Name = $data['Local_Name'];
					$Local_Use = $data['Local_Use'];
					$Language = $data['Language'];
					$Sex_Code = $data['Sex_Code'];
					$Collection_Method_Code = $data['Collection_Method_Code'];
					$Type_Code = $data['Type_Code'];
					$Data_Value = $data['Data_Value'];
					//tab locality
					$Habitat_Code = $data['Habitat_Code'];
					$Substrate_Code = $data['Substrate_Code'];
					$Habitat_Detail = $data['Habitat_Detail'];
					$Locality_Detail = $data['Locality_Detail'];
					$Country_Name = $data['Country_Name'];
					$Sub_District_Name = $data['Sub_District_Name'];
					$Major_Island_Code = $data['Major_Island_Code'];
					$Island_Name = $data['Island_Name'];
					$Province_Code = $data['Province_Code'];
					$District_Code = $data['District_Code'];
					$Alt_From = $data['Alt_From'];
					$NNP_Code = $data['NNP_Code'];
					$NNP_Distance = $data['NNP_Distance'];
					$NNP_Direction = $data['NNP_Direction'];
					$Geocode_Source = $data['Geocode_Source'];
					$Geocode_Method = $data['Geocode_Method'];
					//tab determination
					$ID_Determination = $data['ID_Determination'];
					$Det_Date = $data['Det_Date'];
					$Determination_Qualifier = $data['Determination_Qualifier'];
					$Taxonomical_Validator_By = $data['Taxonomical_Validator_By'];
					$Taxonomical_Confirmed_By = $data['Taxonomical_Confirmed_By'];
					$Publication = $data['Publication'];
					$Informal_Group_Code = $data['Informal_Group_Code'];
					$Other_Name = $data['Other_Name'];
					$Family_Code = $data['Family_Code']; 
					$Genus_Code = $data['Genus_Code'];
					$Species_Code = $data['Species_Code'];
					$Species_Author_Code = $data['Species_Author_Code'];
					//tab component
					$ID_Component = $data['ID_Component'];
					$BO_Number = $data['BO_Number'];
					$Component_Class_Code = $data['Component_Class_Code'];
					
					//footer info
					$Last_Edited_By = $data['Last_Edited_By'];
					$Last_Connect_As = $data['Connect_As'];
					$Last_Edited_Date = $data['Last_Edited_Date'];
				
					//set session ID_Specimen, ID_Determination, ID_Component berdasarkan page id
					
					$_SESSION['ID_Specimen'] =  $_SESSION['specimenID_Filter'][(int)$_GET['id']-1];
					$_SESSION['ID_Determination'] = $ID_Determination;
					$_SESSION['ID_Component'] = $ID_Component;
					
					
				}
				
				if (!empty ($Family_Code)){
					$query_family = "SELECT * FROM Family_Text WHERE ID = ".$Family_Code;
					//print_r($query_family);
					$result_family = mysql_query($query_family) or die (mysql_error);
					if (mysql_num_rows($result_family)){
						$data_family = mysql_fetch_assoc($result_family);
						$Family_Name = $data_family['Family'];
					}
				}
				

				if (!empty ($Genus_Code)){
					$query_genus = "SELECT * FROM Genus_Text WHERE ID = ".$Genus_Code;
					//print_r($query_genus);
					$result_genus = mysql_query($query_genus) or die (mysql_error);
					if (mysql_num_rows($result_family)){
						$data_genus = mysql_fetch_assoc($result_genus);
						$Genus_Name = $data_genus['Genus'];
					}
				}
				
				if (!empty ($Species_Code)){
					$query_species = "SELECT * FROM Family_Text WHERE ID = ".$Species_Code;
					//print_r($query_species);
					$result_species = mysql_query($query_species) or die (mysql_error);
					if (mysql_num_rows($result_species)){
						$data_species = mysql_fetch_assoc($result_species);
						$Species_Name = $data_species['Species'];
					}
				}
				
				
			}
			
			//insert data	
			if (isset($_SESSION['ID_Specimen'])){
				$query = "SELECT s.*, d.*, c.*, n.*, u.* FROM Specimen AS s 
							 LEFT JOIN Determination AS d
							 ON s.ID_Specimen = d.ID_Specimen 
							 LEFT JOIN Component AS c 
							 ON s.ID_Specimen = c.ID_Specimen
							 LEFT JOIN Local_Name As n
							 ON s.ID_Specimen = n.ID_Specimen
							 LEFT JOIN Local_Use As u
							 ON s.ID_Specimen = u.ID_Specimen
							 WHERE s.ID_Specimen = ". 
							 $_SESSION['ID_Specimen']." LIMIT 1";
				
				//print_r($query);
				$result = mysql_query($query) or die (mysql_error);
				while ($data = mysql_fetch_assoc($result)){
					$ID_Specimen = $data['ID_Specimen'];
					$Collector_Name = $data['Collector_Name'];
					$Collector_Field_Number =  $data['Collector_Field_Number'];
					$Coll_Date_From = $data['Coll_Date_From'];
					$Coll_Date_To = $data['Coll_Date_To'];
					//tab specimen
					$Habit_Detail = $data['Habit_Detail'];
					$Distribution_of_Duplicates = $data['Distribution_of_Duplicates'];
					$Origin_of_Collection_Code = $data['Origin_of_Collection_Code'];
					$Status_Code = $data['Status_Code'];
					$Local_Name = $data['Local_Name'];
					$Local_Use = $data['Local_Use'];
					$Language = $data['Language'];
					$Phenology_Code = $data['Phenology_Code'];
					$Sex_Code = $data['Sex_Code'];
					$Notes = $data['Notes'];
					$Collection_Method_Code = $data['Collection_Method_Code'];
					$Type_Code = $data['Type_Code'];
					$Data_Value = $data['Data_Value'];
					//tab locality
					$Habitat_Code = $data['Habitat_Code'];
					$Substrate_Code = $data['Substrate_Code'];
					$Habitat_Detail = $data['Habitat_Detail'];
					$Locality_Detail = $data['Locality_Detail'];
					$Country_Name = $data['Country_Name'];
					$Sub_District_Name = $data['Sub_District_Name'];
					$Major_Island_Code = $data['Major_Island_Code'];
					$Island_Name = $data['Island_Name'];
					$Province_Code = $data['Province_Code'];
					$District_Code = $data['District_Code'];
					$Alt_From = $data['Alt_From'];
					$NNP_Code = $data['NNP_Code'];
					$NNP_Distance = $data['NNP_Distance'];
					$NNP_Direction = $data['NNP_Direction'];
					$Geocode_Source = $data['Geocode_Source'];
					$Geocode_Method = $data['Geocode_Method'];
					//tab determination
					$Det_Date = $data['Det_Date'];
					$Determination_Qualifier = $data['Determination_Qualifier'];
					$Taxonomical_Validator_By = $data['Taxonomical_Validator_By'];
					$Taxonomical_Confirmed_By = $data['Taxonomical_Confirmed_By'];
					$Publication = $data['Publication'];
					$Informal_Group_Code = $data['Informal_Group_Code'];
					$Other_Name = $data['Other_Name'];
					$Family_Code = $data['Family_Code']; 
					$Genus_Code = $data['Genus_Code'];
					$Species_Code = $data['Species_Code'];
					$Species_Author_Code = $data['Species_Author_Code'];
					//tab component
					$BO_Number = $data['BO_Number'];
					$Component_Class_Code = $data['Component_Class_Code'];
					
					//footer info
					$Last_Edited_By = $data['Last_Edited_By'];
					$Last_Connect_As = $data['Connect_As'];
					$Last_Edited_Date = $data['Last_Edited_Date'];
					
				}
			}	
			
            ?>
            
            <div id="content">
                <fieldset style="border-width:0px ">
                    <?php
                    if (isset($_GET['page'])){
						$page = htmlspecialchars((string)$_GET['page']);
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
                            default:
                            {
                                echo '<script type=text/javascript>alert("Upss... Page Not Found"); window.location="./"</script>';
                            }
                            break;
                        }
					}else{
						require 'page_user.php';
					}
                    
                    ?>
                </fieldset>
            </div>
            
        </div>
        <div id="footer" align="center">
                <label>&copy; Created by Herbarium Team</label>
        </div>

