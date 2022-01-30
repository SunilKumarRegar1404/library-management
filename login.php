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

<style type="text/css">
    section{
        margin-top: -20px;
    }
section .box1{
    height: 450px;
    width: 450px;
    margin: 30px auto; 
    background-color: #836145;
    opacity: 0.8;
    border: 3px solid #2c190e;
    backdrop-filter: blur(1.5px);
}
label{
    font-style: 18px;
    font-weight: 600;
}
body{
        margin-top: 0px;
        height:100%;
        width: 100%;
        background-color:black;
        /* background-image: url("image/3.jpg");  */
    }
</style>

</head>
<body>
    
    <section>
        <div class="log_img"><br>
            
        <div class="box1">
        <form name="Login" action="" method="post">
        <h1 style="text-align: center;font-size: 25px;">User Login Form</h1><br>

        <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700;">Login as:</p></b>

        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
        <label for="admin">Admin</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student" checked="">
        <label for="student">Student</label>
            
            <div class="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required> <br>
            <button style="color: black;" type="submit" name="submit" class="btn btn-default">Login</button></div><br>
            <p style="padding-left: 70px;color: honeydew;">
                <a style="color: yellow;" href="update_password.php">Forgot Password?</a> &nbsp; &nbsp; 
                New to this website?<a style="color: yellow;" href="registration.php"> &nbsp; Sign Up</a>
            </p>
        </form>    
    </div></div>
    </section>
<?php

    if(isset($_POST['submit']))
    {
        if($_POST['user']=='admin')
        {
            $count=0;
            $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' and password='$_POST[password]' and status='yes';");
    
            $row=mysqli_fetch_assoc($res);
    
            $count=mysqli_num_rows($res);
    
            if($count==0)
            {
                ?>
                <!-- <script type="text/javascript">
                    alert("The Username And Password doesn't match.")
                </script> -->
                <div>
                    <strong class="alert alert-danger" style="width: 700px; margin-left: 600px;">The Username or Password doesn't match.</strong>
                </div>
                <?php
            }
            else{
                //if username & password matches
                $_SESSION['login_user'] = $_POST['username'];
                $_SESSION['pic']=$row['pic'];
                ?>
                    <script type="text/javascript">
                    window.location="Admin/profile.php"
                </script>
                <?php
            }
        }
        else
        {

        $count=0;
        $res=mysqli_query($db,"SELECT * FROM `data` WHERE username='$_POST[username]' AND password='$_POST[password]';");

        $row=mysqli_fetch_assoc($res);

        $count=mysqli_num_rows($res);

        if($count==0)
        {
            ?>
         
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
                window.location="student/profile.php"
            </script>
            <?php
        }
    }
}

?>

</body>
</html>