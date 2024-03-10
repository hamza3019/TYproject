<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
   
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
 //  echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];




    // fetching category nmae
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;
    
    
    // fetching brand nmae
    $select_brand="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo $brand_title;


}


?>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-lable">Product Title</label>
            <input type="text" id="product_title" value=<?php echo $product_title ?>  name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-lable">Product Description</label>
            <input type="text" id="product_desc" value=<?php echo $product_description ?> name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-lable">Product Keywords</label>
            <input type="text" id="product_keywords" value=<?php echo $product_keywords ?> name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-lable">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php  echo $category_title ?>"><?php  echo $category_title ?></option>
                <?php 
                    $select_category_all="Select * from `categories`";
                    $result_category_all=mysqli_query($con,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    };
                
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-lable">Product Brand</label>
            <select name="product_brands" class="form-select">
            <option value="<?php  echo $brand_title ?>"><?php  echo $brand_title ?></option>
            <?php 
                    $select_brand_all="Select * from `brands`";
                    $result_brand_all=mysqli_query($con,$select_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                        $brand_title=$row_brand_all['brand_title'];
                        $brand_id=$row_brand_all['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    };
                
                ?>
            </select>
        </div>        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-lable">Product Price</label>
            <input type="text" id="product_price" value=<?php echo $product_price ?> name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="update" class="btn btn-info p-3 mb-3">
        </div>




    </form>
</div>

<!--editing products-->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
 // $product_image1=$_FILES['product_image1'];
 // $product_image2=$_FILES['product_image2'];
 // $product_image3=$_FILES['product_image3'];
    $product_price=$_POST['product_price'];


    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price==''){
        echo "<script>alert('please fill all the fields')</script>";
    }else{
        /// query to ipdate products
        $update_products="update `products` set product_title='$product_title', product_description='$product_desc', product_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brands', product_price='$product_price', date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Prodect updated successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}
?>
