<?php
include('include/connect.php');
include('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>just biker things</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="styles.css"/>

</head>
<body>
    <!--navbar first child-->
    <div class="container-fluid p-0">
        <!--firstchild-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="img/logo/black.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php// total_cart_price() ?></a>
        </li> -->     
      
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product"> 
      </form>
    </div>
  </div>
</nav>
    </div>

<!-- second child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome User</a>
                 </li>"; 
         }else{
           echo  "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome ". $_SESSION['username']."</a>
                 </li>"; 
         }

        if(!isset($_SESSION['username'])){
         echo  "<li class='nav-item'>
                   <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>"; 
        }else{
          echo  "<li class='nav-item'>
                   <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>"; 
        }
        
        ?>

  </ul>
</nav>


<!--third child-->
<div class="bg-light">
  <h3 class="text-center">RIDING GEAR</h3>
  <p class="text-center">the best of quality</p>
</div>

<!-- FOURTH CHILD -->
<div class="row px-3">
  <div class="col-md-10">
    <!--products-->
    <div class="row"> 

    <!-- fetching products -->
    <?php
    // calling function

         view_details();
         get_unique_categories();
         get_unique_brands();
    ?>
     

<!-- row end -->
    </div>
<!-- column end -->
 </div>


  <div class="col-md-2 bg-secondary p-0">
    <!-- sidenav -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      
      <?php
    //displays categories on sidenav
getcategories();
?>

    </ul>

    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
      </li>

      <?php
      //displays brands on sidenav
getbrands();
?>
    </ul>

  </div>
</div> 

<!-- last child -->
<!-- include footer -->
<?php

include("./include/footer.php")

?>


<!-- bootstrap js --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>