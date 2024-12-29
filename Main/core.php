<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="core.css" rel="stylesheet">
        <link href="../Main/themetest.css" rel="stylesheet">
        <title>Home</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">          
        <script src="core.js" defer></script>
   </head>
<body>
    <!--
    House Names:
    Zara Wildcats: orange
    Aqaba Dolphins: blue
    Pela Falcons: green
    Rum Wolfs: yellow
    -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <img src="../static/iaa_logo_hp.png" style="width:40px; height:40px;">
      <div class="container-fluid ">
        <a class="navbar-brand" href="core.php">IAA House Points</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="../Main/core.php">Home
                  <span class="visually-hidden">(current)</span>
              </a>
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
              <a class="nav-link  " href="../top/ranks.php">Rankings</a>
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
    <div class="container-fluid " align = "center">
        <div class="row">
          <div id = "b1" class="col-sm-12 col-md-12 col-lg-3 houses border border-4 wildcats card" zara-button>
            <i id="i1" class = ""></i>
            <img src="../static/Img2.png" class="rounded mx-auto d-block" alt="Zara Wildcats Logo" zara-logo>
            <h2 id="points1" style = "color: #6A6A6A"> POINTS 1 </h2>
            <span><button onclick="activateZara()" id = "zara_wildcats_button" style='font-weight: bold; color: #0f2537' >Zara Wildcats</button></span>
            <hr>
          </div>
          <div id = "b2" class="col-sm-12 col-md-12 col-lg-3  houses border border-4 card dolphins" aqaba-button>
            <i id="i2" class = ""></i>
            <img src="../static/img4.png" class="rounded mx-auto d-block" alt="Aqaba Dolphins Logo" aqaba-logo>
            <h2 id="points2" style = "color: #6A6A6A"> POINTS 2 </h2>
            <span style='font-weight: bold;'><button onclick="activateAqaba()" id = "aqaba_dolphins_button" style='font-weight: bold; color: #0f2537' >Aqaba Dolphins</button></span>
            <hr>
            
          </div>
          <div id = "b3" class="col-sm-12 col-md-12 col-lg-3 houses border border-4 card falcons" pela-button>
            <i id="i3" class = ""></i>
            <img src="../static/img3.png" class="rounded mx-auto d-block" alt="Pela Falcons Logo" pela-logo>
            <h2 id="points3" style = "color: #6A6A6A"> POINTS 3 </h2>
            <span style='font-weight: bold;'><button button onclick="activatePela()" id = "pela_falcons_button" style='font-weight: bold; color: #0f2537' >Pela Falcons</button></span>
            <hr>
            
          </div>
          <div id = "b4" class="col-sm-12 col-md-12 col-lg-3 houses border border-4 card wolves" rum-button>
            <i id="i4" class = ""></i>
            <img src="../static/img1.png" class="rounded mx-auto d-block" alt="Run Wolves Logo">
            <h2 id="points4" style = "color: #6A6A6A"> POINTS 4 </h2>
            <span style='font-weight: bold;'><button button onclick="activateRum()" id = "rum_wolves_button" style='font-weight: bold; color: #0f2537'>Rum Wolves</button></span>
            <hr>
            
            
          </div>
          
        </div>
        
      </div>

      <?php
      $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");
    
            $sql = "SELECT Inquirer + Reflective + Thinker + Caring + Balanced + Risk_Taker + Knowledgeable + Principled + Open_Minded + Communicator + STUDENT_OF_THE_MONTH as TotalAqaba FROM alldata2 WHERE HOUSE = 'Aqaba Dolphins'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              $points = array();
              while($row = $result->fetch_assoc()) {
                  $printer1 =  $row["TotalAqaba"];
                  array_push($points, $printer1);
              }
            }
    ?>
    
    <?php 

$conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");
    
            $sql = "SELECT Inquirer + Reflective + Thinker + Caring + Balanced + Risk_Taker + Knowledgeable + Principled + Open_Minded + Communicator + STUDENT_OF_THE_MONTH as TotalZara FROM alldata2 WHERE HOUSE = 'Zara Wild cats'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              $points2 = array();
              while($row = $result->fetch_assoc()) {
                  $printer1 =  $row["TotalZara"];
                  array_push($points2, $printer1);
              }
            }
    ?>

    <?php 

$conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");

            $sql = "SELECT Inquirer + Reflective + Thinker + Caring + Balanced + Risk_Taker + Knowledgeable + Principled + Open_Minded + Communicator + STUDENT_OF_THE_MONTH as TotalFalcons FROM alldata2 WHERE HOUSE = 'Pella Falcons'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            $points3 = array();
            while($row = $result->fetch_assoc()) {
                $printer1 =  $row["TotalFalcons"];
                array_push($points3, $printer1);
            }
        }
    ?>

    <?php 

$conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");

            $sql = "SELECT Inquirer + Reflective + Thinker + Caring + Balanced + Risk_Taker + Knowledgeable + Principled + Open_Minded + Communicator + STUDENT_OF_THE_MONTH as TotalWolves FROM alldata2 WHERE HOUSE = 'Rum Wolves'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            $points4 = array();
            while($row = $result->fetch_assoc()) {
                $printer1 =  $row["TotalWolves"];
                array_push($points4, $printer1);
            }
        }
    ?>

    

    <script type="text/javascript">
        var points = <?php echo json_encode($points); ?>;
        var points2 = <?php echo json_encode($points2); ?>;
        var points3 = <?php echo json_encode($points3); ?>;
        var points4 = <?php echo json_encode($points4); ?>;
        

        var nums = points.map(function(str) {
         return parseInt(str); });
        var nums2 = points2.map(function(str) {
         return parseInt(str); });
        var nums3 = points3.map(function(str) {
         return parseInt(str); });
        var nums4 = points4.map(function(str) {
         return parseInt(str); });




        const sum = nums.reduce((accumulator, value) => {
            return accumulator + value;
                }, 0);

        const sum2 = nums2.reduce((accumulator, value) => {
            return accumulator + value;
                }, 0);

        const sum3 = nums3.reduce((accumulator, value) => {
            return accumulator + value;
                }, 0);      
                
        const sum4 = nums4.reduce((accumulator, value) => {
            return accumulator + value;
                }, 0);

        console.log('Aqaba Dolphins: ' + sum);
        console.log('Zara Wildcats: ' + sum2);
        console.log('Pella Falcons: ' + sum3);
        console.log('Rum Wolves: ' + sum4);

        const p1 = document.getElementById('points1');
        const p2 = document.getElementById('points2');
        const p3 = document.getElementById('points3');
        const p4= document.getElementById('points4');

        p1.innerHTML = sum2 + " Points";
        p2.innerHTML = sum + " Points";
        p3.innerHTML = sum3 + " Points";
        p4.innerHTML = sum4 + " Points";

        const i1 = document.getElementById('i1');
        const i2 = document.getElementById('i2');
        const i3 = document.getElementById('i3');
        const i4 = document.getElementById('i4');

        const b1 = document.getElementById('b1');
        const b2 = document.getElementById('b2');
        const b3 = document.getElementById('b3');
        const b4 = document.getElementById('b4');

      
        
        if (sum > sum2 && sum > sum3 && sum > sum4){
          i2.classList.add('fas');
          i2.classList.add('fa-crown');
          i2.classList.add('yellow-color');
          b2.classList.add('border-warning');
        }else if (sum2 > sum && sum2 > sum3 && sum2 > sum4){
          i1.classList.add('fas');
          i1.classList.add('fa-crown');
          i1.classList.add('yellow-color');
          b1.classList.add("border-warning");
        }else if (sum3 > sum2 && sum3 > sum && sum3 > sum4){
          i3.classList.add('fas');
          i3.classList.add('fa-crown');
          i3.classList.add('yellow-color');
          b3.classList.add("border-warning");
        }else if (sum4 > sum && sum4 > sum3 && sum4 > sum2){
          i4.classList.add('fas');
          i4.classList.add('fa-crown');
          i4.classList.add('yellow-color');
          b4.classList.add("border-warning");
        }



    </script>
    </body>
</html>

<!-- classes to add for winner:

  - for "i" element add class "fas fa-crown yellow-color"
  - for main div: class "border-warning"

-->