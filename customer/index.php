<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>

    var ScrollMsg= "J.HairSalon | Manifesto. Declare your style. - "
    var CharacterPosition=0;
    function StartScrolling() {
    document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
    ScrollMsg.substring(0, CharacterPosition);
    CharacterPosition++;
    if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
    window.setTimeout("StartScrolling()",150); }
    StartScrolling();

    //naol awat2x AHAHAHHA
      </script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body class = "d-flex flex-row h-100">
    <div class="col-2 border  flex-column d-flex h-auto"style="background: #ffe6e6 !important;">
      <a href="profile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-user"></i><small> Profile </small></p></a>

      <!-- <p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Offered Services</small></p> -->

      <!-- <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Color</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Styling</small></p></a>
      <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Waxing</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Extensions</small></p></a>
      <a href="" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Design</small></p></a>
      <a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Grooming</small></p></a>
      <div class="btn btn-outline-light pt-0"> -->
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <small>Offered Services</small></button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 220px;">

            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_color.php" style="width: 100%;" class=" btn btn-outline-dark rounded-1 pt-0"><small>Color</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_styling.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Styling</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_waxing.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Waxing</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_extensions.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Extensions</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_design.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Design</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_grooming.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Grooming</small></p></a>
          </div>

      <!--<a href="\Web_HairSalon\customer\book_now.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="far fa-calendar-check"></i><small> Booking Details </small></p></a>-->

      <a href="\Web_HairSalon\customer\payment.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fa fa-credit-card"></i><small> Payment </small></p></a>

      <a href="\Web_HairSalon\customer\books.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fa fa-calendar"></i><small> Book Schedules </small></p></a>

      <a href="\Web_HairSalon\customer\about.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-info-circle"></i><small> About </small></p></a>

      <a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class="btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:left;"> <i class="fas fa-sign-out-alt"></i></i><small> Logout </small></p></a>

    </div>

  <div class="flex-row w-100 border">
      <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
        <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
        <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
        </div>
      </div> -->

      <div class="w-100 p-3" style="background: #0F222D;height:30vh;">
        <div class="h-100 d-flex justify-content-center" style="background:#ffe6e6;">
        <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
        </div>
      </div>

        <img src="\Web_HairSalon\home.png" class="center" alt="" style="width: 100%; height: 490px; display: block; margin-left: auto; margin-right: auto;">


    </div>


  </body>
</html>
