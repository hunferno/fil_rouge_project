<?php

switch ($action) {
    case 'redirectHome':
        require 'models/redirectionModel.php';
        goBackToHome();
        break;

    case 'numerosUtiles':
        $vue = 'numerosUtiles';
        break;

    default:
        # code...
        break;
}
