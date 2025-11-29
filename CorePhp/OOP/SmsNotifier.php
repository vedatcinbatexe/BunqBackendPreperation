<?php

require_once 'NotifierInterface.php';

class SmsNotifier implements NotifierInterface {
    public function send(string $message): string {
        return "Sending SMS: $message";
    }
}
