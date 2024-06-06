<body class="bg-secondary d-flex flex-column">
    <div class="d-flex flex-row justify-content-start align-items-center border-bottom border-3 border-primary mx-3">
        <a href="home.php" class="link-primary me-3 py-3">
            <i class="fa-solid fa-arrow-left fs-1"></i>
        </a>
        <p class="comments-title fs-1 text-primary m-0">Comments</p>
    </div>
    <div id="commentsDisplay" class="comments-scroll h-100 d-flex flex-column overflow-scroll h-100">
        <?php
        if ($template_params["comments"] != null) {
            foreach ($template_params["comments"] as $comment) {
                require ("comment.php");
            }
        }
        ?>
    </div>
    <input type="hidden" id="postcardId" value="<?php echo $postcardId ?>" />
    <input type="hidden" id="sessionUsername" value="<?php echo $_SESSION["username"]; ?>" />
    <span id="errorText" class="text-danger fs-7" hidden></span>
    <form id="commentForm" class="d-flex flex-cloumn p-2 border-top border-2 border-primary mx-3">
        <input id="commentContent" name="commentContent"
            class="form-control bg-secondary border border-1 border-primary me-2" type="text"
            placeholder="Write something..." aria-label="Search">
        <button id="commentButton" name="commentButton"
            class="btn border border-1 border-primary bg-primary text-secondary" type="submit">Send</button>
    </form>
    <?php require ("footer.php") ?>
</body>
<script src="/Postcards/js/comments.js"></script>