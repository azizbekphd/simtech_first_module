<?php
include("./components/navbar.php");
include("./components/error_alert.php");
include("./api/sent_feedbacks.php");
spl_autoload_register(function ($s) {
    include_once("./models/$s.class.php");
});
$result = sent_feedbacks();
?>

<main>
<?php if ($result->ok) :
    if ($result->value) :?>
        <ul class="list-group">
            <?php foreach ($result->value["feedbacks"] as $feedback): ?>
            <li class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                    #<?php echo $feedback->id . " Feedback by " . $feedback->prefix . " " .
                    $feedback->last_name . " (" . $feedback->name . " " . $feedback->last_name . ")"; ?>
                </h5>
                <small class="text-muted"><?php echo "Rating: " . $feedback->rating . "/5"; ?></small>
            </div>
            <?php if ($feedback->message): ?>
            <p class="mb-1"><?php echo $feedback->message; ?></p>
            <?php endif; ?>
            <hr />
            <div class="d-flex w-100 justify-content-flex-start">
                <a href="mailto:<?php echo $feedback->email; ?>" class="card-link">Email</a>
                <?php if ($feedback->application): ?>
                    <a href="<?php echo $feedback->application; ?>" class="card-link" download>Application file</a>
                <?php endif; ?>
            </div>
            </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($result->value["pagination"] && $result->value["pagination"]["pages"] > 1):
            $p = $result->value["pagination"];
            $s = $p["size"];
            $c = $p["page"];
            $is_first = $c <= 1;
            $is_last = $c >= $p["pages"];
            function params($page, $size) {
                return "?page=" . $page . "&size=" . $size;
            }
        ?>
        <nav aria-label="Pagination" class="mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link<?php if ($is_first) echo " disabled"; ?>" aria-label="Previous"
                        <?php if (!$is_first) echo "href=\"" . params($c-1, $s) . "\""; ?>>
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                    if ($p["pages"] <= 3) {
                        $arr = range(1, $p["pages"]);
                    } elseif ($is_first) {
                        $arr = [$c, $c+1, $c+2];
                    } elseif ($is_last) {
                        $arr = [$c-2, $c-1, $c];
                    } else {
                        $arr = [$c-1, $c, $c+1];
                    }
                    foreach ($arr as $i):
                ?>
                <li class="page-item<?php if ($i == $c) echo " active"; ?>">
                    <a class="page-link" href="<?php echo params($i, $s); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <li class="page-item">
                    <a class="page-link<?php if ($is_last) echo " disabled"; ?>" aria-label="Next"
                        <?php if (!$is_last) echo "href=\"" . params($c+1, $s) . "\""; ?>>
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif;
    else: ?>
    <h2>We have no any feedbacks yet...</h2>
    <?php endif; ?>

<?php else:
    error_alert($result->error, false);
endif; ?>
</main>
