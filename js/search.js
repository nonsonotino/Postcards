$(document).ready(function () {
    let searchBar = document.getElementById("searchBar");
    let form = document.getElementById("searchForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let data = searchBar.value;
        if (data != "") {
            $.ajax({
                type: "POST",
                url: "ajax/search.php",
                data: JSON.stringify(data),
                success: showResult
            });
        } else {
            document.getElementById("searchResult").innerHTML = "";
        }
    });
});

function showResult(data) {
    let result = "";
    data = JSON.parse(data);
    data.forEach(user => {
        let profilePicture = user.profilePicture;
        let path = profilePicture.replace("../", "");
        result += `
            <div class="d-flex border-bottom border-2 border-primary mx-3 py-2 align-items-center">
                <a class="link-primary me-2 align-self-center" href="#">
                    <img src="${path}" class="footer-image  rounded-pill border border-3 border-primary" alt="${user.username}'s profile picture" />
                </a>
                <a href="profile.php?username=${user.username}" class="link-dark me-2 fw-bold">${user.username}</a>
            </div>
            `;
    });

    let resultContainer = document.getElementById("searchResult");
    resultContainer.innerHTML = result;
}
