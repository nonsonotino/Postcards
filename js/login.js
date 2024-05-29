window.onload = function () {
    let form = document.getElementById("loginForm");
    let signup = document.getElementById("signup");

    signup.addEventListener("click", function () {
        window.location.assign(this.href);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        result = $.ajax({
            url: "/Postcards/ajax/login.php",
            type: "POST",
            data: $("#loginForm").serialize(),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == "success") {
                    window.location.href = "/Postcards/index.php";
                } else {
                    console.log("login failed");
                }
            }
        });
    });
}