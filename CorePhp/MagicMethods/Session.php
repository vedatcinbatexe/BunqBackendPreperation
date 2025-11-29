<?php

class Session {
    private array $storage = [];

    // set function
    public function __set($name, $value) {
        $this->storage[$name] = $value;
    }

    // get function
    public function __get($name) {
        if(isset($this->storage[$name])) {
            return $this->storage[$name];
        }
        return null;
    }
}

$s = new Session();
$s->ip = "127.0.0.1";
$s->lastLogin = date("Y-m-d H:i:s");
echo "IP: " . $s->ip . "\n";
echo "LastLogin: " . $s->lastLogin . "\n";
