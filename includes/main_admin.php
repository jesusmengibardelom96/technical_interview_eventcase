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
?>

<div class="filmContainer row">
    <div class="film col-xs-12 col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="bg_action_film">
        </div>
        <div class="action_film">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModalFilm">
                +
            </button>
        </div>
    </div>
    <?php if (!empty($films)) {
        foreach ($films as $film) {
    ?>
            <div class="films_film col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="bg_action_film">
                </div>
                <div class="film_actions_delete_update">
                    <div class="button_action_group">
                        <?php $id_film = $film["id_film"]; ?>
                        <!-- Button actions to update delete or see more info -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            <!--//id="liveToastBtn"-->
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#moreDetailsModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </button>
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

<!-- Modal form to insert a film -->
<div class="modal fade" id="formModalFilm" tabindex="-1" aria-labelledby="formModalFilm" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalFilmTitle">Insert a film</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="insert_film.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="year" placeholder="Year *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="number_of_copies" placeholder="Number of copies *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="cost" placeholder="Cost *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="image" placeholder="Film Image *" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save_film" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal form to update a film -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalTitle">Update a film</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_film.php" method="post">
                <div class="modal-body">
                    <?php
                        $db_link = db_mysql_connection(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
                        $film_query_update = db_mysql_execute_query("SELECT * FROM films WHERE id_film=$id_film");
                        $films_update = db_mysql_fetch_array($film_query_update);
                        
                    ?>
                    <input type="hidden" name="id_film" value="<?php echo $id_film;?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title *" value="<?php echo $films_update["title"]; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="year" placeholder="Year *" value="<?php echo $films_update["year"]; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="number_of_copies" placeholder="Number of copies *" value="<?php echo (int)$films_update["number_of_copies"]; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="cost" placeholder="Cost *" value="<?php echo (int)$films_update["cost"]; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="image" placeholder="Film Image *" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_film" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal form to see more details of a film -->
<div class="modal fade" id="moreDetailsModal" tabindex="-1" aria-labelledby="moreDetailsModal" aria-hidden="true">
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

            </div>
        </div>
    </div>
</div>

<!-- Modal form to delete a film -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Delete a film</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You want to delete this film?
            </div>

            <div class="modal-footer">
                <form action="delete_film.php" method="post">
                    <input type="hidden" name="id_film" value="<?php echo $id_film;?>">
                    <input type="submit" name="delete" class="btn btn-danger" value="Yes">
                    <input type="submit"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-success" value="No">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="" class="rounded me-2" alt="">
      <strong class="me-auto">Deleted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        The film was delete
    </div>
  </div>
</div>