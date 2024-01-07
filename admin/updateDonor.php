<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script> 
  <style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:250px;}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
</style>
</head>
<body style="color: black;">
<?php
include 'conn.php';
session_start();

$active = "update"; // Set the active menu item

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // Check if the form is submitted
    if (isset($_POST['update'])) {
        // Extract data from the form
        $donor_id = $_POST['donor_id'];
        $name = $_POST['updated_name'];
        $number = $_POST['updated_number'];
        $email = $_POST['updated_mail'];
        $age = $_POST['updated_age'];
        $gender = $_POST['updated_gender'];
        $blood_group = $_POST['updated_blood_group'];
        $address = $_POST['updated_address'];

        // Update the donor information
        $updateQuery = "UPDATE donor_details SET donor_name='$name', donor_number='$number', donor_mail='$email', donor_age='$age', donor_gender='$gender', donor_blood='$blood_group', donor_address='$address' WHERE donor_id='$donor_id'";
        $updateResult = mysqli_query($conn, $updateQuery);
    }

    // Fetch the donor data for the form fields
    if (isset($_GET['id'])) {
        $donor_id = $_GET['id'];
        $fetchQuery = "SELECT * FROM donor_details WHERE donor_id='$donor_id'";
        $fetchResult = mysqli_query($conn, $fetchQuery);
        $donorData = mysqli_fetch_assoc($fetchResult);
    }
?>
<div id="header">
<?php
  include 'header.php';
    ?>
        </div>
        <div id="sidebar">
        <?php
  include 'sidebar.php';
    ?>
        </div>
        <div id="content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 lg-12 sm-12">
                            <h1 class="page-title" style="font-size:3em">Update Donor Information</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <form method="post" action="" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="updated_name" value="<?php echo $donorData['donor_name']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile Number</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="updated_number" value="<?php echo $donorData['donor_number']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email Id</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="updated_mail" value="<?php echo $donorData['donor_mail']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Age</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="updated_age" value="<?php echo $donorData['donor_age']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="updated_gender" required>
                                        <option value="Male" <?php echo ($donorData['donor_gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="Female" <?php echo ($donorData['donor_gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="Other" <?php echo ($donorData['donor_gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Blood Group</label>
                                <div class="col-sm-5">
                                    
                                    <select class="form-control" name="updated_blood_group" required>
                                        <?php
                                        $bloodQuery = "SELECT * FROM blood";
                                        $bloodResult = mysqli_query($conn, $bloodQuery);
                                        while ($bloodRow = mysqli_fetch_assoc($bloodResult)) {
                                            $selected = ($donorData['donor_blood'] == $bloodRow['blood_id']) ? 'selected' : '';
                                            echo "<option value='{$bloodRow['blood_id']}' {$selected}>{$bloodRow['blood_group']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="updated_address" required><?php echo $donorData['donor_address']; ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="donor_id" value="<?php echo $donorData['donor_id']; ?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

</div>
<?php
            if (isset($updateResult)) {
                echo '<script>';
                if ($updateResult) {
                    echo 'Swal.fire({
                            icon: "success",
                            title: "Donor Information Updated Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = "donor_list.php"; // Redirect after success
                        });';
                } else {
                    echo 'Swal.fire({
                            icon: "error",
                            title: "Error Updating Donor Information",
                            text: "An error occurred while updating the donor information."
                        });';
                }
                echo '</script>';
            }
            ?>
</body>
<?php
 }else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
?>
    <form method="post" name="" action="login.php" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4" style="float:left">
                <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
            </div>
        </div>
    </form>
<?php
}
?>
</html>