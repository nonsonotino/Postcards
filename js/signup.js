window.onload = function () {
    let submit = document.getElementById("submit");
    let login = document.getElementById("login");

    login.addEventListener('click', function () {
        window.location.assign(this.href);
    });

    submit.addEventListener('click', function (e) {
        e.preventDefault();
        result = $.ajax({
            url: "/Postcards/ajax/signup.php",
            type: "POST",
            data: $("#signupForm").serialize(),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == "success") {
                    window.location.href = "/Postcards/index.php";
                } else {
                    console.log("signup failed");
                }
            },
        });
    });
}