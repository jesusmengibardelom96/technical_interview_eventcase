<?php
include ("db_conn.php");
include ("db_functions.php");

// DB Connection
$db_link = db_mysql_connection(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
?>

<!-- CSS links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="../css/all.css" rel="stylesheet"> 
<link href="../css/style.css" rel="stylesheet">

<!-- JS links -->
<script src="../js/jquery_min_3-6-0.js"></script>
<script src="../js/scripts.js"></script>
<script defer src="../js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!--Title of the WebPage -->
<title>FilmAffinity</title>

