window.onload = function () {
    let form = document.getElementById("postCreationForm");
    let imageElement = document.getElementById("selectedImage");
    let inputFile = document.getElementById("postImage");
    let errorText = document.getElementById("errorText");
    let descriptionInput = document.getElementById("description-input");
    let locationInput = document.getElementById("location-input");

    let validateForm = function () {
        if (!inputFile.files[0]) {
            showMessage("Please select an image.");
            return false;
        }

        if (descriptionInput.value.trim() === "") {
            showMessage("Please enter a description.");
            return false;
        }

        if (locationInput.value.trim() === "") {
            showMessage("Please enter your location.");
            return false;
        }

        return true;
    }

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    imageElement.addEventListener("click", function () {
        inputFile.click();
    });

    inputFile.addEventListener("change", function () {
        const imageFile = this.files[0];
        const reader = new FileReader();

        reader.onload = () => {
            const imgUrl = reader.result;
            imageElement.src = imgUrl;
        };

        if (imageFile) {
            reader.readAsDataURL(imageFile);
        }
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (validateForm()) {
            let formData = new FormData(this);
            $.ajax({
                url: "ajax/post_creation.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.trim() == "success") {
                        window.location.href = "/Postcards/profile.php";
                    } else {
                        let data = JSON.parse(response);
                        console.log(data);
                        showMessage(data.error);
                    }
                }
            });
        }
    });
}