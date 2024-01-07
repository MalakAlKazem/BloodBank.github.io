<?php session_start(); ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: relative;
      margin-top: -20px
    }

    #content {
      position: relative;
      margin-left: 250px
    }

    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }
  </style>
</head>

<?php
include 'conn.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

  <body style="color:black">
    <div id="header">
      <?php include 'header.php'; ?>
    </div>
    <div id="sidebar">
      <?php
      $active = "";
      include 'sidebar.php';
      ?>
    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12 lg-12 sm-12">
              <h1 class="page-title" style="font-size:3em">Add Admin</h1>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10">
              <div class="panel panel-default">
                <div class="panel-heading">Admin Details</div>
                <div class="panel-body">
                  <form method="post" name="addadmin" class="form-horizontal">

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Admin Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="admin_name" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="admin_username" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="admin_password" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="confirm_password" required>
                      </div>
                    </div>
                    <div class="hr-dashed"></div>

                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4">
                        <button class="btn btn-primary" name="submit" type="submit">Add Admin</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>

          <?php
          if (isset($_POST["submit"])) {
            $admin_name = mysqli_real_escape_string($conn, $_POST["admin_name"]);
            $admin_username = mysqli_real_escape_string($conn, $_POST["admin_username"]);
            $admin_password = mysqli_real_escape_string($conn, $_POST["admin_password"]);
            $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

            // Check if the passwords match
            if ($admin_password == $confirm_password) {
              // Hash the password for security
              $hashed_password = md5($admin_password);

              // Insert the new admin into the database
              $sql = "INSERT INTO admin_ifo (admin_name, admin_username, admin_password) VALUES ('$admin_name', '$admin_username', '$hashed_password')";
              $result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

              if ($result) {
                echo '<div class="alert alert-success alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><b> Admin added successfully.</b></div>';
              } else {
                echo '<div class="alert alert-danger alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><b> Error adding admin.</b></div>';
              }
            } else {
              echo '<div class="alert alert-warning alert_dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button> <b>Passwords do not match!</b></div>';
            }
          }
          ?>

        </div>
      </div>
    </div>
  </body>

</html>

<?php
} else {
  echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
  <form method="post" name="" action="login.php" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-4" style="float:left">
        <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
      </div>
    </div>
  </form>
<?php }
?>
