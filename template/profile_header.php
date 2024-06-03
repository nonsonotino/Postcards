<header
    class="d-flex flex-row m-3 mt-0 mb-0 pt-4 pb-3 border-bottom border-primary border-3 border-primary justify-content-around bg-secondary ">
    <div class="d-flex flex-column">
        <img src="<?= str_replace("../", "", $profile[0]["profilePicture"]); ?>" alt="Immagine profilo"
            class=" profile-image rounded-pill border border-4 border-primary ratio ratio-1x1 mb-1 mt-1">
        <p><?php echo $_SESSION["username"] ?></p>
    </div>
    <div class="d-flex flex-column align-items-center">
        <p class="m-0"><?php echo $profile["friends"] ?></p>
        <p class="mb-2">penfriends</p>

        <button id="addToFriends" class="btn btn-primary btn-sm">add to friends</button>
        <button id="removeFromFriends" class="btn btn-primary btn-sm bg-secondary text-dark border-2 border-primary"
            hidden>remove from
            friends</button>
    </div>
    <div class="d-flex flex-column">
        <button id="logout" class="btn btn-primary btn-sm">Logout</button>
    </div>
</header>