
<script language="javascript" type="text/javascript">

function taxon_list(url) {
	newwindow=window.open(url,'name','height=500,width=500,scrollbars=yes');
	if (window.focus) {newwindow.focus()}
	return false;
}


</script>



<body>
    <form method="GET" action="controller/form_action.php">
<!--tabel frame-->

    <!--tabel header-->
        <?php require 'page_header_info.php';?>
<fieldset style="padding: 0px 0px 0px 0px; margin-bottom: 5px">
	<!--table frame konten-->
	<table border="0" width="700">
            <td>
                <!--table konten 1-->
		<table width="100%" border="0">
                    <tr>
                        <td width="100" align="right">Determiner BY </td>
			<td width="100">
                            <input type="text" name="textfield" />
			</td>
			<td width="" align="right">Date</td>
			<td width="">
                            <input type="text" name="textfield3" size="10"/>
			</td>
			<td width="" align="right">Determination Qualifier </td>
			<td width="150">
                            <select name="select" >
                                <option value=""></option>
                                <?php load_id('xQualifier', 'ID', 'Text')?>
                            </select>
			</td>
                    </tr>
                    <tr>
                        <td align="right">Confirmed By </td>
			<td>
                            <input type="text" name="textfield2" />
			</td>
			<td align="right">Date</td>
                        <td>
                            <input type="text" name="textfield4" size="10"/>
			</td>
			<td align="right">Current Determination </td>
			<td>
                            <input type="checkbox" name="checkbox" value="checkbox" />
			</td>
                    </tr>
		</table>

		<!--tabel konten 2-->
		<table  border="0">
                    <td width="300" align="right">
                    <!--tabel 1 sub konten 2-->
                        <table border="0" width="300">
                            <tr>
                                <td align="right" width="85">Family</td>
				<td>
                                    
                                    <select name='family' id="family" onChange='DinamisFamily(this)' class="combobox">
                                        <option></option>
					<?php //load_id('Family_Text','ID','Text')?>
                                    </select>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Genus</td>
                                <td>
                                    <?php
                                    if($_GET['pid']){
                                    ?>
                                    <select name="genus" id="genus" onChange='DinamisGenus(this)' class="combobox">
                                        <?php get_genus($Family_Code, $Genus_Code);
                                        ?>
                                    </select>
                                    <?php
                                    }else{
                                    ?>

                                    <select name="genus" id="genus" onChange='DinamisGenus(this)' class="combobox">
                                        <option value=""></option>

                                    </select>
                                    <?php
                                    }
                                    ?>
				</td>
                            </tr>
                            <tr>
                                <td align="right">Species</td>
                                <td>
                                    <?php
                                    if($_GET['pid']){
                                    ?>
                                    <select name="species" id="species" onChange='DinamisSpecies(this)' class="combobox">
                                        <option value=""></option>
                                        <?php get_species_selected($Genus_Code, $Species_Code);

                                        ?>
                                    </select>
                                    <?php
                                    }else{
                                    ?>
                                    <select name="species" id="species" onChange='DinamisSpecies(this)' class="combobox">
                                        <option value=""></option>

                                    </select>
                                    <?php
                                    }
                                    ?>
                               </td>
                            </tr>
                            <tr>
                                <td align="right">Author</td>
				<td>
                                    <?php
                                    if($_GET['pid']){
                                    ?>
                                    <select name="author" id="author" onChange='DinamisAuthor(this)' class="combobox">
                                        <option value=""></option>

                                        <?php get_species_author_selected($Species_Code, $Species_Author_Code);

                                        ?>
                                    </select>
                                    <?php
                                    }else{
                                    ?>
                                    <select name="author" id="author" class="combobox">
                                        <option value=""></option>

                                    </select>
                                    <?php
                                                            }
                                    ?>
				</td>
                            </tr>
			</table>
			    </td>
				<td width="">
				</td>
				<td width="400" align="right" valign="top">
					<!--tabel 2 sub konten 2-->
					<table border="1" width="">
						<tr>
							<td align="center" width="130">Rank</td>
							<td align="center">Name</td>
							<td align="center">Author</td>
						</tr>
						<tr>
							<td>
								<select name="select6" class="combobox">
								<option></option>
								<?php load_id('xRank', 'ID', 'Text')?>
								</select>
							</td>
							<td>
								<input type="text" name="textfield5" size="7" class="max_size"/>
							</td>
							<td>
								<input type="text" name="textfield9" size="7" class="max_size"/>
							</td>
						</tr>
					</table>
				</td>

			</table>

			<!--tabel konten 3-->
			<table width="" border="0">
				<tr>
					<td width="90" align="right" rowspan="2" valign="top">Publication</td>
					<td rowspan="2">
						<textarea name="textarea" cols="20" rows="" class="max_size"><?php echo $Publication?></textarea>
					</td>
					<td align="right" colspan="3" width="">Informal Group </td>
					<td width="200">
						<select name="select10" style="width:100%">
						<option></option>
						<?php load_id('xInformal_Group', 'ID', 'Text')?>
						</select>
					</td>
				</tr>
				<tr>
					
					<td align="right" colspan="3">Other Name </td>
					<td>
						<input type="text" name="textfield13" />
					</td>
				</tr>
			</table>
			<p>
                            <a href="#" onClick="taxon_list()" onclick="return popitup('view/page_taxon_list.php)">Taxon List</a>


			</p>
		</td>
		</table>

		<!--tabel footer-->
		
</fieldset>
    <?php require 'page_footer_info.php';?>
    </form>

