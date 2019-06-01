<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malmö stads färdtjänst</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<header class="header">
    <nav class="navbar">
            <div class="navbar__logo">
                <img src="img/malmostad_logo_small.jpg" alt="Malmö stads logga" class="logoimg shrinkimg">
                <a href="index.php"><h1>Malmö stads färdtjänst</h1></a>
            </div>

            <?php if(isset($_SESSION['personnr'])) { ?>
                <ul class="navbar__menu">
                    <li><a href="logout.php">Logga ut</a></li>
                    <li><a href="<?php 
                        if ($page === 'main') {
                            echo '#" class="active"';
                        } else { 
                            echo 'main.php';
                        }
                    ?>">Min sida</a></li>
                    <li><a href="<?php 
                        if ($page === 'settings') {
                            echo '#" class="active"';
                        } else { 
                            echo 'settings.php';
                        }
                    ?>">Inställningar</a></li>
                    <li><a href="<?php 
                        if ($page === 'help') {
                            echo '#" class="active"';
                        } else { 
                            echo 'help.php';
                        }
                    ?>">Hjälp</a></li>
                </ul>
            <?php } else { ?>
                <ul class="navbar__menu">
                    <li><a href="<?php 
                        if ($page === 'index') {
                            echo '#" class="active"';
                        } else { 
                            echo 'index.php';
                        }
                    ?>">Logga in</a></li>
                    <li><a href="<?php 
                        if ($page === 'register') {
                            echo '#" class="active"';
                        } else { 
                            echo 'register.php';
                        }
                    ?>">Skapa konto</a></li>
                    <li><a href="<?php 
                        if ($page === 'help') {
                            echo '#" class="active"';
                        } else { 
                            echo 'help.php';
                        }
                    ?>">Hjälp</a></li>
                </ul>
            <?php } ?>
    </nav>
</header>