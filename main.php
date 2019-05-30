<?php
    include_once('includes/config.php');

    $page = 'main';

    $user = new User();
    $trip = new Trip();

    if(!isset($_SESSION['personnr'])) {
        header("Location: index.php");
    }

    if(isset($_POST['submit'])) {
        // print_R($_POST);
        if($trip->addTrip($_POST['from'], $_POST['to'], $_POST['date'], $_POST['trip'], 99, $_SESSION['id'])) {
            $message = '<div class="alert alert-success" role="alert">
            Resan har bokats! Se dina bokningar under <span onclick="showTrips()">"Dina resor"</span> till vänster.
          </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
            Något gick fel. Vänligen försök igen.
          </div>';
        }
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

    <?php include('includes/header.php'); ?>

    <div class="mainwrapper">
        <div class="dashboard">
            <ul class="dashboard__menu">
                <li class="dashboard__menu-item active calendar-link">Din kalender</li>
                <li class="dashboard__menu-item booking-link">Boka resa</li>
                <li class="dashboard__menu-item yourtrips-link">Dina resor</li>
            </ul>
        </div>
        <section class="booking">
            <h1 class="booking__title">Din kalender</h1>
            <div class="calendar">
                <div class="calendar__month">
                    <p class="calendar__month-name"></p>
                </div>
                <div class="calendar__weekdays">
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-sunday">Söndag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">12:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">15:00</p>
                            <p class="price">99 kr</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-monday">Måndag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot calendar__busy">
                            <p class="notavailable">Ej tillgänglig</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">15:00</p>
                            <p class="price">99 kr</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-tuesday">Tisdag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">12:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot calendar__busy">
                            <p class="notavailable">Ej tillgänglig</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-wednesday">Onsdag</li>
                        <li class="calendar__bookingspot calendar__busy">
                            <p class="notavailable">Ej tillgänglig</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">12:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">15:00</p>
                            <p class="price">99 kr</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-thursday">Torsdag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot calendar__busy">
                            <p class="notavailable">Ej tillgänglig</p>
                        </li>
                        <li class="calendar__bookingspot calendar__busy">
                            <p class="notavailable">Ej tillgänglig</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-friday">Fredag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">12:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">15:00</p>
                            <p class="price">99 kr</p>
                        </li>
                    </ul>
                    <ul class="calendar__weekday">
                        <li class="calendar__weekday-saturday">Lördag</li>
                        <li class="calendar__bookingspot">
                            <p class="time">9:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot">
                            <p class="time">12:00</p>
                            <p class="price">99 kr</p>
                        </li>
                        <li class="calendar__bookingspot calendar__booked">
                        <p class="time">15:00</p>
                            <p class="price">99 kr</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="calendar__manual">
                <p class="calendar__manual-available">
                    <span></span>
                    Tillgänglig resa
                </p>
                <p class="calendar__manual-notavailable">
                    <span></span>
                    Ej tillgänglig resa
                </p>
                <p class="calendar__manual-booked">
                    <span></span>
                    Din bokade resa
                </p>
                <p class="info">Vänligen boka resa genom att klicka på <strong>"Boka resa"</strong> <span onclick="showBooking()">här</span> eller länken uppe i menyn till vänster.</p>
            </div>
        </section>

        <section class="booktrip">
            <h1 class="booktrip__title">Boka resa</h1>
            <?php if(isset($message)) echo $message; ?>
            <form method="post" autocomplete="off">
                <!-- 
                    - Från / Till (två dropdowns)
                    - Välj resedag (dropdown)
                    - Välj resa (dropdown)
                    - Skicka aviseringsmeddelande SMS (checkbox)
                    - Visa priset med hjälp av JavaScript
                 -->
                <h2 class="title">Vart vill du åka?</h2>
                <label for="from">Från:</label>
                <div class="autocomplete">
                    <input type="text" name="from" id="from" placeholder="Ange plats">
                </div>
                <label for="to">Till:</label>
                <div class="autocomplete">
                    <input type="text" name="to" id="to"  placeholder="Ange slutdestination">
                </div>
                <h2 class="title">När vill du åka?</h2>
                <label for="date">Datum:</label>
                <input type="date" name="date">
                <h2 class="title">Vilken resa väljer du?</h2>
                <label for="trip">Resa:</label>
                <select name="trip" id="trip">
                    <option value="09:00">09:00</option>
                    <option value="12:00">12:00</option>
                    <option value="15:00">15:00</option>
                </select>
                <div class="pricebox">
                    <p class="total">Totalsumma:</p>
                    <h2 class="price">99 kr</h2>
                </div>
                <input type="checkbox" name="sms" id="sms">
                <label for="sms" class="sms">Jag vill få SMS om resedetaljerna.</label>
                <input type="submit" name="submit" value="Boka resa">
            </form>

        </section>

        <section class="trips">
            <?php $result = $trip->getTripsFromUser($_SESSION['id']);
            if($result) { print_r($result);
            ?>

            <?php } else { ?>

            <?php } ?>
        </section>
    </div>

    <script src="js/main.js"></script>
    <script>
        document.querySelector('.navbar').classList.add('main-navbar');
    </script>
</body>
</html>