window.onload = function () {
    let comments = document.getElementById("commentsDisplay");
    let commentData = document.getElementById("commentContent");
    let commentButton = document.getElementById("commentButton");
    let form = document.getElementById("commentForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (commentData.value != "") {
            sendComment(commentData.value, 20);
            commentData.value = "";
        }
    });
};


// function showResult(data) {
//     let result = "";
//     data = JSON.parse(data);
//     data.forEach(user, comment => {
//         console.log(user.profilePicture);
//         let profilePicture = user.profilePicture;
//         let path = profilePicture.replace("../", "");
//         console.log(path);
//         result += `
//             <div class="d-flex flex-column border-bottom border-2 border-primary mx-3 py-2">
//                 <div class="d-flex flex-row">
//                     <a class="link-primary me-2 align-self-center" href="#">
//                         <img src="${path}" class="footer-image  rounded-pill border border-3 border-primary" alt="Immagine profilo">
//                     </a>
//                     <div class="d-flex flex-column">
//                         <a href="#" class="link-dark me-2 fw-bold">${comment.username}</a>
//                         <p class="m-0">
//                             ${comment.text}
//                         </p>
//                     </div>
//                 </div>
//                 <p class="m-0 fs-6 fw-light align-self-end">
//                     ${comment.timeStamp}
//                 </p>
//             </div>
//             `;
//     });

//     let resultContainer = document.getElementById("searchResult");
//     resultContainer.innerHTML = result;
// }