<?php

include("./utils/read_param.php");
include("./views/_new_feedback_mail.php");
include("./utils/send_mail.php");
spl_autoload_register(function ($s) {
    include_once("./models/$s.class.php");
});

function send_feedback (): Result {
    include("./db/init.php");
    
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        return new Result(false, null, null);
    }
    try {
        $body = [
            "name" => read_param($_POST, "name"),
            "last_name" => read_param($_POST, "last_name"),
            "prefix" => read_param($_POST, "prefix"),
            "email" => read_param($_POST, "email"),
            "rating" => read_param($_POST, "rating"),
            "message" => read_param($_POST, "message", false),
        ];

        $application = read_param($_FILES, "application", false);
        if ($application && $application["name"]) {
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }
            $upload_filename = $upload_dir . microtime(true) . "." . pathinfo($application["name"], PATHINFO_EXTENSION);
            if (move_uploaded_file($application["tmp_name"], $upload_filename)) {
                $body["application"] = $upload_filename;
            } else {
                throw new Exception("Possible file upload attack");
            }
        }

        $body = array_filter($body, function ($item) {
            return $item != null;
        });
        $f = function($i){return "'$i'";};
        $sql = "INSERT INTO feedbacks (" .
            join(", ", array_keys($body)) .
            ") VALUES (" .
            join(", ", array_map($f, $body)) . ");"; 
        if (sql_query($sql)) {

            $new_feedback = Feedback::fromArray([
                "id" => mysqli_insert_id($GLOBALS["db_conn"]),
                ...$body,
            ]);
            send_mail("azizbekphd@gmail.com", "New feedback",
                new_feedback_mail($new_feedback));
            
            return new Result(true, $new_feedback);
        }
    } catch (Exception $e) {
        return new Result(false, null, $e);
    }
    include_once("./db/close.php");
}

