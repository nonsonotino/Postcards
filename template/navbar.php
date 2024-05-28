<nav class="navbar navbar-expand-lg navbar-secondary bg-primary container-fluid py-4 d-flex justify-content-between">
<script src="js/symbols.js"></script>
    <a class="link-secondary " href="#">
        <i id="notification-symbol" class="fa-regular fa-bell fa-xl" onload="updateNotificatoins(this)"></i>
    </a>
    <div class="date text-secondary">
        <?php echo date("D d, M Y"); ?>
    </div>
    <a class="link-secondary" href="#">
        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
    </a> 
</nav>