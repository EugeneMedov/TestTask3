<?php
header('Content-Type: application/json');
include 'Database.php';

echo 'обработка короткой ссылки ,';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $shortURL = rtrim($_SERVER['REQUEST_URI'], '/');

    //echo  'http://localhost/' . $shortURL;

    $shortURL = 'http://localhost' . $shortURL;

    echo $shortURL;

    if (!empty($shortURL)) {

        //$url = $shortURL + '4';

        Database::connect();
        $originalUrl = Database::getOriginalUrl($shortURL);

        if (!empty($originalUrl)){
            //перенаправление на длинную ссылку
            header("Location: $originalUrl", true, 301);
            exit();
        } else {
            echo 'короткой ссылки нет в базе ,';
            header("Location: /404.php");
        }
    } else {
        echo 'неправильная короткая ссылка';
    }
} else {
    http_response_code(405);
    echo 'метод не разрешен';
}