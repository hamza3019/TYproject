<?php include('../include/connect.php');
include('../functions/common_function.php');
 @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
</style>
</head>
<body>
    <div class="container-fluid m-3">
<h2 class="text-center mb-5">Just Biker Things - Admin Login</h2>
<div class="row d-flex justify-content-center align-items-center">  
    <div class="col-lg-12 w-50 m-auto">
        <form action="" method="post">
            <div class="form-outline mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required="required" class="form-control">
            </div>

            <div class="form-outline mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required="required" class="form-control">
            </div>

            <div>
                <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="login">
                <p class="small">Don't have an account?<a href="admin_registration.php"> Register</a></p>
            </div>
        </form>
    </div>
</div>
    </div>

<!-- bootstrap js --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php
 if(isset($_POST['admin_login'])){
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];

    $select_query="Select * from `admin_table` where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0){
        $_SESSION['admin_name']=$admin_username; 
        if(password_verify($admin_password, $row_data['admin_password'])){
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }else{
        echo "<script>alert('invalid credentials')</script>";
    }
}

 ?>
 