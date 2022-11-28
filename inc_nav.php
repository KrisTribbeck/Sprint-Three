<!--NAV BAR START. Replace with include_once(inc_nav.php) when uploading to server.-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">Acme Art</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <ul class="navbar-nav">
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) { ?>
                    <li class="nav-item">
                        <a href="member_login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="sign_up.php" class="nav-link">Sign-up</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $_SESSION["email"]; ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="subscriptions.php">Manage Subscriptions</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!--NAV BAR FINISH. Replace with include_once(inc_nav.php) when uploading to server.-->