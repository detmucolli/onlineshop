<?php
session_start();
include "db.php";
if(isset($_SESSION['user_id'])){

    if($_SESSION['user_role'] == "admin"){
    $sql = "select * from products";
    $result = mysqli_query($conn,$sql);
            if(!$result){
                echo "Error!:  {$conn->error}";
            }
            else{
                echo "Product added successfully!";

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
            padding: 200px;
            margin-left: 200px;
        }
        table{
            width: 117%;
            border: none;
        }
        th{
            border-top: 4px solid darkblue;     
        }
        tr, th, td{
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid blue;
        }
        td{
            background-color: lightblue;
        }
        .update{
            background-color: lightgreen;
            text-decoration: none;
            padding: 10px;
        }
         .delete{
            background-color: lightcoral;
            text-decoration: none;
            padding: 10px;
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
        <table>
        <thead>
            <tr>
                <th>Product Title</th>
                   <!-- <th>Producgt Description</th> -->
                 <th>Image</th>
                  <th>Price</th>
                   <th>Stock</th>
                    <th>Action</th>
                    <th>Category</th>
                    <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                 <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                   <td><?php echo $row['stock'] ?></td>
                    <td><img src="image<?php echo $row['image'] ?>" alt=""></td>
                     <td><?php echo $row['category_name'] ?></td>
                     <td><a class="update" href="updateproduct.php?product_id=<?php echo $row['id']?>">Update</a></td>
                      <td><a class="delete" href="deleteproduct.php?product_id=<?php echo $row['id']?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>
