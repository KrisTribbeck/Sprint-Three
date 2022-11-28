<!-- Kirsten Kurniadi, ID: 30045816
Date: 28/11/2022
Assessment Task Three (Team Project)
Unsubscribe Page -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: member_login.php");
    exit;
}
$unsubscribe_err = '';
require_once("connection.php");
$database = new Connection();
$db = $database->open();
// Update subscriptions for the given user
try {
    $email = $_SESSION['email'];
    $sql = "UPDATE MembershipDatabase SET DeleteAccount = 'y' WHERE Email = '$email'";
    if ($stmt = $db->prepare($sql)) {
        if ($stmt->execute()) {
            $_SESSION = array();
            session_destroy();
        }
    }
} catch (PDOException $e) {
    $unsubscribe_err = "Could not update subscriptions: " . $e->getMessage();
}
$database->close();
?>
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->
<?php
$pageName = "Unsubscribe";
include_once("head.php")
?>
<!--HEAD FINISH -->

<body>
    <!--NAV BAR START. Replace with include_once(inc_nav.php) when uploading to server.-->
    <?php
    include_once("inc_nav.php")
    ?>
    <!--NAV BAR FINISH. Replace with include_once(inc_nav.php) when uploading to server.-->
    <!--Into page START.-->
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h2>Update Subscriptions</h2>
            <?php
            if (!empty($unsubscribe_err)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $unsubscribe_err; ?>
                </div>
            <?php
            } else { ?>
                <p>You have successfully unsubscribed from Acme Art Gallery's mailing list</p>
            <?php } ?>
            <a class="btn btn-success" href="index.php" role="button">Return home</a>
        </div>
    </div>
    <!--Into page FINISH.-->
    <!--FOOTER START. Replace with include_once(footer.php) when uploading to server. -->
    <?php
    include_once("footer.php")
    ?>
    <!--FOOTER END -->
</body>

</html>