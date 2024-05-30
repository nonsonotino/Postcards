<body class="d-flex flex-column justify-content-center bg-secondary">
    <?php require ("profile_header.php") ?>
    <div class="postcard-profile-container h-100 d-flex flex-wrap justify-content-center overflow-scroll
    ">
        <?php
        foreach ($template_params["profile"] as $postcards) {
            require ("profile_postcard.php");
        }
        ?>
    </div>

    <?php require ("footer.php") ?>
</body>
<script src="/Postcards/js/profile.js"></script>