<?php

class SmartLogger {
    public function __call($name, $args) {
        $name = strtoupper($name);
        $msg = $args[0];
        echo "[$name]: $msg\n";
    }
}

$log = new SmartLogger();

$log->error("Database is down!");
$log->warning("Disk space low.");