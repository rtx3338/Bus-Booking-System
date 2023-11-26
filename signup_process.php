<?php
    include("connection.php");

    //submit button is pressed 
    if (isset($_POST["submit"])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];   

        // Validate user input (you may want to add more validation)
        if (empty($username) || empty($password) || empty($confirm_password)) {
            // Handle validation errors, for example, redirect back to the signup page with an error message
            header('Location: signup.php');
            exit;
        }

        if ($password !== $confirm_password) {
            // Handle password mismatch error
            header('Location: signup.php');
            exit;
        }

        // Insert user data into the database (plaintext password)
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $res = mysqli_query($conn, $sql);


        echo var_dump($res);

        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page or the login page
            header('Location: login.php');
            exit;
        }
    }