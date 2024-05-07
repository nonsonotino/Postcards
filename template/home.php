<body class="d-flex flex-column bg-secondary">
    <?php require("navbar.php") ?>
    <div class="postcard-scroll container-fluid">
    <?php
        for($i = 0; $i<5; $i++){
            require("postcard.php");
        }
    ?>
    </div>
    <?php require("footer.php") ?>
</body>
