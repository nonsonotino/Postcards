<body class="d-flex flex-column bg-secondary">
    <div class="d-flex flex-row justify-content-center align-items-center border-bottom border-3 border-primary mx-3">
        <p class="creation-title fs-1 text-primary m-0">Edit your profile picture</p>
    </div>
    <script src="js/profile_creation.js"></script>
    <div class="post-form w-50 h-100 align-self-center overflow-scroll py-3">
        <form id="profileCreationForm" method="POST" action="/ajax/profile_creation.php" class="d-flex flex-column">
            <label for="image-input" class="form-label fs-5 text-primary">Choose a picture:</label>
            <div class="bg-white p-2 selected-image border border-primary">
                <img id="defaultImage" src="assets/profile_default.jpg" alt="selected image"
                    class="postcard-image w-100">
            </div>
            <input type="file" class="form-control d-none" id="profileImage" name="profileImage"
                accept="image/jpg, image/jpeg, image/png, image/gif" />
            <span id="errorText" class="text-danger fs-7" hidden></span>
            <button id="submit" type="submit" class="btn btn-primary mt-3 w-25 form-button align-self-end">Edit</button>
        </form>

    </div>
    <?php require ("footer.php") ?>
</body>
<script src="/Postcards/js/profile_creation.js"></script>