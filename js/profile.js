window.onload = function () {
    let addButton = document.getElementById("addToFriends");
    let removeButton = document.getElementById("removeFromFriends");
    let logoutButton = document.getElementById("logout");

    addButton.addEventListener("click", function () {
        addButton.hidden = true;
        removeButton.hidden = false;
    });

    removeButton.addEventListener("click", function () {
        removeButton.hidden = true;
        addButton.hidden = false;
    });

    logoutButton.addEventListener("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: "ajax/logout.php",
            type: "POST",
            success: function (response) {
                console.log(response);
                if (response.trim() == "success") {
                    window.location.href = "/Postcards/login.php";
                } else {
                    console.log("Logout failed");
                }
            },
        });
    });
} 