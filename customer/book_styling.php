<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];

$type_id = 2;
$product_query = "SELECT * from services WHERE type_id LIKE '$type_id'";
$all_products = mysqli_query($con, $product_query);
$products = array();

while($products_row = mysqli_fetch_assoc($all_products)){
//inserting row of data into products_array
$products[]= $products_row;

}
 ?>

<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>


        <script>

        var ScrollMsg= "J.HairSalon | Offered Services-Styling - "
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
    <div class="col-2 border h-100 flex-column d-flex"style="height:50px;background: #0f222d !important;">
      <a href="\Web_HairSalon\customer\index.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="outline-color:black; font-size:100%; text-align: left;">  <i class="fas fa-home"></i><small> Home</small></p></a>

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
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_color.php" style="width: 100%;" class=" btn btn-outline-dark rounded-1 pt-0"><small>Color</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_styling.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Styling</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_waxing.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Waxing</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_extensions.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Extensions</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_design.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Design</small></p></a>
            <p align="center" style="margin: 5px;"><a href="\Web_HairSalon\customer\book_grooming.php" style="width: 100%;" class="btn btn-outline-dark rounded-1 pt-0"><small>Grooming</small></p></a>
          </div>

          <button id="book_now" class="btn btn-outline-light rounded-0 pt-0" style="outline-color:black; font-size:100%; text-align: left;">
            <p class="m-0">
              <i class="fas fa-shopping-cart"></i>
              <!-- <small id="num_of_items"> (0)</small> -->
              <small class=""> Book Now</small>
            </p>
          </button>

    </div>


  <div class="col border h-100">
      <!-- <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #ffe6e6 !important;">
        <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
        <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style="color:black"><p class="m-0"><small>Logout</small></p></a>
        </div>
      </div> -->

      <div class="container-fluid mh-100 p-3" style="background: #0F222D;height:25vh;">
        <div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
        <img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center" style="background: #D7DBDD;height: 10vh;">
        <p class="m-0 h3 text-dark" style="font-family:Brush Script MT; font-size: 300%;">Styling</p>
      </div>

      <div class=" d-flex row p-3 mt-3 justify-content-center ">
  <?php
     foreach($products as $record => $data) {
   ?>

   <div class="col-4 m-2 p-3 w-25 flex-column d-flex justify-content-center" style ="background: wheat; border-radius: 10px;">
     <p class = "m-0 h5 text-dark text-center h-75"> <?php echo $data['service_name']; ?> </p>
     <p class = "m-0 text-dark text-center h-25 p-2"> PHP<?php echo $data['service_price']; ?> </p>

     <button  name="button" id = "<?php echo $data['service_id']; ?>"  type = "button" class = "mt-2 btn btn-outline-dark add_to_cart">

       <i class = "fas fa-shopping-cart"></i>
       SELECT SERVICE <small class = "quantity" id = "1"> </small>

     </button>

</html>
<script type="text/javascript">
// I'm using jquery (search google for what is jquery)
  var cart = []; // an array in which the product_id is being stored
    $(document).ready(function(){
      var add_to_cart_btn = $('.add_to_cart'); // get all the element containg with class name "add_to_cart"
      add_to_cart_btn.click(function(){

        var get_product_id = $(this).attr('id') // get the element id of the specific element being click in the class "add_to_cart"
        // alert(get_product_id); // just for you to know what is id being clicked
        cart.push(get_product_id); // push the product id to the cart array
        //alert(cart); // just for you to know what is inside in the cart array
        $('#num_of_items').html('('+ cart.length +')'); // update cart item number

      var quantity = $(this).children('small').attr('id');
      quantity = Number(quantity);
      $(this).children('small').attr('id',quantity);
      $(this).children('small').html('x'+quantity);

    });

    var checkout = $('#book_now');
    checkout.click(function(){
      // I'll show you what is $_GET and how it being done in php
      // observe the url in your brower (e.g localhost/website/...)
      var url = '../customer/book_now.php?pid='+cart;
      window.location.replace(url);
    });
  });
</script>

   </div>

 <?php }

  ?>
</div>

   </div>

 </body>
</html>




    </div>

  </body>
</html>
