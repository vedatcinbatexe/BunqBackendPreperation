<?php

trait HasId {
    public string $id;

    public function generateId(): void {
        $this->id = bin2hex(random_bytes(8));
    }

    public function getId(): string {
        return $this->id;
    }
}