<?php


function car_interdit($mot)
{
    $caracteres_interdits = array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $verification=str_split($mot); 
    for ($i=0; $i <strlen($mot); $i++)
    {
        if (in_array($verification[$i], $caracteres_interdits))
        {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}


function num($mot)
{
    $caracteres_interdits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $verification=str_split($mot); 
    for ($i=0; $i <strlen($mot); $i++)
    {
        if (in_array($verification[$i], $caracteres_interdits))
        {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}

function cara($mot)
{
    $caracteres_interdits = array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~');
    $verification=str_split($mot); 
    for ($i=0; $i <strlen($mot); $i++)
    {
        if (in_array($verification[$i], $caracteres_interdits))
        {
            return TRUE;
            exit();
        }
    }
    return FALSE;
}



function mdp($mot)
{
if (strlen($mot)>=6 && cara($mot) && num($mot))
{
echo "MDP bon";
}
else{
echo "MDP pas bon";
}



}