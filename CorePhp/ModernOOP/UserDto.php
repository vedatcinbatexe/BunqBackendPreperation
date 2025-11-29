<?php

class UserDto {
    public function __construct(
        public readonly string $username,
        public readonly int $id
    ) {}
}

$u = new UserDto('Vedat', 1);
echo $u->username; // Works
// $u->username = 'Alex'; // FATAL ERROR: Cannot modify readonly property
