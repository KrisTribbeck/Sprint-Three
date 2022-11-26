<!-- Kirsten Kurniadi, ID: 30045816
Date: 21/11/2022
Assessment Task Three (Team Project)
Member Subscription Page -->
<!-- START PHP -->
<?php 
session_start();
if(!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 'n'){
    header("location: index.php");
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
<title>Admin | Acme Art Gallery</title>
</head>
<body>
    <!-- Grey with black text-->
    <?php
	  include_once('inc_nav.php');
    ?>
    <h2>Admin</h2>
  <div class="container-fluid" id="containerStyle">
      <!--Testing Search bar Start, Added action attribte for CrudTest....1) Original File name="InsertValuesTest.php, -->
  <form class="d-flex mt-3" role="search" action="admin.php" method="GET">
        <input class="form-control me-2" type="text" name="search" placeholder="Search by email address" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
<!--Search Bar Finish -->
 <!--Start of table.-->
    <table class="table table-hover" style="margin-top:20px;">
      <thead class="table-secondary">
		<th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Newsletter</th>
        <th>Newsflash</th>
        <th>Delete Account?</th>
        <th>Is Admin?</th>
      </thead>
      <tbody>
        <!--PHP START-->
     <?php
         //include our connection
         include_once('connection.php');

         $database = new Connection();
         $db = $database->open();
         try{	
            if (!isset($_GET["search"])){
                $sql = 'SELECT * FROM MembershipDatabase';
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
            } else {
                $sql = "SELECT * FROM MembershipDatabase WHERE Email LIKE '%$search%'";
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
        }
         catch(PDOException $e){
             echo "There is some problem in connection: " . $e->getMessage();
        }
         //close connection
         $database->close();
     ?>
    <!--FINISH PHP-->
      </tbody>
    </table>
  </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>