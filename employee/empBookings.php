<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$empl=mysqli_query($con, "SELECT * from employee WHERE employee.user_id = $user_id;");
$empl = mysqli_fetch_assoc($empl);
$emid = $empl['employee_id'];

 ?>
<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
<meta charset="utf-8">

<title>J.HairSalon</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<style type="text/css">
*{
	font-family: var(--bs-font-sans-serif);
}
</style>
<body class = "d-flex flex-row h-100">
<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>
<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Profile</small></p></a>
<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Bookings</small></p></a>
<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>View Payroll</small></p></a>
<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

</div>

<div class="col-10 h-100 flex-column d-flex" style="background:#0F222D;">
<div class="flex-column m-3" style="height:17vh;">
	<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
	<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
	</div>
</div>

<div class="flex-column d-flex m-3 mt-0">
	<div class="row m-1 p-2 bg-white">
<?php 
$sql = mysqli_query($con, "SELECT * from bookings WHERE employee_id = $emid ORDER BY date_sched ASC;");

?>
<div class="row ">
  <div class="col-6">
<div class="card shadow mb-0">
<div class="card-header">
  <b style="float: left; font-size: 25px;">Booked Customer -</b>
  <p id="date" style="float: left; font-size: 25px;"></p>
</div>
<div class="card-body">
    <div class="col-12 p-3" style="border: 1px solid #000; height: 400px;">      
        <div id="listingTable"></div>
      <br>
      <section>page: <span id="page"></span></section>
      <a href="javascript:prevPage()" id="btn_prev">Prev</a>
      <a href="javascript:nextPage()" id="btn_next">Next</a>
    </div>        
</div>
<hr>
</div>

  </div>
</div>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
var current_page = 1;
var records_per_page = 3;

var objJson = [
<?php
$menu = array();
$num = mysqli_num_rows($sql);
  while($rows=mysqli_fetch_assoc($sql)){
    $date = date_create($rows['date_sched']);
    $boDe = date_create($rows['book_date']);
$customer=$rows['customer_id'];
$service=$rows['service_id'];
    $sqli=mysqli_query($con,"SELECT * FROM customer WHERE customer_id=$customer;");
    $reCus = mysqli_fetch_assoc($sqli);
    $sqli=mysqli_query($con,"SELECT * FROM services WHERE service_id=$service;");
    $reSer = mysqli_fetch_assoc($sqli);
    
    //$reCus['f_name'].' '.$reCus['l_name'].' '.$reSer['service_name'].' '.date_format($date, 'M/d/Y g:i A')
?>
    { Name: "<?php echo $reCus['f_name'].'<br>'.$reCus['l_name'].'<br>'.$reSer['service_name'].'<br>'.date_format($date, 'M/d/Y g:i A');?>"},
<?php } ?>
]; // Can be obtained from another source, such as your objJson variable
//{ adName: "AdName 1"}, | listing_table.innerHTML += objJson[i].adName + "<br>";
function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
    
function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");

    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");
 
    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) {
        listing_table.innerHTML += objJson[i].Name + "<br>";
    }
    page_span.innerHTML = page + "/" + numPages();

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() {
    changePage(1);
};  
</script>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
<script src="../js/pagination.js"></script>
<script src="../js/pagination.min.js"></script>
</body>
</html>
