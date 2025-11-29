<?php

class Robot {
    public function __call($name, $args) {
        echo "You told me to '$name', but I don't know hot.\n";
    }
}

$bot = new Robot();
$bot->fly();
