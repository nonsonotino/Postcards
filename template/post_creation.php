<body class="d-flex flex-column bg-secondary">
    <?php require ("creation_header.php") ?>

    <script src="js/post_creation.js"></script>
    <div class="post-form w-50 h-100 align-self-center overflow-scroll py-3">
        <form id="postCreationForm" method="POST" action="/ajax/post_creation.php" class="d-flex flex-column">
            <label for="image-input" class="form-label fs-5 text-primary">Insert a picture:</label>
            <div class="bg-white p-2 selected-image border border-primary">
                <img id="selectedImage" src="assets/placeholder_image.png" alt="selected image"
                    class="postcard-image w-100">
            </div>
            <input type="file" class="form-control d-none" id="postImage" name="postImage"
                accept="image/jpg, image/jpeg, image/png, image/gif" />
            <label for="description-input" class="form-label fs-5  text-primary mt-3">Add a description:</label>
            <textarea class="description-area form-control border border-primary" id="description-input" name="description"
                rows="3"></textarea>
            <label for="location-input" class="form-label fs-5  text-primary mt-3">Where are you writing from?</label>
            <input id="location-input" class="form-control border border-primary" type="text" name="location"
                aria-label="default input example">
            <span id="errorText" class="text-danger fs-7" hidden></span>
            <button id="submit" type="submit" class="btn btn-primary mt-3 w-25 form-button align-self-end">Send</button>
        </form>

    </div>

    <?php require ("footer.php") ?>
</body>