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
    <link rel="stylesheet" href="select.css">
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
              <a class="nav-link active" href="select.php">Classes
                <span class="visually-hidden">(current)</span>
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
            echo "<a class='nav-link' href='../admin/admin_menu.php'><b><i>ADMIN ACCESS</i></b></a>";
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

    <form method="POST" action="../users/users.php">
  
    <div class="container">
      <p id="title">--CLASSES--</p>
      <div class="primary">  
      <div class="grade">
        <input type="submit" name="param" value="1A" style="background-color:#b56ef5">
        <input type="submit" name="param" value="1B" style="background-color:#b56ef5">
        <input type="submit" name="param" value="1C" style="background-color:#b56ef5">
        <input type="submit" name="param" value="1D" style="background-color:#b56ef5">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="2A" style="background-color:rgb(137, 219, 112)">
        <input type="submit" name="param" value="2B" style="background-color:rgb(137, 219, 112)">
        <input type="submit" name="param" value="2C" style="background-color:rgb(137, 219, 112)">
        <input type="submit" name="param" value="2D" style="background-color:rgb(137, 219, 112)">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="3A" style="background-color:#e0707e">
        <input type="submit" name="param" value="3B" style="background-color:#e0707e">
        <input type="submit" name="param" value="3C" style="background-color:#e0707e">
        <input type="submit" name="param" value="3D" style="background-color:#e0707e">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="4A" style="background-color:#34bbe0">
        <input type="submit" name="param" value="4B" style="background-color:#34bbe0">
        <input type="submit" name="param" value="4C" style="background-color:#34bbe0">
        <input type="submit" name="param" value="4D" style="background-color:#34bbe0">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="5A" style="background-color:#fa69bc">
        <input type="submit" name="param" value="5B" style="background-color:#fa69bc">
        <input type="submit" name="param" value="5C" style="background-color:#fa69bc">
        <input type="submit" name="param" value="5D" style="background-color:#fa69bc">
      </div>
    </div>
      <div class="grade">
        <input type="submit" name="param" value="6A">
        <input type="submit" name="param" value="6B">
        <input type="submit" name="param" value="6C">
        <input type="submit" name="param" value="6D">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="7A" style="background-color:rgb(240, 106, 106)">
        <input type="submit" name="param" value="7B" style="background-color:rgb(240, 106, 106)">
        <input type="submit" name="param" value="7C" style="background-color:rgb(240, 106, 106)">
        <input type="submit" name="param" value="7D" style="background-color:rgb(240, 106, 106)">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="8A" style="background-color:#67a152">
        <input type="submit" name="param" value="8B" style="background-color:#67a152">
        <input type="submit" name="param" value="8C" style="background-color:#67a152">
        <input type="submit" name="param" value="8D" style="background-color:#67a152">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="9A" style="background-color:#f5b85d">
        <input type="submit" name="param" value="9B" style="background-color:#f5b85d">
        <input type="submit" name="param" value="9C" style="background-color:#f5b85d">
        <input type="submit" name="param" value="9D" style="background-color:#f5b85d">
      </div>
      <div class="grade">
        <input type="submit" name="param" value="10A" style="background-color:#db7dd5" class="ten">
        <input type="submit" name="param" value="10B" style="background-color:#db7dd5" class="ten">
        <input type="submit" name="param" value="10C" style="background-color:#db7dd5" class="ten">
        <input type="submit" name="param" value="10D" style="background-color:#db7dd5" class="ten">
      </div>
      
    </div>
</form>
  </body>
</html>