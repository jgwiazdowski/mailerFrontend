<?php

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}

function insertDomain($pdo, $domain){
    $stmt = $pdo->prepare("INSERT INTO virtual_domains (name) VALUES(?)");
    $stmt->execute(array(
        $domain
    ));
}

function getDomains($pdo){
    $sql = "SELECT * FROM virtual_domains";
    $domains = $pdo->query($sql);
    return $domains;
}

