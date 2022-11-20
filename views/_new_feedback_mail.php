<?php

spl_autoload_register(function ($s) {
    include_once("./models/$s.class.php");
});

function new_feedback_mail(Feedback $feedback) {

    $m = "<div>";
    $m .= "<h2>We have got a new feedback from ";
    $m .= $feedback;
    $m .= "</h2>";
    $m .= "</div>";
    return $m;

}

