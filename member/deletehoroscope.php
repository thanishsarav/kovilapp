<?php
include('../popupheader.php');


$msg = '';

// Validate and fetch ID from GET for initial display
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='callout callout-danger'><h4>Invalid member ID.</h4></div>";
    include('../footer.php');
    exit;
}

$id = (int)$_GET['id'];

// Handle delete form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $delete_id = (int)$_POST['id'];
$sql="DELETE FROM $tbl_matrimony WHERE id = ?";
    // Prepare and execute the delete statement
    $stmt = $con->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            $msg = "Member deleted successfully!";
        } else {
            $msg = "Error deleting member: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $msg = "Error preparing delete statement: " . $con->error;
    }
}
?>

<!-- Page content -->
<section class="content-header">
    <h1>Delete Member</h1>
</section>

<section class="content">       
    <div class="box box-default">
        <div class="box-body">

            <?php if ($msg): ?>
                <!-- Show result message -->
                <div class="callout callout-success">
                    <h4><?php echo htmlspecialchars($msg); ?></h4>
                    <button type="button"  class="btn btn-outline-primary" onclick="window.close()">Ok</button>
                </div>
            <?php else: ?>
                <!-- Show delete confirmation form -->
                <label>Are you sure you want to delete this horoscope permanently?</label>
                <br><br>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-outline-primary" >Yes</button>
                    <button type="button" class="btn btn-outline-primary"  onclick="window.close()">No</button>
                </form>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php include('../footer.php'); ?>