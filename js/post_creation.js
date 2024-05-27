function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

window.onload = function () {
    let form = document.getElementById("postCreationForm");

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