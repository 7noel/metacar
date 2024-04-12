<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>PRUEBA</h1>


	<button onclick="notifyMe()">Notificame!</button>
<script>

function notifyMe() {
    if (Notification) {
        if (Notification.permission !== "granted") {
            Notification.requestPermission()
        }
        let title = 'Título de la notificación';
        var extra = {
           body: 'Mensaje de la notifiación'
        }
        var noti = new Notification( title, extra)
        noti.onclick = {
            // Al hacer click
        }
        noti.onclose = {
            // Al cerrar
        }
        setTimeout( function() { noti.close() }, 10000)
    }
}

</script>
</body>
</html>