<?php

    include "connection.php";
    include "config.php";

    if ($data === false) {
        die("Connection error");
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";

        //to know if both are filled
        if (empty($username) || empty($password))
        {
            echo "Both username and password are required!";
        }
        else
        {
            //check the account if already exist
            $check_username_query = "SELECT * FROM users WHERE username = '$username'";
            $check_username_result = mysqli_query($data, $check_username_query);

            if ($check_username_result === false) {
                echo "Error: " . mysqli_error($data);
            } elseif (mysqli_num_rows($check_username_result) > 0) {
                echo "Username already exists. Please choose another username.";
            } else {
                //for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                //Insert the new user into the database
                $insert_user_query = "INSERT INTO users (username, password, usertype) VALUES ('$username', '$hashed_password', '$usertype')";
    
                if (mysqli_query($data, $insert_user_query)) {
                    echo "Registration successful! You can now login with your new username and password.";
                } else {
                    echo "Error: " . mysqli_error($data);
                }
            }
        }
    }

    $adminUsername = "CindyLabss";
    $adminPassword = "09661803359";
    $adminUsertype = "admin";

    //to check if already exist
    $admin_query = "SELECT * FROM users WHERE username = '$adminUsername'";
    $admin_result = mysqli_query($data, $admin_query);

    if ($admin_result === false) {
        echo "Error: " . mysqli_error($data);
    } elseif (mysqli_num_rows($admin_result) == 0) {
        $admin_hashed_password = password_hash($adminPassword, PASSWORD_DEFAULT);
        $insert_admin_query = "INSERT INTO users (username, password, usertype) VALUES ('$adminUsername', '$adminPassword', '$adminUsertype')";
        
        if (mysqli_query($data, $insert_admin_query)) {
            echo "Default admin account created.";
        } else {
            echo "Error: " . mysqli_error($data);
        }
    }

    mysqli_close($data);    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

                <form action="signup.php" method="post">
                    <div class="logbox">
                        <div class="login">Register</div>
                        <label class="label">Username</label>
                        <input id="text" type="text" name="username" placeholder="Username" required><br><br>
                        <label class="label">Password</label>
                        <input id="pass" type="password" name="password" placeholder="Password" required><br><br>
                        <select id="usertype" name="usertype">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="user">User</option>
                        </select>
                        <input type="checkbox" class="checkpass" onclick="myFunction()">Show Password <br><br>
                        <button class="button" type="submit" name="register" value="Sign Up" role="button">Signup</button><br>
                        <a href="login.php">Go to Login</a>
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