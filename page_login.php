<?php defined('_IBIS') or die ('Forbidden Access'); 
if (isset($_POST['login'])){
	check_login(array (
						'username' => trim(htmlspecialchars($_POST['username'])),
						'password' => trim(htmlspecialchars($_POST['password'])),
						'connect_as' => $_POST['connect_as'],
						'connect_to' => $_POST['connect_to'],
						'criteria' => $_POST['criteria']
						));
}
?>
<div style="margin: 0px auto; width: 30%" align="center">
 <form method="post" action="" name="form_login" onsubmit="return validasi_login()">
    <fieldset style="background-color: #99cc66; border-style:none">
    <fieldset style="background-color: #7f9919;">
        Administration Login
    </fieldset>
    <fieldset style=" border-radius:5px 0px 5px 0px;">
       
        <table border="0" width="100%">
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Username</label>
                </td>
                <td>
                    <input type="text" name="username" value="" size="15" class="max_size">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Password</label>
                </td>
                <td>
                    <input type="password" name="password" value="" size="15" class="max_size">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Connect As</label>
                </td>
                <td>
                    <select name="connect_as" class="max_size">
						<?php get_view_connect(
								array (
									'table' => 'view_connectAs', 
									'fieldID' => 'connectAsID',
									'fieldValue' => 'connectAsValue'
									)
								); 
						?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Connect To</label>
                </td>
                <td>
                    <select name="connect_to" class="max_size">
						<?php get_view_connect(
								array (
									'table' => 'view_connectTo', 
									'fieldID' => 'connectToID',
									'fieldValue' => 'connectToValue'
									)
								); 
						?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Criteria</label>
                </td>
                <td>
                    <select name="criteria" class="max_size">
						<?php get_view_connect(
								array (
									'table' => 'view_criteria', 
									'fieldID' => 'criteriaID',
									'fieldValue' => 'criteriaValue'
									)
								); 
						?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" name="login" value="Login"> 
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        
    </fieldset>
    </fieldset>
</form>
</div>
