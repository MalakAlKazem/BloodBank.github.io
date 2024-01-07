
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

.navbar-custom.navbar {
  background: linear-gradient(to top right, #6699ff 0%, #ffffff 100%);
  border-radius: 20px 20px 20px 20px;
}

  .navbar {

    padding: 10px 10px;
    color:black ;
    position: relative;
  }
  .navbar a {
    color: black; /* Set text color to black */
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 20px;
    line-height: 25px;
    float: none;
    display: block;
    text-align: left;
}
  .navbar-brand {
    font-size: 25px;
    font-weight: bold;
  }
  .navbar-right {
    float: none;
  }
   #qq:hover{
    color: red;
    border-radius: 10px;
  }
  #qq{
    background-color: white;
    border: 1px solid ;
    border-radius: 10px 10px ;
    width: 240px;
    text-align: center;
    transform: scale(1.01); 
    color: black;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="qq" href="dashboard.php">Blood Bank Admin Page</a>
    </div>
    <ul class="nav navbar-nav navbar-right">

      <li class="dropdown"><a class="dropdown-toggle" id="qw" data-toggle="dropdown" href="#" style="font-weight:bold;color:black "> <span class="glyphicon glyphicon-user"></span>&nbsp&nbsp
        <?php
        
        $username=$_SESSION['username'];
        $sql="select * from admin_ifo where admin_username='$username'";
        $result=mysqli_query($conn,$sql) or die("query failed.");
        $row=mysqli_fetch_assoc($result);
        echo "Hello ".$row['admin_username'];
      ?><span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color:white;">
          <li><a href="change_password.php" style="color:red  ">Change Password </a></li>
          <li><a href="addAdmin.php" style="color:red ;">Add Admin</a></li>
          <li><a href="logout.php" style="color:red ;">Logout</a></li>
        </ul>
    </li>
    </ul>

  </div>

</nav>


</body></html>
