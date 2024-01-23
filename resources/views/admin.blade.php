<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control Panel</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://sergeysvist.com/storage/images/favicon.ico">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3S0WRQ8QXP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3S0WRQ8QXP');
    </script>

    @vite('resources/css/admin.css')
</head>
<body>
<div id="root"></div>

@viteReactRefresh
@vite('resources/js/admin/app.jsx')
</body>
</html>
