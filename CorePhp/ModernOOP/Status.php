<?php

// OLD WAY
/*class Status {
    public const PENDING = 'pending';
    public const PAID = 'paid';
}*/

enum Status: string {
    case PENDING = "PENDING";
    case PAID = "PAID";
    case FAILED = "FAILED";
}

function updateStatus(Status $status) {
    echo $status->value; // 'pending'
}

updateStatus(Status::PAID);
//updateStatus(Status::paid); // failed

$newStatus = Status::PAID;

// Old way

switch ($newStatus) {
    case Status::PAID:
        $message = "Thank you!";
        break;
    case Status::PENDING:
        $message = "Wait...";
        break;
}


$message = match ($newStatus) {
    Status::PENDING => "Wait...",
    Status::PAID => "Thank You",
    Status::FAILED => "Try Again",
};

echo $message;




















