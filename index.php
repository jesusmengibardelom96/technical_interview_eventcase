<html>
    <head>
        <?php include "includes/head.php"; ?>
    </head>
    <body>
        <?php 
            if(empty($_SESSION["username"])) header('Location: includes/login.php');
            else{
        ?>
        <?php include "includes/header.php"; ?>
        <?php include "includes/main.php"; ?>
        <?php include "includes/footer.php";?>
        <?php } ?>
    </body>
</html>