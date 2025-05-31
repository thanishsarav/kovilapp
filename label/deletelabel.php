<?php
include('../popupheader.php');
include('../config.php');
$id = (int) $_POST['id'];
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "ERROR: Invalid or missing ID.";
    exit;
}

// Sanitize the ID

// Database configuration
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'kovilnew';


// Connect to the database
$con = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Prepare the DELETE query securely
$stmt = mysqli_prepare($con, "DELETE FROM $tbl_labels WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
$success = mysqli_stmt_execute($stmt);

// Check result
if ($success && mysqli_stmt_affected_rows($stmt) > 0) {
    echo '<div class="callout callout-danger"><h4>Deleted successfully!</h4></div>';
} else {
    echo '<div class="callout callout-warning"><h4>Deletion failed or ID not found.</h4></div>';
}

// Close connections
mysqli_stmt_close($stmt);
mysqli_close($con);

include('../footer.php');
?>