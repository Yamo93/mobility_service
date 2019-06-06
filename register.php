<?php

    include_once('includes/config.php');
    session_destroy();
    
    $page = 'register';
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

    <?php include('includes/header.php'); ?>

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
                    <label for="phonenr">Telefonnummer (*)</label>
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