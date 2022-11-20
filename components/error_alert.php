<?php

function error_alert(Exception $e, bool $dismissable = true, string $title = "Oops...", string $subtitle = "Something went wrong") {
?>
    <div class="alert alert-danger <?php echo $dismissable ? "alert-dismissible" : "" ?> fade show" role="alert">
        <h4 class="alert-heading"><?php echo $title; ?></h4>
        <p><?php echo $subtitle; ?></p>
        <hr />
        <p><strong>Error #<?php echo $e->getCode(); ?>: </strong><?php echo $e->getMessage(); ?></p>
        <?php if ($dismissable): ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php endif; ?>
    </div>
<?php
}
?>
