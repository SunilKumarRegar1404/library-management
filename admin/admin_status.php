<?php
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
    margin-left: 40px;
}
    </style>
</head>
<body>
        <!-- side nav -->
        <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color: white; margin-left: 30px; font-size: 20px;">
            <?php
                echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']."'>";

                echo "</br></br>";
                echo "Welcome ".$_SESSION['login_user'];
            ?>
        </div>

  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

    <!-- search bar -->
    <div class="container">
        <h2 style="float: left;">Search one username at a time to approve the request.</h2>
    <div style="float: right;" class="srch">
        <form class="navbar-form" method="post" name="form1">
            
                <input class="form-control" type="text" name="search" placeholder="Student Username.."required="">
                <button style="background-color: grey;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>         

        </form>
    </div>
    </div>

<br><h2>New Requests</h2>
    <?php

        if(isset($_POST['submit'])){
            $q=mysqli_query($db,"SELECT first,last,username,email,phone FROM `admin` WHERE username like '%$_POST[search]%' and status='' ");
            if(mysqli_num_rows($q)==0){
                echo "Sorry! No new request found with that username. Try searching again.";
            }
            else
            {
                echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color:grey;'>";
            echo "<th>"; echo "First Name";  echo "</th>";
            echo "<th>"; echo "Last Name";  echo "</th>";
            echo "<th>"; echo "Username";  echo "</th>";
            echo "<th>"; echo "Email";  echo "</th>";
            echo "<th>"; echo "Contact";  echo "</th>";
        echo "</tr>";

        while($row=mysqli_fetch_assoc($q))
        {
            $_SESSION['test_name']=$row['username'];
            echo "<tr>";
                echo "<td>"; echo $row['first']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>"; 
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['phone']; echo "</td>";
            echo "</tr>";
        }
    echo "</table>";
        ?>
        <form method="post">
            <button type="submit" name="submit1" style="background-color: black;" class="btn btn-default"><span style="color: red;" class="glyphicon glyphicon-remove-sign"></span><span class="badge bg-green"></button>
            <button type="submit" name="submit2" style="background-color: black;" class="btn btn-default"><span style="color: green;" class="glyphicon glyphicon-ok-sign"></span><span class="badge bg-green"></button>
        </form>
        <?php
    
            }
    }
    /* if button is not clicked*/
        else{

            $res=mysqli_query($db,"SELECT first,last,username,email,phone FROM `admin` where status='';");

            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color:grey;'>";
            echo "<th>"; echo "First Name";  echo "</th>";
            echo "<th>"; echo "Last Name";  echo "</th>";
            echo "<th>"; echo "Username";  echo "</th>";
            echo "<th>"; echo "Email";  echo "</th>";
            echo "<th>"; echo "Contact";  echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['first']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['phone']; echo "</td>";
                echo "</tr>";
            }
        echo "</table>";
        }
        if(isset($_POST['submit1'])){
            mysqli_query($db,"DELETE from admin where username='$_SESSION[test_name]' and status='';");
            unset($_SESSION['test_name']);
        }
        if(isset($_POST['submit2'])){
            mysqli_query($db,"UPDATE admin set status='yes' where username='$_SESSION[test_name]';");
            unset($_SESSION['test_name']);
        }

    ?>
</div>
</body>
</html>