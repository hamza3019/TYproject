<!--connect file-->
<?php
include('../include/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css --> 
    <link rel="stylesheet" href="../styles.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        .product_img{
            width: 100px;
            object-fit:contain;
        }
    </style>

</head>
<body>
    <!-- navbar --> 
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo/black.png" class="logo" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child --> 
        <div class="bg-light">
            <h3 class="text-center p-2">Admin Center</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../img/adminphotos/adminpic1.jpg" class="admin_image" alt=""></a>
                    <p class="text-light text-center">Admin 1</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
                   <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button> -->
                    <button class="my-3"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">insert brands</a></button>
                   <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button> -->
                    <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <!-- <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button> -->
                    <!--<button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button> -->
                    <button class="my-3"><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button> 
                 </div>
            </div>
       </div>

        <!-- fourth child -->
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_category']))
            {
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand']))
            {
                include('insert_brands.php');
            }
            if(isset($_GET['view_products']))
            {
                include('view_products.php');
            }
            if(isset($_GET['edit_products']))
            {
                include('edit_products.php');
            }
            if(isset($_GET['delete_products']))
            {
                include('delete_products.php');
            }
            if(isset($_GET['list_orders']))
            {
                include('list_orders.php');
            }
            if(isset($_GET['delete_order']))
            {
                include('delete_order.php');
            }
            if(isset($_GET['list_users']))
            {
                include('list_users.php');
            }
            ?>
        </div>


        
   </div>

   <!-- js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html> 