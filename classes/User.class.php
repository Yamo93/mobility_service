<?php

class User {
    private $db;

    function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);

        // Error case
        if ($this->db->connect_errno)
        {
        printf("Fel vid anslutning", $mysqli->connect_error);
        exit();
        }
    }

    function isUsernameTaken($personnr) {
        $sql = "SELECT * FROM fardtjanst_users WHERE personnr = $personnr";

        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    function registerUser($firstname, $lastname, $email, $phonenr, $personnr, $password) {

        // Hanterar förnamnet
        $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        $firstname = strtolower($firstname);
        $firstname = ucfirst($firstname);

        // Hanterar efternamnet
        $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $lastname = strtolower($lastname);
        $lastname = ucfirst($lastname);

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phonenr = filter_var($phonenr, FILTER_SANITIZE_NUMBER_INT);
        $personnr = filter_var($personnr, FILTER_SANITIZE_NUMBER_INT);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        if(strlen($personnr) < 12 || (strlen($personnr) > 12)) {
            return [
                'arrayResult' => false,
                'alertClass' => 'danger',
                'alertMessage' => 'Personnumret måste vara tolv nummer.'
            ];
        }

        if(strlen($password) < 7) {
            return [
                'arrayResult' => false,
                'alertClass' => 'danger',
                'alertMessage' => 'Lösenordet är mindre än sju tecken.'
            ];
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))  {
            return [
                'arrayResult' => false,
                'alertClass' => 'danger',
                'alertMessage' => 'Mejladressen är felaktig.'
            ];
        }

        if($this->isUsernameTaken($personnr)) {
            return [
                'arrayResult' => false,
                'alertClass' => 'danger',
                'alertMessage' => 'Ett konto har redan registrerats med detta personnummer.'
            ];
        }

        $stmt = $this->db->prepare("INSERT INTO fardtjanst_users(firstname, lastname, email, phonenr, personnr, password) VALUES (?, ?, ?, ?, ?, ?)");

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param("sssdds", $firstname, $lastname, $email, $phonenr, $personnr, $password);

        $result = $stmt->execute();

        if($result) {
            return [
                'arrayResult' => $result,
                'alertClass' => 'success',
                'alertMessage' => 'Användare skapad!'
            ];
        } else {
            return [
                'arrayResult' => $result,
                'alertClass' => 'danger',
                'alertMessage' => 'Registreringen lyckades ej.'
            ];
        }

    }

    function loginUser($personnr, $password) {
        $password = $this->db->real_escape_string($password);
        $stmt = $this->db->prepare("SELECT password FROM fardtjanst_users WHERE personnr = ?");

        $stmt->bind_param("d", $personnr);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {
            return true;
        } else {
            return false;
        }
    }

    function getUserID($personnr) {
        $sql = "SELECT id FROM fardtjanst_users WHERE personnr = $personnr;";

        $result = $this->db->query($sql);
        $result = $result->fetch_assoc();

        return $result['id'];
    }

    function getUserInfo($user_id) {
        $sql = "SELECT * FROM fardtjanst_users WHERE id = $user_id;";

        $result = $this->db->query($sql);
        $result = $result->fetch_assoc();

        return $result;
    }
}

?>