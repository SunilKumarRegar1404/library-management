<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <section>
        <div style="margin-top: -20px;" class="reg_img">
            <br><br>
        <div class="box2">
        <form name="Registration" action="" method="post">
            <h1 style="color: #65614c; font-size: 30px;padding: 5px;text-align: center;">LIBRARY MANAGEMENT </h1>
            <h1 style="text-align: center;font-size: 25px;">User Registration Form</h1><br>
            <div class="registration">
            <input class="form-control" type="text" name="first" placeholder="First Name" required><br>
            <input class="form-control" type="text" name="last" placeholder="Last Name" required> <br>
            <input class="form-control" type="text" name="username" placeholder="Username" required> <br>
            <input class="form-control type="password" name="password" placeholder="Password" required> <br>
            <input class="form-control type="text" name="roll" placeholder="Roll No"><br>
            <input class="form-control type="text" name="email" placeholder="Email" required><br>
            <input class="form-control type="text" name="phone" placeholder="Phone No" required><br>
            <button style="color: black;" type="submit" name="submit" class="btn btn-default">Sign Up</button></div>
        </form>    
    </div></div>
    </section>
</body>
    <?php

    if(isset($_POST['submit']))
    {
        $count=0;
        $sql="SELECT username FROM data";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['username']==$_POST['username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {mysqli_query($db,"INSERT INTO `DATA` VALUES('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','$_POST[phone]','p.png');");
    
            ?>
            <script type="text/javascript">
                window.location="../login.php"
            </script>
         <?php
    }
    else
    {
    ?>
        <script type="text/javascript">
        alert("The Username Already Exist.")
        </script>
    <?php    
    }

    }

