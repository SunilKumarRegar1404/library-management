<?php
    session_start();
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>     
    </title>

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
    <?php
        $sql_app=mysqli_query($db,"SELECT COUNT(status) as total FROM admin where status='';");
        $a=mysqli_fetch_assoc($sql_app);
    ?>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <div class="navbar-header">
                <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/ffffff/external-student-online-learning-kiranshastry-solid-kiranshastry-1.png"/>
                <!-- <h1 style="color: honeydew; font-size: 15px;">Student Login</h1> -->
            </div>
            
                <ul class="nav navbar-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
                <?php
                    if(isset($_SESSION['login_user']))
                    {?>
                        <ul class="nav navbar-nav">
            
                            <li><a href="profile.php">PROFILE</a></li>
                
                            <li><a href="student.php">STUDENT-INFO</a></li>
                        </ul>    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin_status.php"><span class="glyphicon glyphicon-user"></span><span class="badge bg-green"><?php echo $a['total'];?></span></a></li>
                            <li><a href="profile.php">
                            <div style="color: white">
                        <?php
                            echo "<img class='img-circle profile_img' height=25 width=25 src='image/".$_SESSION['pic']."'>";
                            echo " " .$_SESSION['login_user'];
                        ?>
                        </div>
                            </a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                        </ul>
                   <?php }
                   else
                   {?>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN-UP</span></a></li>
                </ul>
                 <?php  }
                ?>
                
        </div>        
    </nav>
</body>
</html>