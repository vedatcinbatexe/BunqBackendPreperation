<?php

interface NotifierInterface {
    public function send(string $message): string;
}
