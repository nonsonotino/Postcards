window.onload = function () {
    let form = document.getElementById("commentForm");
    let commentContent = document.getElementById("commentContent");
    let errorText = document.getElementById("errorText");
    let postcardId = document.getElementById("postcardId");
    let arrowBack = document.getElementById("arrowBack");

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (commentContent.value != "") {
            $.ajax({
                url: "ajax/add_comment.php",
                type: "POST",
                data: { "commentContent": commentContent.value, "postcardId": postcardId.value },
                success: function (response) {
                    if (response.trim() == "success") {
                        commentContent.value = "";
                        window.location.reload();
                    } else {
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                }
            });
        } else {
            showMessage("Comment cannot be empty.");
        }
    });

    document.querySelectorAll(".deleteCommentButton").forEach(function (button) {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this comment?")) {
                let commentId = button.dataset.commentId;
                $.ajax({
                    url: "ajax/delete_comment.php",
                    type: "POST",
                    data: { "commentId": commentId },
                    success: function (response) {
                        if (response.trim() == "success") {
                            window.location.reload();
                        } else {
                            let data = JSON.parse(response);
                            showMessage(data.error);
                        }
                    }
                });
            }
        });
    });

    arrowBack.addEventListener("click", function (e) {
        e.preventDefault();
        history.back();
    });
};
