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
        $users = array();
        foreach (getUsers($pdo) as $user){
            array_push($users, $user);
        }

        $final = array();
        foreach($users as $user){
            $final[$user['domain_id']][] = $user;
        }
        $tempDomain = '';
        foreach($final as $group){
            foreach($group as $key =>$g){
                if ($key == 0){
                    $tempDomain = getDomainById($pdo, $g ['domain_id'])['name'];
                    echo '<p class="lead"><strong>' . $tempDomain . '</strong></p>';
                    echo '<ul>';
                }
                echo '<li> ' . $g['email'] .  ' </li>';
            }
            echo '</ul>';
        }
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