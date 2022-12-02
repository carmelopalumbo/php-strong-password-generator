<?php

$charrepeat = $_GET['same_chars'] ?? '';
$charincludes = $_GET['characters'] ?? '';
$pwlength = $_GET['pw_length'] ?? '';

//session per pagina di output passowrd
if ($pwlength >= 8 && $pwlength <= 32) {
    session_start();
    $_SESSION['charincludes'] = $charincludes;
    $_SESSION['pwlength'] = $pwlength;
    $_SESSION['norepeat'] = $charrepeat;
    header('Location: ./password.php');
}

function getRandomPW($length, $includechar, $norepeat)
{
    //numeri e char speciali disponibili
    $numbers = str_split('0123456789');
    $specials = str_split('!@#$%^&*()');

    //controllo per generazione caratteri disponibili in base alle checkbox
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

    if ($norepeat) {

        // checkloop per numeri e caratteri speciali
        if ($chars === $numbers && $length >= 10) {
            return getDefaultPW($numbers);
        }

        if ($chars === $specials && $length >= 10) {
            return getDefaultPW($specials);
        }

        //pw senza caratteri ripetuti
        while (strlen($randompw) < $length) {
            $temp = rand(0, count($chars) - 1);
            if (!str_contains($randompw, $chars[$temp])) $randompw .= $chars[$temp];
        }
    } else {
        //pw con caratteri ripetuti
        while (strlen($randompw) < $length) {
            $temp = rand(0, count($chars) - 1);
            $randompw .= $chars[$temp];
        }
    }
    return str_shuffle($randompw);
}


//genera pw di default per evitare il loop
function getDefaultPW($arr)
{
    $randomdefault = '';
    $randomdefault = implode("", $arr);
    return str_shuffle($randomdefault);
}
