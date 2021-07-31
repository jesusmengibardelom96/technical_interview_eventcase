<?php 
session_start();
include "head.php";
?>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-2">
            <h3>Register</h3>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="eMail *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Delivery adress *" value="" />
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Telephone *" value="" />
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="Birthday date *" value="" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Register" />
                </div>
                <div class="form-group">
                    <a href="login.php" class="ForgetPwd">You have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>