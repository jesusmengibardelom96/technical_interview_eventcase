<?php 
session_start();
include "head.php";

$film_query = db_mysql_execute_query("SELECT * FROM films");
$films = db_mysql_fetch_array($film_query);

if(!empty($_POST["close_session"])){
    header("Location: login.php?msg=session closed correctly&sess=stop");
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div id="button-group" class="form-group">
        <input type="submit" name="close_session" class="btnSubmit" value="Close session" />
    </div>
</form>