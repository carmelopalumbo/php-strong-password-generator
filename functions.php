<?php

$charrepeat = $_GET['same_chars'] ?? '';
$charincludes = $_GET['characters'] ?? '';
$pwlength = $_GET['pw_length'] ?? '';


if ($pwlength >= 8 && $pwlength <= 32) {
    session_start();
    $_SESSION['charincludes'] = $charincludes;
    $_SESSION['pwlength'] = $pwlength;
    header('Location: ./password.php');
}

function getRandomPW($length, $includechar)
{
    if (in_array("numbers", $includechar) && in_array("letters", $includechar) && in_array("specialchars", $includechar)) {
        $chars = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789!@#$%^&*()');
    } elseif ((in_array("letters", $includechar) && in_array("specialchars", $includechar))) {
        $chars = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '!@#$%^&*()');
    } elseif ((in_array("letters", $includechar))) {
        $chars = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    } elseif (in_array("specialchars", $includechar)) {
        $chars = str_split('!@#$%^&*()');
    } elseif (in_array("numbers", $includechar)) {
        $chars = str_split('0123456789');
    }


    $randompw = '';

    foreach (array_rand($chars, $length) as $key) $randompw .= $chars[$key];

    return $randompw;
}
