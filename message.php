<?php
    # if there is any message variable set do:
    if(isset($_SESSION["message"])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>HELLO</strong> <?php echo $_SESSION["message"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    # destroy the message variable
    unset($_SESSION["message"]);
    endif;
?>