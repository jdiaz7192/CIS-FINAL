<?php
class RestaurantDatabase {
    private $host = "localhost";
    private $port = "3306";
    private $database = "restaurant_reservations";
    private $user = "root";
    private $password = ""; 
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function addReservation($customerId, $reservationTime, $numberOfGuests, $specialRequests) {
        $stmt = $this->connection->prepare(
            "INSERT INTO Reservations (customerId, reservationTime, numberOfGuests, specialRequests) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("isis", $customerId, $reservationTime, $numberOfGuests, $specialRequests);
        $stmt->execute();
        $stmt->close();
    }

    public function findReservations($customerId = null) {
        if ($customerId) {
            $stmt = $this->connection->prepare(
                "SELECT reservationId, customerId, reservationTime, numberOfGuests, specialRequests FROM Reservations WHERE customerId = ?"
            );
            $stmt->bind_param("i", $customerId);
        } else {
            $stmt = $this->connection->prepare(
                "SELECT reservationId, customerId, reservationTime, numberOfGuests, specialRequests FROM Reservations"
            );
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteReservation($reservationId) {
        $stmt = $this->connection->prepare(
            "DELETE FROM Reservations WHERE reservationId = ?"
        );
        $stmt->bind_param("i", $reservationId);
        $stmt->execute();
        $stmt->close();
    }
}
?>
