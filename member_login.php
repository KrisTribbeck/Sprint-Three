<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Login Page -->
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: index.php");
    exit;
}
require_once("connection.php");
$email = '';
$email_err = $login_err = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $input_email = trim($_POST["inputEmail"]);
    $emailPattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (empty($input_email)) {
        $email_err = "Please enter an email address.";
    } elseif (!preg_match($emailPattern, $input_email)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = $input_email;
    }
    // Check errors before inserting into database
    $database = new Connection();
    $db = $database->open();
    if (empty($name_err) && empty($email_err)) {
        $sql = "SELECT FullName, Email, IsAdmin FROM MembershipDatabase WHERE Email = '{$email}'";
        if ($stmt = $db->prepare($sql)) {
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch();
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["name"] = $row["FullName"];
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["isAdmin"] = $row["IsAdmin"];
                    if ($_SESSION["isAdmin"] == 'y') {
                        header("location: admin.php");
                    } else {
                        header("location: subscriptions.php");
                    }
                } else {
                    $login_err = "No login found for this address";
                }
            }
        }
    }
    $database->close();
}
?>
<!doctype html>
<html lang="en">
<!--Head START. Replace with include_once(head.php) when uploading to server. -->

<?php
$pageName = "Login";
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
            <?php
            if (!empty($login_err)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $login_err; ?>
                </div>
            <?php
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="inputEmail" placeholder="Email">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
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