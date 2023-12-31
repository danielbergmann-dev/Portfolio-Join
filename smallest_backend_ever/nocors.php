<?php
cors();

// Überprüfen, ob der 'json'-Parameter vorhanden ist
if (isset($_GET['json']) && file_exists($_GET['json'] . '.json')) {
    header('Content-Type: application/json');
    echo file_get_contents($_GET['json'] . '.json');
} else {
    // Angemessene Fehlermeldung zurückgeben
    header('Content-Type: application/json');
    echo json_encode(["error" => "Datei nicht gefunden oder ungültiger Parameter"]);
}

function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    } 


    header("Access-Control-Allow-Origin: *");


    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
}
