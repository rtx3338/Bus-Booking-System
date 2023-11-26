<?php
session_start();

// Include your database connection code here
include("connection.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique PNR
function generatePNR($conn) 
{
    // Get the current date
    $date = date("Ymd");

    // Get the next auto-increment value
    $sql = "SHOW TABLE STATUS LIKE 'bookings'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $nextAutoIncrement = $row['Auto_increment'];

    // Create the PNR by combining date and auto-increment
    $pnr = 'Q' . $date . str_pad($nextAutoIncrement, 3, '0', STR_PAD_LEFT);

    return $pnr;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fromLocation = $_POST["from_location"];
    $toLocation = $_POST["to_location"];
    $selectedDate = $_POST["selected_date"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $phoneNumber = $_POST["phone_number"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Check if from and to locations are the same
    if ($fromLocation == $toLocation) {
        echo "<script>alert('Error: From and To locations cannot be the same');</script>";
    } else {
        // Your SQL query to insert booking details into the database
        $sql = "INSERT INTO bookings (from_location, to_location, selected_date, name, age, phone_number, email, gender, pnr) VALUES ('$fromLocation', '$toLocation', '$selectedDate', '$name', '$age', '$phoneNumber', '$email', '$gender', '')";
        if ($conn->query($sql) === TRUE) {
            // Get the generated PNR and update the database
            $pnr = generatePNR($conn);
            $updateSQL = "UPDATE bookings SET pnr = '$pnr' WHERE id = LAST_INSERT_ID()";
            $conn->query($updateSQL);

            // Store booking details in session
            $_SESSION['booking_details'] = [
                'from_location' => $fromLocation,
                'to_location' => $toLocation,
                'selected_date' => $selectedDate,
                'name' => $name,
                'age' => $age,
                'phone_number' => $phoneNumber,
                'email' => $email,
                'gender' => $gender,
                'pnr' => $pnr,
            ];

            // Redirect to a confirmation page or any other page you prefer
            header("Location: confirmation.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
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
    </style>
    <title>Book Tickets</title>
</head>
<body>

<div class="container mt-5 " >
    <h2 align="center">Book Tickets</h2>
    <form action="book.php" method="post" style="background-color:white;padding:10px;max-width: 400px; margin: auto;">
    <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fromLocation">From:</label>
            <select class="form-control" id="fromLocation" name="from_location">
                <option value="Mangalore">Mangalore</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Mysuru">Mysuru</option>
                <option value="Hassan">Hassan</option>
                <option value="Chikkamangaluru">Chikkamangaluru</option>
            </select>
        </div>
        <div class="form-group">
            <label for="toLocation">To:</label>
            <select class="form-control" id="toLocation" name="to_location">
                <option value="Bangalore">Bangalore</option>
                <option value="Mangalore">Mangalore</option>
                <option value="Mysuru">Mysuru</option>
                <option value="Hassan">Hassan</option>
                <option value="Chikkamangaluru">Chikkamangaluru</option>
            </select>
        </div>
        <div class="form-group">
            <label for="selectedDate">Select Date:</label>
            <input type="date" class="form-control" id="selectedDate" name="selected_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
