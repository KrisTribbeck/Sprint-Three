<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Sign Up Page -->
<?php
require_once("connection.php");
$fullName = $email = $newsletter = $newsflash = '';
$name_err = $email_err = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["inputName"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', $input_name)){
        $name_err = "Please enter a valid name.";
    } else{
        $fullName = $input_name;
    }
    // Validate email
    $input_email = trim($_POST["inputEmail"]);
    $emailPattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if(empty($input_email)){
        $email_err = "Please enter an email address.";
    } elseif(!preg_match($emailPattern, $input_email)){
        $email_err = "Please enter a valid email address.";
    } else{
        $email = $input_email;
    }
    // Assign checkbox values based on set status
    if(isset($_POST["checkNewsletter"])){
        $newsletter = 'y';
    } else{
        $newsletter = 'n';
    }
    if(isset($_POST["checkNewsflash"])){
        $newsflash = 'y';
    } else{
        $newsflash = 'n';
    }
    // Check errors before inserting into database
    if(empty($name_err) && empty($email_err)){
        $emailCheck = "SELECT * FROM MembershipDatabase WHERE Email = '{$email}'";
        $rowCount = $db->prepare($emailCheck);
        $details[] = [
            'FullName' => $fullName,
            'Email' => $email,
            'Newsletter' => $newsletter,
            'Newsflash' => $newsflash
        ];
        $sql = "INSERT INTO MembershipDatabase (FullName, Email, Newsletter, Newsflash)
        VALUES(:FullName, :Email, :Newsletter, :Newsflash)";
        foreach ($details as $details){
            $stmt = $db->prepare($sql);
            $stmt->execute($details);
        }
    }
}

?>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
                        <input class="form-check-input" type="checkbox" id="checkNewsletter" value="y">
                        <label class="form-check-label" for="checkNewsletter">Subscribe to the monthly newsletter</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkNewsflash" value="y">
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