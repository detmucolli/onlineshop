<?php
session_start();
include "db.php";
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_role'] == "admin"){
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $sql = "DELETE FROM products WHERE id = '$product_id'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Error!: {$conn->error}";
            }
            else{
                echo "Deleted successfully! <a href='displayproduct.php'>Go Back</a>";        
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