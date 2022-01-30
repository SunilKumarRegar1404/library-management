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

<style type="text/css">
    body{
        margin-top: 0px;
        height:100%;
        width: 100%;
        background-color: grey;
        /* background-image: url("image/3.jpg");  */
    }
   section .box{
     
        height: 450px;
    width: 450px;
    margin: 0px auto; 
    background-color: black;
    opacity: 0.8;
    border: 3px solid #2c190e;
    backdrop-filter: blur(1.5px);
    padding-top: 150px; 
}
label{
    font-weight: 600;
    font-size: 18px;
}
    }
</style>
</head>
<body>
<br><br>
    <section>
        <div class="box">
        <form name="singup" action="" method="post">
        <h1 style="text-align: center;font-size: 25px;">Registration Gateway</h1><br>

        <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700;">Sign Up as:</p></b>

        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
        <label for="admin">Admin</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student" checked="">
        <label for="student">Student</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button class="btn btn-default" type="submit" name="submit7" style="color: black; font-weight: 700; height: 30px;">Go!</button>
        </form>    
        </div>

        <?php
            if(isset($_POST['submit7']))
            {
                if($_POST['user']=='admin')
                { ?>
                    <script type="text/javascript">
                        window.location="Admin/registration.php"
                    </script>
                    <?php
                }
                else
                {?>
                    <script type="text/javascript">
                        window.location="Student/registration.php"
                    </script>
                 <?php
                 }
            }
        ?>

    </section>
</body>
</html>   