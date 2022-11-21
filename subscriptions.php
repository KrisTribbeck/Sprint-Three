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
    <h1>Hello, <?php echo $_SESSION["fullName"]; ?></h1>
    <!--Start of table.-->
    <div class="container-fluid" id="containerStyle">
        <p>Subscription settings for <?php echo $_SESSION["email"]; ?>:</p>
      <!--Testing Search bar Start, Added action attribte for CrudTest....1) Original File name="InsertValuesTest.php, -->
        <form class="d-flex mt-3" action="updateSubscription.php" method="POST" enctype="multipart/form-data">
        <!--PHP START-->
        <?php
         //include our connection
        $database = new Connection();
        $db = $database->open();
        try{	
            $sql = 'SELECT Id, FullName, Email, Newsletter, Newsflash, DeleteAccount, IsAdmin FROM MembershipDatabase';
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
        <input class="form-control me-2" type="text" name="search" name="submit" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Update</button>
        </form>
<!--Search Bar Finish -->
  </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>