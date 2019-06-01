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
          $tripsMessage = '<div class="alert alert-success" role="alert">
          Resan har bokats!
        </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
            Något gick fel. Vänligen försök igen.
          </div>';
        }
    }

    if(isset($_POST['deletebtn'])) {
        
        if ($trip->deleteTrip($_POST['deleteid'])) {
            $cancelMessage = '<div class="alert alert-danger" role="alert">
            Resan har avbokats.
          </div>';
        } else {
            $cancelMessage = '<div class="alert alert-danger" role="alert">
            Något gick fel med avbokningen.
          </div>';
        }
    }

?>

    <?php include('includes/header.php'); ?>

    <div class="mainwrapper">
        <div class="dashboard">
            <ul class="dashboard__menu">
                <li class="dashboard__menu-item active calendar-link">Din kalender</li>
                <li class="dashboard__menu-item booking-link">Boka resa</li>
                <li class="dashboard__menu-item yourtrips-link">Dina resor</li>
                <li><button class="switchtheme">Byt till mörkt läge</button></li>
                <li class="switchfont">
                <label for="switchfontsize">Ändra textstorlek</label>
                <select class="switchfontsize" id="switchfontsize">
                    <option value="small">Liten </option>
                    <option value="normal" selected>Normal </option>
                    <option value="big">Stor</option>
                </select></li>
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
                <h2 class="title">Hej, 
                <?php
                $userinfo = $user->getUserInfo($_SESSION['id']);
                echo $userinfo['firstname'];
                ?>! Vart vill du åka?</h2>
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
                    <h2 class="totalprice">99 kr</h2>
                </div>
                <input type="checkbox" name="sms" id="sms">
                <label for="sms" class="sms">Jag vill få SMS om resedetaljerna.</label>
                <input type="submit" name="submit" value="Boka resa">
            </form>

        </section>

        <section class="trips">
            <?php if(isset($cancelMessage)) echo $cancelMessage; 
            if(isset($tripsMessage)) echo $tripsMessage;
            ?>
            <h1 class="trips__title">Dina bokade resor</h1>

            <table class="table">
                <tr>
                    <th>Start</th>
                    <th>Destination</th>
                    <th>Datum</th>
                    <th>Tid</th>
                    <th>Pris</th>
                    <th>Avbokning</th>
                </tr>

                <?php $result = $trip->getTripsFromUser($_SESSION['id']);
                    if($result && sizeof($result) > 1) { 
                        foreach($result as $key => $value) { ?>
                            <?php // echo $value['from_destination']; ?>
                            <tr>
                                <td><?= $value['from_destination']; ?></td>
                                <td><?= $value['to_destination']; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['trip']; ?></td>
                                <td><?= $value['price'] . ' SEK'; ?></td>
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="deleteid" value="<?= $value['id']; ?>">
                                    <input type="submit" value="Avboka" class="unbook" name="deletebtn">
                                    </form>
                                </td>
                            </tr>

                        <?php }
                    ?>

                    <?php } elseif($result && sizeof($result) === 1) { 
                        // print_r($result);
                        
                    ?>

                    <?php } ?>

            </table>
        </section>
    </div>

    <script src="js/main.js"></script>
    <script>
        document.querySelector('.navbar').classList.add('main-navbar');
    </script>
</body>
</html>