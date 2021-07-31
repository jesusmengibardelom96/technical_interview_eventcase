<?php
session_start();
include "head.php";
if(!empty($_SESSION["email"]) && !empty($_SESSION["password"])){
$user_logged = $_SESSION["email"];
$pass_logged = $_SESSION["password"];
$users_table = db_mysql_execute_query("SELECT * FROM clients WHERE email='$user_logged' AND client_password='$pass_logged'");
$users = db_mysql_fetch_array($users_table);

echo "Eres " . $users["name"];

if(!empty($_POST["close_session"])){
    header("Location: login.php?msg=session closed correctly&sess=stop");
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div id="button-group" class="form-group">
        <input type="submit" name="close_session" class="btnSubmit" value="Close session" />
    </div>
</form>
<?php }else{
    header("Location: login.php?err_msg=Error of session, please login again&sess=stop");
} ?>