<!-- Kirsten Kurniadi, ID: 30045816
Date: 28/11/2022
Assessment Task Three (Team Project)
Delete User Page -->
<?php
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once("connection.php");
    $sql = "DELETE FROM MembershipDatabase WHERE Id = :id";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pageName = "Delete User";
    include_once("head.php");
    ?>
</head>

<body>
    <?php
    include_once("inc_nav.php");
    ?>
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-dark rounded">
            <h2>Delete User</h2>
        </div>
    </div>
</body>

</html>