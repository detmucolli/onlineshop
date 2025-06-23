<?php
session_start();
include "db.php";
if(isset($_SESSION['user_id'])){

    $sql1 = "select * from categories";
    $result1 = mysqli_query($conn,$sql1);
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $sql2 = "SELECT * FROM products WHERE id = '$product_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);   
    
    }
    
    if($_SESSION['user_role'] == "admin"){
        if(isset($_POST['submit'])){
            $product_id = $_GET['product_id'];
            $name = $_POST['name'];
            // $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $sql3 = "UPDATE products SET name = '$name', price = '$price', stock = '$stock' WHERE id = '$product_id'";
            $result3 = mysqli_query($conn, $sql3);
            if($result3){
                header("Location: displayproduct.php");
            }
            else{
                echo "Error!: {$conn->error}";
            }
            $image = $_FILES['image']['name'];
            if($image){
                  $temp_location = $_FILES['image']['tmp_name'];
                  $upload_location = "image/";
                  $sql = "UPDATE products SET name= '$name', price = '$price', stock = '$stock', image = '$image' where id = '$product_id'";
                   $result4 = mysqli_query($conn, $sql4);
                  if($result4){
                    move_uploaded_file($temp_location,$upload_location.$image);
                  header("Location: displayproduct.php");
            }
            else{
                echo "Error!: {$conn->error}";
            }
            }

          
            $category_name = $_POST['category_name'];
             if(category_name){
                  
                  $sql5 = "UPDATE products SET name= '$name', price = '$price', stock = '$stock', category_name = '$category_name' where id = '$product_id'";
                   $result5 = mysqli_query($conn, $sql5);
                  if($result5){
                    
                  header("Location: displayproduct.php");
            }
            else{
                echo "Error!: {$conn->error}";
            }
            }
            
            if(!$result){
                echo "Error!:  {$conn->error}";
            }
            else{
                echo "Product added successfully!";
                move_uploaded_file($temp_location,$upload_location.$image);
            }
        }
    }
    else{
        echo "go for user dashboard";
    }
}
else{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .dashboard_sidebar{
           
            position: fixed;
            top: 0;
            background-color: darkcyan;
            width: 200px;
            height: 100%;
        }
        .dashboard_sidebar ul li{
            list-style: none;
            text-align: center;
        }
        .dashboard_sidebar ul li a{
              padding: 10px;
            display: block;
            text-decoration: none;
            color: white;
        }
        .dashboard_sidebar ul li a:hover{
            background-color: black;
        }
        .dashboard_main{
            position: relative;
            padding: 30px;
           left: 45%;
           margin-top: 10px;
        }
        .dashboard_main input{
            display: block;
            margin: 10px;
            padding: 20px;
            border-radius: 15px 50px;
            border-left: 2px solid lightcoral;
            border-right: 2px solid lightcoral;
        }
          .dashboard_main select{
            display: inline-block;
            margin: 10px;
            padding: 20px;
            border-radius: 15px 50px;
            border-left: 2px solid lightcoral;
            border-right: 2px solid lightcoral;
        }
         .dashboard_main textarea{
            display: block;
            margin: 10px;
            padding: 20px;
            width: 20%;
            border-left: ;
            border-radius: 15px 50px;
        }
        .button{
            width: 15%;
            background-color: green;
            border-radius: 15px 50px;
            border-left: 2px solid lightcoral;
            border-right: 2px solid lightcoral;
        }
    </style>
</head>
<body>
    <div class="dashboard_sidebar">
        <ul>
            <li><a href="addproduct.php">Add Product</a></li>
             <li><a href="displayproduct.php">View Order</a></li>
              <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
    <div class="dashboard_main">
        
<form action="updateproduct.php?product_id=<?php echo $product_id;?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo $row2['name']; ?>">
            <!-- <textarea name="description" value="<?php echo $row2['description']; ?>"></textarea> --> -->
            <input type="number" name="price" value="<?php echo $row2['price']; ?>">
            <input type="number" name="stock" value="<?php echo $row2['stock']; ?>">
            <img src="image/<?php echo $row2['name']; ?>" alt="">
            <input type="file" name="image">
            <h1>Category Name Is: <?php echo $row2['category_name']; ?></h1>
            <?php while($row = mysqli_fetch_assoc($result1)) { ?>
            <select name="category_name">
                <option value="<?php echo $row['name']; ?>"><?php echo $row['id']; ?></option>
            </select>
            <!-- <select name="description" >
                <option value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></option>
            </select> -->
            <?php } ?>
            <input class="button" type="submit" name="submit" value="update product">
        </form>
      </div>
</body>
</html>