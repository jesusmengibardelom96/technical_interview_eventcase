<?php
session_start();
include "head.php";

$film_query = db_mysql_execute_query("SELECT * FROM films");
$films = array();

while ($film = $film_query->fetch_assoc()) {
    $films[] = $film;
}

if (!empty($_POST["close_session"])) {
    header("Location: login.php?msg=session closed correctly&sess=stop");
}
if(!empty($_GET["msg"])){
    echo "<div class='alert alert-success'>" . $_GET['msg'] . "</div>";
}
?>


<div class="filmContainer row">
    <?php if (!empty($films)) {
        foreach ($films as $film) {
    ?>
            <div class="films_film col-xs-12 col-sm-6 col-md-4">
                <div class="bg_action_film">
                </div>
                <div class="film_actions_delete_update">
                    <div class="button_action_group">
                        <?php $id_film = $film["id_film"]; ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#moreDetailsModal<?php echo $id_film; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal form to see more details of a film -->
            <div class="modal fade" id="moreDetailsModal<?php echo $id_film; ?>" tabindex="-1" aria-labelledby="moreDetailsModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalTitle">Details of a film</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php
                            $db_link = db_mysql_connection(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
                            $film_query_update = db_mysql_execute_query("SELECT * FROM films WHERE id_film=$id_film");
                            $films_update = db_mysql_fetch_array($film_query_update);      
                        ?>
                        <b>Title:</b> <?php echo $films_update["title"]; ?><br>
                        <b>Year:</b> <?php echo $films_update["year"]; ?><br>
                        <b>Number of copies:</b> <?php echo $films_update["number_of_copies"]; ?><br>
                        <b>Cost:</b> <?php echo $films_update["cost"]; ?>$<br>
                        </div>
                        <div class="modal-footer">
                            <span><small>The payment method will be cash on delivery</small></span>
                            <form action="rent_film.php" method="post">
                                <input type="hidden" name="id_film" value="<?php echo $id_film;?>">
                                <input type="submit" name="rent_film" class="btn btn-success" value="Rent">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div id="button-group" class="form-group">
        <input type="submit" name="close_session" class="btnSubmit" value="Close session" />
    </div>
</form>

