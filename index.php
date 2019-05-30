<?php
    include_once('includes/config.php');

    $user = new User();

    if(isset($_SESSION['personnr'])) {
        header("Location: main.php");
    }


    if(isset($_POST['loginbtn']) && !empty($_POST['personnr']) && !empty($_POST['password'])) {
        if($user->loginUser($_POST['personnr'], $_POST['password'])) {
            $_SESSION['personnr'] = $_POST['personnr'];
            $user_id = $user->getUserID($_SESSION['personnr']);
            $_SESSION['id'] = $user_id;
            header("Location: main.php");
        } else {
            echo 'not logged in';
            $message = '<div class="alertbox"><p>Användarnamnet eller lösenordet är felaktigt. Vänligen försök igen.</p><span class="closealert">&times;</span></div>';
        }
    } else if (isset($_POST['loginbtn']) && (empty($_POST['personnr']) || empty($_POST['password']))) {
        $message = '<div class="alertbox" role="alert">
        <p>Användarnamnet eller lösenordet är felaktigt. Vänligen försök igen.</p><span class="closealert">&times;</span>
          </div>';
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
                <li><a href="#" class="active">Logga in</a></li>
                <li><a href="register.php">Skapa konto</a></li>
                <li><a href="help.php">Hjälp</a></li>
            </ul>
    </nav>
    </header>

    <div class="wrapper">
        <section class="frontlogin">
            <img src="img/fardtjanstbil.jpg" alt="Färdtjänstbil" class="frontlogin__img">
            <div class="frontlogin__info">
                <?php if(isset($message)) echo $message; ?>
                <h1 class="frontlogin__title">Logga in till färdtjänstappen</h1>
                <p class="frontlogin__desc">På denna sida kan du boka/avboka resor samt se dina bokade resor.</p>
                <form method="post">
                    <label for="personnr"><i class="fas fa-user form-icon"></i>Personnummer</label>
                    <input type="number" name="personnr" id="personnr" placeholder="YYYYMMDDXXXX">
                    <label for="password"><i class="fas fa-key form-icon"></i>Lösenord</label>
                    <input type="password" name="password" id="password" placeholder="Ange lösenord">
                    <input type="submit" value="Logga in" name="loginbtn" id="name="loginbtn"">
                </form>
            </div>
        </section>
    </div>
    <script src="js/main.js"></script>
</body>
</html>