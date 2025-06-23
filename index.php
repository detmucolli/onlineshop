<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding; 0;
            overflow-x: hidden;
        }
        .header{
            position: fixed;
            top: 0;
            width: 100%;
            background-color: gray;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
        }
        .header ul li{
            list-style: none;
        }
       
        .header a{
            text-decoration: none;
            color: white;
        }
        .header li{
            display: inline-block;
            margin-right: 50px;
            
        }
        .main{
            margin-top: 100px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 90px;
        }
        .product{
            margin: 10px;
            border: 2px solid blueviolet;
            max-width: 300px;
            padding: 30px;
            text-align: center;
        }
       
        .product a{
            display: block;
            text-decoration: none;
            color: black;
            background-color: greenyellow;
            padding: 10px;
            margin-top: 10px;
           width: 100%;
        }
        .product img{
            width: 150px;
        }
        .productprice{
            color: burlywood;
            font-size: large;
        }
        .footer{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: gray;
            position: fixed;
            bottom: 0;
            padding: 20px;
            width: 100%;
        }
        .footer p{
            text-align: center;
        }
        @media(max-width: 400px){
            .header{
                display: flex;
                flex-direction: column;
            }
            .footer{
                display: flex;
                flex-direction: column;
                
            }
        }
    </style>
</head>
<body>
  <header class="header">
    <a href="index.php">Shop</a>
     <a href="index.php"><img src="" alt=""></a>
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
             <li><a href="register.php">Sign Up</a></li>
              <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main class="main">
    <?php {
        ?>
   <div class="product">
    <img src="airjordan5.avif" alt="">
    <h2>Air Jordan 5 Retro "Grape"</h2>
    <p>The AJ5 is a win no matter how you look at it. The "Grape" colorway broke the mold, veering away from heritage Jordan colors to nod the NBA team in the state MJ grew up in.</p>
    <p>Stock: 35</p>
    <p class="productprice">215€</p>
    <a href="#">Buy now</a>
   </div>
   <div class="product">
    <img src="airjordan.jpg" alt="">
    <h2>Air Jordan 1</h2>
    <p>Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look that's familiar yet always fresh.</p>
    <p>Stock: 12</p>
    <p class="productprice">125€</p>
    <a href="#">Buy now</a>
   </div>
   <div class="product">
    <img src="lowair1.avif" alt="">
    <h2>Air Jordan 1 Low</h2>
    <p>Always in, always fresh. The Air Jordan 1 Low sets you up with a piece of Jordan history and heritage that's comfortable all day. </p>
    <p>Stock: 7</p>
    <p class="productprice">130€</p>
    <a href="#">Buy now</a>
   </div>
   <div class="product">
    <img src="jordannn.avif" alt="">
    <h2>Jordan Flight Club '91</h2>
    <p>The Jordan Flight Club '91 has a design that throws back to basketball's golden age and the sneakers that reigned supreme. </p>
    <p>Stock: 23</p>
    <p class="productprice">150€</p>
    <a href="#">Buy now</a>
   </div>
   <div class="product">
    <img src="JORDAN6.avif" alt="">
    <h2>Jordan 6 Rings</h2>
    <p>Celebrate the legendary career of "His Airness" with the Jordan 6 Rings.</p>
    <p>Stock: 4</p>
    <p class="productprice">130€</p>
    <a href="#">Buy now</a>
   </div>
   <div class="product">
    <img src="midair1.avif" alt="">
    <h2>Air Jordan 1 Mid</h2>
    <p>The Air Jordan 1 Mid brings full-court style and premium comfort to an iconic look.</p>
    <p>Stock: 9</p>
    <p class="productprice">130€</p>
    <a href="#">Buy now</a>
   </div>
   <?php } ?>
   
   
   
</main>
<footer class="footer">
    <p>copyright@:</p>
</footer>
</body>
</html>