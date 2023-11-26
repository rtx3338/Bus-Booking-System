<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Bus Travels</title>
    
</head>
<body style="background-image:url(https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/bus1.jpg);background-size:cover;">

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Q9 Transport</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="book.php">Book Now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pnr_check_form.php">PNR Check</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Optional: Add a Jumbotron or other content -->
<div class="container mt-5">
    <div class="jumbotron" style="text-align:center;">
        <h1 class="display-4">Welcome to Q9 Transport</h1>
        <p class="lead">Book your tickets now and enjoy a comfortable journey with us.</p>
        <hr class="my-4">
        <p>Get Instant Discount Offer.</p>
    </div>
</div>
<?php
if (isset($_GET['success'])) {
    $successMessage = $_GET['success'];
    echo '<p class="success-message">' . $successMessage . '</p>';
}
?>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
