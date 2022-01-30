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
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
    section{
        margin-top: -20px;
    }
</style>

</head>
<body>
    
    <section>
        <div class="log_img"><br>
            
        <div class="box1">
        <form name="Login" action="" method="post">
            <h1 style="text-align: center;font-size: 25px;">User Login Form</h1><br>
            <div class="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required> <br>
            <button style="color: black;" type="submit" name="submit" class="btn btn-default">Login</button></div><br>
            <p style="padding-left: 70px;color: honeydew;">
                <a style="color: yellow;" href="update_password.php">Forgot Password?</a> &nbsp; &nbsp; 
                New to this website?<a style="color: yellow;" href="registration.html"> &nbsp; Sign Up</a>
            </p>
        </form>    
    </div></div>
    </section>
<?php

    if(isset($_POST['submit']))
    {
        $count=0;
        $res=mysqli_query($db,"SELECT * FROM `data` WHERE username='$_POST[username]' AND password='$_POST[password]';");

        $row=mysqli_fetch_assoc($res);

        $count=mysqli_num_rows($res);

        if($count==0)
        {
            ?>
            <!-- <script type="text/javascript">
                alert("The Username And Password doesn't match.")
            </script> -->
            <div>
                <strong class="alert alert-danger" style="width: 700px; margin-left: 600px;">The Username And Password doesn't match.</strong>
            </div>
            <?php
        }
        else{
            $_SESSION['login_user'] = $_POST['username'];
            $_SESSION['pic']=$row['pic'];
            ?>
                <script type="text/javascript">
                window.location="index.php"
            </script>
            <?php
        }
    }

?>

</body>
</html>