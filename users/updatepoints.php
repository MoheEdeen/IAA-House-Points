<?php
  $conn = mysqli_connect("localhost","root","","rdbmsfn_housepoints");

  
  $IBLP_ = array('Student_of_the_Month','Inquirer','Reflective', 'Thinker', 'Caring', 'Balanced', 'Risk_Taker', 'Knowledgeable', 'Principled', 'Open_Minded', 'Communicator');
  $IBLP = array('Student of the Month','Inquirer','Reflective', 'Thinker', 'Caring', 'Balanced', 'Risk Taker', 'Knowledgeable', 'Principled', 'Open Minded', 'Communicator');
  // $sql = "SELECT * FROM alldata";
  //
  // $result = mysqli_query($conn, $sql);
  //
  // $fullTable = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="givepoints.css">
    <link rel="stylesheet" href="../Main/core.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Add Points</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body style="zoom: 90%">
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
    </script>

<?php
    
      session_start();
      $COUNTER = 0;
      $fullname = $_SESSION['full']; 
      // for($i=0;$i<strlen($fullname);$i++){
      //   if($fullname[$i] == ' '){
      //     $COUNTER++;
      //   }
      // }
      for($i=0;$i<strlen($fullname);$i++){
        if($fullname[$i] == ' '){
          $first = substr($fullname, 0, $i);
          $last = substr($fullname, $i+1, strlen($fullname)-1);
          break;
        }
      }

      $previous_points = "SELECT SUM(Student_of_the_Month + Inquirer + Reflective + Thinker + Caring + Balanced + Risk_Taker + Knowledgeable + Principled + Open_Minded + Communicator) as previous_points FROM alldata2 WHERE FIRST_NAME = '$first' AND LAST_NAME = '$last'";
      $run_points = mysqli_query($conn, $previous_points);

      $row = mysqli_fetch_assoc($run_points);
      $previous_points = $row['previous_points'];
        



        
      
//       echo "<a href='../Main/users.php'>
//       <div class = 'row'>
//           <button type='submit' class='btn btn-primary'>Back</button>
//       </div>
// </a>" ;
  

      $selectSql = "SELECT Student_of_the_Month,Inquirer,Reflective, Thinker, Caring, Balanced, Risk_Taker, Knowledgeable, Principled, Open_Minded, Communicator from alldata2 where FIRST_NAME = '$first' and LAST_NAME = '$last'";
      $result = mysqli_query($conn, $selectSql);
      $statsArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
      // print_r($statsArray);

      // print_r($statsArray);
      echo "<form method='POST'>";
      ?>

     
    <div class="update-container">
      <img src="../static/image-removebg-preview (11).png" id="ib">
      <div class="container3" style="padding-bottom:20px;">
        <p style="align-self:center; font-weight:bold; font-size:32px; margin-bottom: 10px;"><?php echo $first . ' ' . $last;
        ?></p>
        <h1 style="align-self:center; font-weight:bold; font-size:20px; margin-bottom: 10px;">Student of the Month</h1>
        <input type="number" name = 'Student_of_the_Month' value=<?php echo $statsArray[0]['Student_of_the_Month']?> min="0" max='50'>
      </div>
      <div class="container2" style="padding-bottom:20px;">
        <div class="container3">
          <p>Inquirer</p>
          <input type='number' name = 'Inquirer' value = <?php echo $statsArray[0]['Inquirer']?> min='0' max='50'>
        </div>
        <div class="container3">
          <p>Reflective</p>
          <input type="number" name = 'Reflective' value=<?php echo $statsArray[0]['Reflective']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Thinker</p>
          <input type="number" name = 'Thinker' value=<?php echo $statsArray[0]['Thinker']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Caring</p>
          <input type="number" name = 'Caring' value=<?php echo $statsArray[0]['Caring']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Balanced</p>
          <input type="number" name = 'Balanced' value=<?php echo $statsArray[0]['Balanced']?> min="0" max='50'>
        </div>
      </div>
      <div class="container2">
        <div class="container3">
          <p>Risk Taker</p>
          <input type="number" name = 'Risk_Taker' value=<?php echo $statsArray[0]['Risk_Taker']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Knowledgeable</p>
          <input type="number" name = 'Knowledgeable' value=<?php echo $statsArray[0]['Knowledgeable']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Principled</p>
          <input type="number" name = 'Principled' value=<?php echo $statsArray[0]['Principled']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Open Minded</p>
          <input type="number" name = 'Open_Minded' value=<?php echo $statsArray[0]['Open_Minded']?> min="0" max='50'>
        </div>
        <div class="container3">
          <p>Communicator</p>
          <input type="number" name = 'Communicator' value=<?php echo $statsArray[0]['Communicator']?> min="0" max='50'>
        </div>
      </div>
      <button id="submit" name ="save">Save Information</button>
    </div>

      <?php
      
    // receiving value from options
    if (isset($_POST['save'])) {
      
      $Inquirer = $_POST['Inquirer'];
      $Reflective = $_POST['Reflective'];
      $Thinker = $_POST['Thinker'];
      $Caring = $_POST['Caring'];
      $Balanced = $_POST['Balanced'];
      $Risk_Taker = $_POST['Risk_Taker'];
      $Knowledgeable = $_POST['Knowledgeable'];
      $Principled = $_POST['Principled'];
      $Open_Minded = $_POST['Open_Minded'];
      $Communicator = $_POST['Communicator'];
      $Student_of_the_Month = $_POST['Student_of_the_Month'];

      $total = $Inquirer + $Reflective + $Thinker + $Caring + $Balanced + $Risk_Taker + $Knowledgeable + $Principled + $Open_Minded + $Communicator + $Student_of_the_Month;

      $updatesql = "UPDATE alldata2 SET Student_of_the_Month='$Student_of_the_Month', Inquirer='$Inquirer', Reflective='$Reflective', Thinker='$Thinker', Caring='$Caring', Balanced='$Balanced', Risk_Taker='$Risk_Taker', Knowledgeable='$Knowledgeable', Principled='$Principled', Open_Minded='$Open_Minded', Communicator='$Communicator' WHERE FIRST_NAME='$first' and LAST_NAME='$last'";
      $runquery = mysqli_query($conn, $updatesql);
      
      $cur_day = date("d");
      $cur_month = date("m");
      $cur_year = date("Y");

      $email = $_SESSION['email'];
      $name = $_SESSION['name'];

      $student_name = $first . ' ' . $last;

      $selectGradeSql_temp = "SELECT Grade FROM alldata2 WHERE FIRST_NAME = '$first' and LAST_NAME = '$last'";
      $gresult = $conn->query($selectGradeSql_temp);
      $gradeArray_temp = mysqli_fetch_assoc($gresult);
      $grade = $gradeArray_temp['Grade'];


      
      $added_points = $total - $previous_points;

      


      $updatesql2 = "INSERT INTO audit_log (teacher_email, teacher_name, student, added_points, Grade, day, month, year)
      VALUES ('$email', '$name', '$student_name', '$added_points', '$grade', '$cur_day', '$cur_month', '$cur_year');";

      $runquery = mysqli_query($conn, $updatesql2);
      

      ?>

<?php 

$selectGradeSql = "SELECT Grade FROM alldata2 WHERE FIRST_NAME = '$first' and LAST_NAME = '$last'";
$gradeResult = mysqli_query($conn, $selectGradeSql);
$gradeArray = mysqli_fetch_assoc($gradeResult);
$studentGrade = $gradeArray['Grade'];

?>

<script type="text/javascript">
var myVar = <?php echo json_encode($studentGrade); ?>;
window.location.href = 'users.php?param2=' + myVar ;

sessionStorage.setItem('logged',0)

</script>
<?php
      
    }



?></form>

  </body>
  
</html>
