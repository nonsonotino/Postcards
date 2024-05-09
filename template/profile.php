<body class="d-flex flex-column align-items-start justify-content-center bg-secondary">
    <?php require ("profile_header.php") ?>
        <div class="postcard-profile-container d-flex flex-wrap justify-content-center
    ">
        <?php
        for ($i = 0; $i < 5; $i++) {
            require("profile_postcard.php");
        }
        ?>
        </div>

    <?php require ("footer.php") ?>
</body>