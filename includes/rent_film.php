<?php
session_start();
include "head.php";
$id_client = $_SESSION["id_client"];
$user_renting = $_SESSION["username"];
$id_film = $_POST["id_film"];

$db_link = db_mysql_connection(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
$rent_query_insert = db_mysql_execute_query("INSERT INTO rents (id_client, id_film, rented_by) VALUES ($id_client, $id_film, '$user_renting')");

$rent_insert = db_mysql_fetch_array($rent_query_insert);
header("Location: main.php?msg=The film was rented succsefully, please wait between 1 and 2 days and you will receive it");
