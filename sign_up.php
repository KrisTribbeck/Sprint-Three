<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Sign Up Page -->
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: index.php");
    exit;
}
require_once("connection.php");
$fullName = $email = $newsletter = $newsflash = '';
$name_err = $email_err = $registration_err = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["inputName"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $input_name)) {
        $name_err = "Please enter a valid name.";
    } else {
        $fullName = $input_name;
    }
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
    // Assign checkbox values based on set status
    if (isset($_POST["checkNewsletter"])) {
        $newsletter = 'y';
    } else {
        $newsletter = 'n';
    }
    if (isset($_POST["checkNewsflash"])) {
        $newsflash = 'y';
    } else {
        $newsflash = 'n';
    }
    // Check errors before inserting into database
    $database = new Connection();
    $db = $database->open();
    if (empty($name_err) && empty($email_err)) {
        $emailSql = "SELECT * FROM MembershipDatabase WHERE Email = '{$email}'";
        $emailCheck = $db->prepare($emailSql);
        if ($emailCheck->execute()) {
            if ($emailCheck->rowCount() == 1) {
                $email_err = "This email is already registered";
            } else {
                try {
                    $details[] = [
                        'FullName' => $fullName,
                        'Email' => $email,
                        'Newsletter' => $newsletter,
                        'Newsflash' => $newsflash
                    ];
                    $sql = "INSERT INTO MembershipDatabase (FullName, Email, Newsletter, Newsflash)
                    VALUES(:FullName, :Email, :Newsletter, :Newsflash)";
                    foreach ($details as $details) {
                        $stmt = $db->prepare($sql);
                        $stmt->execute($details);
                    }
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["name"] = $fullName;
                    $_SESSION["email"] = $email;
                    $_SESSION["isAdmin"] = 'n';
                    header("location: index.php");
                } catch (PDOException $e) {
                    $registration_err = $e->getMessage();
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
$pageName = "Sign Up";
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
            <?php
            if (!empty($registration_err)) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $registration_err; ?>
                </div>
            <?php
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="inputName">Name</label>
                    <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullName; ?>" name="inputName" placeholder="Name">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="inputEmail">Email Address</label>
                    <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" name="inputEmail" placeholder="Email">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkNewsletter">
                        <label class="form-check-label" for="checkNewsletter">Subscribe to the monthly newsletter</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkNewsflash">
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