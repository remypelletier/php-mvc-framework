<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/build/img/favicon.png" />
    <link rel="stylesheet" href="/build/css/style.css">
    <title>main layout</title>
</head>
<body>
    <header class="header">
        <a href="/" class="header__logo">Framework</a>
        <nav>
            <div class="header__menu-icon"><span class="navicon"></span></div>
            <ul class="header__menu">
                <li><a href="/">Home</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section class="main-container">
        {{content}}
    </section>
    <script src="/build/js/script.js"></script>
</body>
</html>