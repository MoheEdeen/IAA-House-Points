<?php
    session_start();

    if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
    
        echo "Email: $email<br>";
        echo "Name: $name";
    }
    else {
        echo "User not logged in.";
    }
?>

<a href="test.php">Click Me!</a>