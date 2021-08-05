<?php
session_start();
include "head.php";
if(!empty($_POST['email']) || !empty($_POST['password'])){
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];
    $password_login_encrypt = md5($password_login);
    $clients_query = db_mysql_execute_query("SELECT * FROM clients WHERE email='$email_login' AND client_password='$password_login_encrypt'");

    $clients = db_mysql_fetch_array($clients_query);
    
    if(!empty($clients)){
        $_SESSION["id_client"] = $clients["id_client"];
        $_SESSION["username"] = $clients["name"];
        $_SESSION["email"] = $clients["email"];
        $_SESSION["password"] = $clients["client_password"];
        $_SESSION["telephone"] = $clients["telephone"];
        $_SESSION["birthday_date"] = $clients["birthday_date"];
        $_SESSION["delivery_address"] = $clients["delivery_address"];
        
        header("Location: main_includes.php");
    }else{
        $error_msg = "The data is wrong, please try again";
    }
}
if(!empty($_GET['sess']) && $_GET['sess'] == 'stop'){
    session_destroy();
}
?>
<div id="login-body">
    <div id="login-bg-image">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    <?php 
                        if(!empty($_GET["msg"])){
                            echo "<div class='alert alert-success'>" . $_GET['msg'] . "</div>";
                        }

                        if(!empty($error_msg)){
                            echo "<div class='alert alert-danger'>" . $error_msg . "</div>";
                        }

                        if(!empty($_GET['err_msg'])){
                            echo "<div class='alert alert-danger'>" . $_GET['err_msg'] . "</div>";
                        }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="eMail *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                        </div>
                        <div id="button-group" class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div id="link-group" class="form-group">
                            <a href="register.php" class="ForgetPwd">Not registered yet?</a>
                            <span> | </span>
                            <a href="password.php" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>