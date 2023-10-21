<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Library</title>
</head>
<body>
    <style>
        *{
            font-family: 'Times New Roman', Times, serif;
        }
        body{
            margin: 0%;
            padding: 0%;
        }
        .container{
            width: 100vw;
            height: 100vh;
            /* background-color: #0096c7; */
            background: url(../images/itbackground.jpg)no-repeat;
            margin: 0%;
        }
        .header{
            width: 100vw;
            height: 10vh;
            display: flex;
            text-align: center;
            color: white;
        }
        .logo {
            display: flex;
            text-align: center;
            margin-left: 37%;
            width: 10vw;
            height: 15vh;
        }
        h1{
            margin-top: 15px;

        }
        .main{
            width: 100vw;
            height: 90vh;
            display: flex;
            align-items: center;
            float: left;
            justify-content: space-evenly;
            /* background-color: wheat; */
        }
        .header .title h2{
          width: 5vw;
          height: 5vh;
          display: flex;
          align-items: center;
          text-align: center;
          justify-content: center;
          margin-left: -320%;
        }
        .main{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            /* background: url(images/itbackground.jpg); */
        }
        .book{
            width: 10vw;
            height: 30vh;
        }
        .book:hover, .book:active{
            width: 15vw;
            height: 40vh;
        }
        footer{
            height: 7vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            color:white;
        }
        .header a{
            margin-left: 86px;
            text-decoration:none;
            color:white;
            width: 20px;
            height:10px;
            display: flex;
            margin-top: 40px;
            position: absolute;
            font-size: 160%;
        }
    </style>
     <div class="container">
        <div class="header">
            <a href="/cindy/Users/userindex.php">Back</a>
            <img src="/cindy/images/logo.png" class="logo">
            <h1>CEBU EASTERN COLLEGE</h1>
            <div class="title"><br><h2>ITLibrary</h2></div>
        </div>
        <div class="main">
            <div class="book">
            <a href="/cindy/books/Human-computer-interaction-book.pdf"><img src="/cindy/images/itbook1.jpg" class="book"></a>
            </div>
            <div class="book">
            <a href="/cindy/books/INTRODUCTION.pdf"><img src="/cindy/images/itbook2.jpg" class="book"></a>
            </div>
            <div class="book">
            <a href=""><img src="/cindy/images/itbook3.jpg" class="book"></a>
            </div>
            <div class="book">
            <a href=""><img src="/cindy/images/itbook1.jpg" class="book"></a>
            </div>
        </div>
    </div>
</div>
<footer>&copy; 2023-2024 Labra</footer>
</body>
</html>