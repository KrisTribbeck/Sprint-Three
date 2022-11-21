<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->
<?php
include_once("head.php")
?>

<body>
    <?php
    include_once("inc_nav.php")
    ?>
    <!--NAV BAR FINISH. Replace with include_once(inc_nav.php) when uploading to server.-->
    <!--LOGIN START-->
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h2>Sign up</h2>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Name" required="required">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="inputEmail">Email Address</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkNewsletter">
                        <label class="form-check-label" for="checkNewsletter">Subscribe to the monthly newsletter</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkNewsflash">
                        <label class="form-check-label" for="checkNewsflash">Subscribe to breaking news updates</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
                <div>
                    <label class="form-label" for="alreadySubscribed">Already subscribed?</label><br>
                    <a href="member_login.php" class="link-primary">Log in here</a>
                </div>
            </form>
        </div>
    </div>
    <!--LOGIN FINISH -->
    <!--FOOTER START. Replace with include_once(footer.php) when uploading to server. -->
    <?php
    include_once("footer.php")
    ?>
    <!--FOOTER END -->
</body>

</html>