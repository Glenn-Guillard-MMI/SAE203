<?php


function car_interdit($mot)
{
    $caracteres_interdits = array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $verification = str_split($mot);
    for ($i = 0; $i < strlen($mot); $i++) {
        if (in_array($verification[$i], $caracteres_interdits)) {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}


function num($mot)
{
    $caracteres_interdits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $verification = str_split($mot);
    for ($i = 0; $i < strlen($mot); $i++) {
        if (in_array($verification[$i], $caracteres_interdits)) {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}

function cara($mot)
{
    $caracteres_interdits = array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~');
    $verification = str_split($mot);
    for ($i = 0; $i < strlen($mot); $i++) {
        if (in_array($verification[$i], $caracteres_interdits)) {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}



function mdp($mot)
{
    if (strlen($mot) >= 6 && cara($mot) && num($mot)) {
        return TRUE;
        exit();
    } else {
        return FALSE;
    }



}


function verif_list($mot, $list)
{
    if (in_array($mot, $list)) {
        return true;
        exit();
    } else {
        return false;
    }

}



function verif_date_mat($df, $ds)
{
    if ($df > $ds) {
        return FALSE;
    } elseif (!strtotime($df) == TRUE && !strtotime($ds) == TRUE) {
        return FALSE;

    } else {
        return TRUE;
    }
}