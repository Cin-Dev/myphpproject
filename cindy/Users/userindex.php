<?php
include "../connection.php";
include "../config.php";


if(!isset($_SESSION["username"]))
{
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Home</title>
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
            background: url(../images/Librarybackground.jpg) no-repeat center center/cover;
        }
        .header{
            width: 100%;
            height: 20vh;
            /* background-color: #48cae4; */
            display: flex;
            font-size: 20px;
            text-align: center;
            color: white;
        }
        .main{
            width: 100%;
            height: 80vh;
            display: flex;
            align-items: center;
            float: left;
            justify-content: space-evenly;
        }
        footer{
            height: 7vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            color:white;
        }
        .logo {
            display: flex;
            text-align: center;
            margin-left: 25%;
            width: 10vw;
            height: 15vh;
        }
        .main .card .library{
          text-decoration: none;
          color: black;
        }
        .main .box {
            position: relative;
            width: 18vw;
            height: 40vh;
            min-height: 320px;
            background: #f2f2f2;
            overflow: hidden;
            transition: all 0.5s ease-in;
            z-index: 2;
            box-sizing: border-box;
            padding: 30px;
            box-shadow: -10px 25px 50px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }
        .main .box::before {
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
        .main .box::after {
            position: absolute;
            bottom: -10%;
            right: 5%;
            font-size: 120px;
            opacity: 0.2;
            background: transparent;
            filter: invert(1);
            pointer-events: none;
        }
        .main.box p {
            margin: 0;
            padding: 10px;
            font-size: 1.2rem;
        }
        .main .box h2 {
            position: absolute;
            margin: 0;
            padding: 0;
            bottom: 10%;
            right: 10%;
            font-size: 1.2rem;
        }
        .card .box .dev{
          text-align: right;
        }
        .main .box:hover {
            color: #f2f2f2;
            box-shadow: 20px 50px 100px rgba(0, 0, 0, 0.5);
        }
        .main .bg {
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
        .main .box.box1:hover,
        .quotes .box.box1:hover~.bg {
            opacity: 1;
            background: #e2a9e5;
            background: -moz-linear-gradient(-45deg, #90e0ef 15%, #0096c7 100%);
            background: -webkit-linear-gradient(-45deg, #90e0ef 15%,#0096c7 100%);
            background: linear-gradient(135deg, #90e0ef 15%,#0096c7 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2a9e5', endColorstr='#2b94e5',GradientType=1 );
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
        .menu a{
          text-decoration:none;
          color:white;
          width: 20px;
          height:10px;
          display: flex;
          margin-top: 40px;
          position: absolute;
          right: 70px;
        }
    </style>
    <div class="container">
        <div class="header">
                <img src="../images/logo.png" class="logo">
                <h1>CEBU EASTERN COLLEGE</h1>
                <div class="title"><br><br><h2>Library</h2></div>
                <div class="menu">
                  <a href="/cindy/logout.php">Logout</a>
                </div>
        </div>
        <div class="main">
          <div class="card">
            <a href="itlibrary.php" class="library">
                <div class="box box1">
                  <p>Title of book</p>
                  <h2>Information Technology</h2>
                </div>
            </a>
          </div>
            <div class="card">
              <a href="tmlibrary.php" class="library">
                <div class="box box1">
                  <p>Title of book</p>
                  <h2>Tourism Management</h2>
                </div>
              </a>
            </div>
            <div class="card">
              <a href="hmlibrary.php" class="library">
                <div class="box box1">
                  <p>Title of book</p>
                  <h2>Hospitality Management</h2>
                </div>
              </a>
            </div>
          <div class="card">
              <a href="devcomlibrary.php" class="library">
                <div class="box box1">
                  <p>Title of book</p>
                  <h2 class="dev">Development Communication</h2>
                </div>
              </a>
            </div>
          <div class="card">
              <a href="educlibrary.html" class="library">
                <div class="box box1">
                  <p>Title of book</p>
                  <h2>Basic Education</h2>
                </div>
              </a>
          </div>
        </div>
    </div>
  </div>
    <footer>&copy; 2023-2024 Labra</footer>
</body>
</html>