<?php include('../include/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
        <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  .payment_img{
    width:90%;
    display:block;
    margin:auto;
  }
</style>

<body>
  <!-- php code for user id-->
  <?php 
  $user_ip=getIPAddress();
  $get_user="Select * from `user_table` where user_ip='$user_ip' ";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
  ?>

  <div>
    <div class="container">
     <h2 class="text-center tect-info">Payment Options</h2>
      <div class="row d-flex justify-content-center align-items-center text-center my-5">
          <div class="col-md-6">
          <a href="#"><img src="../img/payment_img.jpg" alt="" class="payment_img"></a>
          </div> 
          <div class="col-md-6">
          <a href="order.php?user_id=<?php echo $user_id ?>"><h2>Pay Offline</h2></a>
          </div>
      </div>
    </div>  
  </div>
</body>
</html>

