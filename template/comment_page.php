<body class="bg-secondary d-flex flex-column">
    <?php require("comment_header.php") ?>
    <div class="comments-scroll h-100 d-flex flex-column overflow-scroll h-100">
        <?php
        for ($i = 0; $i < 100; $i++) {
            require("comment.php");
        }
        ?>
    </div>
    <form class="d-flex flex-cloumn p-2 border-top border-2 border-primary mx-3">
      <input class="form-control bg-secondary border border-1 border-primary me-2" type="text" placeholder="Write something..." aria-label="Search">
      <button class="btn border border-1 border-primary bg-primary text-secondary" type="submit">Send</button>
    </form>
    <?php require("footer.php") ?>
</body>