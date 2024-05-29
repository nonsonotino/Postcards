window.onload = function () {
    let form = document.getElementById("loginForm");
    let signup = document.getElementById("signup");

    signup.addEventListener("click", function () {
        window.location.assign(this.href);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (validateForm()) {
            const formData = new FormData(this);
            result = $.ajax({
                url: "ajax/login.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.trim() == "success") {
                        window.location.href = "/Postcards/index.php";
                    } else {
                        console.log("login failed");
                        const errorText = document.getElementById("errorLoginText");
                        errorText.hidden = false;
                        errorText.textContent = 'Credentials invalid or not existent'
                    }
                }
            });
        }
    });
}

function validateForm() {
    $("#usernameError").attr("hidden", true);
    $("#passwordError").attr("hidden", true);
    var username = $("#username").val();
    var password = $("#password").val();

    if (username.length < 3) {
        $("#usernameError").html("Username must be at least 3 characters long.")
        $("#usernameError").removeAttr("hidden");
        return false;
    }

    if (password.length < 6) {
        $("#passwordError").html("Password must be at least 6 characters long.");
        $("#passwordError").removeAttr("hidden");
        return false;
    }

    return true;
}