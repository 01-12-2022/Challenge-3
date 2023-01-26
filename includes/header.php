<!DOCTYPE html>
<html lang="de-DE">
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="images/logo.svg" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo url("home") ?>"><span><ion-icon name="home-outline"></ion-icon></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo url("products"); ?>"><span><ion-icon name="extension-puzzle-outline"></ion-icon></span> Unsere Produkte</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo url("about"); ?>"><span><ion-icon name="people-outline"></ion-icon></span> Über uns</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo url("shopping_cart"); ?>"><span><ion-icon name="cart-outline"></ion-icon></span> Warenkorb</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo url("shopping_cart"); ?>"><span><ion-icon name="person-outline"></ion-icon></span> Anmelden</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- load jQuery 2.2.1 -->
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>

<?php 

function url($site) {
	return 'index.php?site=' . $site;
}

/**
 * <img src="data:image/jpeg;base64," base64>
 * 
 * @return string
 */

function getSiteName() { // return siteName
	
	$site = $_GET['site'];
	
	if(empty($site)) {
		return "Startseite";
	} else if($site == "products") {
		return "Produkte";
	} else if($site == "about") {
		return "Über uns";
	} else if($site == "login") {
		return "Anmelden";
	} else if($site == "registration") {
		return "Registrieren";
	} else if($site == "shopping_cart") {
		return "Warenkorb";
	} else {
		return "Startseite";
	}
	
}

function getTargetInclude() { // link to other sites
		
	$site = $_GET['site'];
	
	if(empty($site)) {
		$site = "index.php";
	} else if($site == "products") {
		$site = "products.php";
	} else if($site == "about") {
		$site = "about.php";
	} else if($site == "login") {
		$site = "login.php";
	} else if($site == "registration") {
		$site = "registration.php";
	} else if($site == "shopping_cart") {
		$site = "shopping_cart.php";
	} else {
		$site = "index.php";
	}
	return "sites/" . $site;
}

?>