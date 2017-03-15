<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                    <li><a href="/post/upload">Upload</a></li>
                    <li><a href="/user/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="/user">Login</a></li>
                <?php endif; ?>
        </ul>
    </nav>
</header>
