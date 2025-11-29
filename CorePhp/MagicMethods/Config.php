<?php

class Config {
    private array $settings = [
        'mode' => 'dark',
        'language' => 'tr',
    ];

    // EVENT: Triggers when you read a property that isn't public
    public function __get($name): string {
        echo "PHP: You asked for '$name', let me look for it...\n";
        return $this->settings[$name] ?? "Not Found\n";
    }
}

$conf = new Config();

echo $conf->__get('mode');
echo "\n";
echo $conf->__get('language');
echo "\n";
echo $conf->__get('asd');
