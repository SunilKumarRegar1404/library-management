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
    <title>Change Password</title>

    <style type="text/css">
        body{
           
            height: 650px;
            background-color: #5e4f4f6e;
            /* background-image: url(""); */
        }
        .wrapper{
            width: 400px;
            height: 400px;
            margin:100px auto;
            background-color: grey;
            opacity: 1;
            color: white;
            padding: 5px 15px;
        }
        .form-control{
            width: 350px;

        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="text-align: center;">
            <h1>Change Your Password</h1><br><br>
        </div>
        <div style="padding-left: 10px;">
        <form action="" method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
            <input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
            <button class="btn btn-default" type="submit" name="submit">Update</button>
        </form></div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            if($sql=mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
            {
                ?>
                <script type="text/javascript">
                    alert("The Password Updated Successfully.");
                </script>
                <?php
            }
        }
    ?>
</body>
</html>