<div
    class="d-flex flex-row border-bottom border-2 border-primary p-2 justify-content-start align-items-center mx-3 py-2">
    <a class="link-primary me-2" href="profile.php?username=<?= $notification['sender'] ?>">
        <img src="assets/profile_default.jpg" class="footer-image  rounded-pill border border-3 border-primary"
            alt="Profile picture">
    </a>
    <a class="link-dark me-2 fw-bold" href="profile.php?username=<?= $notification['sender'] ?>">
        <?= $notification['sender'] ?>
    </a>
    <p class="m-0">
        Liked your postcard!
    </p>
    <p class="m-0 fs-6 fw-light align-self-end">
        <?= timeAgo($notification['timeStamp']) ?>
    </p>
</div>