<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
        nav{
        float: right;
        word-spacing: 30px;
        padding: 30px;
    }
        nav li{
        display: inline-block;
        line-height: 40px;
    }
    </style>
</head>
<style></style>
<body>
    <div class="wrapper">

    
        <header>
            <div class="logo">
                <img src="image\icons8-library-50.png" alt="">
                <h1 style="color: honeydew;">Library</h1>
            </div>
            <?php
                if(isset($_SESSION['login_user']))
                {?> 
                 <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                </nav>
             <?php   }
             else
             {
                 ?>
                <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
            </nav>
             <?php
             }
            ?>
            <!-- <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
            </nav> -->
        </header>
        <section>
<div class="sec_img">
    <br><br><br>
    <div class="w3-content w3-section" style="width: 500px;">
        <img class="mySlides w3-animate-left" src="images/a.jpg" alt="" style="width: 100%;">
        <img class="mySlides w3-animate-left" src="images/b.jpg" alt="" style="width: 100%;">
        <img class="mySlides w3-animate-left" src="images/c.jpg" alt="" style="width: 100%;">
        <img class="mySlides w3-animate-left" src="images/d.jpg" alt="" style="width: 100%;">
        <img class="mySlides w3-animate-left" src="images/e.jpg" alt="" style="width: 100%;">
    </div>

    <script type="text/javascript">
        var a=0;
        carousel();

        function carousel(){
            var i;
            var x=document.getElementsByClassName("mySlides");

            for(i=0;i<x.length; i++){
                x[i].style.display="none";
            }
            a++;
            if(a>x.length){a = 1}
            x[a-1].style.display = "block";
            setTimeout(carousel,3000);
        }
    </script>
            
            <!-- <div class="box">
                <br><br><br>
                <h1 style="text-align: center;font-size: 35px;">Welcome to library</h1><br><br>
                <h1 style="text-align: center;font-size: 25px;">Opens at: 9:00</h1><br>
                <h1 style="text-align: center;font-size: 25px;">Closes at: 16:00</h1>
            </div></div> -->
        </section>
        <!-- <footer>
            <p style="color: honeydew;text-align: center;">
                <br><br>
                Email:&nbsp; sunilrachhoya789@gmail.com <br><br>
                Mobile:&nbsp; +918387xxxxxx
            </p>
    </footer> -->
</div>

        <?php
            include "footer.php";
        ?>
</body>
</html>