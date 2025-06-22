<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_role'] == "admin"){

    }
    else{
        echo "go for user dashboard";
    }
}
else{
    header("Location: ../index.php");
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
            margin-left: 0;
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
            padding: 30px;
            margin-left 200px;
        }
    </style>
</head>
<body>
    <div class="dashboard_sidebar">
        <ul>
            <li><a href="">Add Product</a></li>
             <li><a href="">View Order</a></li>
              <li><a href="">logout</a></li>
        </ul>
    </div>
    <div class="dashboard_main">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, 
            doloribus obcaecati nulla adipisci pariatur aliquam 
            reiciendis quam exercitationem earum quibusdam ullam molestias corrupti,
             quasi cum. Voluptatibus optio necessitatibus fuga aliquid.
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Maxime, nobis. Accusamus dolore quia libero autem. 
            Quas, culpa autem. Quasi fuga atque voluptatum
             distinctio perspiciatis quae nihil possimus officiis magni ad.</p>
    </div>
</body>
</html>