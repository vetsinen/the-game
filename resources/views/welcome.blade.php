<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>t3-game</title>
    <script>

        var socket = new WebSocket("ws://localhost:8080");
        function send(){
            console.log('we want to send '+socket.readyState);
            socket.send('some data');
        }
        socket.onopen = function () {
            console.log("Соединение установлено.");
        };

        socket.onclose = function (event) {
            if (event.wasClean) {
                console.log('Соединение закрыто чисто');
            } else {
                console.log('Обрыв соединения'); // например, "убит" процесс сервера
            }
            console.log('Код: ' + event.code + ' причина: ' + event.reason);
        };

        socket.onmessage = function (event) {
            alert("Получены данные " + event.data);
        };

        socket.onerror = function (error) {
            console.log("Ошибка " + error.message);
        };
    </script>

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        t3-game
        <button id="connect" onclick="send()">connect</button>

    </div>
</div>

</body>
</html>
