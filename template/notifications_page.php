<body class="bg-secondary d-flex justify-content-start flex-column">
    <?php require ("navbar.php") ?>
    <div class="notifications-scroll d-flex flex-column overflow-scroll h-100">
        <?php
        foreach ($template_params["notifications"] as $notifications) {
            require ("notification.php");
        }
        ?>
    </div>
    <?php require ("footer.php") ?>
</body>