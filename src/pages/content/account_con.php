<div class="form-wrapper">
    <div class="form-header">
        PicHub
    </div>
<div class="register-form">
    <form action="./src/controlers/register-login.php" method="POST">
        <?php if (isset($_GET["operation_type"]) && $_GET["operation_type"] == "register") : ?>
        <div class="input-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" id="f_name" placeholder="Mikle" required autocomplete="off">
        </div>
        <div class="input-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" id="l_name" placeholder="John" required autocomplete="off">
        </div>
        <?php endif ?>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="YourName@example.com" required autocomplete="off">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="password" required autocomplete="off">
        </div>
        <?php if (isset($_GET["operation_type"]) && $_GET["operation_type"] == "register") : ?>
        <div class="input-group">
            <label for="password">repeat-password</label>
            <input type="password" id="re-password" placeholder="repeat password" required autocomplete="off">
        </div>
        <div class="input-group">
            <label for="password">Agree To Terms & Conditions</label>
		    <div class="checkbox">
				<input type="hidden" name="show_profile_images" value="off">
				<input type="checkbox" name="show_profile_images">
				<div class="icon">
					<i class="fa-solid fa-check"></i>
				</div>
			</div>
        </div>
        <?php endif ?>
        <button type="submit" name="<?php if (isset($_GET["operation_type"]) && $_GET["operation_type"] == "register") {echo "submit-register";} else {echo "submit-login";}?>">
        Submit
        </button>
        <?php if (isset($_GET["operation_type"]) && $_GET["operation_type"] == "register"): ?>
        <p class="change_mode">
            <span>
                you have account alerady?
            </span>
            <a href="/account?operation_type=login" class="have_acc"> Login</a>
        </p>
        <?php else: ?>
        <p class="change_mode">
            <span>
                Don't Have Accout?
            </span>
            <a href="/account?operation_type=register"> create Account</a>
        </p>
        <?php endif ?>
    </form>
</div>