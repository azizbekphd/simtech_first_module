<?php

class Result {
    public bool $ok;
    public mixed $value;
    public ?Exception $error;

    public function __construct(bool $ok, mixed $value=null, ?Exception $error=null) {
        assert($ok ? isset($value) : true);
        $this->ok = $ok;
        $this->value = $value;
        $this->error = $error;
    }
}
