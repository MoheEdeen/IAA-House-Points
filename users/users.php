<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link href="users.css" rel="stylesheet">
    <link href="../Main/themetest.css" rel="stylesheet">
    <title>Students</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="users.js" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
              <a class="nav-link active" href="../class-select/select.php">Classes
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
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
        $email = $_SESSION['email'];
    
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
    <br>
    <?php
    $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");

    $month = date("m");
    $year = date("Y");

    if (isset($_POST['param'])) {
        $value = $_POST['param'];
    } else {
            $value = $_GET['param2'];
    }
    

    $sql = "SELECT student, SUM(added_points) AS total_points
        FROM audit_log
        WHERE month = $month AND year = $year AND Grade = '$value'
        GROUP BY student
        ORDER BY total_points DESC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the student with the greatest total added points
    $row = $result->fetch_assoc();
    $studentName = $row["student"];
    $totalPoints = $row["total_points"];
    echo "<h5 style='text-align:center'>Top Earner of the Month for Class $value Is: $studentName Earning $totalPoints Points!</h4>";
} else {
    echo "";
}
    mysqli_close($conn);
    

?>
    <div class="container">
        <div class="row" >
            <table id="example" class="table table-striped disable" style="width:100%">
                <!--Table Header-->
                <thead>
                    <tr>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'rdbmsfn_housepoints');

// Query to fetch emails from the database table
$sql = "SELECT teacher_email FROM email_whitelist";
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    $teachers = array();
    
    // Fetch each email and add it to the $teachers array
    while ($row = mysqli_fetch_assoc($result)) {
        $teachers[] = $row['teacher_email'];
    }

    // Close the database connection
    mysqli_close($connection);

    // Check if the user's email is in the $teachers array
    if (isset($_SESSION['email']) && isset($_SESSION['name']) && in_array($email, $teachers)) {
        echo '<th> ADD POINTS </th>';
    }}
        ?>

                        <th> HOUSE </th>
                        <th> FIRST NAME </th>
                        <th> LAST NAME </th>
                        <th> CLASS </th>
                        <th> POINTS </th>
                    </tr>
                </thead>
                <tbody>
                    <!--Created a connection to the database, and quried it for the entire announcement table-->
                    <?php 
                    $con = mysqli_connect("localhost","root","","rdbmsfn_housepoints");
    
                   
                    if (isset($_POST['param'])) {
                        $value = $_POST['param'];
                    } else {
                            $value = $_GET['param2'];
                    }
                    

        
                    $query = "SELECT * FROM alldata2 WHERE Grade = '$value'";
               
             
       
                    $query_run = mysqli_query($con, $query);
                    
    
                    //For each row within the announcement table I created a table row corresponding to the header categories
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            
                            ?>
                         
                            <tr>
                                <!--Each row displays the announcement text in addition to the posting date-->
                            
                                <?php



                                if (isset($_SESSION['email']) && isset($_SESSION['name']) && in_array($email, $teachers)) {
                                $name = $_SESSION['name'];
                                echo "<td> <form method='POST' id='myForm' action='users.php'>"; 
                                $paris = $row['FIRST_NAME'];
                                $gorillas = $row['LAST_NAME'];
                                echo "<input class = 'disable btn btn-primary' style = 'box-shadow: 5px 5px lightblue; ' type='submit' name='add' value='Add Points for $paris $gorillas'> </td> ";
                                echo "<input type='hidden' name='param' value='$value'> </form>";
                                if(isset($_POST['add'])){
                                    $_SESSION['full'] = substr($_POST['add'],15);
                                    header("Location: updatepoints.php", true, 301); // CHANGE!!!
                                    exit;
                                
                                }


                                }
                                ?>
                                <td> <?= $row['HOUSE']; ?> </td>
                                <td> <?= $row['FIRST_NAME']; ?> </td>
                                <td> <?= $row['LAST_NAME']; ?> </td>
                                <td> <?= $row['Grade']; ?> </td>
                                <td> <?= $row['Student_of_the_Month'] + $row['Inquirer'] + $row['Reflective'] +$row['Thinker'] + $row['Caring'] + $row['Balanced'] +$row['Risk_Taker'] + $row['Knowledgeable'] + $row['Principled'] + $row['Open_Minded'] + $row['Communicator'] ?> </td>
                                



                            </tr>  
                              
                            <?php
                        }
                        ?>
                            
                        <?php
                    }
                    else{
                        echo "<br><br><br><br> <h2 style='color:red'> Error: no student records found for this class </h2> <br> <br> <hr>";
                    }
                ?>
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th>ID</th>
                        <th> HOUSE </th>
                        <th> FIRST NAME </th>
                        <th> LAST NAME </th>
                        <th> GRADE </th>
                        <th> POINTS </th>
                    </tr>
                </tfoot> -->
        </table>
        </div>
    </div>
    
    <div class="container2 hide bg-dark fixed-bottom "id="pop">
        <div class="field field_v1">
            <input class="field__input" placeholder=" " maxlength = "6" id = "in">
            <span class="field__label-wrap" aria-hidden="true">
                <span class="field__label">Password</span>
            </span>
        </div>
        <button type="button" class="btn " id="en"><i class="w3-margin-left fa fa-arrow-right
"></i></button>
    </div>
   <!--
    <div id = "popup">
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
        <div class="card-header" align = "center">Header</div>
        <div class="card-body">
        
        <p class="card-text">
            <input class="form-control form-control-lg" minlength="1" maxlength="9" type="text" placeholder="Enter Code" id="inputLarge">
        </p>
        </div>
        </div>
    </div>
    <script type = "text/javascript">
        function toggle(){
            var blur = document.getElementById('Blur');
            blur.classList.toggle('active')
        }
    </script>
    
    <br>
    <br>
    <br>
    <div class="container col-sm-1 text-center">
        <button id = "new_user_button" class="btn btn-lg btn-primary" type="button">New User</button>
    </div>
    <br>
    <div class="hidden" id="hideme">
    <div class="form-group d-flex align-items-center justify-content-center ">
        <div class="form-floating col-sm-2 col-example">
            <input type="text" required pattern="[a-zA-Z]*"  class="form-control" id="floatingFirstName" placeholder="First Name" >
            <label for="floatingFirstName">First Name</label>
        </div>
        <div class="col-1"></div>
        <div class="form-floating col-sm-2 col-example">
            <input type = "number" class="form-control" id="gradeInput" placeholder="Grade" min = "1" max = "12" required>
            <label for="gradeInput">Grade</label>
        </div>
        <div class="col-1"></div>
        <div class="form-floating col-sm-2 col-example">
            <input type="text" required pattern="[a-zA-Z]*" class="form-control" id="floatingLastName" placeholder="Last Name">
            <label for="floatingLastName">Last Name</label>
        </div>
        
    </div>
    <br>
    <div class="container col-sm-1 text-center">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-primary ">House</button>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Zara Wildcats</a>
                    <a class="dropdown-item" href="#">Aqaba Dolphins</a>
                    <a class="dropdown-item" href="#">Pela Falcons</a>
                    <a class="dropdown-item" href="#">Rum Wolfs</a>
                </div>
            </div>
        </div>
    </div>
</div>
                -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    
</body>

</html>