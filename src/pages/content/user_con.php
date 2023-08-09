<?php if (!$profile_banner_state) :?>
<div class="edit-profile_banner" id="editProfileBannerBtn">
    +
</div>
<div class="edit-banner-form" id="profileBannerForm">
    <form action="">
        <input type="file" name="banner-image">
    </form>
    <div class="icon">
        <i class="fa-regular fa-image"></i>
        Chose Banner Picture From Your Computer
    </div>
</div>
<?php endif ?>
<div class="banner-pic">
    <img src="<?=$profile_banner?>" alt="">
</div>
<div class="profile-pic">
    <?php if (!$profile_pic_state) :?>
    <div class="edit-profile_pic" id="editProfilePicBtn">
        +
    </div>
    <?php endif ?>
    <img src="<?=$profile_pic?>" alt="">
</div>
<div class="edit-pic-form" id="profilePicForm">
    <form action="">
        <input type="file" name="pic-image">
    </form>
    <div class="icon">
        <i class="fa-regular fa-image"></i>
        Chose Profile Picture From Your Computer
    </div>
</div>
<h1 class="username"><?=$username?></h1>
<p class="description"><?=$description?></p>
<div class="social-media-links">
    <?php  if ($facebook): ?>
        <a class="facebook" href="<?=$facebook?>">
            <div class="icon">
                <i class="fa-brands fa-facebook"></i>
            </div>
        </a>
    <?php endif ?>
    <?php  if ($instagram): ?>
        <a class="instagram" href="<?=$instagram?>">
            <div class="icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
        </a>
    <?php endif ?>
    <?php  if ($twitter): ?>
        <a class="twitter" href="<?=$twitter?>">
            <div class="icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
        </a>
    <?php endif ?>
</div>

<div class="user-buttons">
    <button class="follow">Follow</button>
    <button class="block">Block</button>
    <button class="message">Message</button>
</div>

<div class="posts">
</div>