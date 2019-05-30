<?php

    include_once('includes/config.php');
    session_destroy();
    
    $user = new User();

    ?>

    <?php

    $displayForm = true;
    global $displayForm;

    if(isset($_POST['registerbtn']) && isset($_POST['confirm']) && !empty($_POST['firstname'])  && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phonenr']) && !empty($_POST['personnr']) && !empty($_POST['password'])) {

        $resultArray = $user->registerUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phonenr'], $_POST['personnr'], $_POST['password']);


        extract($resultArray);

        if($arrayResult) {
            $displayForm = false;
            $message = '<div class="alertbox alertbox-' . $alertClass .  '"><p>' . $alertMessage . '</p><span class="closealert">&times;</span></div>';
        } else {
            $message = '<div class="alertbox alertbox-' . $alertClass .  '"><p>' . $alertMessage . '</p><span class="closealert">&times;</span></div>';
        }

    } elseif(isset($_POST['registerbtn']) && !isset($_POST['confirm'])) {

        $message = '<div class="alertbox" role="alert"><p>Du måste bocka av knappen för att kunna registrera dig.</p><span class="closealert">&times;</span></div>';
    }
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
    <header class="header">
        <nav class="navbar">
                <div class="navbar__logo">
                    <img src="img/malmostad_logo_small.jpg" alt="Malmö stads logga" class="logoimg">
                    <h1>Malmö stads färdtjänst</h1>
                </div>

                <ul class="navbar__menu">
                    <li><a href="index.php">Logga in</a></li>
                    <li><a href="#" class="active">Skapa konto</a></li>
                    <li><a href="help.php">Hjälp</a></li>
                </ul>
        </nav>
    </header>

    <div class="wrapper">
        <section class="register">
            <div class="register__info">
                <h1 class="register__title">Registrera ett nytt konto</h1>
                <?php
                
                if($displayForm) { ?>
                <p class="register__desc">Fyll i nedanstående formulär och registrera ett nytt konto för färdtjänst.</p>
                <?php } ?>
                <?php if(isset($message)) echo $message; ?>

                <?php if($displayForm) { ?>
                <form method="post">
                    <div class="alertbox-permanent">
                        <p>Fälten med stjärna måste fyllas i.</p>
                    </div>
                    <label for="firstname">Förnamn (*)</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Ange ditt förnamn">
                    <label for="lastname">Efternamn (*)</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Ange ditt efternamn">
                    <label for="email">E-postadress (*)</label>
                    <input type="email" name="email" id="email" placeholder="Ange din e-postadress">
                    <label for="phonenumber">Telefonnummer (*)</label>
                    <input type="number" name="phonenr" id="phonenr" placeholder="Ange ditt telefonnummer">
                    <label for="personnr">Personnummer (*)</label>
                    <input type="number" name="personnr" id="personnr" placeholder="YYYYMMDDXXXX">
                    <label for="password">Lösenord (*)</label>
                    <input type="password" name="password" id="password" placeholder="Ange lösenord">
                    <p class="fieldnote">Lösenordet måste vara minst <strong>sju</strong> tecken långt.</p>
                    <div class="gdpr">
                        <input type="checkbox" name="confirm" id="gdpr">
                        <label for="gdpr">Jag godkänner att mina personuppgifter lagras i syfte för registrering och inloggning.</label>
                    </div>
                    <input type="submit" value="Registrera" id="registerbtn" name="registerbtn">
                </form>

                <?php } else { ?>

                    <div class="successbox">
                        <h1>Grattis!</h1>
                        <p>Kontot är registrerat. Vänligen klicka på knappen nedan och logga in med dina inloggningsuppgifter.</p>
                        <a href="index.php" class="loginlink">Logga in</a>
                    </div>
                <?php } ?>
                <!-- Visa ett successmeddelande o hänvisa till inloggning -->
            </div>
        </section>
    </div>
    <script src="js/main.js"></script>
</body>
</html>