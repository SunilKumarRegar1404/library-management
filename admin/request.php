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
    <title>Book Request</title>
    <style type="text/css">
        .srch{
            padding-left: 1200px;
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
  padding: 16px;
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
    background-color: black;
    opacity: .8;
    color: white;
}
.srch{
    padding-left: 800px;
}
.form-control{
    width: 300px;
    height: 30px;
    background-color: black;
    color: white;
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
<br><br>
<div class="container">
    <div class="srch">
        <form method="post" action="" name="form1">
            <br>
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
            <button class="btn btn-default"name="submit" type="submit">Submit</button>
        </form>
    </div>
    <h1 style="text-align:  center;">Request Of Books</h1>
    
<?php
if(isset($_SESSION['login_user']))
{
    $sql="SELECT data.username,roll,books.bid,name,authors,edition,status FROM data inner join issue_book ON data.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
    $res=mysqli_query($db,$sql);

    if(mysqli_num_rows($res)==0){
        echo "<h2><b>";
        echo "There is no pending requests.";
        echo "</h2></b>";
    }
    else{
        echo "<table class='table table-bordered' >";
        echo "<tr style='background-color:grey;'>";

            echo "<th>"; echo "Username";  echo "</th>";
            echo "<th>"; echo "Roll No";  echo "</th>";
            echo "<th>"; echo "BID";  echo "</th>";
            echo "<th>"; echo "Book Name";  echo "</th>";
            echo "<th>"; echo "Authors Name";  echo "</th>";
            echo "<th>"; echo "Edition";  echo "</th>";
            echo "<th>"; echo "Status";  echo "</th>";
            
        echo "</tr>";

        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['roll']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
          
            echo "</tr>";
        }
    echo "</table>";
    }
}
else{
    ?>
    <br>
    <h3 style="text-align: center;color: yellow;">You need to login to see the request.</h3>
   
    <?php
}
if(isset($_POST['submit'])){
    $_SESSION['name']=$_POST['username'];
    $_SESSION['bid']=$_POST['bid'];


    ?>
    
    <script type="text/javascript">
        window.location="approve.php"
    </script>
<?php
}
?>    

</body>
</html>