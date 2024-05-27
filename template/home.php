<body class="d-flex flex-column bg-secondary">
    <?php require ("navbar.php") ?>
    <div class="postcard-scroll d-flex flex-row h-100 align-items-center overflow-scroll">
        <?php

        $postcards = $dbh->loadHomePage($_SESSION["username"]);
        foreach ($postcards as $postcard) {
            require ("postcard.php");
        }

        ?>
    </div>
    <?php require ("footer.php") ?>
</body>