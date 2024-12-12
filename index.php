<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'RestaurantDatabase.php';

class RestaurantPortal {
    private $db;

    public function __construct() {
        $this->db = new RestaurantDatabase();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';

        switch ($action) {
            case 'addReservation':
                $this->addReservation();
                break;
            case 'viewReservations':
                $this->viewReservations();
                break;
            case 'deleteReservation':
                $this->deleteReservation();
                break;
            default:
                $this->home();
        }
    }

    private function home() {
        include 'templates/home.php';
    }

    private function addReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerId = $_POST['customer_id'];
            $reservationTime = $_POST['reservation_time'];
            $numberOfGuests = $_POST['number_of_guests'];
            $specialRequests = $_POST['special_requests'];

            $this->db->addReservation($customerId, $reservationTime, $numberOfGuests, $specialRequests);
            header("Location: index.php?action=viewReservations&message=Reservation Added");
            exit;
        } else {
            include 'templates/addReservation.php';
        }
    }

    private function viewReservations() {
        $reservations = $this->db->findReservations($_GET['customerId'] ?? null);
        include 'templates/viewReservations.php';
    }

    private function deleteReservation() {
        $reservationId = $_GET['reservationId'];
        $this->db->deleteReservation($reservationId);
        header("Location: index.php?action=viewReservations&message=Reservation Deleted");
        exit;
    }
}

$portal = new RestaurantPortal();
$portal->handleRequest();
