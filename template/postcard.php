<div class="postcard bg-secondary">
  <div class="postcard-side front bg-white p-2">
    <img class="postcard-image w-100 h-100 align-self-center" src="<?= str_replace("../", "", $postcards['image']) ?>"
      alt="Postcard Front">
  </div>
  <div class="postcard-side back">
    <div class="postcard-background w-100 h-100 p-2">
      <div class="postcard-back bg-white h-100 w-100 d-flex">

        <div class="postcard-description">
          <p class="description-text text-start text-break text-wrap w-100 h-100">
            <?php echo htmlspecialchars($postcards['caption']); ?>
          </p>
        </div>

        <div class="postcard-info d-flex align-items-start">

          <img src="<?= str_replace("../", "", $postcards['profilePicture']); ?>"
            class="info-image  rounded-pill border border-3 border-primary ratio ratio-1x1 mb-3" alt="Immagine profilo">

          <div class="d-flex flex-row justify-content-start mb-2 w-100 align-items-center">

            <a class="info-symbol me-2 link-dark" href="profile.php">
              <i class="fa-solid fa-user"></i>
            </a>
            <a class="info-text link-dark" href="profile.php">
              <?php echo htmlspecialchars($postcards['username']); ?>
            </a>
          </div>

          <div class="d-flex flex-row justify-content-start align-items-center mb-2 w-100">
            <div class="info-symbol me-2 link-dark">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <p class="info-text link-dark">
              <?php echo htmlspecialchars($postcards['location']); ?>
            </p>
          </div>

          <div class="d-flex flex-row justify-content-start align-items-center w-100">
            <div class="info-symbol link-dark">
              <i class="fa-regular fa-calendar me-1"></i>
            </div>
            <p class="info-text">
              <?php echo htmlspecialchars(date('d/m/Y', strtotime($postcards['timeStamp']))); ?>
            </p>
          </div>

          <div class="h-100">

          </div>

          <div class="comment-button align-self-end">
            <a href="comments.php" class="link-dark info-symbol">
              <i class="fa-solid fa-comment"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>