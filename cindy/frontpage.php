<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEC</title>
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
            margin-top: 4%;
            margin-left: 200px;
            display: flex;
        }
        .diagonal h1{
            margin-top: 30%;
            margin-left: 150px;
            color: white;
            letter-spacing: 8px;
        }
        .button {
            appearance: none;
            background-color: #FFFFFF;
            border-radius: 40em;
            border-style: none;
            box-shadow: #ADCFFF 0 -12px 6px inset;
            box-sizing: border-box;
            color: #000000;
            cursor: pointer;
            display: flex;
            float: left;
            font-weight: 700;
            letter-spacing: -.24px;
            margin: 0;
            outline: none;
            quotes: auto;
            text-align: center;
            text-decoration: none;
            transition: all .15s;
            -webkit-user-select: none;
            margin-top: 20%;
            margin-left: 15%;
            }
            .button a{
                text-decoration: none;
                color: black;
            }
            .button:hover {
            background-color: #90e0ef;
            box-shadow: #0096c7 0 -6px 8px inset;
            transform: scale(1.100);
            }

            .button:active {
            transform: scale(1.0);
            }

            @media (min-width: 768px) {
            .button {
                font-size: 1.5rem;
                padding: .75rem 2rem;
            }
            }
        </style>
    <div class="container">
        <div class="main">
            <div class="background"></div>
            <div class="diagonal">
                <img src="images/logo.png" class="logo">
                <h1>宿务东方学院</h1>
                <button class="button" role="button"><a href="login.php">Login</button></a>
                <button class="button" role="button"><a href="signup.php">Signup</button></a>
            </div>
           
        </div>
        <div class="text"></div>
    </div>
</body>
</html>