<?php

$country = null;
if($user !== null) {
    if($user->getAddress() !== null) {
        $country = $user->getAddress()->country;
    }
}


// NOW
$country = $user?->getAddress()?->country;