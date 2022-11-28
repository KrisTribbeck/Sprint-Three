<!-- Kirsten Kurniadi, ID: 30045816
Date: 28/11/2022
Assessment Task Three (Team Project)
Update Subscription Page -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: member_login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->
<?php
$pageName = "Update Subscriptions";
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
            <p>Subscriptions for <?php echo $_SESSION["email"]; ?> have successfully been updated</p>
            <a class="btn btn-success" href="index.php" role="button">Return home</a>
            <a class="btn btn-secondary" href="subscriptions.php" role="button">Manage subscriptions</a>
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