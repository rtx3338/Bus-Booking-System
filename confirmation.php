<?php
session_start();

// Check if booking details are available in the session
if (isset($_SESSION['booking_details'])) {
    $bookingDetails = $_SESSION['booking_details'];
} else {
    // Redirect to the booking page if no booking details are found
    header("Location: book.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body    
        {
            background-image: url(https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/bus1.jpg);
            background-size: cover;
        }
        div #confirm
            {
                background-color: white;
                color:black;
            }
    </style>
    <title>Booking Confirmation</title>
</head>
<body>

<div class="container mt-5" style="background-color: white; width: 25%; text-align:center;">
    <h2>Booking Confirmation</h2>
    <p><strong>From:</strong> <?php echo $bookingDetails['from_location']; ?></p>
    <p><strong>To:</strong> <?php echo $bookingDetails['to_location']; ?></p>
    <p><strong>Date:</strong> <?php echo $bookingDetails['selected_date']; ?></p>
    <p><strong>PNR Number:</strong> <?php echo $bookingDetails['pnr']; ?></p>

    <!-- Additional confirmation details can be added here -->

    <p class="mt-3"><a href="index.php">Make Another Booking</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
