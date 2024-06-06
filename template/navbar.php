<nav class="navbar navbar-expand-lg navbar-secondary bg-primary container-fluid py-4 d-flex justify-content-between">
    <a id="notificationsButton" class="link-secondary notification-bell" href="notifications.php">
        <i class="fa-regular fa-bell fa-xl"></i>
        <span class="notification-badge bg-danger">
            <?php
            echo $dbh->getNewNotificationNumber($_SESSION["username"]);
            ?>
        </span>
    </a>
    <div class="date text-secondary align-self-center">
        <?php echo date("D d, M Y"); ?>
    </div>
    <form class="d-flex flex-line">
        <a href="search.php" class="link-secondary">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </a>
    </form>
</nav>