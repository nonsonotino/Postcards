<body class="d-flex flex-column bg-secondary">
    <div class="d-flex flex-row justify-content-start align-items-center border-bottom border-3 border-primary mx-3">
        <a href="profile.php?username=<?= $postcard['username'] ?>" class="link-primary me-3 py-3">
            <i class="fa-solid fa-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="d-flex align-items-center justify-content-center h-100 mx-3">
        <?php require ("postcard.php") ?>
    </div>
    <?php require ("footer.php") ?>
    <script src="js/home.js"></script>
</body>