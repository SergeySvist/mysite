<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3S0WRQ8QXP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3S0WRQ8QXP');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sergey Svist</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://sergeysvist.com/storage/images/favicon.ico">

    @vite('resources/css/app.css')
</head>
<body>
<div id="root"></div>

@viteReactRefresh
@vite('resources/js/client/app.jsx')
</body>
</html>
