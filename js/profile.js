window.onload = function () {
    let buttonAdd = document.getElementById("addToFriends");
    let buttonRemove = document.getElementById("removeFromFriends");

    buttonAdd.addEventListener("click", function () {
        buttonAdd.hidden = true;
        buttonRemove.hidden = false;
    });

    buttonRemove.addEventListener("click", function () {
        buttonRemove.hidden = true;
        buttonAdd.hidden = false;
    });

} 