<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div id="Menu">
        @vite('resources/js/Menu.js')
        </div>

        <div id="login">
        @vite('resources/js/login.js')
        </div>
        <div id="footer">
        @vite('resources/js/footer.js')
        </div>
    </body>
</html>