<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php include __DIR__ . '\..\heads\font-awesome.html'?>
		 <!-- Js Files -->
		<script defer src="./src/js/components/navbar.js"></script>
		<!-- Page Css -->
		<link rel="stylesheet" href="<?=$page_css?>">
		<!-- Page JS -->
		<script defer src="<?=$page_js?>"></script>
		<title>PicHub | <?=$page_title?></title>
	</head>
	<body>
		<?php include __DIR__ . '\..\components\navbar.php'?>
		<main>
		<?=$page_content?>
		</main>
		<?php include __DIR__ . '\..\components\footer.php'?>
	</body>
</html>