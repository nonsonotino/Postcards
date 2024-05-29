window.onload = function () {
    let form = document.getElementById("postCreationForm");
    let imageElement = document.getElementById("selectedImage");
    let inputFile = document.getElementById("postImage");

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
        let formData = new FormData(this);
        console.log(formData.values().next().value);
        result = $.ajax({
            url: "/Postcards/ajax/post_creation.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == " success") {
                    window.location.href = "/Postcards/profile.php";
                } else {
                    console.log(response);
                }
            }
        });
    });
}