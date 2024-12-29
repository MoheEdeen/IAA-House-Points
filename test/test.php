<!DOCTYPE html>  
 <html lang="en">  
  <head>  
   <meta charset="UTF-8" />  
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
   <link rel="stylesheet" href="test.css" />  
   <title>Progress Steps</title>  
  </head>  
  <body>  
  <div class="organizer">
    <div class="container">  
      <div class="progress-container">  
       <div class="progress" id="progress"></div>  
       <div class="circle active">1</div>  
       <div class="circle">2</div>  
       <div class="circle">3</div>  
       <div class="circle">4</div>  
      </div>   
     </div>
    
     <div class="container2">
     <div class="progress2-container2">  
      <div class="progress2" id="progress2"></div>  
      <div class="kircle active2">1</div>  
      <div class="kircle">2</div>  
      <div class="kircle">3</div>  
      <div class="kircle">4</div>  
     </div> 
    </div>
    
    <div class="container3">
      <div class="progress3-container3">  
       <div class="progress3" id="progress3"></div>  
       <div class="fircle active3">1</div>  
       <div class="fircle">2</div>  
       <div class="fircle">3</div>  
       <div class="fircle">4</div>  
      </div>  
     </div>
  
     <div class="container4">
      <div class="progress4-container4">  
       <div class="progress4" id="progress4"></div>  
       <div class="lircle active4">1</div>  
       <div class="lircle">2</div>  
       <div class="lircle">3</div>  
       <div class="lircle">4</div>  
      </div>     
     </div>
  </div>
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
      };
    };
  ?>

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

var points = <?php echo json_encode($points2); ?>;
var points2 = <?php echo json_encode($points); ?>;
var points3 = <?php echo json_encode($points3); ?>;
var points4 = <?php echo json_encode($points4); ?>;

var nums = points.map(function(str) {
         return parseInt(str); });

const sum = nums.reduce((accumulator, value) => {
    return accumulator + value;
    }, 0);

    console.log(sum)
console.log(sum);
const progress = document.getElementById('progress')  
const prev = document.getElementById('prev')  
const next = document.getElementById('next')  
const circles = document.querySelectorAll('.circle')   
let currentActive = 1  
if (sum > 100){ 
  currentActive++  
  if(currentActive > circles.length) {  
    currentActive = circles.length
  }  
  update()  
}
if (sum > 200){
    currentActive++  
  if(currentActive > circles.length) {  
    currentActive = circles.length
  }  
  update()
}
if (sum > 300){
    currentActive++  
  if(currentActive > circles.length) {  
    currentActive = circles.length
  }  
  update()
}


function update() {  
  circles.forEach((circle, idx) => {  
    if(idx < currentActive) {  
      circle.classList.add('active') 
    } else {  
      circle.classList.remove('active')  
    }  
  })
  const actives = document.querySelectorAll('.active')  
  progress.style.width = (actives.length - 1) / (circles.length - 1) * 100 + '%'
  }

// -----------------------------------------------------------------------------------------------------------

const progress2 = document.getElementById('progress2')  
const prev2 = document.getElementById('prev2')  
const next2 = document.getElementById('next2')  
const circles2 = document.querySelectorAll('.kircle')   
let currentActive2 = 1  

var nums2 = points2.map(function(str) {
         return parseInt(str); });

const sum2 = nums2.reduce((accumulator, value) => {
    return accumulator + value;
    }, 0);

if (sum2 > 100){ 
  currentActive2++  
  if(currentActive2 > circles2.length) {  
    currentActive2 = circles2.length
  }  
  update2()  
}
if (sum2 > 200){
  currentActive2++  
  if(currentActive2 > circles2.length) {  
    currentActive2 = circles2.length
  }  
  update2()  
} 
if (sum2 > 300){
  currentActive2++  
  if(currentActive2 > circles2.length) {  
    currentActive2 = circles2.length
  }  
  update2()  
} 

function update2() {  
  circles2.forEach((kirkle, idx) => {  
    if(idx < currentActive2) {  
      kirkle.classList.add('active2') 
    } else {  
      kirkle.classList.remove('active2')  
    }  
  })  
  const actives2 = document.querySelectorAll('.active2')  
  progress2.style.width = (actives2.length - 1) / (circles2.length - 1) * 100 + '%'  
}

//-------------------------------------------------------------------------------------------------------------

const progress3 = document.getElementById('progress3')  
const prev3 = document.getElementById('prev3')  
const next3 = document.getElementById('next3')  
const circles3 = document.querySelectorAll('.fircle')   
let currentActive3 = 1  

var nums3 = points3.map(function(str) {
         return parseInt(str); });

const sum3 = nums3.reduce((accumulator, value) => {
    return accumulator + value;
    }, 0);

if (sum3 > 100){  
  currentActive3++  
  if(currentActive3 > circles3.length) {  
    currentActive3 = circles3.length
  }  
  update3()  
}
if (sum3 > 200){
  currentActive3++  
  if(currentActive3 > circles3.length) {  
    currentActive3 = circles3.length
  }  
  update3()  
}
if (sum3 > 300){
  currentActive3++  
  if(currentActive3 > circles3.length) {  
    currentActive3 = circles3.length
  }  
  update3()  
}
function update3() {  
  circles3.forEach((firkle, idx) => {  
    if(idx < currentActive3) {  
      firkle.classList.add('active3') 
    } else {  
      firkle.classList.remove('active3')  
    }  
  })  
  const actives3 = document.querySelectorAll('.active3')  
  progress3.style.width = (actives3.length - 1) / (circles3.length - 1) * 100 + '%'  
}


//-----------------------------------------------------------------------------------------------------------------

const progress4 = document.getElementById('progress4')  
const prev4 = document.getElementById('prev4')  
const next4 = document.getElementById('next4')  
const circles4 = document.querySelectorAll('.lircle')   
let currentActive4 = 1  

var nums4 = points4.map(function(str) {
         return parseInt(str); });

const sum4 = nums4.reduce((accumulator, value) => {
    return accumulator + value;
    }, 0);

if(sum4 > 100){  
  currentActive4++  
  if(currentActive4 > circles4.length) {  
    currentActive4 = circles4.length
  }  
  update4()  
}
if(sum4 > 200){  
  currentActive4++  
  if(currentActive4 > circles4.length) {  
    currentActive4 = circles4.length
  }  
  update4()  
}
if(sum4 > 300){  
  currentActive4++  
  if(currentActive4 > circles4.length) {  
    currentActive4 = circles4.length
  }  
  update4()  
}

function update4() {  
  circles4.forEach((lirkle, idx) => {  
    if(idx < currentActive4) {  
      lirkle.classList.add('active4') 
    } else {  
      lirkle.classList.remove('active4')  
    }  
  })  
  const actives4 = document.querySelectorAll('.active4')  
  progress4.style.width = (actives4.length - 1) / (circles4.length - 1) * 100 + '%'  
}



</script>
</body>  
</html>  