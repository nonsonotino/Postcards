window.onload = function () {
    let form = document.getElementById("loginForm");
    let signup = document.getElementById("signup");
    let errorText = document.getElementById("errorText");

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    let validateForm = function () {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username.length < 3) {
            showMessage("Username must be at least 3 characters long.");
            return false;
        }

        if (password.length < 6) {
            showMessage("Password must be at least 6 characters long.");
            return false;
        }

        return true;
    }

    signup.addEventListener("click", function () {
        window.location.assign(this.href);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (validateForm()) {
            const formData = new FormData(this);
            $.ajax({
                url: "ajax/login.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.trim() == "success") {
                        window.location.href = "/Postcards/home.php";
                    } else {
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                }
            });
        }
    });
}
