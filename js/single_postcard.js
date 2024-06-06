window.onload = function () {
    let deleteButton = document.getElementById("deleteButton");
    let postcardId = document.getElementById("postcardId");
    let errorText = document.getElementById("errorText");

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    deleteButton.onclick = function (e) {
        e.preventDefault();
        if (confirm("Are you sure you want to delete this postcard?")) {
            $.ajax({
                url: "ajax/delete_postcard.php",
                type: "POST",
                data: { "postcardId": postcardId.value },
                success: function (response) {
                    if (response === "success") {
                        window.location.href = "/Postcards/profile.php";
                    } else {
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                }
            });
        }
    };
};