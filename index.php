<?php
session_start()
?>
<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Home Page -->
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->
<?php
$pageName = "Home Page";
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
            <h2>Assessment Three Group Project</h2>
            <p class="lead">Name: Kristiin Tribbeck, Kyle Watson, Kirsten Kurniadi<br>
                ID: 30045325<br>
                Assessment details: Acme Arts has decided to offer a free communications service to people who sign-up
                with their name and email.
                A monthly newsletter will be emailed during the last week of each month and a breaking newsflash
                notification will be sent as significate events occur.
            <ul>
                <li>Sprint 1 - Kristiin Tribbeck - Paintings Section</li>
                <li>Sprint 2 - Kyle Watson - Artists Section</li>
                <li>Sprint 3 - Kirsten Kurniadi - Subscription Services</li>
            </ul>
            </p>
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