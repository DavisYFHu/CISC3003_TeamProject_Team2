<?php
    //Load CAPTCHA Class
	require "Captcha.class.php";
	//Instantiating Objects
	$captcha = new Captcha();
	//Generate CAPTCHA images
	$captcha->generate(70,35,4,9);
?>