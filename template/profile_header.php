<header
    class="d-flex flex-row m-3 mt-0 mb-0 pt-4 pb-3 border-bottom border-primary border-3 border-primary bg-secondary justify-content-around">
    <div class="d-flex flex-column">
        <img src="<?= str_replace("../", "", $profile["profilePicture"]); ?>" alt="Immagine profilo"
            class=" profile-image rounded-pill border border-4 border-primary ratio ratio-1x1 mb-1 mt-1">
        <p class="text-center"><?php echo $profile["username"] ?></p>
    </div>
    <div class="d-flex flex-column align-items-center">
        <p class="m-0"><?php echo $profile["friends"] ?></p>
        <p class="mb-2">penfriends you have</p>
        <p class="m-0"><?php echo $profile["friendsFollowed"] ?></p>
        <p class="mb-2">penfriends you follow</p>
        <button id="editProfile" class="friend-button btn btn-primary btn-sm">edit your profile</button>
        <button id="removeFromFriends"
            class="friend-button btn btn-primary btn-sm bg-secondary text-dark border-2 border-primary" hidden>remove
            from
            friends</button>
    </div>
    <div class="position-absolute top-0 end-0 d-flex flex-column m-1">
        <button id="logout" class="btn btn-primary btn-sm">Logout</button>
    </div>
</header>
<script src="/Postcards/js/profile.js"></script>