<?php
include "../connection.php";
include "../config.php";



if(!isset($_SESSION["username"]))
{
	header("location: ../login.php");
}

$sql1 = "SELECT * FROM users WHERE usertype = 'admin'";
$sql2 = "SELECT * FROM users WHERE usertype = 'staff'";
$sql3 = "SELECT * FROM users WHERE usertype = 'user'";

$admin = 0;
$result = mysqli_query($data, $sql1);
while($row = mysqli_fetch_assoc($result)){
$admin++;
}
$staff = 0;
$result = mysqli_query($data, $sql2);
while($row = mysqli_fetch_assoc($result)){
$staff++;
}
$user = 0;
$result = mysqli_query($data, $sql3);
while($row = mysqli_fetch_assoc($result)){
$user++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <style>
        body{
            margin: 0%;
            padding: 0%;
        }
        .container{
            width: 100%;
            height: 100vh;
            background-color: #0096c7;
            margin: 0%;
        }
        .header{
            width: 100%;
            height: 20vh;
            background-color: #48cae4;
            display: flex;
            font-size: 20px;
            text-align: center;
        }
        .logo {
            display: flex;
            mix-blend-mode: multiply;
            text-align: center;
            margin-left: 25%;
        }
        .left-nav{
            width: 10%;
            height: 80vh;
            background-color: #48cae4;
            float: left;
        }
        .right-nav {
            width: 90%;
            min-height: 80vh;
            display: flex;
            justify-content: space-evenly;
            background-color: lightblue;
            align-items: center;
        }

        .right-nav .box {
            position: relative;
            width: 25vw;
            height: 50vh;
            min-height: 320px;
            background: #f2f2f2;
            overflow: hidden;
            transition: all 0.5s ease-in;
            z-index: 2;
            box-sizing: border-box;
            padding: 30px;
            box-shadow: -10px 25px 50px rgba(0, 0, 0, 0.3);
        }

        .right-nav .box::before {
            position: absolute;
            top: -20px;
            left: 5px;
            width: 100%;
            height: 100%;
            font-size: 120px;
            opacity: 0.2;
            background: transparent;
            pointer-events: none;
        }

        .right-nav .box::after {
            position: absolute;
            bottom: -10%;
            right: 5%;
            font-size: 120px;
            opacity: 0.2;
            background: transparent;
            filter: invert(1);
            pointer-events: none;
        }

        .right-nav.box p {
            margin: 0;
            padding: 10px;
            font-size: 1.2rem;
        }

        .right-nav .box h2 {
            position: absolute;
            margin: 0;
            padding: 0;
            bottom: 10%;
            right: 10%;
            font-size: 1.5rem;
        }

        .right-nav .box:hover {
            color: #f2f2f2;
            box-shadow: 20px 50px 100px rgba(0, 0, 0, 0.5);
        }

        .right-nav .bg {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            transition: all 0.5s ease-in;
            pointer-events: none;
            width: 100%;
            height: 200%;
            overflow: hidden;
        }

        .right-nav .box.box1:hover,
        .quotes .box.box1:hover~.bg {
            opacity: 1;
            background: #e2a9e5;
            background: -moz-linear-gradient(-45deg, #90e0ef 15%, #0096c7 100%);
            background: -webkit-linear-gradient(-45deg, #90e0ef 15%,#0096c7 100%);
            background: linear-gradient(135deg, #90e0ef 15%,#0096c7 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2a9e5', endColorstr='#2b94e5',GradientType=1 );
        }
        .menu{
            display: grid;
            justify-content: center;
            align-items: center;
            margin-top: 40%;
            letter-spacing: 3px;
            padding: 50px;
        }
        .menu a{
            color: black;
            text-decoration: none;
        }
        .menu a:hover{
            color: #B8DBD9;
        }
        .header .title h2{
          width: 100px;
          height: 35px;
          display: flex;
          align-items: center;
          text-align: center;
          justify-content: center;
          margin-left: -320%;
        }
    </style>
    <div class="container">
        <div class="header">
            <img src="../images/logo.png" class="logo">
            <h1>CEBU EASTERN COLLEGE</h1>
            <div class="title"><br><br><h2>Admin</h2></div>
        </div>
        <div class="left-nav">
            <div class="menu">
                <a href="">Dashboard</a><br><br>
                <a href="">Home</a><br><br>
                <a href="/cindy/logout.php">Logout</a>
            </div>
        </div> 
        <div class="right-nav">
                <div class="card">
                  <div class="box box1">
                    <p><?php echo "Number of Admin: " . $admin. "<br>";?></p>
                    <h2>Admin</h2>
                  </div>
                  
                </div>
                <div class="card">
                  <div class="box box1">
                    <a href=""></a>
                    <p><?php echo "Number of Staff: " . $staff. "<br>";?></p>
                    <h2>Staff</h2>
                  </div>
               
                </div>
                <div class="card">
                  <div class="box box1">
                    <p><?php echo "Number of User: " . $user. "<br>";?></h2>
                  <h2>User</h2></a>
                  </div>
                </div>
        </div>
    
</body>
</html>