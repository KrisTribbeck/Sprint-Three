<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Subscription Page -->
<!-- START PHP -->
<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("location: login.php");
    exit;
}
?>
<!-- FINISH PHP-->
<!doctype html>
<html lang="en">
<head>
<?php
	include_once('head.php');
?>
<title>Manage Subscriptions | Acme Art Gallery</title>
</head>
<body>
    <!-- Grey with black text-->
    <?php
	  include_once('inc_nav.php');
    ?>
    <h1>Hello, <?php echo $_SESSION["inputName"]; ?></h1>
    <!--Start of table.-->
    <div class="container-fluid" id="containerStyle">
        <p>Subscription settings for <?php echo $_SESSION["inputEmail"]; ?>:</p>
      <!--Testing Search bar Start, Added action attribte for CrudTest....1) Original File name="InsertValuesTest.php, -->
        <form class="d-flex mt-3" action="updateSubscription.php" method="POST" enctype="multipart/form-data">
        <!--PHP START-->
        <?php
         //include our connection
        $database = new Connection();
        $db = $database->open();
        try{	
            $sql = "SELECT Newsletter, Newsflash FROM MembershipDatabase WHERE Email = ".$_SESSION['inputEmail'];
            foreach ($db->query($sql) as $row) {
                 ?>
                 <tr>
					 <td><?php echo $row['Id']; ?></td>
                     <td><?php echo $row['FullName']; ?></td>
                     <td><?php echo $row['Email']; ?></td>
                     <td><?php echo strtoupper($row['Newsletter']); ?></td>
                     <td><?php echo strtoupper($row['Newsflash']); ?></td>
                     <td><?php echo strtoupper($row['DeleteAccount']); ?></td>
                     <td><?php echo strtoupper($row['IsAdmin']); ?></td>
                 </tr>
                 <?php 
             }
         }
         catch(PDOException $e){
             echo "There is some problem in connection: " . $e->getMessage();
         }
         //close connection
         $database->close();
     ?>
    <!--FINISH PHP-->
        <button class="btn btn-success" type="submit">Update</button>
        </form>
<!--Search Bar Finish -->
  </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>