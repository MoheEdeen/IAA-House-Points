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
    <title>Class Select</title>
    <link rel="stylesheet" href="admin.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <img src="../static/iaa_logo_hp.png" style="width:40px; height:40px;">
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
            <li class="nav-item">
              <a class="nav-link" href="../class-select/select.php">Classes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../top/ranks.php">Rankings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../top_earner/som.php">Top Student
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="../Main/credits.html">Credits</a>
            </li>
            <li class="nav-item ">
          <?php
session_start();

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
            echo "<a class='nav-link active' href='admin_menu.php'><b><i>ADMIN ACCESS</i></b></a>";
        }
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
            // User has admin access, display admin content
            echo '<h1 style="text-align:center"> Admin Configuration </h1>';
            echo '<div class="menu container">';
            echo '<a href="audit_log/audit_log.php"><button type="button"> <h3>Audit Log</h3> </button></a>';
            echo '<a href="email_whitelist/whitelist.php"><button type="button"> <h4>Whitelist Teacher Email</h4> </button></a>';
            echo '</div>';
        } else {
            // User does not have admin access
            echo "Account Error";
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

    
  </body>
</html>