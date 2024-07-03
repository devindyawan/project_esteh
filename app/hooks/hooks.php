<?php

function arrayUri(): array
{
    $requestUri = $_SERVER['REQUEST_URI'];
    return explode('/', $requestUri);
}

function getUriSegment($index = 1, $compareTo = false)
{
    $uriSegments = arrayUri();

    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        $index++;
    }

    $segment = $uriSegments[$index] ?? '';

    return $compareTo === false ? $segment : $segment === $compareTo;
}

function countUriSegment()
{
    $uriSegments = arrayUri();
    $uriLength = count($uriSegments);

    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        $uriLength -= 2;
    }

    return $uriLength;
}

function home_url(): string
{
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/' . getUriSegment(0);
    } else {
        return 'https://' . $_SERVER['HTTP_HOST'] . '/';
    }
}

// Database
require_once('./model/config/config.php');
