<?php
include "head.php";

$title_film = $_POST["title"];
$year_film = $_POST["year"];
$year_date_film = strtotime($_POST["year"]);
$year_date_film_validated = date("Y", $year_date_film);
$number_of_copies = (int)$_POST["number_of_copies"];
$cost_film = (int)$_POST["cost"];
$film_query = db_mysql_execute_query("INSERT INTO films (title, year, number_of_copies, cost) VALUES ('$title_film', '$year_date_film_validated', $number_of_copies, $cost_film)");
header("Location: main_admin.php");
