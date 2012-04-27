<?php defined('_IBIS') or die ('Forbidden Access'); 
if (isset($_POST['login'])){
	check_login(array (
						'username' => trim(htmlspecialchars($_POST['username'])),
						'password' => trim(htmlspecialchars($_POST['password'])),
						'connect_as' => $_POST['connect_as']
						));
}
?>
<div style="margin: 0px auto; width: 30%" align="center">
    <fieldset style=" background-color: #ccd">
    <fieldset style="">
        Administration Login
    </fieldset>
    <fieldset style=" border-radius:5px 0px 5px 0px;">
        <form method="post" action="" name="form_login" onsubmit="return validasi_login()">
        <table border="0" width="100%">
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Username</label>
                </td>
                <td>
                    <input type="text" name="username" value="" size="15">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Password</label>
                </td>
                <td>
                    <input type="password" name="password" value="" size="15">
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-family:verdana; font-size: 13px">Connect As</label>
                </td>
                <td>
                    <select name="connect_as">
						<?php get_user_account(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <label id="warning" style="font:verdana; font-size: 18px;color: red"></label>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" name="login" value="Login"> 
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        </form>
    </fieldset>
    </fieldset>
</div>
