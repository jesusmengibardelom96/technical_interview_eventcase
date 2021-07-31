<?php 

    $users_table = db_mysql_list_table("SELECT * FROM users");
    $users = db_mysql_fetch_array($users_table);

    $user_logged = $_SESSION["username"];

    foreach($users as $user){
        if($user == $user_logged){
            echo "Eres " . $user;
        }
    }
?>