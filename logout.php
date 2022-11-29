<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<!-- Kirsten Kurniadi, ID: 30045816
Date: 28/11/2022
Assessment Task Three (Team Project)
Logout Page -->
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->
<?php
$pageName = "Logout";
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
            <h2>Logout</h2>
            <p>You have successfully logged out</p>
            <a class="btn btn-success" href="index.php" role="button">Return home</a>
            <a class="btn btn-secondary" href="member_login.php" role="button">Log back in</a>
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