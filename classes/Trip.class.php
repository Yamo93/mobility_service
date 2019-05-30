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

    function addTrip($from_destination, $to_destination, $date, $trip, $price = 99, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO trips(from_destination, to_destination, date, trip, price, user_id) VALUES(?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssdd", $from_destination, $to_destination, $date, $trip, $price, $user_id);

        $result = $stmt->execute();
        if($stmt->error) { echo $stmt->error; }

        return $result;
    }

    function deleteTrip($id) {
        $id = intval($id);

        $sql = "DELETE FROM trips WHERE id = $id;";

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
        
        return $rows;

        } elseif($result->num_rows == 1) {
            return $result;
        } else {
            return false;
        }
        
    }
}

?>