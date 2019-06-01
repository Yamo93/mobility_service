<?php
    include_once('includes/config.php');

    $user = new User();

    $page = 'index';

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


    <?php include('includes/header.php'); ?>

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