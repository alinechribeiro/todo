<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 10 and Vue 3</title>

    @vite('resources/css/app.css')
</head>
<body class="h-full bg-gray-300 text-white">
    <nav
            class="top-0 z-50 flex-no-wrap relative flex w-full items-center justify-between py-4 bg-gray-600"
            data-te-navbar-ref>
            <div class="flex w-full flex-wrap items-center justify-between px-3">
            <h4 class="text-3xl font-bold">Todo List by Aline Ribeiro</h4>
            <div>Full-stack Recruitment Test</div>
            </div>
        </nav>
        

    <div id="app"></div>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</body>
</html>
