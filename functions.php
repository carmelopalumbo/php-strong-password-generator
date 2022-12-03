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
    $lowerletters = str_split('abcdefghijklmnopqrstuvwxyz');
    $upperletters = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $chars = [];


    //deselezionando tutte le checkbox, include tutti i caratteri
    if (empty($includechar)) {
        $chars = array_merge($numbers, $lowerletters, $upperletters, $specials);
    } else {
        //controllo per generazione caratteri disponibili in base alle checkbox
        if (in_array("numbers", $includechar)) {
            $chars = array_merge($chars, $numbers);
        }

        if (in_array("specialchars", $includechar)) {
            $chars = array_merge($chars, $specials);
        }

        if (in_array("letters", $includechar)) {
            $chars = array_merge($chars, $lowerletters, $upperletters);
        }
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
