<?php

function generate_uuid(): Exception|string
{
    try {
        $out = uniqid(bin2hex(random_bytes(10)));
    } catch (Exception $exception) {
        return $exception;
    }
    return $out;
}