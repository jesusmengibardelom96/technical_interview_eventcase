<?php

function db_mysql_connection($db_host, $db_username, $db_pass, $db_name) {
    global $db_link;
    $db_link = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
    return $db_link;
}

function db_mysql_list_table($db_query){
    global $db_link;
    $db_link = mysqli_query($db_link, $db_query);
    return $db_link;
}

function db_mysql_num_rows($db_result){
    global $db_link;
    $db_link=mysqli_num_rows($db_result);
    return $db_link;
}

function db_mysql_fetch_array($db_result){
    global $db_link;
    $db_link=mysqli_fetch_array($db_result);
    return $db_link;
}

?>