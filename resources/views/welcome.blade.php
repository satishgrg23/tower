<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        


    </head>
    <body>
        <h1>Welcome</h1>
        <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
        <script type="text/javascript">
            (function(){

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;
            
                var pusher = new Pusher('2a5f603b5889307975f1', {
                  encrypted: true
                });

                var channel = pusher.subscribe('notification_channel');
                channel.bind('App\\Events\\NotificationSystem', function(data) {
                  console.log(data);
                });
            })();
        </script>
        
    </body>
</html>
