<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ًApplication</title>
<<<<<<< Updated upstream
        <style>@vite('resources/css/app.css')</style>


=======
        @vite('resources/css/app.css')
>>>>>>> Stashed changes
    </head>
    <body>
        <div id="Menu">
        @vite('resources/js/Menu.js')
        </div>

        <div id="Main">
        @vite('resources/js/Main.js')
        </div>
        <div id="footer">
        @vite('resources/js/footer.js')
        </div>
    </body>
</html>
