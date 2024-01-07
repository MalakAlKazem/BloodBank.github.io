<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {

      background-image: url('admin_image/c.jpg');
      background-size: cover;
      /* or 'contain' */
      background-repeat: no-repeat;
      background-position: center center;

    }

    @media (max-width: 768px) {
      body {
        background-attachment: scroll;
        /* Change background attachment for smaller screens if needed */
        /* Add additional styles for smaller screens */
        background-image: url('admin_image/phone.jpg');
        background-size: cover;
        /* or 'contain' */
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
      }

      .card-body {
        background-color: #FFFAF0;
      }
    }
  </style>
</head>

<body>


  <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container" style="margin-top:100px;">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <center>
            <h1 class="mt-4 mb-3" style="color:Black;">
              Blood Bank System <br>
              Admin Login Page
            </h1>
          </center>

        </div>
      </div>
      <div class="card" style="height:250px; background:#F0F8FF;">
        <div class="card-body">

          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6 ">
              <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
              <div><input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required></div>
            </div>
          </div>
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6 "><br>
              <div class="font-italic" style="font-weight:bold">Password<span style="color:red">*</span></div>
              <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required></div>
            </div>
          </div>
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-4 mb-4 " style="text-align:center"><br>
              <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php
include 'conn.php';

if (isset($_POST["login"])) {
    $username = trim(mysqli_real_escape_string($conn, $_POST["username"]));
    $password = trim(mysqli_real_escape_string($conn, $_POST["password"]));

    // Hash the entered password using md5
    $hashed_password = md5($password);

    $sql = "SELECT * FROM admin_ifo WHERE admin_username='$username' AND admin_password='$hashed_password'";
    $result = mysqli_query($conn, $sql) or die("Query failed.");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit();
        }
    } else {
      $sql_check_username = "SELECT * FROM admin_ifo WHERE admin_username='$username'";
      $result_check_username = mysqli_query($conn, $sql_check_username) or die("Query failed.");

      if (mysqli_num_rows($result_check_username) > 0) {
          echo '<div class="alert alert-danger" style="font-weight:bold;color:red;text-align:center"> Password is incorrect!</div>';
      } else {
          echo '<div class="alert alert-danger" style="font-weight:bold;color:red;text-align:center"> Username not found!</div>';
      }
    }
}
?>

  </form>
  
</body>

</html>