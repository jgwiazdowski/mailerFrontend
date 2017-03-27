<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';
require_once 'functions.php';
require_once 'header.php';

switch($_GET['type']){
    case 'domain' : {
        echo '<p>List of ' . $_GET["type"] . 's</p>';
        echo '<ul>';
        foreach (getDomains($pdo) as $domain){
            echo '<li> ' . $domain['name'] .  ' </li>';
        }
        echo '</ul>';
        break;

    }
    case 'user' : {
        echo '<p>List of ' . $_GET["type"] . 's</p>';
        break;

    }
    case 'alias' : {
        echo '<p>List of ' . $_GET["type"] . 'es</p>';

        break;
    }
    default : {
        echo '<p>Page cannot be found</p>';
    }

}


require_once 'footer.php';