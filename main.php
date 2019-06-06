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
            Resan har redan bokats tidigare.
          </div>';
            $tripsMessage = '<div class="alert alert-danger" role="alert">
            Resan har redan bokats tidigare.
          </div>';
        }
    }

    if(isset($_POST['deletebtn'])) {
        
        if ($trip->deleteTrip($_POST['deleteid'], $_SESSION['id'])) {
            $cancelMessage = '<div class="alert alert-danger" role="alert">
            Resan har avbokats.
          </div>';
        } else {
            $cancelMessage = '<div class="alert alert-danger" role="alert">
            Något gick fel med avbokningen.
          </div>';
        }
    }

    if(isset($_POST['saverecurringbtn'])) {
        $resultArray = $trip->saveRecurringTrip($_POST['saverecurringid'], $_SESSION['id']);

        $cancelMessage = '<div class="alert alert-' . $resultArray['class'] . '" role="alert">' . $resultArray['message'] . '</div>';
    }

    $recurringTrips = $trip->getRecurringTrips($_SESSION['id']);
    $datetime = new DateTime('tomorrow');
    $formattedDate = $datetime->format('Y-m-d');

    if(isset($_POST['bookrecurringbtn'])) {
        if($trip->bookRecurringTrip($_POST['recurring'], $_SESSION['id'], $formattedDate)) {
            $message = '<div class="alert alert-success" role="alert">
            Resan har bokats! Se dina bokningar under <span onclick="showTrips()">"Dina resor"</span> till vänster.
          </div>';
          $tripsMessage = '<div class="alert alert-success" role="alert">
          Resan har bokats!
        </div>';
        } else {
            $message = '<div class="alert alert-danger" role="alert">
            Resan har redan bokats tidigare.
          </div>';
            $tripsMessage = '<div class="alert alert-danger" role="alert">
            Resan har redan bokats tidigare.
          </div>';
        }
    }

?>

    <?php include('includes/header.php'); ?>

    <div class="mainwrapper">
        <div class="dashboard">
        <div class="fixer">
            <ul class="dashboard__menu">
                <li class="dashboard__menu-item active calendar-link">Din kalender</li>
                <li class="dashboard__menu-item booking-link">Boka resa</li>
                <li class="dashboard__menu-item yourtrips-link">Dina resor</li>
            </ul>
            <div class="accessability">
                <button class="switchtheme">Byt till mörkt läge</button>
                <div class="switchfont">
                    <label for="switchfontsize">Ändra textstorlek</label>
                    <select class="switchfontsize" id="switchfontsize">
                        <option value="small">Liten </option>
                        <option value="normal" selected>Normal </option>
                        <option value="big">Stor</option>
                    </select>
                </div>
            </div>
        </div>
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
                <p class="info">Vänligen boka resa genom att klicka på <strong>"Boka resa"</strong> <span onclick="showBooking()" class="info-link">här</span> eller länken uppe i menyn till vänster.</p>
            </div>
        </section>

        <section class="booktrip">
            <h1 class="booktrip__title">Boka resa</h1>
            <?php if(isset($message)) echo $message; ?>
            <form method="post" autocomplete="off">
                <h2 class="title">Hej, 
                <?php
                $userinfo = $user->getUserInfo($_SESSION['id']);
                echo $userinfo['firstname'];
                ?>! Vart vill du åka?</h2>
                <h3 class="usertitle">Jag vill boka återkommande resa:</h3>
                <?php if($recurringTrips) : ?>
                <select name="recurring" id="recurring" class="recurring">
                    <?php 

                    foreach($recurringTrips as $key => $value) { ?>

                <option value="<?= $value['trip_id']; ?>">
                    <?= $value['from_destination'] . '-' . $value['to_destination'] . ', ' . $datetime->format('Y-m-d') . ', ' . $value['trip']; ?>
                </option>
                    <?php }
                    ?>
                </select>
                <p class="note"><strong>Notera!</strong> Du kan endast boka återkommande resor en dag i förväg.</p>
                <input type="submit" value="Boka återkommande resa" name="bookrecurringbtn" class="recurring__btn">
                <?php else : ?>
                <p class="recurring__msg">Inga resor har sparats som återkommande. Vänligen välj återkommande resor i <span onclick="showTrips()">"Dina resor"</span>.</p>
                <?php endif; ?>
                <h3 class="usertitle">Jag bokar en resa manuellt...</h3>
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
                <!-- cdn for modernizr, if you haven't included it already -->
                <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
                <!-- polyfiller file to detect and load polyfills -->
                <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
                <script>
                webshims.setOptions('waitReady', false);
                webshims.setOptions('forms-ext', {types: 'date'});
                webshims.polyfill('forms forms-ext');
                </script>

                <input type="date" name="date" id="date" placeholder="ÅÅÅÅ-MM-DD">
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
                    <th>Boka återkommande</th>
                </tr>

                <?php $result = $trip->getTripsFromUser($_SESSION['id']);
                    if($result && $result['singleRow'] === false) {
                        foreach($result['result'] as $key => $value) { ?>
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
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="saverecurringid" value="<?= $value['id']; ?>">
                                    <input type="submit" value="Spara som återkommande" class="saverecurring" name="saverecurringbtn">
                                    </form>
                                </td>
                            </tr>

                        <?php }
                    ?>

                    <?php } elseif($result && $result['singleRow'] === true) { 
                        ?>
                        <tr>
                                <td><?= $result['result']['from_destination']; ?></td>
                                <td><?= $result['result']['to_destination']; ?></td>
                                <td><?= $result['result']['date']; ?></td>
                                <td><?= $result['result']['trip']; ?></td>
                                <td><?= $result['result']['price'] . ' SEK'; ?></td>
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="deleteid" value="<?= $result['result']['id']; ?>">
                                    <input type="submit" value="Avboka" class="unbook" name="deletebtn">
                                    </form>
                                </td>
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="saverecurringid" value="<?= $result['result']['id']; ?>">
                                    <input type="submit" value="Spara som återkommande" class="saverecurring" name="saverecurringbtn">
                                    </form>
                                </td>
                            </tr>

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