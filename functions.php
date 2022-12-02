<?php

$charrepeat = $_GET['same_chars'] ?? '';
$charincludes = $_GET['characters'] ?? '';
$pwlength = $_GET['pw_length'] ?? '';

function getRandomPW($length)
{

    $chars = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789!@#$%^&*()');

    $randompw = '';

    foreach (array_rand($chars, $length) as $key) $randompw .= $chars[$key];

    return $randompw;
}
