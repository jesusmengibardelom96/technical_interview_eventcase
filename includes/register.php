<?php
include "head.php";

function filter_data($datos)
{
    $datos = trim($datos); // Delete whitespaces before and after of the data
    $datos = stripslashes($datos); // Delete backslashes
    $datos = htmlspecialchars($datos); // Change special characters into html
    return $datos; 
}

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // The name is a required field
    if (empty($_POST["name"])) {
        $errors[] = "The name field is required";
    }

    // The password is required and must have 8 characters
    if (empty($_POST["password"])) {
        $errors[] = "The password field is required";
    }

    if (strlen($_POST["password"]) < 8) {
        $errors[] = "The password need 8 or more characters";
    }

    if(empty($_POST["delivery_address"])) {
        $errors[] = "The delivery address field is required";
    }

    // The email is required and have to be a valid email
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "The email format is wrong";
    }

    if (empty($_POST["email"])) {
        $errors[] = "The email field is required";
    }

    // The date has to be minor to the actual date and u have to be 18 years old

    $actual_date = date("Y/m/d");

    if ($actual_date > $_POST["birthday_date"]) {

        $actual_year = date("Y");
        $validate_date = strtotime($_POST["birthday_date"]);
        $validate_date_year = date("Y", $validate_date);
        $year_diff = $actual_year - $validate_date_year;

        if ($year_diff < 18) {
            $errors[] = "You're not 18 years old";
        }
    } else {
        $errors[] = "You couldn't been born";
    }

    // If $errors are empty we assign the values
    if (empty($errors)) {
        $name = filter_data($_POST["name"]);
        $password = filter_data($_POST["password"]);
        $delivery_address = filter_data($_POST["delivery_address"]);
        $telephone = filter_data($_POST["telephone"]);
        $birthday_date = filter_data($_POST["birthday_date"]);
        $email = filter_data($_POST["email"]);

        db_mysql_execute_query("INSERT INTO clients (name, telephone, delivery_address, email, birthday_date, client_password) 
        VALUES ('$name', $telephone, '$delivery_address', '$email', '$birthday_date', MD5('$password'))");

        header("Location: login.php?msg=You have to login with ur access data");
    }
}
?>
<div id="login-body">
    <div id="login-bg-image">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-2">
                    <h3>Register</h3>
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
                            <input type="text" class="form-control" name="name" placeholder="Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="delivery_address" placeholder="Delivery adress *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="telephone" placeholder="Telephone *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="birthday_date" placeholder="Birthday date *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                        </div>
                        <div id="button-group" class="form-group">
                            <input type="submit" name="submit" class="btnSubmit" value="Register" />
                        </div>
                        <div id="link-group" class="form-group">
                            <a href="login.php" class="ForgetPwd">You have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>