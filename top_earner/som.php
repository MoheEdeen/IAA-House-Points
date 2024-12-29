

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="../Main/themetest.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Top Student</title>
    <link rel="stylesheet" href="som.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <img src="../static/iaa_logo_hp.png" style="width:33px; height:33px;">
      <div class="container-fluid ">
        <a class="navbar-brand" href="../Main/core.php">IAA House Points</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="../Main/core.php">Home</a>
            </li>
            <?php
                session_start();

                // Create a database connection (replace with your database credentials)
                $connection = mysqli_connect('localhost', 'root', '', 'rdbmsfn_housepoints');

                // Check if the connection was successful
                if ($connection) {
                    // Query to fetch emails
                    $sql = "SELECT teacher_email FROM email_whitelist";
                    $result = mysqli_query($connection, $sql);

                    // Check if the query was successful
                    if ($result) {
                        $emailList = array();

                        // Fetch each email and add it to the $emailList array
                        while ($row = mysqli_fetch_assoc($result)) {
                            $emailList[] = $row['teacher_email'];
                        }

                        // Check if the user's email is in the $emailList array
                        if (isset($_SESSION['email']) && isset($_SESSION['name']) && in_array($_SESSION['email'], $emailList)) {
                            echo "<li><a class='nav-link' href='../class-select/select.php'>Classes</i></a>";
                        }
                    }

                    // Close the database connection
                    mysqli_close($connection);
                }
                ?>
            <li class="nav-item">
              <a class="nav-link" href="../top/ranks.php">Rankings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="som.php">Top Student
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="../Main/credits.html">Credits</a>
            </li>
            <li class="nav-item ">
          <?php


// Create a database connection (replace with your database credentials)
$connection = mysqli_connect('localhost', 'root', '', 'rdbmsfn_housepoints');

// Check if the connection was successful
if ($connection) {
    // Query to fetch emails where administrator = 'Yes'
    $sql = "SELECT teacher_email FROM email_whitelist WHERE administrator = 'Yes'";
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        $emailList = array();

        // Fetch each email and add it to the $emailList array
        while ($row = mysqli_fetch_assoc($result)) {
            $emailList[] = $row['teacher_email'];
        }

        // Check if the user's email is in the $emailList array
        if (isset($_SESSION['email']) && isset($_SESSION['name']) && in_array($_SESSION['email'], $emailList)) {
            echo "<a class='nav-link' href='../admin/admin_menu.php'><b><i>ADMIN ACCESS</i></b></a>";
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
           </li>
           <li>
                  <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'rdbmsfn_housepoints');

                    // Query to fetch emails if the connection was successful
                    if ($connection) {
                        $sql = "SELECT teacher_email FROM email_whitelist";
                        $result = mysqli_query($connection, $sql);

                        // Check if the query was successful
                        if ($result) {
                            $emailList = array();

                            // Fetch each email and add it to the $emailList array
                            while ($row = mysqli_fetch_assoc($result)) {
                                $emailList[] = $row['teacher_email'];
                            }

                            // Check if the user's email is NOT in the $emailList array
                            if (isset($_SESSION['email']) && !in_array($_SESSION['email'], $emailList)) {
                                // If email does not exist in the whitelist, echo "test"
                                echo "<a class='nav-link' href='../student_page/student.php'>Profile</a>";
                            } 
                        } else {
                            // If the query was not successful, handle the error
                            echo "Error fetching email whitelist.";
                        }

                        // Close the database connection
                        mysqli_close($connection);
                    }

                ?>
          </li>
          </ul>
          <span class="navbar-text nav-item">
          <?php

    if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    
        echo "$name";
    }
    else {
      echo '<a href="../logauth/login.php" style="text-decoration:none;">LOGIN</a>';
    }
?>

          </span>
        </div>
      </div>
    </nav>




<div class = "centered-element"> 

<?php
    $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");

    $month = date("m");
    $year = date("Y");


    $sql = "SELECT student, SUM(added_points) AS total_points
        FROM audit_log
        WHERE month = $month AND year = $year
        GROUP BY student
        ORDER BY total_points DESC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the student with the greatest total added points
    $row = $result->fetch_assoc();
    $studentName = $row["student"];
    $totalPoints = $row["total_points"];
    echo "<h2 style='text-align:center'>The Top Student for $month/$year is...</h2><br>";
    echo "<h1 style='text-align:center'>$studentName Earning $totalPoints Points!</h1>";
} else {
    echo "Student of the Month: Undetermined";
}
    mysqli_close($conn);
    

?>

</div>

