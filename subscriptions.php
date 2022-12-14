<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Subscription Page -->
<!-- START PHP -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: member_login.php");
    exit;
}
$newsletter = $newsflash = '';
require_once('connection.php');
$subscription_err = '';
//include our connection
$database = new Connection();
$db = $database->open();
try {
    $email = $_SESSION['email'];
    $sql = "SELECT Newsletter, Newsflash FROM MembershipDatabase WHERE Email = '$email'";
    if ($stmt = $db->prepare($sql)) {
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch();
                $newsletter = $row["Newsletter"];
                $newsflash = $row["Newsflash"];
            }
        }
    }
} catch (PDOException $e) {
    $subscription_err =  "Could not fetch subscriptions: " . $e->getMessage();
}
//close connection
$database->close();
?>
<!-- FINISH PHP-->
<!doctype html>
<html lang="en">

<head>
    <?php
    $pageName = "Subscription Settings";
    include_once('head.php');
    ?>
</head>

<body>
    <!-- Grey with black text-->
    <?php
    include_once('inc_nav.php');
    ?>
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h1>Subscription Settings</h1>
            <?php
            if (!empty($subscription_err)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $subscription_err; ?>
                </div>
            <?php
            } else {
            ?>
                <h4>Hello, <?php echo $_SESSION["name"]; ?></h4>
                <p>Here you can adjust your active subscriptions for <?php echo $_SESSION["email"]; ?>:</p>
                <form action="updateSubscription.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkNewsletter" name="checkNewsletter" <?php echo ($newsletter == 'y') ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="checkNewsletter">Monthly newsletter</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkNewsflash" name="checkNewsflash" <?php echo ($newsflash == 'y') ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="checkNewsflash">Breaking news updates</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Update subscription</button>
                    </div>
                </form>
                <h4>Unsubscribe</h4>
                <p>If you no longer wish to receive any updates from Acme Art Gallery, please click Unsubscribe</p>
                <a class="btn btn-danger" href="unsubscribe.php" role="button">Unsubscribe</a>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>