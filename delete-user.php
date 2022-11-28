<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once("connection.php");
    $sql = "DELETE FROM MembershipDatabase WHERE Id = :id";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once("head.php")?>
    </head>
</html>