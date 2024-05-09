window.onload = function () {
    let login = document.getElementById("login");
    let signup = document.getElementById("signup");

    signup.addEventListener("click", function() {
        window.location.assign(this.href); 
    });    

    login.addEventListener('click', function (e) {
        e.preventDefault();
        result = $.ajax({
            url: "/Postcards/ajax/login.php",
            type: "POST",
            data: $("#signupForm").serialize(),
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