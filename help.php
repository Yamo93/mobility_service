<?php 
    $page = 'help';
?>

    <?php include('includes/header.php'); ?>

    <div class="helpwrapper" id="q1">
        <section class="sidebar">
            <div class="fixer">
                <h1 class="sidebar__title">Meny</h1>
                <ul class="sidebar__menu">
                    <li><a href="#q1" class="menuitem1">Vem har rätt till färdtjänst?</a></li>
                    <li><a href="#q2" class="menuitem2">Hur bokar jag resa?</a></li>
                    <li><a href="#q3" class="menuitem3">Regler om färdtjänst</a></li>
                </ul>
            </div>
        </section>
        <div class="questions">
            <div class="question question1">
                <div class="question__title">
                    <p>Vem har rätt till färdtjänst?</p>
                </div>
                <div class="question__content">
                <p class="question__text">Grundkraven för att kunna få färdtjänst är:</p>
                <ol>
                    <li>Man ska ha stora svårigheter att förflytta sig på egen hand.</li>
                    <li>Man ska ha svårt att på egen hand resa med den allmänna kollektivtrafiken. </li>
                    <li>samt ha en varaktig funktionsnedsättning (inte tillfällig).</li>
                    <li>Man ska vara skriven som bosatt i kommunen där man ansöker om färdtjänst. Läs mer om reglerna <a href="http://www.funkaportalen.se/guide/Stod-service/Resor/Vem-kan-fa-fardtjanst/" target="_blank" class="reference">här</a>.</li>
                </ol>
                <p class="question__text" id="q2">Det är färdtjänstlagen som reglerar vem som har rätt att få färdtjänst. Beslutet tas utifrån hur svårt man har att förflytta sig på egen hand eller att använda kollektiva färdmedel. Per standard har man rätt att resa obegränsat antal resor. </p>
                <p class="question__text">Det kan dock begränsas i vissa fall, och beslutet kan reglera hur många färdtjänstresor man får göra per månad eller per år.
                Färdtjänsttillståndet får man för högst fem år. Tillståndet är individuellt anpassat utifrån personens behov och förutsättningar.</p>
                </div>
            </div>
            <div class="question question2">
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
            <div class="question question3">
                <div class="question__title">
                    <p>Regler om färdtjänst</p>
                </div>
                <div class="question__content">
                <p class="question__text">Tillståndet för färdtjänst är individuellt anpassat utifrån personens funktionsnedsättning och förmåga att använda vanlig kollektivtrafik.</p>
                <p class="question__text">Färdtjänsttillståndet har vissa begränsningar:</p>
                    <ul>
                        <li>Färdtjänsttillståndet kan max gälla i fem år.</li>
                        <li>Tillståndet anpassas individuellt.</li>
                        <li>Tillståndet anpassas utifrån personens behov och förutsättningar.</li>
                    </ul>
                <p class="question__text">
                    Per standard så får man resa obegränsat antal resor. I vissa fall kan antalet begränsas.
                </p>
                <p class="question__text">
                    Som berättigad till färdtjänst har man rätt att ta med sig medresenär, förutsatt att hen stiger på och av samtidigt som personen själv.
                </p>
                <p class="question__text">
                    Man har rätt att ta med max två personer inklusive en medresenär och ledsagare. Vänligen läs mer om reglerna <a href="https://www.skanetrafiken.se/sa-reser-du-med-oss/om-du-reser-med-fardtjanst/regler-och-broschyrer/regler-for-fardtjanst/" target="_blank" class="reference">här</a>.
                </p>
                </div>
            </div>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>
</html>