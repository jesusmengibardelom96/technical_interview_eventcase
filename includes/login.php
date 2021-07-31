<?php 
session_start();
include "head.php";
?>
<div id="login-body">
    <div id="login-bg-image">
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