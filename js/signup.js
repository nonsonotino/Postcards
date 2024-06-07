window.onload = function () {
    let form = document.getElementById("signupForm");
    let login = document.getElementById("login");
    let errorText = document.getElementById("errorText");

    let validateForm = function () {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (username.length < 3) {
            showMessage("Username must be at least 3 characters long.");
            return false;
        }

        if (!emailRegex.test(email)) {
            showMessage("Insert a valid email address.");
            return false;
        }

        if (password.length < 6) {
            showMessage("Password must be at least 6 characters long.");
            return false;
        }

        if (password !== confirmPassword) {
            showMessage("Passwords do not match.");
            return false;
        }

        return true;
    }

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    login.addEventListener("click", function () {
        window.location.assign(this.href);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (validateForm()) {
            const formData = new FormData(this);
            $.ajax({
                url: "ajax/signup.php",
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
                },
            });
        }
    });
}