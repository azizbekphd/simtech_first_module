<?php

include("./utils/read_param.php");
spl_autoload_register(function ($s) {
    include_once("./models/$s.class.php");
});


function sent_feedbacks(): Result {
    include_once("./db/init.php");

    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $page = read_param($_GET, "page", false, 1);
            $size = read_param($_GET, "size", false, 10);
            $total = mysqli_num_rows(sql_query("SELECT * FROM feedbacks"));
            if ($total > 0) {
                $size = min($size, $total);
                $pages = ceil($total / $size);
                $page = max(1, min($page, $pages));
                $page_first_result = ($page - 1) * $size;
                $query = "SELECT * FROM feedbacks LIMIT " . $page_first_result . ", " . $size;
                $result = sql_query($query);
                $feedbacks = [];
                while ($feedback = mysqli_fetch_assoc($result)) {
                    array_push($feedbacks, Feedback::fromArray($feedback));
                }
                return new Result(
                    true,
                    [
                        "feedbacks" => $feedbacks,
                        "pagination" => [
                            "page" => $page,
                            "pages" => $pages,
                            "size" => $size,
                        ]
                    ],
                );
            } else {
                return new Result(
                    true,
                    [],
                );
            }
        } else {
            return new Result(
                false, null,
                new Exception("Only GET method is supported"),
            );
        }
    } catch (Exception $e) {
        return new Result(
            false, null,
            $e,
        );
    }

    include_once("./db/close.php");
}
