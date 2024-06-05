<body class="d-flex flex-column bg-secondary">
    <?php require ("navbar.php") ?>
    <div class="postcard-scroll d-flex flex-row h-100 align-items-center overflow-scroll">
        <?php
        foreach ($template_params["postcards"] as $postcard) {
            require ("postcard.php");
        }
        ?>
    </div>
    <?php require ("footer.php") ?>
    <script src="js/home.js"></script>
</body>