<?php

require_once 'NotifierInterface.php';

class EmailNotifier implements NotifierInterface {
    public function send(string $message): string {
        return "Sending Email: $message";
    }
}
