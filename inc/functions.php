<?php

function connectToDb() {
    $db = new PDO('mysql:host=localhost;dbname=shoppinglist;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;
}

function fetchData(PDO $db, string $sql): array {
   $query = $db->query($sql);
   $results = $query->fetchAll(PDO::FETCH_ASSOC);
   return $results;
}

function displayError(PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}