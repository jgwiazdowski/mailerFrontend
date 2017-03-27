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


function insertUser($pdo, $user, $password, $domainId){
    $domainName = getDomainById($pdo, $domainId)['name'];

    $stmt = $pdo->prepare("INSERT INTO virtual_users(domain_id, password, email) VALUES(?, ENCRYPT(?, CONCAT('$6$', SUBSTRING(SHA(RAND()), -16))), ?)");
    $stmt->execute(array(
        $domainId,
        $password,
        $user . '@' . $domainName
    ));
}

function getDomainById($pdo, $domainId){
    $sql = 'SELECT * FROM virtual_domains where id = ' . $domainId;
    $domain = $pdo->query($sql);
    return $domain->fetch();
}


function getUsers($pdo){
    $sql = "SELECT * FROM virtual_users";
    $domains = $pdo->query($sql);
    return $domains;
}