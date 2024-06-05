<div class="d-flex flex-column border-bottom border-2 border-primary mx-3 py-2">
    <div class="d-flex flex-row">
        <a class="link-primary me-2 align-self-center" href="profile.php?username=<?= $comment["username"] ?>">
            <img src="<?= str_replace("../", "", $comment["profilePicture"]); ?>"
                class="footer-image  rounded-pill border border-3 border-primary" alt="Profile picture">
        </a>
        <div class="d-flex flex-column">
            <a href="profile.php?username=<?= $comment["username"] ?>"
                class="link-dark me-2 fw-bold"><?= $comment["username"] ?></a>
            <p class="m-0">
                <?= $comment["text"] ?>
            </p>
        </div>
    </div>
    <p class="m-0 fs-6 fw-light align-self-end">
        <?= timeAgo($comment["timeStamp"]) ?>
    </p>
</div>