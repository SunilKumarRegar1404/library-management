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
    <title>Expired List</title>
    <style type="text/css">
        .srch{
            padding-left: 70%;
        }
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
  padding-left: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
    margin-left: 40px;
}
.h:hover{
    color: white;
    width: 250px;
    height: 50px;
    background-color: red;
}
body{
    background-color: honeydew;
}
.container{
    height: 600px;
    width: 85%;
    background-color: black;
    opacity: .8;
    color: white;
    margin-top: -40px;
}

.form-control{
    width: 300px;
    height: 30px;
    background-color: black;
    color: white;
}
.scroll{
    width: 100%;
    height: 500px;
    overflow: auto;
}
th,td{
    width: 10%;
}
    </style>
</head>
<body>
      <!-- side nav -->
      <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color: white; margin-left: 30px; font-size: 20px;">
            <?php
            if(isset($_SESSION['login_user']))
            {
                echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']."'>";

                echo "</br></br>";
                echo "Welcome ".$_SESSION['login_user'];
            }
            ?>
        </div><br><br>
  <div class="h"><a href="books.php">Books</a></div>
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
<div class="container">
    
    <?php
        if(isset($_SESSION['login_user']))
        {
            ?>
            <div style="float: left; padding: 25px;">
            <form method="post" action="">
            <button name="submit2" type="submit" class="btn btn-default" style="background-color: green; color: honeydew;">RETURNED</button>&nbsp&nbsp
            <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: honeydew;">EXPIRED</button>
            </form>
        </div>
            <div class="srch">
             <form method="post" action="" name="form1">
                <br>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
                <button class="btn btn-default"name="submit" type="submit">Submit</button>
            </form>
            </div>
            <?php

            if(isset($_POST['submit'])){
                $var1='<p style="color: yellow; background-color: green;">RETURNED</p>';
                mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]'");

                mysqli_query($db,"UPDATE books SET quantity=quantity+1 where bid='$_POST[bid]' ");
            }
        }
    ?>
    <h3 style="text-align: center;">Date Expired List</h3>
    <?php
        if(isset($_SESSION['login_user']))
        {
            $ret='<p style="color: yellow; background-color: green;">RETURNED</p>';
            $exp='<p style="color: yellow; background-color: red;">EXPIRED</p>';
           

            if(isset($_POST['submit2'])){
                $sql="SELECT data.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM data inner join issue_book ON data.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
                $res=mysqli_query($db,$sql);
            }
            else if(isset($_POST['submit3'])){
                $sql="SELECT data.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM data inner join issue_book ON data.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
                $res=mysqli_query($db,$sql);
            }
            else{
                $sql="SELECT data.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM data inner join issue_book ON data.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
                $res=mysqli_query($db,$sql);
            }
       

            echo "<table class='table table-bordered' style='width:100%;' >";

            
            echo "<tr style='background-color:grey;'>";
                echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "Roll No";  echo "</th>";
                echo "<th>"; echo "BID";  echo "</th>";
                echo "<th>"; echo "Book Name";  echo "</th>";
                echo "<th>"; echo "Authors Name";  echo "</th>";
                echo "<th>"; echo "Edition";  echo "</th>";
                echo "<th>"; echo "Status";  echo "</th>";
                echo "<th>"; echo "Issue Date";  echo "</th>";
                echo "<th>"; echo "Return Date";  echo "</th>";
                
            echo "</tr>";
            echo "</table>";

            echo "<div class='scroll'>";
            echo "<table class='table table-bordered' >";
    
            while($row=mysqli_fetch_assoc($res))
            {
               
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['roll']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['return']; echo "</td>";
              
                echo "</tr>";
            }  
        echo "</table>";
        echo "</div>";  
        }
        else{
            ?>
                 <h3 style="text-align: center;">Login To See Information Of Borrowed Books</h3>

            <?php
        }
    ?>
</div>
</div>
</body>
</html>