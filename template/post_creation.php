<body class="d-flex flex-column bg-secondary">
    <?php require("creation_header.php") ?>

    <script src="js/image_input.js"></script>
    <div class="post-form w-50 h-100 align-self-center overflow-scroll py-3">
        <form action="#" class="d-flex flex-column">
            <label for="image-input" class="form-label fs-5  text-primary">Insert a picture:</label>
            <div class="bg-white p-2 selected-image border border-primary">
                <img id="selectedImage" src="assets/placeholder_image.png" alt="selected image" class="postcard-image w-100">
            </div>
            <div data-mdb-ripple-init class="btn btn-primary btn-rounded w-25 mt-2 form-button">
                <label class="form-label text-white m-1" for="customFile1">Select an image</label>
                <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
            </div>
            <label for="description-input" class="form-label fs-5  text-primary mt-3">Add a description:</label>
            <textarea class="form-control border border-primary" id="description-input" rows="3"></textarea>
            <label for="location-input" class="form-label fs-5  text-primary mt-3">Where are you writing from?</label>
            <input class="form-control border border-primary" type="text" aria-label="default input example">
            <button type="submit" class="btn btn-primary mt-3 w-25 form-button align-self-end">Send</button>

        </form>

    </div>

    <?php require("footer.php") ?>
</body>