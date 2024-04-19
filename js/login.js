window.onload = function () {
    let login = document.getElementById('login');

    login.addEventListener('click', function (e) {
        e.preventDefault();
        result = $.ajax({
            url: "/Postcards/ajax/login.php",
            type: "POST",
            data: {
                username: document.getElementById('username').value,
                password: document.getElementById('password').value
            },
            success: function(response) {
                console.log(response);
                if (response == "success") {
                    window.location.href = "index.php";
                } else {
                    // TODO: Display error message
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Generic AJAX error   
                $("#errorContainer").text("An error occured. Try again later.");
            }
        });
    });
}