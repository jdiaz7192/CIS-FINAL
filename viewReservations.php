<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>View Reservations</h1>
    </header>
    <main>
        <?php if (!empty($reservations)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Customer ID</th>
                        <th>Reservation Time</th>
                        <th>Number of Guests</th>
                        <th>Special Requests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?php echo $reservation['reservationId']; ?></td>
                            <td><?php echo $reservation['customerId']; ?></td>
                            <td><?php echo $reservation['reservationTime']; ?></td>
                            <td><?php echo $reservation['numberOfGuests']; ?></td>
                            <td><?php echo $reservation['specialRequests']; ?></td>
                            <td>
                                <a href="index.php?action=deleteReservation&reservationId=<?php echo $reservation['reservationId']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reservations found.</p>
        <?php endif; ?>
        <a href="index.php">Back to Home</a>
    </main>
</body>
</html>

</html>
