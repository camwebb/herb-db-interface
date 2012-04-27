<?php
session_start();
require 'db_connection.php';
if ($_REQUEST['login']){

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $table = 'Reference_Security';

    $query = "SELECT ID_Security FROM $table WHERE User_Name = '$username' AND Password = '$password'";
    //print_r($query);
    $result = mysql_query($query) or die (mysql_error());
    $check = mysql_num_rows($result);
    if ($check){
        $data = mysql_fetch_object($result);
        $_SESSION['id_user'] = $data->ID_Security;
        $_SESSION['username'] = $username;
        header('location:./?page=user');
    }else{
        echo 'Account tidak dikenal';
        echo "<a href='page_login.php'>Back</a>";
    }
}
?>
