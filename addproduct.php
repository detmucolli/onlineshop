<?php
session_start();
include "db.php";
if(isset($_SESSION['user_id'])){
    $sql1 = "select * from categories";
    $result1 = mysqli_query($conn,$sql1);
    if($_SESSION['user_role'] == "admin"){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            // $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $image = $_FILES['image']['name'];
            $temp_location = $_FILES['image']['tmp_name'];
            $upload_location = "image/";
            $category_name = $_POST['category_name'];
            $sql = "insert into products(name,price,stock,image,category_name)values('$name','$price','$stock','$image','$category_name')";

            $result = mysqli_query($conn,$sql);
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
        
<form action="addproduct.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Enter Product Name!" required>
            <!-- <textarea name="description" placeholder="Enter Product Description"></textarea> -->
            <input type="number" name="price" placeholder="Enter Price Here!">
            <input type="number" name="stock" placeholder="Enter Stock Number">
            <h2>Upload Image Here!</h2>
            <input type="file" name="image">
            <?php while($row = mysqli_fetch_assoc($result1)) { ?>
            <select name="category_name">
                <option value="<?php echo $row['name']; ?>"><?php echo $row['id']; ?></option>
            </select>
            <!-- <select name="description" >
                <option value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></option>
            </select> -->
            <?php } ?>
            <input class="button" type="submit" name="submit" value="add product">
        </form>
      </div>
</body>
</html>