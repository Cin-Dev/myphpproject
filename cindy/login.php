<?php

include "connection.php";
include "config.php"    ;




if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    //check if both are filled
    if (empty($username) || empty($password)) 
    {
        echo "Username and password required!";
    }
    else
    {
        $get_user_query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($data, $get_user_query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row) {
                $hashed_password = $row["password"];
                $usertype = $row["usertype"];
                
                // Verify the entered password against the hashed password
                if (password_verify($password, $hashed_password)) {
                    $_SESSION["username"] = $username;
                    
                    if ($usertype == 'admin') {
                        header("location: Admin/adminindex.php");
                    } elseif ($usertype == 'staff') {
                        header("location: Staff/staffindex.php");
                    } else {
                        header("location: Users/userindex.php");
                    }
                } else {
                    echo "Invalid username or password!";
                }
            } else {
                echo "User not found!";
            }
        } else {
                echo "Invalid username or password!";
            }
        }    
    } 	

    $adminUsername = "CindyLabs";
    $adminPassword = "09661803359";
    $adminUsertype = "admin";

    //to check if already exist
    $admin_query = "SELECT * FROM users WHERE username = '$adminUsername'";
    $admin_result = mysqli_query($data, $admin_query);

    if ($admin_result === false) {
        echo "Error: " . mysqli_error($data);
    } elseif (mysqli_num_rows($admin_result) == 0) {
        $admin_hashed_password = password_hash($adminPassword, PASSWORD_DEFAULT);
        $insert_admin_query = "INSERT INTO users (username, password, usertype) VALUES ('$adminUsername', '$admin_hashed_password', '$adminUsertype')";
        
        if (mysqli_query($data, $insert_admin_query)) {
            echo "Default admin account created.";
        } else {
            echo "Error: " . mysqli_error($data);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            height: 100vh;
        }
        .text{
            height: 100%;
            width: 70%;
            float: left;
            background-color: blue;
            transform: skewX(-35deg);
            position: absolute;
            left: -25%;
            opacity: .5;
        }
        .background{
            height: 100vh;
            width: 100%;
            float: left;
            position: absolute;
            background: url(images/cec.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .main{
            height: 100%;
            width: 100%;
            float: left;
            display: flex;
            
        }
        .diagonal{
            height: 40%;
            width: 40%;
            float: left;
            z-index: 1; 
        }
        .diagonal .logo{
            position: absolute;
            width: 10vw;
            height: 15vh;
            margin-top: 2%;
            margin-left: 200px;
            display: flex;
        }
        .diagonal h1{
            margin-top: 25%;
            margin-left: 150px;
            color: white;
            letter-spacing: 8px;
        }
        .logbox{
            width: 100%;
            height: 70vh;
            margin-left: 20%;
            margin-top: 10px;
            width: 300px;
            background: none;
            color: white    ;
            font-size: 15px;
        }
        #text, #pass{
            height: 50px;
            width: 95%;
            border-radius: 20px;
            padding: 5px;
            margin-top: 10px;
            border: solid thin #f08080;
            background-color: #ffe5ec;
        }
        .checkpass{
            margin-left: 50px;
        }
        #button{
            padding: 10px;
            width:100px;
            color: black;
            background-color: #fb6f92;
            border: none;
        }
        #button:hover{
            background-color: #ffb3c6;
        }
        .label{
            font-size: 16px;
            color: white;
        }
        .login{
            text-align: center;
            margin-bottom: 10px;
            color: white;
            font-size: 45px;
        }
        .logbox a{
            color: white;
        }
        .button {
            align-items: center;
            appearance: none;
            background-color: #90e0ef;
            border-radius: 100px;
            border-width: 0;
            box-shadow: none;
            box-sizing: border-box;
            color: black;
            cursor: pointer;
            display: flex;
            font-size: 1rem;
            height: auto;
            justify-content: center;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;  
            }

        .button:active,
        .button:focus {
            outline: none;
            }

        .button:hover {
            background-color: #48cae4;
            }

        .button:focus:not(:active) {
            box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
            }
        </style>
    <div class="container">
        <div class="main">
            <div class="background"></div>
            <div class="diagonal">
                <img src="images/logo.png" class="logo">
                <h1>宿务东方学院</h1>

                <form action="login.php" method="post">
                    <div class="logbox">
                        <div class="login">Login</div>
                        <label class="label">Username</label>
                        <input id="text" type="text" name="username" placeholder="Username" required><br><br>
                        <label class="label">Password</label>
                        <input id="pass" type="password" name="password" placeholder="Password" required><br><br>
                        <input type="checkbox" class="checkpass" onclick="myFunction()">Show Password <br><br>
                        <button class="button" type="submit" value="login" role="button">Login</button><br>
                        Don't have account yet? <a href="signup.php">Sign up.</a>
                </form>
                </div>
                
            </div>
        </div>
        <div class="text"></div>
    </div>
                <script>
                    function myFunction() {
                    var x = document.getElementById("pass");
                    if (x.type === "password") {
                    x.type = "text";
                    } else {
                    x.type = "password";
                    }
                    }   
                </script>
</body>
</html>