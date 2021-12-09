<?php

function goBackToHome()
{
    global $vue;
    global $email;


    if ($email) {
        $vue = 'views/users/accueil';
    } else {
        $vue = 'connexionMain';
    }
}
