<?php
// process_transaction.php

// Database connection variables
$host = "localhost";
$username = "root";
$password = "";
$database = "rdbmsfn_housepoints";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is being sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST['email']) ? strtolower($_POST['email']) : '';
    $access_type = $_POST['acessType'];


    // Prepare SQL statement to guard against SQL injection
    $stmt = $conn->prepare("INSERT INTO email_whitelist (teacher_email, administrator) VALUES (?, ?)");

    // Bind the parameters to the SQL query
    $stmt->bind_param("ss", $email, $access_type);

    // Execute the query
    if ($stmt->execute()) {
        echo " <div style='display: flex; justify-content: center; align-items: center; height: 100%; width:100%;' > <img src='../../static/loading.gif' alt='Loading...' style='width: 300px;; height: 300px;'> </div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Redirect to a new page or display a success message
    // header('Location: success.html'); // Uncomment to redirect to a success page after the insert
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<!--Redirects back to main page-->
<html>
   <head>
   <meta http-equiv = "refresh" content = "2; url = whitelist.php" />
   </head>
   <body>
   <body>
</html>
