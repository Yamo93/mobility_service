<?php

class Trip {

    private $trips = [];

    function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);

        // Error case
        if ($this->db->connect_errno)
        {
        printf("Fel vid anslutning", $this->db->connect_error);
        exit();
        }
    }

    function isAlreadyBooked($from_destination, $to_destination, $date, $trip, $user_id) {
        $sql = "SELECT * FROM trips WHERE from_destination = '$from_destination' AND to_destination = '$to_destination' AND date = '$date' AND trip = '$trip' AND user_id = $user_id";

        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addTrip($from_destination, $to_destination, $date, $trip, $price = 99, $user_id) {

        if($this->isAlreadyBooked($from_destination, $to_destination, $date, $trip, $user_id)) {
            return false;
        }

        $stmt = $this->db->prepare("INSERT INTO trips(from_destination, to_destination, date, trip, price, user_id) VALUES(?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssdd", $from_destination, $to_destination, $date, $trip, $price, $user_id);

        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }

        return $result;
    }

    function deleteTrip($id, $user_id) {
        $id = intval($id);

        $sql = "DELETE FROM trips WHERE id = $id AND user_id = $user_id;";

        $result = $this->db->query($sql);

        return $result;
    }

    function getTripsFromUser($user_id) {
        $sql = "SELECT * FROM trips WHERE user_id = $user_id ORDER BY created_date DESC";

        $result = $this->db->query($sql);

        if($result->num_rows > 1) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
        }
        
        return [
            'singleRow' => false,
            'result' => $rows
        ];

        } elseif($result->num_rows == 1) {
            $finalResult = $result->fetch_assoc();
            return [
                'singleRow' => true,
                'result' => $finalResult
            ];
        } else {
            return false;
        }
        
    }

    function saveRecurringTrip($trip_id, $user_id) {
        // Kolla om denna resa finns sparad bland användarens tidigare resor
        $sql = "SELECT * FROM trips WHERE user_id = $user_id AND id = $trip_id";

        $result = $this->db->query($sql);

        // Om det finns en sparad resa i resehistoriken
        if($result->num_rows > 0) {
            $resultArray = $result->fetch_assoc();
            extract($resultArray);

            // Testa om den sparade resan redan har sparats som återkommande (sök i recurring_trips för denna specifika trip)
            $query = "SELECT * FROM recurring_trips WHERE trip_id = $trip_id";

            $testResult = $this->db->query($query);
            if($testResult->num_rows > 0) {
                return ['result' => false,
                        'class' => 'danger',
                        'message' => 'Resan har redan sparats som återkommande.'
                        ];
            }

            $stmt = $this->db->prepare("INSERT INTO recurring_trips(from_destination, to_destination, trip, user_id, trip_id) VALUES(?, ?, ?, ?, ?)");

            $stmt->bind_param("sssdd", $from_destination, $to_destination, $trip, $user_id, $trip_id);
    
            $result = $stmt->execute();
            if($stmt->error) { echo $stmt->error; }
    
            return [
                'result' => $result,
                'class' => 'success',
                'message' => 'Resan har sparats som återkommande resa.'
            ];
        } else {
            return [
                'result' => false,
                'class' => 'success',
                'message' => 'Denna resa finns ej sparad i resehistoriken.'
            ];
        }
    }

    function getRecurringTrips($user_id) {
        $sql = "SELECT * FROM recurring_trips WHERE user_id = $user_id";

        $result = $this->db->query($sql);

        if($result->num_rows > 1) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
        }
        
        return $rows;

        } elseif($result->num_rows == 1) {
            return $result;
        } else {
            return false;
        }
        
    }

    function bookRecurringTrip($trip_id, $user_id, $formattedDate) {
        // Hämta information om resan från trips-tabellen
        $sql = "SELECT * FROM trips WHERE id = $trip_id AND user_id = $user_id";

        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            $resultArray = $result->fetch_assoc();
            extract($resultArray);

            // Spara ny resa i trips-tabellen
            $finalResult = $this->addTrip($from_destination, $to_destination, $formattedDate, $trip, 99, $user_id);

            return $finalResult;
        } else {
            return false;
        }
    }

}

?>