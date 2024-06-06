window.onload = function () {
    let form = document.getElementById("commentForm");
    let commentContent = document.getElementById("commentContent");
    let deleteComment = document.getElementById("deleteCommentButton");
    let errorText = document.getElementById("errorText");
    let postcardId = document.getElementById("postcardId");
    let commentId = document.getElementById("commentId");
    let sessionUsername = document.getElementById("sessionUsername");
    let commentUsername = document.getElementById("commentUsername");

    let showMessage = function (message) {
        errorText.hidden = false;
        errorText.textContent = message;
    }

    let showDeleteButton = function () {
        if (sessionUsername.value == commentUsername.value) {
            deleteComment.hidden = false;
        }
    }

    showDeleteButton();

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (commentContent.value != "") {
            $.ajax({
                url: "ajax/add_comment.php",
                type: "POST",
                data: { "commentContent": commentContent.value, "postcardId": postcardId.value },
                success: function (response) {
                    console.log("Server response:", response);
                    if (response.trim() == "success") {
                        commentContent.value = "";
                        window.location.reload();
                    } else {
                        console.log("Failed to add comment.");
                        let data = JSON.parse(response);
                        showMessage(data.error);
                    }
                }
            });
        } else {
            showMessage("Comment cannot be empty.");
        }
    });

    deleteComment.addEventListener("click", function (e) {
        e.preventDefault();
        if (confirm("Are you sure you want to delete this comment?")) {
            $.ajax({
                url: "ajax/delete_comment.php",
                type: "POST",
                data: { "commentId": commentId.value },
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
};
