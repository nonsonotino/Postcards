window.onload = function () {
    let form = document.getElementById("loginForm");
    let signup = document.getElementById("signup");

    signup.addEventListener("click", function () {
        window.location.assign(this.href);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        result = $.ajax({
            url: "/Postcards/ajax/login.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.includes("success")) {
                    console.log(response);
                    window.location.href = "/Postcards/index.php";
                } else {
                    // TODO: Display error message
                    console.error("no success")
                }
            }
        });
    });
}