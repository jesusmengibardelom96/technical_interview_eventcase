<?php 
session_start();

?>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Login</h3>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="eMail *" value="" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="registration.php" class="register">Not registered yet?</a>
                </div>
                <div class="form-group">
                    <a href="password.php" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>