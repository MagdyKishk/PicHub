<?php 
	@session_start();
	if (isset($_SESSION["user_data"])) {
		$USER_DATA      = $_SESSION["user_data"];
		$profile_pic    = $USER_DATA["profile_pic"];
		$username       = $USER_DATA["username"];
	}
?>
<header class="main-navbar" id="navbarHeader">
	<div class="left-menu">
		<a href="/home" class="logo">PicHub</a>
		<form action="">
			<input type="text" name="search-user" placeholder="Search For User">
		</form>
	</div>
	<ul class="center-menu">
		<li>
			<a href="/home">
				<div class="icon">
					<i class="fa-solid fa-house"></i>
				</div>
				Home
			</a>
		</li>
		<li>
			<a href="/user">
				<div class="icon">
					<i class="fa-solid fa-user"></i>
				</div>
				Profile
			</a>
		</li>
		<li>
			<a href="/Reels">
				<div class="icon">
					<i class="fa-solid fa-video"></i>
				</div>
				Reels
			</a>
		</li>
		<li>
			<a href="/Trends">
				<div class="icon">
					<i class="fa-solid fa-arrow-trend-up"></i>
				</div>
				Trends
			</a>
		</li>
		<li>
			<a href="/Market">
				<div class="icon">
					<i class="fa-solid fa-store"></i>
				</div>
				Market
			</a>
		</li>
	</ul>
	<ul class="right-menu">
		<li>
			<a id="settingsBtn">
				<div class="icon">
					<i class="fa-solid fa-gear"></i>
				</div>
				Settings
			</a>
		</li>
		<?php if (isset($_SESSION["user_data"]["logedin"]) && $_SESSION["user_data"]["logedin"] == true) :?>
		<li class="user">
			<a>
				<h3><?=$username?></h3>
				<div class="profile-pic">
					<img src="<?=$profile_pic?>" alt="">
				</div>
			</a>
			<ul class="profile_menu">
				<li><a href="">Friends</a></li>
				<li><a href="">Settings</a></li>
			</ul>
		</li>
		<?php else: ?>
		<li><a href="/account?operation_type=login">Login</a></li>
		<li><a href="/account?operation_type=register">Register</a></li>
		<?php endif ?>
	</ul>
	<div class="settings" style="display:none">
		<form action="">
			<div class="setting-field">
				<label for="visability-state">Visability State</label>
				<select id="visability-state" name="visability-state">
					<option value="1">Online</option>
					<option value="2">Offline</option>
					<option value="3">Away</option>
					<option value="4">Busy</option>
				</select>
			</div>
			<div class="setting-field">
				<label for="visability-state">Show Profile Images</label>
				<div class="checkbox">
					<input type="hidden" name="show_profile_images" value="off">
					<input type="checkbox" name="show_profile_images">
					<div class="icon">
						<i class="fa-solid fa-check"></i>
					</div>
				</div>
			</div>
			<button type="submit">Apply</button>
		</form>
	</div>
</header>