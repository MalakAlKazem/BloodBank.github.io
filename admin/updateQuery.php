<?php
include 'conn.php';

// Check if the query parameter 'id' is set
if (isset($_GET['id'])) {
    $queryId = $_GET['id'];

    // Your update query to set the status to 'Read'
    $updateQuery = "UPDATE contact_query SET query_status = 1 WHERE query_id = $queryId";

    // Perform the update
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        // The update was successful
        echo "success";
    } else {
        // Handle the error
        echo "error";
    }
} else {
    // 'id' parameter is not set, handle accordingly
    echo "error";
}
?>
