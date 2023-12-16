function shortenUrl(){
    let originalUrl = document.getElementById('originalUrl').value
    let xhr = new XMLHttpRequest()

    xhr.open('POST', 'ajax_handler.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.onreadystatechange = function (){
        if (xhr.readyState === 4 && xhr.status === 200){
            let response = JSON.parse(xhr.responseText)
            document.getElementById('resultContainer').innerHTML = JSON.parse(xhr.responseText)
        }
    }
    let data = 'action=shorten&originalUrl=' + encodeURIComponent(originalUrl)
    xhr.send(data)
}
