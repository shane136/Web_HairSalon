<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");

$user_id = $_SESSION['user_id'];

$user_emp = "SELECT * from employee WHERE user_id LIKE '$user_id'";
$result = mysqli_query($con, $user_emp);
$name = "test";
while($row = mysqli_fetch_assoc($result)){
	$name = $row['f_name'];
}
?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
<meta charset="utf-8">

<script>

var ScrollMsg= "J.HairSalon | Home - "
var CharacterPosition=0;
function StartScrolling() {
document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
ScrollMsg.substring(0, CharacterPosition);
CharacterPosition++;
if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
window.setTimeout("StartScrolling()",150); }
StartScrolling();

  </script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body class = "d-flex flex-row h-100">

<div class="col-2 border  h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-home"></i><small> Home</small></p></a>

<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-user"></i><small> Profile</small></p></a>

<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-calendar-alt"></i><small> Bookings</small></p></a>

<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-clipboard-list"></i><small> View Payroll</small></p></a>

<!-- <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align: left;"> <i class="fas fa-info-circle"></i><small> About</small></p></a> -->

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%;  text-align: left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>

</div>

<div class="container-fluid" style="background:#0F222D;">
<div class="mh-100 p-3" style="background:#0F222D;height:20vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<div class="container-fluid border border-dark rounded bg-white mt-4 p-5">
<div style="text-align: left; padding: 1em 0; font-size: 200%;" class="container"> 

  <body>
      <label id="lblGreetings"></label>
  </body>

  <script>
      var myDate = new Date();
      var hrs = myDate.getHours();
      var greet;

      if (hrs < 12)
          greet = 'Good Morning,';
      else if (hrs >= 12 && hrs <= 17)
          greet = 'Good Afternoon,';
      else if (hrs >= 17 && hrs <= 24)
          greet = 'Good Evening,';

      document.getElementById('lblGreetings').innerHTML =
          '<b>' + greet + '</b> '+"<?php echo $name."!" ?>";

  </script>
</div>


<!-- <img src="\Web_HairSalon\image\pic.png" alt="" width="520" height="520" class="container-fluid p-3"> -->
<style>
.vertical-menu {
  width: 100%;
  height: 330px;
  overflow-y: auto;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #DC7633;
  color: white;
}
</style>
<div class="vertical-menu">
  <a href="#" class="active">REMINDERS:</a>
  <a href="#">1. Provide hand sanitiser at the salon door and ask clients and visitors to use it upon arrival. </a>
  <a href="#">2. Wash your hands often and thoroughly with an alcohol-based hand soap to kill viruses that might be on your hands.</a>
  <a href="#">3. Keep at least 1 metre (3 feet) distance between you and anyone who’s coughing or sneezing, and give staff the option to wear a face mask when treating clients. </a>
  <a href="#">4. Avoid touching your eyes, nose and mouth, because it’s easy for viruses to enter the body through </a>
  <a href="#">5. Make sure you and the people around you follow good respiratory hygiene – this means covering your mouth and nose with your bent elbow or tissue when you cough or sneeze, then throw the used tissue away immediately.</a>
  <a href="#">6. If you or your staff have a fever, cough and difficulty breathing, stay home and call your doctor for advice.</a>
  <a href="#">7. Stay informed on the latest developments about COVID-19, and follow advice given by your healthcare provider and your national and local public health authority on how to protect yourself and your clients from COVID-19.</a>
</div>

<style>

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}
</style>

<div class="container">
	 <div class="bottom-right p-1 m-2" style="font-family:Brush Script MT; font-size: 300%;color:white;" > J. Hair Salon</div>
</div>
</div>
</div>

</body>
</html>
