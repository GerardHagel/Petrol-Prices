<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ًApplication</title>
        <style>@vite('resources/css/app.css')</style>
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body>
        <div id="Menu">
        @vite('resources/js/Menu.js')
        </div>

        <div id="Main">
        @vite('resources/js/Main.js')
        </div>

        <div id="app">
            @vite('resources/js/app.js')
        </div>

        <div id="fuel-types-info">
            @vite('resources/js/FuelTypesInfo.vue')
        </div>

        <div id="fuel-saving-tips">
            @vite('resources/js/FuelSavingTips.vue')
        </div>

    </body>
</html>
