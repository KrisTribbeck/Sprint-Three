<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Login Page -->
<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->

<?php
include_once("head.php")
?>

<!--HEAD FINISH -->

<body>
    <!--NAV BAR START. Replace with include_once(inc_nav.php) when uploading to server.-->
    <?php
    include_once("inc_nav.php")
    ?>
    <!--NAV BAR FINISH. Replace with include_once(inc_nav.php) when uploading to server.-->
    <!--LOGIN START-->
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <div>
                    <label class="form-label" for="newToAcme">New to Acme?</label><br>
                    <a href="sign_up.php" class="link-primary">Sign up here</a>
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