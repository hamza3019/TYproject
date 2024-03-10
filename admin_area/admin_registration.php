<?php include('../include/connect.php');
include('../functions/common_function.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css --> 
    <link rel="stylesheet" href="../styles.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
    body{
        overflow:hidden;
    }
    .registration_img{
        width:200%;
    }
</style>
</head>
<body>
    <div class="container-fluid m-3">
<h2 class="text-center mb-5">Just Biker Things - Admin Registration</h2>
<div class="row d-flex justify-content-center align-items-center">  
    <div class="col-lg-12 w-50 m-auto">
        <form action="" method="post">
            <div class="form-outline mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required="required" class="form-control">
            </div>

            <div class="form-outline mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required="required" class="form-control">
            </div>

            <div class="form-outline mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required="required" class="form-control">
            </div>

            <div class="form-outline mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter password" required="required" class="form-control">
            </div>

            <div>
                <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="register">
                <p class="small">Already have an account?<a href="admin_login.php"> Login</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
    
<!-- bootstrap js --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>

<!--php connection -->

<?php
if(isset($_POST['admin_registration'])){
   $admin_username=$_POST['username'];
   $admin_email=$_POST['email'];
   $admin_password=$_POST['password'];
   $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
   $confirm_password=$_POST['confirm_password'];

   $select_query="Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email' ";
   $result=mysqli_query($con,$select_query);
   $rows_count=mysqli_num_rows($result);
   if($rows_count>0){
    echo "<script>alert('username or email already exist')</script>";
   }else if($admin_password!=$confirm_password){
    echo "<script>alert('Passwords do not match')</script>";
   }
   else{
    // insert_query
   // move_uploaded_file($user_image_tmp,"./user_images/$user_image");
   $insert_query="insert into `admin_table` (admin_name, admin_email, admin_password) values ('$admin_username','$admin_email','$hash_password')";
   $sql_execute=mysqli_query($con,$insert_query);
   if($sql_execute){
    echo "<script>alert('Data inserted successfully')</script>";
   }else{
    die(mysqli_error($con));
   }
   }
}
?>