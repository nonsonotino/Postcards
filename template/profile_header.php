<header
    class="d-flex flex-row m-3 mt-0 mb-0 pt-4 pb-3 border-bottom border-primary border-3 border-primary bg-secondary justify-content-around position-relative">
    <?php if ($profile["username"] != $_SESSION["username"]): ?>
        <div class="position-absolute top-0 start-0 d-flex flex-column">
            <a id="arrowBack" href="home.php" class="link-primary me-3 py-3">
                <i class="fa-solid fa-arrow-left fs-1"></i>
            </a>
        </div>
    <?php endif; ?>
    <div class="d-flex flex-column">
        <img src="<?= str_replace("../", "", $profile["profilePicture"]); ?>" alt="Profile picture"
            class=" profile-image rounded-pill border border-4 border-primary ratio ratio-1x1 mb-1 mt-1">
        <p class="text-center"><?php echo $profile["username"] ?></p>
    </div>
    <input type="hidden" id="profileUsername" name="profileUsername" value="<?php echo $profile["username"] ?>" />
    <input type="hidden" id="currentUsername" name="currentUsername" value="<?php echo $_SESSION["username"] ?>" />
    <div class="d-flex flex-column align-items-center">
        <div class="d-flex flex-row align-items-center mt-2">
            <div class="d-flex flex-column align-items-center me-3">
                <p id="friends" class="m-0"><?php echo $profile["friends"] ?></p>
                <p id="labelFriends" class="mb-2">followers</p>
            </div>
            <div class="d-flex flex-column align-items-center">
                <p id="friendsFollowed" class="m-0"><?php echo $profile["friendsFollowed"] ?></p>
                <p id="labelFriendsFollowed" class="mb-2">following</p>
            </div>
        </div>
        <?php if ($profile["username"] == $_SESSION["username"]): ?>
            <button id="editProfile" class="friend-button btn btn-primary btn-sm">edit your profile</button>
            <div class="position-absolute top-0 end-0 d-flex flex-column m-1">
                <button id="logout" class="btn btn-primary btn-sm">Logout</button>
            </div>
        <?php else: ?>
            <?php if ($template_params["isFriend"]): ?>
                <button id="removeFriend"
                    class="friend-button btn btn-primary btn-sm bg-secondary text-dark border-2 border-primary">remove from
                    friends</button>
                <button id="addFriend" class="friend-button btn btn-primary btn-sm" hidden>add to friends</button>
            <?php else: ?>
                <button id="addFriend" class="friend-button btn btn-primary btn-sm">add to friends</button>
                <button id="removeFriend"
                    class="friend-button btn btn-primary btn-sm bg-secondary text-dark border-2 border-primary" hidden>remove
                    from friends</button>
            <?php endif; ?>
        <?php endif; ?>
        <span id="errorText" class="text-danger fs-7" hidden></span>
    </div>
</header>