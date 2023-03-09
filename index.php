<?php
require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    $db = connectToDb();
    $sql = "select * from item";
    $results = fetchData($db, $sql);

    /* Unused code
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC); */
    header('HTTP/1.1 200 OK');
    print json_encode($results);
} catch (PDOException $pdoex) {
    displayError($pdoex);
}