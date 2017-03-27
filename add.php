<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';
require_once 'functions.php';
require_once 'header.php';

switch($_GET['type']){
    case 'domain' : {
        if( isset($_GET['domain']) && $_GET['domain'] == '' ){
            echo '<p>Domain name cannot be empty.</p>';
        } else {
            if( isset($_GET['action']) && $_GET['action'] == 'add'){
                insertDomain($pdo, $_GET['domain']);
                header('Location: add.php?type=domain&domain=' . $_GET['domain']);
            }
            if ( isset($_GET['domain'])){
                echo '<p>Domain <strong>' . $_GET['domain'] . '</strong> has been added</p>';
            }
        }
        ?>
        <p>Add new <?php echo $_GET["type"]; ?></p>
        <form method="get" action="add.php?type=domain">
            <input type="text" name="domain" id="domain" placeholder="Domain Name" class="form-control" />
            <input type="hidden" name="type" id="type" value="domain" />
            <input type="hidden" name="action" id="action" value="add" />
            <input class="btn btn-primary" type="submit" value="Submit" />
        </form>
        <?php
        break;
    }
    case 'user' : {
        if( isset($_GET['action']) && isset($_GET['domain']) && $_GET['user'] != '' && $_GET['password'] != '' && $_GET['domain'] != ''  ){
            insertUser($pdo, $_GET['user'], $_GET['password'], $_GET['domain']);
            header('Location: add.php?type=user&username=' . $_GET['user']);
        } else {

        }
        echo '<p>Add new ' . $_GET["type"] . '</p>';

        if( isset($_GET['username'] ) ){
            echo 'User <strong>' . $_GET['username'] . '</strong> has been created';
        }
        ?>
        <form method="get" action="add.php?type=user">
            <input type="text" name="user" id="user" placeholder="Username" class="form-control" />
            <input type="hidden" name="type" id="type" value="user" />
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" />
            <select name="domain" id="domain" class="form-control">
                <option disabled selected>Select domain</option>
                <?php
                foreach (getDomains($pdo) as $domain){
                    echo '<option value="' . $domain['id'] . '"> ' . $domain['name'] .  ' </option>';
                }
                ?>
            </select>
            <input type="hidden" name="action" id="action" value="add" />
            <input class="btn btn-primary" type="submit" value="Submit" />
        </form>


        <?php





        break;

    }


















    case 'alias' : {
        echo '<p>Add new ' . $_GET["type"] . '</p>';

        break;
    }
    default : {
        echo '<p>Page cannot be found</p>';
        break;
    }

}


require_once 'footer.php';