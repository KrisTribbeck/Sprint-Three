<!-- Kirsten Kurniadi, ID: 30045816
Date: 28/11/2022
Assessment Task Three (Team Project)
Delete User Page -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 'n') {
    header("location: index.php");
    exit;
}
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $delete_err = '';
    require_once("connection.php");
    $database = new Connection();
    $db = $database->open();
    try {
        $param_id = trim($_POST["id"]);
        $sql = "DELETE FROM MembershipDatabase WHERE Id = $param_id";
        if ($stmt = $db->prepare($sql)) {
            if ($stmt->execute()) {
                header("location: admin.php");
                exit();
            } else {
                $delete_err = "Could not delete user.";
            }
        }
    } catch (PDOException $e) {
        $delete_err = "Could not delete user: " . $e->getMessage();
    }
    $database->close();
} else {
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pageName = "Delete User";
    include_once("head.php");
    ?>
</head>

<body>
    <?php
    include_once("inc_nav.php");
    ?>
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h2>Delete User</h2>
            <?php
            if (!empty($delete_err)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $delete_err; ?>
                </div>
            <?php
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
                <p>Are you sure you want to delete this user from the mailing list?</p>
                <p>
                    <input type="submit" value="Yes" class="btn btn-danger">
                    <a href="admin.php" role="button" class="btn btn-secondary ml-2">No</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>