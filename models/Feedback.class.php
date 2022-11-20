<?php

class Feedback {
    public int $id;
    public string $name;
    public string $last_name;
    public string $prefix;
    public string $email;
    public int $rating;
    public ?string $message = "";
    public ?string $application = "";

    public function __construct(
        int $id,
        string $name,
        string $last_name,
        string $prefix,
        string $email,
        int $rating, 
        ?string $message,
        ?string $application
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->prefix = $prefix;
        $this->email = $email;
        $this->rating = $rating;
        $this->message = $message;
        $this->application = $application;
    }

    public function __toString() {
        return "$this->prefix $this->last_name";
    }

    public static function fromArray($source): Feedback {
        return new Feedback(
            intval($source["id"]),
            $source["name"],
            $source["last_name"],
            $source["prefix"],
            $source["email"],
            intval($source["rating"]),
            isset($source["message"]) ? $source["message"] : "",
            isset($source["application"]) ? $source["application"] : "",
        );
    }
}
