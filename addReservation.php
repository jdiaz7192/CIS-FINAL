<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add Reservation</h1>
    </header>
    <main>
        <form method="POST" action="index.php?action=addReservation">
            <label>Customer ID:</label>
            <input type="text" name="customer_id" required><br>
            <label>Reservation Time:</label>
            <input type="datetime-local" name="reservation_time" required><br>
            <label>Number of Guests:</label>
            <input type="number" name="number_of_guests" required><br>
            <label>Special Requests:</label>
            <textarea name="special_requests"></textarea><br>
            <button type="submit">Submit</button>
        </form>
        <a href="index.php">Back to Home</a>
    </main>
</body>
</html>
