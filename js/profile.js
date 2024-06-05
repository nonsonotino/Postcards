window.onload = function () {
    //let addButton = document.getElementById("addToFriends");
    let removeButton = document.getElementById("removeFromFriends");
    let editButton = document.getElementById("editProfile");
    let logoutButton = document.getElementById("logout");

    // addButton.addEventListener("click", function (e) {
    //     e.preventDefault();
    //     addButton.hidden = true;
    //     removeButton.hidden = false;
    //     $.ajax({
    //         url: "ajax/add_friend.php",
    //         type: "POST",
    //         success: function (response) {
    //             console.log(response);
    //             if (response.trim() == "success") {
    //                 console.log("Friend added");
    //             } else {
    //                 console.log("Friend not added");
    //             }
    //         },
    //     });
    // });

    removeButton.addEventListener("click", function (e) {
        e.preventDefault();
        removeButton.hidden = true;
        addButton.hidden = false;
        $.ajax({
            url: "ajax/remove_friend.php",
            type: "POST",
            success: function (response) {
                console.log(response);
                if (response.trim() == "success") {
                    console.log("Friend removed");
                } else {
                    console.log("Friend not removed");
                }
            },
        });
    });

    editButton.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("pressed");
        window.location.href = "/Postcards/edit_profile.php";
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