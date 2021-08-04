<?php 
include "head.php";

$id_film_deleted = (int)$_POST['id_film'];
$film_query = db_mysql_execute_query("DELETE FROM films WHERE id_film=$id_film_deleted");
header("Location: main_admin.php");
