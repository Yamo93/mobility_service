<?php 
    $page = 'help';
?>

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
</head>
<body>
    <?php include('includes/header.php'); ?>
    <!-- <header class="header">
        <nav class="navbar">
                <div class="navbar__logo">
                    <img src="img/malmostad_logo_small.jpg" alt="Malmö stads logga" class="logoimg">
                    <h1>Malmö stads färdtjänst</h1>
                </div>

                <ul class="navbar__menu">
                    <li><a href="index.php">Logga in</a></li>
                    <li><a href="register.php">Skapa konto</a></li>
                    <li><a href="#" class="active">Hjälp</a></li>
                </ul>
        </nav>
    </header> -->


    <div class="helpwrapper" id="q1">
        <section class="sidebar">
            <div class="fixer">
                <h1 class="sidebar__title">Meny</h1>
                <ul class="sidebar__menu">
                    <li><a href="#q1">Vem har rätt till färdtjänst?</a></li>
                    <li><a href="#q2">Hur bokar jag resa?</a></li>
                    <li><a href="#q3">Regler om färdtjänst</a></li>
                </ul>
            </div>
        </section>
        <section class="questions">
            <div class="question">
                <div class="question__title">
                    <p>Vem har rätt till färdtjänst?</p>
                </div>
                <div class="question__content">
                <p class="question__text">Grundkraven för att kunna få färdtjänst är:</p>
                <ol id="q2">
                    <li>Man ska ha stora svårigheter att förflytta sig på egen hand.</li>
                    <li>Man ska ha svårt att på egen hand resa med den allmänna kollektivtrafiken. </li>
                    <li>samt ha en varaktig funktionsnedsättning (inte tillfällig).</li>
                    <li>Man ska vara skriven som bosatt i kommunen där man ansöker om färdtjänst. Läs mer om reglerna <a href="http://www.funkaportalen.se/guide/Stod-service/Resor/Vem-kan-fa-fardtjanst/" target="_blank" class="reference">här</a>.</li>
                </ol>
                <p class="question__text">Det är färdtjänstlagen som reglerar vem som har rätt att få färdtjänst. Beslutet tas utifrån hur svårt man har att förflytta sig på egen hand eller att använda kollektiva färdmedel. Per standard har man rätt att resa obegränsat antal resor. </p>
                <p class="question__text">Det kan dock begränsas i vissa fall, och beslutet kan reglera hur många färdtjänstresor man får göra per månad eller per år.
                Färdtjänsttillståndet får man för högst fem år. Tillståndet är individuellt anpassat utifrån personens behov och förutsättningar.</p>
                </div>
            </div>
            <div class="question">
                <div class="question__title">
                    <p>Hur bokar jag resa?</p>
                </div>
                <div class="question__content">
                <p class="question__text">För att boka resa med vår webbapp så ska du:</p>
                <ol id="q3">
                    <li>Skapa ett konto <a href="register.php" target="_blank" class="reference">här</a>.</li>
                    <li>Logga in med dina registreringsuppgifter <a href="index.php" target="_blank" class="reference">här</a>.</li>
                    <li>Leta efter passande resa på schemat.</li>
                </ol>
                <p class="question__text">Det är färdtjänstlagen som reglerar vem som har rätt att få färdtjänst. Beslutet tas utifrån hur svårt man har att förflytta sig på egen hand eller att använda kollektiva färdmedel. Per standard har man rätt att resa obegränsat antal resor. </p>
                <p class="question__text">Det kan dock begränsas i vissa fall, och beslutet kan reglera hur många färdtjänstresor man får göra per månad eller per år.
                Färdtjänsttillståndet får man för högst fem år. Tillståndet är individuellt anpassat utifrån personens behov och förutsättningar.</p>
                </div>
            </div>
            <div class="question">
                <div class="question__title">
                    <p>Regler om färdtjänst</p>
                </div>
                <div class="question__content">
                <p class="question__text">Grundkraven för att kunna få färdtjänst är:</p>
                <ol>
                    <li>Man ska ha stora svårigheter att förflytta sig på egen hand.</li>
                    <li>Man ska ha svårt att på egen hand resa med den allmänna kollektivtrafiken. </li>
                    <li>samt ha en varaktig funktionsnedsättning (inte tillfällig).</li>
                    <li>Man ska vara skriven som bosatt i kommunen där man ansöker om färdtjänst. Läs mer om reglerna <a href="http://www.funkaportalen.se/guide/Stod-service/Resor/Vem-kan-fa-fardtjanst/" target="_blank" class="reference">här</a>.</li>
                </ol>
                <p class="question__text">Det är färdtjänstlagen som reglerar vem som har rätt att få färdtjänst. Beslutet tas utifrån hur svårt man har att förflytta sig på egen hand eller att använda kollektiva färdmedel. Per standard har man rätt att resa obegränsat antal resor. </p>
                <p class="question__text">Det kan dock begränsas i vissa fall, och beslutet kan reglera hur många färdtjänstresor man får göra per månad eller per år.
                Färdtjänsttillståndet får man för högst fem år. Tillståndet är individuellt anpassat utifrån personens behov och förutsättningar.</p>
                </div>
            </div>
        </section>
    </div>


    <script src="js/main.js"></script>
</body>
</html>