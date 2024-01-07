<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    #he {
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align:center
      
    }
  </style>
</head>
<?php
session_start();
include 'conn.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

  <body style="color:black">
    <div id="header">
      <?php include 'header.php';
      ?>
    </div>
    <div id="sidebar">
      <?php $active = "query";
      include 'sidebar.php'; ?>

    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 lg-12 sm-12">

              <h1 class="page-title">Pending Query</h1>

            </div>

          </div>
          <hr>
         



          <?php
          $limit = 10;
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }
          $offset = ($page - 1) * $limit;
          $count = $offset + 1;
          $sql = " select * from contact_query where query_status>1 LIMIT {$offset},{$limit}";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
          ?>

            <div class="table-responsive">
              <table class="table table-bordered" style="text-align:center">
                <thead style="text-align:center">
                  <th style="text-align:center">S.no</th>
                  <th style="text-align:center">Name</th>
                  <th style="text-align:center">Email Id</th>
                  <th style="text-align:center">Mobile Number</th>
                  <th style="text-align:center">Message</th>
                  <th style="text-align:center">Posting Date</th>
                  <th style="text-align:center">Status</th>
                  <th style="text-align:center">Action</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td><?php echo $count++; ?></td>
                      <td><?php echo $row['query_name']; ?></td>
                      <td><?php echo $row['query_mail']; ?></td>
                      <td><?php echo $row['query_number']; ?></td>
                      <td><?php echo $row['query_message']; ?></td>
                      <td><?php echo $row['query_date']; ?></td>
                      <?php if ($row['query_status'] == 1) {
                      ?><td>Read<br></td>
                      <?php } else { ?>

                        <td><a href="#" onclick="updateQuery(<?php echo $row['query_id']; ?>)"><b id="demo">Pending</b></a><br></td>
                                            <?php } ?>
                                            <td id="he" style="width:100px">
                                            <a style="color:red" href="#" onclick="deleteQuery(<?php echo $row['query_id']; ?>)">Delete</a>

                                            </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } ?>

          <div class="table-responsive" style="text-align:center;">
            <?php
            $sql1 = "SELECT * FROM contact_query";
            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

              $total_records = mysqli_num_rows($result1);

              $total_page = ceil($total_records / $limit);

              echo '<ul class="pagination admin-pagination">';
              if ($page > 1) {
                echo '<li><a href="query.php?page=' . ($page - 1) . '">Prev</a></li>';
              }
              for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                  $active = "active";
                } else {
                  $active = "";
                }
                echo '<li class="' . $active . '"><a href="query.php?page=' . $i . '">' . $i . '</a></li>';
              }
              if ($total_page > $page) {
                echo '<li><a href="query.php?page=' . ($page + 1) . '">Next</a></li>';
              }

              echo '</ul>';
            }
            ?>

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
      <script>
            // Enhanced confirmUpdate function with SweetAlert confirmation dialog
            function updateQuery(que_id) {
                Swal.fire({
                    title: 'Do you really want to read this query?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!',
                    width: '500px', // Set the width
                    padding: '2em',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX call to update the query
                        $.ajax({
                            type: "GET",
                            url: "updateQuery.php?id=" + que_id,
                            success: function(response) {
                                // Check the response from the server
                                if (response.trim() === "success") {
                                    // The update was successful
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Query updated successfully!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        // You may want to refresh the page or update the UI accordingly
                                        location.reload();
                                    });
                                } else {
                                    // Handle any other response (e.g., error)
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error updating query',
                                        text: 'An error occurred while updating the query.'
                                    });
                                }
                            },
                            error: function() {
                                // Handle AJAX error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'AJAX request failed'
                                });
                            }
                        });
                    }
                });
            }
        </script>
        <script>
            function deleteQuery(que_id) {
                Swal.fire({
                    title: 'Do you really want to delete this query?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    width: '500px', // Set the width
                    padding: '2em',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX call to delete the query
                        $.ajax({
                            type: "GET",
                            url: "delete_queryAjax.php?id=" + que_id,
                            success: function(response) {
                                // Check the response from the server
                                if (response.trim() === "success") {
                                    // The delete was successful
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Query deleted successfully!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        // You may want to refresh the page or update the UI accordingly
                                        location.reload();
                                    });
                                } else {
                                    // Handle any other response (e.g., error)
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error deleting query',
                                        text: 'An error occurred while deleting the query.'
                                    });
                                }
                            },
                            error: function() {
                                // Handle AJAX error
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'AJAX request failed'
                                });
                            }
                        });
                    }
                });
            }
        </script>
  </body>

</html>