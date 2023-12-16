<?php
header('Content-Type: application/json');
include 'Database.php';

// принимиаем ajax

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $originalUrl = $_POST['originalUrl'];

    if (!empty($originalUrl)){
        $shortID = substr(md5(uniqid()), 0, 7);
        $shortenedUrl = "http://localhost/TestTask3/{$shortID}";
        echo $shortenedUrl;
        Database::connect();
        Database::addShortenedUrl($originalUrl, $shortenedUrl);

    } else {
        echo 'не верный url';
    }
} else {
    echo 'метод не разрешен';
}