<?php
require_once 'NotifierInterface.php';

class UserController {
    public function __construct(
        private NotifierInterface $notifier,
    ) {}


    public function notifyUser(string $msg): void {
        echo $this->notifier->send($msg);
    }
}

