<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

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
        <input type="text" name="gamer_name" placeholder="your nickname">
        <button id="connect" onclick="send()">connect</button>
    </div>

    <div class="container">
        <h1>8ic-8ac-8oe</h1>
        <ul id="game">
            <!-- first row -->
            <li data-pos="0,0"></li>
            <li data-pos="0,1"></li>
            <li data-pos="0,2"></li>
            <!-- second row -->
            <li data-pos="1,0"></li>
            <li data-pos="1,1"></li>
            <li data-pos="1,2"></li>
            <!-- third row -->
            <li data-pos="2,0"></li>
            <li data-pos="2,1"></li>
            <li data-pos="2,2"></li>
        </ul>

        <button id="reset-game">Reset Game</button>

        <!-- Game Messages -->
    </div>
</div>

</body>
</html>
