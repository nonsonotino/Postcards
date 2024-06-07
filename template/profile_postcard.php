<div class="profile-postcard bg-secondary m-2">
  <div class="bg-white p-2">
    <a href="single_postcard.php?postcardId=<?= $postcard["idPostCard"] ?>&username=<?= $postcard["username"] ?>">
      <img class="postcard-image w-100 h-100 align-self-center" src="<?= str_replace("../", "", $postcard['image']) ?>"
        alt="Postcard Front">
    </a>
  </div>
</div>