<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:250px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
</style>
</head>

<body style="color:black">

  <?php
  session_start();
  include 'conn.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="contact";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title"style="font-size:3em">Update Contact Info</h1>
        </div>
      </div>
      <hr>
      <?php
                                  
                                    $query = "SELECT * FROM contact_info WHERE contact_id = 1";
                                    $result = mysqli_query($conn, $query);

                                   
                    if ($result) {
                      $row = mysqli_fetch_assoc($result);
                      $address = $row['contact_address'];
                      $email = $row['contact_mail'];
                      $contactno = $row['contact_phone'];
                  } else {
                      $address = $email = $contactno = "";
                  }

                  if (isset($_POST['update'])) {
                      $address = $_POST['address'];
                      $email = $_POST['email'];
                      $contactno = $_POST['contactno'];
                      $sql = "update contact_info set contact_address='{$address}', contact_mail='{$email}', contact_phone='{$contactno}' where contact_id='1'";
                      $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                      if ($result) {
                          echo '<script>
                              Swal.fire({
                                  icon: "success",
                                  title: "Contact Details Updated Successfully",
                                  showConfirmButton: false,
                                  timer: 1500
                              }).then(function() {
                                  window.location.href = "update_contact.php"; // Redirect after success
                              });
                          </script>';
                      } else {
                          echo '<script>
                              Swal.fire({
                                  icon: "error",
                                  title: "Error updating contact details",
                                  text: "An error occurred while updating the contact details."
                              });
                          </script>';
                      }

                      mysqli_close($conn);
                  }
                  ?>
    


      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading"style="font-size:2em">Contact Details</div>
            <div class="panel-body">
              <form method="post"  name="change_contact" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="address" id="address" required><?php echo $address; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Email id</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
                  </div>
                </div>
      <div class="form-group">
                  <label class="col-sm-4 control-label"> Contact Number </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $contactno; ?>" name="contactno" id="contactno" required>
                  </div>
                </div>

                <div class="hr-dashed"></div>




                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="update" type="submit">Update</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>


        </div>
      </div>
    </div>
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

</body>
</html>
