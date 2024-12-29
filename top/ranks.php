<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="ranks.css" rel="stylesheet">
        <link href="../Main/themetest.css" rel="stylesheet">
        <title>Top Scoring</title>
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
              <a class="nav-link active " href="../top/ranks.php">Rankings
                <span class="visually-hidden">(current)</span>
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
    
    <form method="POST" action="ranks.php">

<select class = "form-select w-25 form-select-lg"name="options" id="options" value="text">
  <option value="Inquirer">Inquirer</option>
  <option value="Reflective">Reflective</option>
  <option value="Thinker">Thinker</option>
  <option value="Caring">Caring</option>
  <option value="Balanced">Balanced</option>
  <option value="Risk_Taker">Risk Taker</option>
  <option value="Knowledgeable">Knowledgeable</option>
  <option value="Principled">Principled</option>
  <option value="Open_Minded">Open Minded</option>
  <option value="Communicator">Communicator</option>
</select>
<br>
<select class = "form-select w-25 form-select-lg" name="class-select" id="class-select" value="text">
  <option value="6A">6A</option>
  <option value="6B">6B</option>
  <option value="6C">6C</option>
  <option value="6D">6D</option>
  <option value="7A">7A</option>
  <option value="7B">7B</option>
  <option value="7C">7C</option>
  <option value="7D">7D</option>
  <option value="8A">8A</option>
  <option value="8B">8B</option>
  <option value="8C">8C</option>
  <option value="8D">8D</option>
  <option value="9A">9A</option>
  <option value="9B">9B</option>
  <option value="9C">9C</option>
  <option value="9D">9D</option>
  <option value="10A">10A</option>
  <option value="10B">10B</option>
  <option value="10C">10C</option>
  <option value="10D">10D</option>
</select>
<br>
<button type="submit"style="width: 100px; height: 35px;" class="btn btn-primary" id="btn"> Filter </button>

</form>
<br>
<div class = "contianer-fluid" align = "center">
  <div class = "row">
    <div style = "background-color: #CD7F32; position: absolute; bottom: 0; left: 10%; height: 30%; width: 20%; border:30px solid #df9e5e; ">
      <h1 class = "bronze-color position-relative" id="bronze" style="font-size: 1.5vw; bottom:55%; width:200px;"><u> Name </h1>
    </div>
    <div style = "background-color: #C0C0C0; position: absolute; bottom: 0; right: 10%; height: 45%; width: 20%; border:30px solid #ececec;">
      <h1 class = "silver-color position-relative" id="silver" style="font-size: 1.5vw; bottom: 35%;"> Name </h1>
    </div>
    <div style = "background-color: #FFD700; position: absolute; bottom: 0; left: 40%; height: 60%; width: 20%; border:30px solid #fffd7e;">
      <h1 class = "yellow-color position-relative" id="gold" style="font-size: 1.5vw; bottom:25%; "> Name </h1>
    </div>  
  </div>
</div>
<!--
    <h1 style="font-size: 3vw;text-align:center" id="title"> Inquirer </h1>
    <div class = "container">
        
      <div class = "row">
        <div style = "background-color: #CD7F32; position: absolute; bottom: 0; left: 10%; height: 30%; width: 20%; border:30px solid #df9e5e; "></div>
      </div>
    </div>
    <div class = "container">
        <h1 class = "silver-color" id="silver" style="font-size: 1.7vw; position: absolute; bottom: 45%; left: 73%;"> Name </h1>
      <div class = "row">
        <div style = "background-color: #C0C0C0; position: absolute; bottom: 0; right: 10%; height: 45%; width: 20%; border:30px solid #ececec;"></div>
      </div>
    </div>
    <div class = "container">
      
        <h1 class = "yellow-color" id="gold" style="font-size: 1.7vw; position: absolute; bottom: 60%; left: 40%;"> Name </h1>
      
      <div class = "row">
      <div style = "background-color: #FFD700; position: absolute; bottom: 0; left: 40%; height: 60%; width: 20%; border:30px solid #fffd7e;"></div>  
      </div>
      
      
    </div>
--> 
    
    
    <?php 
    if (isset($_POST['options'])) {
      $FIELD = $_POST['options'];
    } else {
      $FIELD = "Inquirer";
    }
  
    if (isset($_POST['class-select'])) {
      $FIELD2 = $_POST['class-select'];
    } else {
      $FIELD2 = "6A";
    }

            $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");
    
            $sql = "SELECT FIRST_NAME, LAST_NAME, Grade, $FIELD FROM alldata2 WHERE Grade = '$FIELD2' order by $FIELD DESC limit 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              $first_names = array();
              $last_names = array();
              $grades = array();
              $pointer = array();
              while($row = $result->fetch_assoc()) {
                  $printer =  $row["FIRST_NAME"];
                  $printer2 = $row["LAST_NAME"];
                  $printer3 = $row["Grade"];
                  $printer4 = $row[$FIELD];
                  array_push($first_names, $printer);
                  array_push($last_names, $printer2);
                  array_push($grades, $printer3);
                  array_push($pointer, $printer4);
              }
            }
    ?>

  
<script type="text/javascript">
        var first_names = <?php echo json_encode($first_names); ?>;
        var last_names = <?php echo json_encode($last_names); ?>;
        var grades = <?php echo json_encode($grades); ?>;
        var pointer = <?php echo json_encode($pointer); ?>;

        console.log(pointer)
        


        
        const btn = document.getElementById('btn');
        btn.addEventListener('click', (e)=>{
          var e = document.getElementById("options");
          var c = document.getElementById("class-select");
          var value = e.options[e.selectedIndex].value;
          var value2 = c.options[c.selectedIndex].value;
          var index = document.getElementById("options").selectedIndex;
          var index2 = document.getElementById("class-select").selectedIndex;
          var text = e.options[e.selectedIndex].text;
          var text2 = c.options[c.selectedIndex].text;
          sessionStorage.setItem('title',text);
          sessionStorage.setItem('val',index);
          sessionStorage.setItem('title2',text2);
          sessionStorage.setItem('val2',index2)
        })

        console.log(first_names);
        console.log(grades)
        console.log(options)
        const bronze = document.getElementById('bronze');
        const silver = document.getElementById('silver');
        const gold = document.getElementById('gold');
        const title = document.getElementById('title');
        gold.innerHTML = first_names[0] + " " + last_names[0] + " " + grades[0] + " - " + pointer[0] + " Points";
        silver.innerHTML = first_names[1] + " " + last_names[1] + " " + grades[1] + " - " + pointer[1] + " Points";
        bronze.innerHTML = first_names[2] + " " + last_names[2] + " " + grades[2] + " - " + pointer[2] + " Points";

        console.log(sessionStorage.getItem('title'));
        var temp = sessionStorage.getItem('title');
        
        document.getElementById("options").selectedIndex = sessionStorage.getItem('val');
        document.getElementById("class-select").selectedIndex = sessionStorage.getItem('val2');
        console.log(sessionStorage.getItem('title'))


    </script>
  
  
  </body>
</html>