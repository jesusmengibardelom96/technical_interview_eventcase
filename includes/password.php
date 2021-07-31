<?php
session_start();
include "head.php";
?>
<div id="login-body">
    <div id="login-bg-image">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>New password</h3>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="eMail *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Repeat password *" value="" />
                        </div>
                        <div id="button-group" class="form-group">
                            <input type="submit" class="btnSubmit" value="Save" />
                        </div>
                        <div id="link-group" class="form-group">
                            <a href="register.php" class="ForgetPwd">Not registered yet?</a>
                            <span> | </span>
                            <a href="login.php" class="ForgetPwd">Go to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>