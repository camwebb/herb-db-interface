<?php defined('_IBIS') or die ('Forbidden Access'); 
if (isset($_POST['login'])){
	check_login(array (
						'username' 		=> trim(mysql_real_escape_string($_POST['username'])),
						'password' 		=> trim(mysql_real_escape_string($_POST['password'])),
						'connect_as' 	=> $_POST['connect_as'],
						'connect_to' 	=> $_POST['connect_to'],
						'criteria' 		=> $_POST['criteria'],
						'token'			=> $_POST['token']
						));
}
$token = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
?>
<div style="margin: 0px auto; width: 35%; " align="center">
 <form method="post" action="" name="form_login" onsubmit="return validasi_login()">
    <fieldset style="background-color: #ccd; border-style:none; border-radius:10px; box-shadow:5px 5px 5px #666">
    <fieldset style="background-color: #999;">
        <h2>IBIS Login</h2>
    </fieldset>
    <fieldset style=" border-radius:5px 0px 5px 0px;">
       
        <table border="0" width="100%">
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Username</label>
                </td>
                <td>
                    <input type="text" name="username" value="" size="15" class="textfield">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Password</label>
                </td>
                <td>
                    <input type="password" name="password" value="" size="15" class="textfield">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Connect As</label>
                </td>
                <td>
                    <select name="connect_as" class="combobox">
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
                    <select name="connect_to" class="combobox">
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
                    <select name="criteria" class="combobox">
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
					<input type="hidden" name="token" value="<?php echo $token; ?>"/>
                    <input type="submit" name="login" value="Login"> 
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        
    </fieldset>
    </fieldset>
</form>
</div>
