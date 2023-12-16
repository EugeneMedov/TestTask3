<?php
header('Content-Type: application/json');
include 'Database.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $originalUrl = $_POST['originalUrl'];

    if (!empty($originalUrl)){
        $shortID = substr(md5(uniqid()), 0, 7);
        $shortenedUrl = "http://localhost/TestTask3/{$shortID}";
        echo  json_encode($shortenedUrl);
        Database::connect();
        Database::addShortenedUrl($originalUrl, $shortenedUrl);
    } else {
        echo json_encode('Неверный URL');
    }
} else {
    echo json_encode('метод не разрешен');
}