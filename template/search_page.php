<body class="bg-secondary d-flex flex-column">
    <?php require ("navbar.php") ?>
    <form class="d-flex flex-cloumn p-2 border-bottom border-2 border-primary mx-2">
      <input class="form-control bg-secondary border border-1 border-primary me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn border border-1 border-primary bg-primary text-secondary" type="submit">Search</button>
    </form>
    <div class="comments-scroll h-100 d-flex flex-column overflow-scroll h-100">
        <?php
        for ($i = 0; $i < 100; $i++) {
            require("search_profile.php");
        }
        ?>
    </div>
    <?php require("footer.php") ?>
</body>