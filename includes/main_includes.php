<?php
session_start();
include "head.php";
if(!empty($_SESSION["email"]) && !empty($_SESSION["password"])){
$user_logged = $_SESSION["email"];
$pass_logged = $_SESSION["password"];
$users_table = db_mysql_execute_query("SELECT * FROM clients WHERE email='$user_logged' AND client_password='$pass_logged'");
$users = db_mysql_fetch_array($users_table);

($users["name"] == "Administrator")? header("Location: main_admin.php"): header("Location: main.php");
}else{
    header("Location: login.php?err_msg=Error of session, please login again&sess=stop");
}
?>