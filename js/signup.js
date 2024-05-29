window.onload = function () {
    let form = document.getElementById("signupForm");
    let login = document.getElementById("login");

    login.addEventListener('click', function () {
        window.location.assign(this.href);
    });

    form.addEventListener('click', function (e) {
        e.preventDefault();
        if (validateForm()) {
            const formData = new FormData(this);
            result = $.ajax({
                url: "ajax/signup.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.trim() == "success") {
                        window.location.href = "/Postcards/index.php";
                    } else {
                        console.log("signup failed");
                    }
                },
            });
        }
    });

    function validateForm() {
        $("#usernameError").attr("hidden", true);
        $("#emailError").attr("hidden", true);
        $("#passwordError").attr("hidden", true);
        $("#confirmPasswordError").attr("hidden", true);

        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $("#emailError").html("Insert a valid email address.");
            $("#emailError").removeAttr("hidden");
            return false;
        }

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

        if (password !== confirmPassword) {
            $("#confirmPasswordError").html("Passwords don't match.");
            $("#confirmPasswordError").removeAttr("hidden");
            return false;
        }

        return true;
    }
}