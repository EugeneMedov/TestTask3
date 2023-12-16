function shortenUrl(){
    let originalUrl = document.getElementById('originalUrl').value
    let xhr = new XMLHttpRequest()

    xhr.open('POST', 'ajax_handler.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.onreadystatechange = function (){
        if (xhr.readyState === 4 && xhr.status === 200){
            document.getElementById('resultContainer').innerHTML = xhr.responseText
        }
    }
    let data = 'action=shorten&originalUrl=' + encodeURIComponent(originalUrl)
    //console.log(data)
    xhr.send(data)
}

function testConnection() {
    let xhr = new XMLHttpRequest();

    xhr.open('GET', 'testConnection.php', true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log('соединение с сервером: ', xhr.responseText);
            } else {
                console.error('ошибка соединения: ', xhr.status, xhr.statusText);
            }
        }
    };

    xhr.send();
}