<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>PRUEBA</h1>

<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js" integrity="sha512-DjIQO7OxE8rKQrBLpVCk60Zu0mcFfNx2nVduB96yk5HS/poYZAkYu5fxpwXj3iet91Ezqq2TNN6cJh9Y5NtfWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<button onclick="pushMe()">Notificame!</button>
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

function pushMe() {
	Push.create("Hello world!", {
		body: "How's it hangin'?",
		icon: '/icon.png',
		timeout: 4000,
		onClick: function () {
		    window.focus();
		    this.close();
		}
	})
}

</script>
</body>
</html>