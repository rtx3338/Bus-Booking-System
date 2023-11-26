<?php
session_start();

// Include your database connection code here
include("connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch booking details by PNR
function getBookingDetailsByPNR($conn, $pnr) {
    $sql = "SELECT * FROM bookings WHERE pnr = '$pnr'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        return $result->fetch_assoc();
    } else 
    {
        return null;
    }
}

// Process PNR check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pnrToCheck = $_POST["pnr"];

    // Fetch booking details by PNR
    $bookingDetails = getBookingDetailsByPNR($conn, $pnrToCheck);

    if ($bookingDetails !== null) {
        // Display the booking details
        echo "<div class='container mt-5'>";
        echo "<h2>Booking Details for PNR: $pnrToCheck</h2>";
        echo "<p><strong>From:</strong> {$bookingDetails['from_location']}</p>";
        echo "<p><strong>To:</strong> {$bookingDetails['to_location']}</p>";
        echo "<p><strong>Date:</strong> {$bookingDetails['selected_date']}</p>";
        // Add more details as needed

        echo "<p class='mt-3'><a href='pnr_check_form.php'>Check Another PNR</a></p>";
        echo "</div>";
    } else {
        // PNR not found
        echo "<div class='container mt-5'>";
        echo "<h2>Booking Details</h2>";
        echo "<p>Booking details for PNR: $pnrToCheck not found.</p>";
        echo "<p class='mt-3'><a href='pnr_check_form.php'>Try Another PNR</a></p>";
        echo "</div>";
    }
}

// Close the database connection
$conn->close();
?>
<<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/bus1.jpg);
        background-size: cover;
        text-align: center;
    }

    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 50px;
    }

    h2 {
        color: #007bff;
    }

    strong {
        color: #28a745;
    }

    p {
        margin-bottom: 10px;
    }

    .mt-3 {
        margin-top: 15px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        
    </body>
</html>