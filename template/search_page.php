<body class="bg-secondary d-flex flex-column">
    <?php require ("navbar.php") ?>
    <form id="searchForm" class="d-flex flex-cloumn p-2 border-bottom border-2 border-primary mx-2">
        <input id="searchBar" name="searchBar" class="form-control bg-secondary border border-1 border-primary me-2"
            type="search" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn border border-1 border-primary bg-primary text-white"
            type="submit">Search</button>
    </form>
    <div id="searchResult" name="searchResult" class="comments-scroll h-100 d-flex flex-column overflow-scroll h-100">
    </div>
    <?php require ("footer.php") ?>
</body>
<script src="/Postcards/js/search.js"></script>