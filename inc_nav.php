<!--NAV BAR START. Replace with include_once(inc_nav.php) when uploading to server.-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="index.html" class="navbar-brand">Acme Art</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {?>
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a href="member_login.html" class="nav-item nav-link">Login</a>
                </div>
                <div class="navbar-nav">
                    <a href="sign_up.html" class="nav-item nav-link">Sign-up</a>
                </div>
            </div>
        <?php } else{ ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $_SESSION["email"];?></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="subscriptions.php">Manage Subscriptions</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
            <?php }?>   
        </div>
    </div>
</nav>
<!--NAV BAR FINISH. Replace with include_once(inc_nav.php) when uploading to server.-->