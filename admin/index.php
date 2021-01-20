
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

<a href="\Web_HairSalon\admin\index.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:115%; text-align:left;"> <i class="fas fa-home"></i><strong> Home</strong></p></a>

<a href="../admin/manageService.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-tasks"></i><small> Manage Service</small></p></a>

<a href="../admin/manageEmployee.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-users"></i><small> Manage Employee</small></p></a>

<a href="../admin/managePayroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-clipboard"></i><small> Manage Payroll</small></p></a>

<!-- <a href="../admin/reports.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-chart-line"></i><small> Sales Reports</small></p></a> -->

<!-- <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-info-circle"></i><small> About</small></p></a> -->

<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i><small> Logout</small></p></a>
</div>

<div class="container-fluid" style="background:#0F222D;">
<div class="container-fluid mh-100 p-3" style="background: #0F222D;height:30vh;">
<div class="h-100 rounded d-flex justify-content-center" style="background:#ffe6e6;">
<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
</div>

<!-- <div style="text-align:right; padding:1em 0;"> <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1711084"> <span style="color:black;"></span><br/>Iligan City, Philippines</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Asia%2FManila" width="175%" height="140" frameborder="0" seamless></iframe>
</div> -->

<div class="container-fluid mt-4 p-4" style="height:255%;text-align:left;background: #ffe6e6;font-size: 200%;">

<div class="col-md-12 p-1 text-center">
  <label id="lblGreetings"></label>
</div>

<div class="container mt-3 border border-dark rounded" style="height:86%;">

<div class="row">

<div class="col-md-6 col-lg-12 d-flex justify-content-center">
  <div style="padding:0px;float: right;" class="">
    <h2>
      <a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1711084"> <span style="color:black;"></span><br/>Iligan City, Philippines</a>
    </h2>
    <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Asia%2FManila"  width="100%" height="140" frameborder="0"  seamless></iframe>
  </div>

</div>

</div>

</div>


</div>
</div>
</div>

  <script>
      var myDate = new Date();
      var hrs = myDate.getHours();

      var greet;

      if (hrs < 12)
          greet = 'Good Morning';
      else if (hrs >= 12 && hrs <= 17)
          greet = 'Good Afternoon';
      else if (hrs >= 17 && hrs <= 24)
          greet = 'Good Evening';

      document.getElementById('lblGreetings').innerHTML =
          '<b>' + greet + '</b> and Welcome to Admin Page';
  </script>

</body>
</html>
