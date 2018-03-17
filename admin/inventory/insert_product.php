<?php

$mysqli = new mysqli("localhost", "root", "avnishy44", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
        //set all the post variables
        //set supplier details
        
        $supplier_email = $mysqli->real_escape_string($_POST['supplier_email']);
       
        
        //set supplier address details
        $product_name =$mysqli->real_escape_string($_POST['product_name']);
        $product_sku = $mysqli->real_escape_string($_POST['product_sku']);
        $product_costprice =$mysqli->real_escape_string($_POST['product_costprice']);
        $product_sellingprice =$mysqli->real_escape_string($_POST['product_sellingprice']);
        $product_dimensions =$mysqli->real_escape_string($_POST['product_dimensions']);
        $product_weight =$mysqli->real_escape_string($_POST['product_weight']);
        $product_description =$mysqli->real_escape_string($_POST['product_description']);
        $product_colour =$mysqli->real_escape_string($_POST['product_colour']);
        $product_stock =$mysqli->real_escape_string($_POST['product_stock']);
        
        $selection = "SELECT * FROM supplier WHERE supplier_email='$supplier_email'";
        $run_selection = mysqli_query($mysqli , $selection);
                
                $supplier_id='';
                while($row_selection = mysqli_fetch_array($run_selection)){
                    $supplier_id = $row_selection['supplier_id'];   
                };
                
                $count = mysqli_num_rows($run_selection);
          
            if ($count > 0){
                
                
               //insert user data into database
               $sql = "INSERT INTO inventory (product_name,product_sku,product_costprice,product_sellingprice,product_dimensions,product_weight,product_description,product_colour,product_stock,supplier_supplier_id)
               VALUES ('$product_name','$product_sku','$product_costprice','$product_sellingprice','$product_dimensions','$product_weight','$product_description','$product_colour','$product_stock','$supplier_id')";
            
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    echo "<div class='alert alert-error'><h1>Product $product_name successfully added to database !</h1></div>";
                }
                else {
                    echo "<div class='alert alert-error'><h1>Product could not be added to the database!</h1></div>";
                }
                $mysqli->close();          

            }
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="../../includes/css/form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="insert_product.php" method="post" enctype="multipart/form-data" autocomplete="off">
      
      <input type="email" placeholder="Supplier Email" name="supplier_email" required />
      
      <input type="text" placeholder="Product Name" name="product_name" required />
      <input type="text" placeholder="Product SKU" name="product_sku" required />
      <input type="text" placeholder="Product Costprice" name="product_costprice" required />
      <input type="text" placeholder="Product Sellingprice" name="product_sellingprice" required />
      <input type="text" placeholder="Product Dimensions" name="product_dimensions" required />
      <input type="text" placeholder="Product Weight" name="product_weight" required />
      <input type="text" placeholder="Product Description" name="product_description" required />
      <input type="text" placeholder="Product Colour" name="product_colour" required />
      <input type="text" placeholder="Product Stock" name="product_stock" required />
      
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>