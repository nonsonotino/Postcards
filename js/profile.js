window.onload = function () {
    let addButton = document.getElementById("addFriend");
    let removeButton = document.getElementById("removeFriend");
    let logoutButton = document.getElementById("logout");
    let errorText = document.getElementById("errorText");
    let currentUser = document.getElementById("currentUsername").value;
    let profileUser = document.getElementById("profileUsername").value;

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    if (currentUser == profileUser) {
        let editButton = document.getElementById("editProfile");

        editButton.addEventListener("click", function (e) {
            e.preventDefault();
            window.location.href = "/Postcards/edit_profile.php";
        });

        logoutButton.addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to logout?")) {
                $.ajax({
                    url: "ajax/logout.php",
                    type: "POST",
                    success: function (response) {
                        if (response.trim() == "success") {
                            window.location.href = "/Postcards/login.php";
                        } else {
                            let data = JSON.parse(response);
                            showMessage(data.error);
                        }
                    },
                });
            }
        });

    } else {
        addButton.addEventListener("click", function (e) {
            e.preventDefault();
            $.ajax({
                url: "ajax/add_friend.php",
                type: "POST",
                data: { "profileUser": profileUser, "currentUser": currentUser },
                success: function (response) {
                    if (response.trim() == "success") {
                        addButton.hidden = true;
                        removeButton.hidden = false;
                        window.location.reload();
                    } else {
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                },
            });
        });

        removeButton.addEventListener("click", function (e) {
            e.preventDefault();
            removeButton.hidden = true;
            addButton.hidden = false;
            $.ajax({
                url: "ajax/remove_friend.php",
                type: "POST",
                data: { "profileUser": profileUser, "currentUser": currentUser },
                success: function (response) {
                    if (response.trim() == "success") {
                        removeButton.hidden = true;
                        addButton.hidden = false;
                        window.location.reload();
                    } else {
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                },
            });
        });
    }
} 