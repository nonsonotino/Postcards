<body class="bg-secondary d-flex flex-column">
    <?php require("comment_header.php") ?>
    <div class="comments-scroll h-100 d-flex flex-column overflow-scroll h-100">
        <?php
        for ($i = 0; $i < 100; $i++) {
            require("comment.php");
        }
        ?>
    </div>
    <?php require("footer.php") ?>
</body>