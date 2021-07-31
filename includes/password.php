<?php
session_start();
include "head.php";
function filter_data($datos)
{
    $datos = trim($datos); // Delete whitespaces before and after of the data
    $datos = stripslashes($datos); // Delete backslashes
    $datos = htmlspecialchars($datos); // Change special characters into html
    return $datos; 
}

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email_login = $_POST["email"];

    $clients_query = db_mysql_execute_query("SELECT * FROM clients WHERE email='$email_login'");
    $clients = db_mysql_fetch_array($clients_query);

    // The password is required and must have 8 characters
    if (empty($_POST["new_password"])) {
        $errors[] = "The new password field is required";
    }

    if (strlen($_POST["new_password"]) < 8) {
        $errors[] = "The new password need 8 or more characters";
    }

    if (empty($_POST["repeat_password"])) {
        $errors[] = "The repeat password field is required";
    }

    if ($_POST["repeat_password"] != $_POST["new_password"]) {
        $errors[] = "The passwords aren't equal";
    }

    // The email is required and have to be a valid email
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "The email format is wrong";
    }

    if (empty($_POST["email"])) {
        $errors[] = "The email field is required";
    }

    if ($clients["email"] != $_POST["email"]) {
        $errors[] = "This email doesn't exists";
    }

    // If $errors are empty we assign the values
    if (empty($errors)) {
        $password = filter_data($_POST["new_password"]);
        $email = filter_data($_POST["email"]);
        $password_login_encrypt = md5($password);
        // DB Connection
        $db_link = db_mysql_connection(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
        db_mysql_execute_query("UPDATE clients SET client_password = '$password_login_encrypt' WHERE email = '$email'");

        header("Location: login.php?msg=A new password has been set, please login again");
    }
}
?>
<div id="login-body">
    <div id="login-bg-image">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>New password</h3>
                    <?php if (isset($errors)) {
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'> $error </div>";
                            }
                        }
                        ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="eMail *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="New password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat password *" value="" />
                        </div>
                        <div id="button-group" class="form-group">
                            <input type="submit" name="submit" class="btnSubmit" value="Save" />
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