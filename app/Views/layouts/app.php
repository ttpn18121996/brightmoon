<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?= env('APP_NAME', 'BrightMoon') ?> <?= View::render('title') ?></title>

        <style>
            * { margin: 0; padding: 0; font-size: 16px; }
            body { font-family: 'Courier New', Courier, monospace; color: #000000; }
            a { text-decoration: none; color: #000000; }
            ul { list-style-type: none; }
            ul > li > a:hover, ul > li > span:hover { color: #818cf8; }
            .relative { position: relative; }
            .w-screen { width: 100vw; }
            .h-screen { height: 100vh; }
            .flex { display: flex; }
            .flex-row { flex-direction: row; }
            .flex-column { flex-direction: column; }
            .justify-between { justify-content: space-between; }
            .justify-center { justify-content: center; }
            .items-center { align-items: center; }
            .gap-2 { gap: .5rem; }
            .text-5xl { font-size: 3rem; }
            .text-gray-500 { color: #6b7280 }
        </style>
    </head>
    <body>
        <div class="relative w-screen h-screen flex justify-center items-center">
            <?= View::render('content') ?>
        </div>
    </body>
</html>
