<?php include_once('config.php'); ?>

<header class="header">
    <nav class="navbar">
            <div class="navbar__logo">
                <img src="img/malmostad_logo_small.jpg" alt="Malmö stads logga" class="logoimg shrinkimg">
                <h1>Malmö stads färdtjänst</h1>
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
                    <li><a href="settings.php">Inställningar</a></li>
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
                    <li><a href="index.php">Logga in</a></li>
                    <li><a href="register.php">Skapa konto</a></li>
                    <li><a href="#" class="active">Hjälp</a></li>
                </ul>
            <?php } ?>
    </nav>
</header>