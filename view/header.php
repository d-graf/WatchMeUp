<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/javascript.js"></script>
    <title>WatchMeUp</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/"><img id="logo" src="/images/logo_watchmeup.png"/></a></li>
                <?php if (Security::isAdmin()) : ?>
                    <li><a href="/admin">Admin</a></li>
                <?php endif; ?>
                <?php if (Security::isLoggedIn()) : ?>
                    <li><a href="/image/upload">Upload</a></li>
                    <li><a href="/user/logout"><i class="fa fa-sign-out"></i></a></li>
                <?php else : ?>
                    <li><a href="/user">Login</a></li>
                <?php endif; ?>
        </ul>
    </nav>
</header>
