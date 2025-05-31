<?php
include('../popupheader.php');
include('../config.php');

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "<div class='callout callout-danger'><h4>Invalid user ID.</h4></div>";
    include('../footer.php');
    exit;
}

$id = $_POST['id'];

// Use prepared statement for secure deletion
$stmt = $con->prepare("DELETE FROM $tbl_users WHERE id = ?");
if ($stmt) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) { 
        ?>
        <div class="callout callout-danger">
            <h4>User deleted successfully!</h4>
        </div>
        <?php
    } else {
        echo "<div class='callout callout-danger'><h4>Delete failed: " . $stmt->error . "</h4></div>";
    }
    $stmt->close();
} else {
    echo "<div class='callout callout-danger'><h4>Database error: " . $con->error . "</h4></div>";
}

mysqli_close($con);
include('../footer.php');
?>