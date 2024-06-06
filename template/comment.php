<div class="d-flex flex-column border-bottom border-2 border-primary mx-3 py-2">
    <div class="d-flex flex-row">
        <input type="hidden" id="commentId" name="commentId" value="<?php echo $comment["idComment"] ?>" />
        <input type="hidden" id="sessionUsername" name="sessionUsername" value="<?php echo $_SESSION["username"] ?>" />
        <a class="link-primary me-2 align-self-center" href="profile.php?username=<?= $comment["username"] ?>">
            <img src="<?= str_replace("../", "", $comment["profilePicture"]); ?>"
                class="footer-image  rounded-pill border border-3 border-primary" alt="Profile picture">
        </a>
        <div class="d-flex flex-column">
            <input type="hidden" id="postcardId" name="username" value="<?php echo $postcardId ?>" />
            <input type="hidden" id="commentUsername" name="commentUsername"
                value="<?php echo $comment["username"] ?>" />
            <a href="profile.php?username=<?= $comment["username"] ?>"
                class="link-dark me-2 fw-bold"><?= $comment["username"] ?></a>
            <p class="m-0">
                <?= $comment["text"] ?>
            </p>
        </div>
    </div>
    <div class="align-self-end">
        <?php if ($_SESSION['username'] == $comment['username']): ?>
            <button class="btn btn-danger deleteCommentButton"
                data-comment-id="<?= $comment['idComment']; ?>">Delete</button>
        <?php endif; ?>
        <p class="m-0 fs-6 fw-light align-self-end">
            <?= timeAgo($comment["timeStamp"]) ?>
        </p>
    </div>
</div>