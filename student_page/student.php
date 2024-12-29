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
    <link rel="stylesheet" href="student.css">
  </head>
  <body style="zoom:85%">
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
                                echo "<a class='nav-link active' href='../student_page/student.php'>Profile</a>";
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
<?php
// Create a database connection
$conn = mysqli_connect("localhost", "root", "", "rdbmsfn_housepoints");

// Check if the email and name are set in the session
if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
    $fullName = $_SESSION['name'];

    // Remove any symbols from the name and split it into first and last names
    $cleanName = preg_replace("/[^a-zA-Z ]/", "", $fullName); // Removes symbols
    $names = explode(" ", $cleanName); // Splits the name into parts
    $firstName = $names[0];
    $lastName = $names[count($names) - 1]; // Assuming the last part is the last name

    // Prepare SQL query to check if the student exists in the database
    $selectSql = "SELECT Student_of_the_Month, Inquirer, Reflective, Thinker, Caring, Balanced, Risk_Taker, Knowledgeable, Principled, Open_Minded, Communicator FROM alldata2 WHERE FIRST_NAME = ? AND LAST_NAME = ?";
    $stmt = mysqli_prepare($conn, $selectSql);
    mysqli_stmt_bind_param($stmt, "ss", $firstName, $lastName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the student exists
    if ($result && mysqli_num_rows($result) > 0) {
        $statsArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Continue with the page display using $statsArray and $firstName, $lastName
    } else {
        echo "Error: Student not found.";
        exit; // Stop further execution if the student does not exist
    }
} else {
    echo "Error: You must be logged in to view this page.";
    exit; // Stop further execution if not logged in
}

// Close the database connection
mysqli_close($conn);
?>

    <?php
    $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");
    $selectSql = "SELECT Student_of_the_Month,Inquirer,Reflective, Thinker, Caring, Balanced, Risk_Taker, Knowledgeable, Principled, Open_Minded, Communicator from alldata2 where FIRST_NAME = '$firstName' and LAST_NAME = '$lastName'";
      $result = mysqli_query($conn, $selectSql);
      $statsArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
      // print_r($statsArray);

      // print_r($statsArray);
      echo "<form method='POST'>";
      ?>

     
    <div class="update-container">
      <img src="../static/image-removebg-preview (11).png" id="ib">
      <div class="container3" style="padding-bottom:20px;">
        <p style="align-self:center; font-weight:bold; font-size:32px; margin-bottom: 10px;"><?php echo $firstName . ' ' . $lastName;
        ?></p>
        <h1 style="align-self:center; font-weight:bold; font-size:20px; margin-bottom: 10px;">Student of the Month</h1>
        <p class="point-show"><?php echo $statsArray[0]['Student_of_the_Month']?></p>
      </div>
      <div class="container2" style="padding-bottom:20px;">
        <div class="container3">
          <p>Inquirer</p>
          <p class="point-show"><?php echo $statsArray[0]['Inquirer']?></p>
        </div>
        <div class="container3">
          <p>Reflective</p>
          <p class="point-show"><?php echo $statsArray[0]['Reflective']?></p>
        </div>
        <div class="container3">
          <p>Thinker</p>
          <p class="point-show"><?php echo $statsArray[0]['Thinker']?></p>
        </div>
        <div class="container3">
          <p>Caring</p>
          <p class="point-show"><?php echo $statsArray[0]['Caring']?></p>
        </div>
        <div class="container3">
          <p>Balanced</p>
          <p class="point-show"><?php echo $statsArray[0]['Balanced']?></p>
        </div>
      </div>
      <div class="container2">
        <div class="container3">
          <p>Risk Taker</p>
          <p class="point-show"><?php echo $statsArray[0]['Risk_Taker']?></p>
        </div>
        <div class="container3">
          <p>Knowledgeable</p>
          <p class="point-show"><?php echo $statsArray[0]['Knowledgeable']?></p>
        </div>
        <div class="container3">
          <p>Principled</p>
          <p class="point-show"><?php echo $statsArray[0]['Principled']?></p>
        </div>
        <div class="container3">
          <p>Open Minded</p>
          <p class="point-show"><?php echo $statsArray[0]['Open_Minded']?></p>
        </div>
        <div class="container3">
          <p>Communicator</p>
          <p class="point-show"><?php echo $statsArray[0]['Communicator']?></p>
        </div>
      </div>
    </div>
    


</body>
</html>