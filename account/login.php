<?php 
session_start();
$conn=  mysqli_connect("localhost","root","","ekids");
if (!$conn) {
die("cannot connect to server");
}


if(isset($_POST['submit'])){
   

    $email = $_POST['customer_email'];
    $password = $_POST['customer_password'];
    $query = "select * from customer where customer_email='$email' and customer_password='$password'";
    $result = mysqli_query($conn, $query);
    $customer = mysqli_fetch_assoc($result);
    if(isset($customer['customer_id'])){
         $_SESSION['customer'] = $customer['customer_id'];
         //die($_SESSION['customer']);
       echo("<script>location.href = '../checkout.php';</script>");
    } else{
        $error = "User Not Found";
    }
}
if (isset($_POST['register'])){
    session_start();
    $name = $_POST['cfirst_name'];
    $email = $_POST['customer_email'];
    $password = $_POST['customer_password'];
    $query = "insert into customer (cfirst_name,customer_email,customer_password) values ('$name','$email','$password')";
    mysqli_query($conn, $query);
    header("location:login.php");
}




?>





<!doctype html>
<html lang="en" class="color_scheme">
	
<!-- Mirrored from theme685-baby-clothing.myshopify.com/account/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 May 2020 17:40:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8">

		

		<title>
			Account

			
				&ndash; kidsweet
			
		</title>

		<link rel="canonical" href="login.php">

		
			<link rel="shortcut icon" href="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/fav_32x329631.png?v=1558076533" type="image/png">
		

		

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<![endif]-->

		<style>
			html,
			body {overflow-x: hidden;}
			.row {overflow: hidden;}

			#page_preloader__bg {background: #fff;position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1000;
			-webkit-transition: opacity .1s ease-in-out .05s, z-index .1s ease-in-out .05s;
			   -moz-transition: opacity .1s ease-in-out .05s, z-index .1s ease-in-out .05s;
					transition: opacity .1s ease-in-out .05s, z-index .1s ease-in-out .05s;

			-webkit-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				 -o-transform: translate3d(0, 0, 0);
					transform: translate3d(0, 0, 0);
			}
			#page_preloader__bg.off {opacity: 0;z-index: -10;}


			#page_preloader__img {margin: -50px 0 0 -50px;position: absolute;top: 50%;left: 50%;z-index: 1001;
			-webkit-transition: transform .2s ease-in-out;
			   -moz-transition: transform .2s ease-in-out;
					transition: transform .2s ease-in-out;

			-webkit-transform: scale3d(1, 1, 1);
				-ms-transform: scale3d(1, 1, 1);
				 -o-transform: scale3d(1, 1, 1);
					transform: scale3d(1, 1, 1);
			}
			#page_preloader__img.off {
			-webkit-transform: scale3d(0, 0, 1);
				-ms-transform: scale3d(0, 0, 1);
				 -o-transform: scale3d(0, 0, 1);
					transform: scale3d(0, 0, 1);
			}

			.container{margin-right:auto;margin-left:auto}@media (max-width: 767px){.container{padding-left:15px;padding-right:15px}}@media (min-width: 768px){.container{width:750px}}@media (min-width: 992px){.container{width:970px}}@media (min-width: 1200px){.container{width:1170px}}.container-fluid{margin-right:auto;margin-left:auto;padding-right:15px;padding-left:15px}.row{margin-right:-15px;margin-left:-15px}.row:after{content:'';display:table;clear:both}.col-xs-1,.col-sm-1,.col-md-1,.col-lg-1,.col-xs-2,.col-sm-2,.col-md-2,.col-lg-2,.col-xs-3,.col-sm-3,.col-md-3,.col-lg-3,.col-xs-4,.col-sm-4,.col-md-4,.col-lg-4,.col-xs-5,.col-sm-5,.col-md-5,.col-lg-5,.col-xs-6,.col-sm-6,.col-md-6,.col-lg-6,.col-xs-7,.col-sm-7,.col-md-7,.col-lg-7,.col-xs-8,.col-sm-8,.col-md-8,.col-lg-8,.col-xs-9,.col-sm-9,.col-md-9,.col-lg-9,.col-xs-10,.col-sm-10,.col-md-10,.col-lg-10,.col-xs-11,.col-sm-11,.col-md-11,.col-lg-11,.col-xs-12,.col-sm-12,.col-md-12,.col-lg-12{min-height:1px;padding-right:15px;padding-left:15px;position:relative}.col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width: 768px){.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width: 992px){.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width: 1200px){.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}.section_map{margin:0;position:relative}.section_map .map_wrapper{overflow:hidden;position:relative;z-index:1}.section_map .map_container{position:absolute;top:0;right:-44%;bottom:0;left:0;z-index:1}.section_map .map_captions__off{right:0}.section_map .map_wrapper__small{padding:19.53% 0 0 0}.section_map .map_wrapper__medium{padding:29.29% 0 0 0}.section_map .map_wrapper__large{padding:39.06% 0 0 0}
		</style>

		<script>
			var theme = {
				moneyFormat: "${{amount}}",
			};
		</script>
	</head>

	<body class="template-customers/login scheme_1">
		<div class="page_wrapper">

			<div id="page_preloader__bg">
				<img id="page_preloader__img" src="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/shopify_logo4e43.gif?v=12415398779637264056" alt="">
			</div>

			<script>
				preloaderBg = document.getElementById('page_preloader__bg');
				preloaderImg = document.getElementById('page_preloader__img');

				window.addEventListener('load', function() {
					preloaderBg.classList.add("off");
					preloaderImg.classList.add("off");
				});

			</script>

			

				<div id="shopify-section-header" class="shopify-section"><div id="pseudo_sticky_block"></div>




<header id="page_header">
	<div class="page_container">
		<div class="top_pannel " > 
			<div class="container"> 
				<div class="top_pannel_text">Order online or call us (1800) 000 8808</div>

				<div class="top_pannel_menu">

					
					
						<div class="header_search">
							<span class="search_toggle"><i class="fa fa-search" aria-hidden="true"></i><b>Search</b><i class="fa fa-times"></i></span>
							<form action="https://theme685-baby-clothing.myshopify.com/search" method="get" role="search" class="search_form">
								<input type="search" name="q" placeholder="Search" aria-label="Search">

								<button type="submit">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>

							
								<script>
									theme.searchAjaxOn = true;
								</script>

								<div id="search_result_container"></div>
							
						</div>
					
					
					
					
						<div class="header_account">
							<a href="login.php" title="My account"><i class="fa fa-user" aria-hidden="true"></i><span>My account</span></a>

							
						</div>
					
					

					
					
						<div class="header_wishlist">
							<a href="../pages/wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i><span>Wishlist</span></a>
						</div>
					
					
					
					
						
						
						
						<div class="currency_selector">
							<div class="currency_selector__wrap" title="Currency">
								<div id="currency_active">USD</div>

								<ul id="currency_selector">
									<li data-value="USD" id="currency_selected" class="currency_selector__item">USD</li>

									
										
									
										
											<li data-value="EUR" class="currency_selector__item">EUR</li>
										
									
										
											<li data-value="GBP" class="currency_selector__item">GBP</li>
										
									
								</ul>
							</div>
						</div>

						<script>
							theme.shopCurrency = "USD";
							theme.moneyFormat = "${{amount}}";
							theme.moneyFormatCurrency = "${{amount}} USD";
						</script>

						<script src="../../cdn.shopify.com/s/javascripts/currencies.js" defer></script>
						<script src="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/currency-toolsb419.js?v=5605314120525099720" defer></script>
					

				</div>
			</div>
		</div>

		<div class="header_wrap1" >   
			<div class="container header_main_wrap">
				<div class="header_wrap2 header_left">
					

					
							
								<a class="header_logo" href="../index.html">
									<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/logo_170x30_crop_center%402x6e49.png?v=1558086808" alt="kidsweet" style="max-width: 170px">
									
								</a>
							

					
				</div>

				<div class="header_wrap2 header_center">
					
						<nav id="megamenu" class="megamenu">
							<h2 id="megamenu_mobile_toggle"><i class="fa fa-bars" aria-hidden="true"></i>Menu</h2>

							<div id="megamenu_mobile_close">
								<div class="close_icon"></div>
							</div>

							<ul id="megamenu_level__1" class="level_1">
								
									
									
									

									<li class="level_1__item level_2__small">
										<a class="level_1__link " href="../index.html">Home
											<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1524227640085"></i> 
										</a>


		
			<ul class="level_2" id="menu_1524227640085">
				<li>
					<div><ul class="level_3">
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../index.html">Home</a>

									
								</li>
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../collections/all.html">Catalog</a>

									
								</li>
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../collections.html">Collections</a>

									
								</li>
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../blogs/news.html">Blog</a>

									
								</li>
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../pages/about-us.html">About Us</a>

									
								</li>
							


								<li class="level_3__item ">
									<a class="level_3__link" href="../pages/contact-us.html">Contact Us</a>

									
								</li>
							


								<li class="level_3__item with_ul">
									<a class="level_3__link" href="../pages/faq.html">Pages<i class="level_3__trigger megamenu_trigger" data-submenu="submenu_1524227640085-7"></i></a>

									
										<ul class="level_3_2 droped_linklist" id="submenu_1524227640085-7">
											

													
												<li class="level_3_2_item ">
													<a class="level_3_2_link" href="../pages/password.html">Password</a>

													
												</li>
											

													
												<li class="level_3_2_item ">
													<a class="level_3_2_link" href="../pages/privacy-policy.html">Privacy Policy</a>

													
												</li>
											

													
												<li class="level_3_2_item ">
													<a class="level_3_2_link" href="../pages/services.html">Services</a>

													
												</li>
											

													
												<li class="level_3_2_item ">
													<a class="level_3_2_link" href="../pages/wishlist.html">Wishlist</a>

													
												</li>
											
										</ul>
									
								</li>
							
						</ul>
					</div>
				</li>
			</ul>
		

	

</li>






<li class="level_1__item level_2__links">
<a class="level_1__link " href="../collections/all.html">Catalog
	<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1524467474031"></i> 
</a>


		
			<ul class="level_2" id="menu_1524467474031">
				<li class="container">
					
						
						
<div class="megamenu_col__item ">
							
							
								<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/4_255x180_crop_centerfe5b.png?v=1558360356" alt="Catalog #1">
							
							
							<h3 >Catalog #1 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-1"></i></h3>

							<ul class="level_3" id="menu_1524467474031-1">
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale.html">Accessories</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/basics.html">Basics</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jackets.html">Jackets</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jogging.html">Jogging</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale-1.html">Sale</a>
									</li>
								
							</ul>
						</div>
					
						
						
<div class="megamenu_col__item ">
							
							
								<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/1_255x180_crop_centercbf2.png?v=1558360351" alt="Catalog #2">
							
							
							<h3 >Catalog #2 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-2"></i></h3>

							<ul class="level_3" id="menu_1524467474031-2">
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale-1.html">Sale</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jogging.html">Jogging</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jackets.html">Jackets</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/basics.html">Basics</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale.html">Accessories</a>
									</li>
								
							</ul>
						</div>
					
						
						
<div class="megamenu_col__item ">
							
							
								<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/3_255x180_crop_center2fcf.png?v=1558360354" alt="Catalog #3">
							
							
							<h3 >Catalog #3 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-3"></i></h3>

							<ul class="level_3" id="menu_1524467474031-3">
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jackets.html">Jackets</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jogging.html">Jogging</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale-1.html">Sale</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/shoes.html">Shoes</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/t-shirts.html">T-Shirts</a>
									</li>
								
							</ul>
						</div>
					
						
						
<div class="megamenu_col__item ">
							
							
								<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/2_255x180_crop_centere305.png?v=1558360352" alt="Catalog #4">
							
							
							<h3 >Catalog #4 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-4"></i></h3>

							<ul class="level_3" id="menu_1524467474031-4">
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/t-shirts.html">T-Shirts</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/shoes.html">Shoes</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/sale-1.html">Sale</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jogging.html">Jogging</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="../collections/jackets.html">Jackets</a>
									</li>
								
							</ul>
						</div>
					
				</li>
			</ul>
		

	

</li>






<li class="level_1__item level_2__links">
<a class="level_1__link " href="../collections.html">Collections
	<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1558087194434"></i> 
</a>


		
			<ul class="level_2" id="menu_1558087194434">
				<li class="container">
					
						
						
						

						
							<div class="megamenu_col__item ">
							
								<a href="../collections/sale.html"><img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/5_255x180_crop_center192f.png?v=1558360395" alt="Accessories">
									
								
									<h4>Accessories</h4>
								
								</a>
							</div>
						
					
						
						
						

						
							<div class="megamenu_col__item ">
							
								<a href="../collections/basics.html"><img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/6_255x180_crop_center1450.png?v=1558360396" alt="Basics">
									
								
									<h4>Basics</h4>
								
								</a>
							</div>
						
					
						
						
						

						
							<div class="megamenu_col__item ">
							
								<a href="../collections/jogging.html"><img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/7_255x180_crop_center4088.png?v=1558360398" alt="Jogging">
									
								
									<h4>Jogging</h4>
								
								</a>
							</div>
						
							<div class="megamenu_col__item ">
							
								<a href="../collections/shoes.html"><img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/files/8_255x180_crop_centerb544.png?v=1558360400" alt="Shoes">
									
								
									<h4>Shoes</h4>
								
								</a>
							</div>
					
				</li>
			</ul>
</li>

	<li class="level_1__item level_2__blog">
		<a class="level_1__link " href="../blogs/news.html">Blog
			<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1479747008568"></i> 
		</a>

		

					<ul class="level_2" id="menu_1479747008568">
						<li class="container">
							
							<div class="megamenu_col__item">
								
									<div class="blog_img">
										<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/articles/amelia-keller-517180-unsplash_350x308_crop_center37f0.jpg?v=1558013221" alt="PEOPLE LIKE BEING ATTRACTIVE, AND FASHION DESIGNERS KNOW IT QUITE WELL">
									</div>
								
								
								<div class="blog_info">
									<p class="blog_date">
										<span class="article_day">05</span>
										September
									</p>

									<h3 class="blog_title"><a href="../blogs/news/people-like-being-attractive-and-fashion-designers-know-it-quite-well.html">PEOPLE LIKE BEING ATTRACTIVE, AND FASHION DESIGNERS ...</a></h3>
								</div>
							</div>
							
							<div class="megamenu_col__item">
								
									<div class="blog_img">
										<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/articles/sai-de-silva-41032-unsplash_350x308_crop_center67e1.jpg?v=1558013230" alt="CLOTHING STORES SEEM TO BE ONE OF THE MOST POPULAR PLACES OF ALL TIMES">
									</div>
								
								
								<div class="blog_info">
									<p class="blog_date">
										<span class="article_day">05</span>
										September
									</p>

									<h3 class="blog_title"><a href="../blogs/news/clothing-stores-seem-to-be-one-of-the-most-popular-places-of-all-times.html">CLOTHING STORES SEEM TO BE ONE OF THE MOST POPULAR P...</a></h3>
								</div>
							</div>
							
							<div class="megamenu_col__item">
								
									<div class="blog_img">
										<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/articles/kevin-gent-437469-unsplash_350x308_crop_center2d04.jpg?v=1558013236" alt="Times change and bring these changes in all spheres of life.">
									</div>
								
								
								<div class="blog_info">
									<p class="blog_date">
										<span class="article_day">05</span>
										September
									</p>

									<h3 class="blog_title"><a href="../blogs/news/times-change-and-bring-these-changes-in-all-spheres-of-life.html">Times change and bring these changes in all spheres ...</a></h3>
								</div>
							</div>
							
						</li>
					</ul>
				

		

	</li>


	
	
	

	<li class="level_1__item level_2__products">
		<a class="level_1__link " href="../collections/sale.html">Sale
			<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1479746552441"></i> 
		</a>

		

					<ul class="level_2" id="menu_1479746552441">
						<li class="container">
							
								<div class="megamenu_col__item">
									<div class="product">
										<div class="product_img">
											<a href="../products/contrast_dress.html">
												<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/products/contrast_dress_1_255xa156.jpg?v=1558440886" alt="Contrast Dress" />
											</a>
										</div>

										<div class="product_info">
											<p class="product_name">
												<a href="../products/contrast_dress.html">Contrast Dress</a>
											</p>

											<p class="product_price">
												<span class="money">$45.00</span>

												
											</p>
										</div>
									</div>
								</div>
							
								<div class="megamenu_col__item">
									<div class="product">
										<div class="product_img">
											<a href="../products/plush_trousers.html">
												<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/products/plush_trousers_1_33c95fdf-ad4e-4080-9ef5-1ac798369a42_255xaa9b.jpg?v=1558008618" alt="Plush Trousers" />
											</a>
										</div>

										<div class="product_info">
											<p class="product_name">
												<a href="../products/plush_trousers.html">Plush Trousers</a>
											</p>

											<p class="product_price">
												<span class="money">$45.00</span>

												
													<span class="money money_sale">$50.00</span>
												
											</p>
										</div>
									</div>
								</div>
							
								<div class="megamenu_col__item">
									<div class="product">
										<div class="product_img">
											<a href="../products/lined_jogging_trousers.html">
												<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/products/lined_jogging_trousers_1_eaadc2f3-9977-483f-8519-2768bf218d0d_255x4077.jpg?v=1558008062" alt="Lined Jogging Trousers" />
											</a>
										</div>

										<div class="product_info">
											<p class="product_name">
												<a href="../products/lined_jogging_trousers.html">Lined Jogging Trousers</a>
											</p>

											<p class="product_price">
												<span class="money">$20.00</span>

												
													<span class="money money_sale">$33.00</span>
												
											</p>
										</div>
									</div>
								</div>
							
								<div class="megamenu_col__item">
									<div class="product">
										<div class="product_img">
											<a href="../products/contrast_embroidered_top.html">
												<img src="../../cdn.shopify.com/s/files/1/0245/9520/2108/products/contrast_embroidered_top_1_38838c44-aa05-434a-b2a8-c53679884272_255x9ebc.jpg?v=1558440842" alt="Contrast Embroidered Top" />
											</a>
										</div>

										<div class="product_info">
											<p class="product_name">
												<a href="../products/contrast_embroidered_top.html">Contrast Embroidered Top</a>
											</p>

											<p class="product_price">
												<span class="money">$20.00</span>

												
													<span class="money money_sale">$25.00</span>
												
											</p>
										</div>
									</div>
								</div>
							
						</li>
					</ul>
				

			

	</li>


	
	
	

	<li class="level_1__item ">
		<a class="level_1__link " href="../pages/contact-us.html">Contact Us
			 
		</a>

		

	</li>


</ul>
</nav>

</div>

				<div class="header_wrap2 header_right">
					
						<div class="header_cart" id="main__cart_item">
							<a class="cart_link" href="../cart.html"><b><i class="fa fa-shopping-cart" aria-hidden="true"></i>My Cart: </b><span id="cart_items"> 0 </span> item(s)</a>

							
								<script>
									theme.cartAjaxOn = true;
									theme.cartAjaxTextEmpty = 'It appears that your cart is currently empty';
									theme.cartAjaxTextTotalPrice = 'Total price';
									theme.cartAjaxTextGoCart = 'Go to cart';
									theme.cartAjaxTextClearCart = 'Clear cart';
								</script>
								<div class="cart_content_wrap">
									<div class="cart_content_preloader off">
										<div class="global_loader"></div>
									</div>
									<div id="cart_content_box">
										
											<p class="alert alert-warning">It appears that your cart is currently empty</p>

										
									</div>
								</div>
							
						</div>
					
				</div>
			</div>
		</div>
	</div>
</header>

<style>
	#page_header .level_1__link:hover {color: #fdf997 !important;} 
	#page_header .header_cart:hover .cart_link {color: #fdf997 !important;} 
	#page_header .level_1__link.active  {color: #fdf997 !important;} 
</style>



</div>

				<div class="page_container">
					
						<div class="breadcrumbs">
	<div class="container">
		<ul>
			<li><a href="../index.html">Home</a></li>

			
					<li><span>Account</span></li>

			
		</ul>
	</div>
</div>
					

					
					
							<div class="main_content ">
								<div class="template_customer template_customer__login">
	<div class="container">
		<h1 class="page_heading">Account</h1>

		<div id="account_section__wrapper" class="account_section__wrapper">
			<div class="account_section account_section__welcome">
				<h4>New here?</h4>

				<p class="note">Registration is free and easy!</p>

				<ul>
					<li>Faster checkout</li>
					<li>Save multiple shipping addresses</li>
					<li>View and track orders and more</li>
				</ul>

				<a id="account_register__link" class="btn" href="#">Create an account</a>
			</div>

			<div class="account_section account_section__login">
				<form method="post" action="" id="customer_login" accept-charset="UTF-8">
					<h4>Already registered?</h4>

					

					<div class="form-group">
						<label for="customer_email">Email address</label>
						<input type="email" value="" name="customer_email" id="customer_email">
					</div>
					
					
						<div class="form-group">
							<label for="customer_password">Password</label>
							<input type="password" value="" name="customer_password" id="customer_password">
						</div>
<?php
                                if (isset($error)) {
                                  echo "<div class='alert alert-danger' role='alert'>$error </div>";
                                           }
                                ?>
					
					  
					<div class="form-group">
						<button class="btn" type="submit" name="submit">Sign in</button>
						<a id="account_reset__link" href="#">Forgot your password?</a>
					</div>
				</form>
			</div>
		</div>

		<div id="account_section__register" class="account_section account_section__register account_section__hidden">
			<h4>Create an account <a class="link_close account_register__close" href="#">Close</a></h4>

			<div class="form-horizontal">
				<form method="post" action="" id="create_customer" accept-charset="UTF-8">
					

					

					<div class="clearfix form-group">
						<label for="first_name" class="col-sm-4">First name</label>
						<div class="col-sm-4">
							<input type="text" value="" name="cfirst_name" id="first_name">
						</div>
					</div>

				
					<div class="clearfix form-group">
						<label for="email" class="col-sm-4">Email address</label>
						<div class="col-sm-4">
							<input type="email" value="" name="customer_email" id="email">
						</div>
					</div>

					<div class="clearfix form-group">
						<label for="password_1" class="col-sm-4">Password</label>
						<div class="col-sm-4">
							<input type="password" name="customer_password" value="" id="password_1">
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<input name="register" class="btn btn-primary" type="submit">Register</input>
							<a class="account_register__close" href="#">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div id="account_section__reset" class="account_section account_section__hidden">
			<h4>Reset Password <a class="link_close account_reset__cancel" href="#">Close</a></h4>

			<p class="note">We will send you an email to reset your password</p>

			<form method="post" action="https://theme685-baby-clothing.myshopify.com/account/recover" accept-charset="UTF-8"><input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden" name="utf8" value="✓" />
				<div class="clearfix form-horizontal">
					
						
					

					<div class="form-group">
						<label for="email_recover" class="large col-sm-4">Email Address</label>
						<div class="col-sm-4">
							<input type="email" id="email_recover" name="email" value="">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-4">
							<button type="submit" class="btn">Submit</button>
							<a class="account_reset__cancel" href="#">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		</div>

		
	</div>
</div>

<script>
	theme.loginForms = true;
</script>
<div id="shopify-section-template-login" class="shopify-section"></div> 
							    
							</div>

							
					
					
					
						<div id="shopify-section-footer" class="shopify-section">


<footer   style="background: rgba(0,0,0,0);"> 
	<div class="footer_row__1"> 
		<div class="container">

			<div class="row footer_main">
				
					<div class="col-sm-3 footer_block footer_block__2_1">
						
								<div class="footer_item footer_item__about "  >
									<h3>About our company</h3>

									

									
										<div class="about_text"><p></p>
<p>Childhood is a special time, when you can carelessly enjoy life at its full. For our part, we do everything to make it possible. Rely on us with all of your baby clothing needs and focus on what matters the most &ndash; smiles, cuddles, joyful eyes, and other little things that will make you happy as a parent.</p></div>
									
								</div>
						 
					</div>
				
					<div class="col-sm-3 footer_block ">
						
<div class="footer_item footer_item__links " >
									<h3>Categories</h3>

									<ul>
										
											<li>
												<a  href="../collections/sale.html">Accessories</a>
											</li>
										
											<li>
												<a  href="../collections/basics.html">Basics</a>
											</li>
										
											<li>
												<a  href="../collections/jackets.html">Jackets</a>
											</li>
										
											<li>
												<a  href="../collections/jogging.html">Jogging</a>
											</li>
										
											<li>
												<a  href="../collections/sale-1.html">Sale</a>
											</li>
										
											<li>
												<a  href="../collections/shoes.html">Shoes</a>
											</li>
										
											<li>
												<a  href="../collections/t-shirts.html">T-Shirts</a>
											</li>
										
									</ul>
								</div>

							 
					</div>
				
					<div class="col-sm-3 footer_block footer_block__2_1">
						
<div class="footer_item footer_item__links " >
									<h3>Information</h3>

									<ul>
										
											<li>
												<a  href="../pages/about-us.html">About Us</a>
											</li>
										
											<li>
												<a  href="../collections.html">Collections</a>
											</li>
										
											<li>
												<a  href="../pages/contact-us.html">Contact Us</a>
											</li>
										
											<li>
												<a  href="../collections/all.html">Catalog</a>
											</li>
										
											<li>
												<a  href="../pages/password.html">Password</a>
											</li>
										
											<li>
												<a  href="../pages/privacy-policy.html">Privacy Policy</a>
											</li>
										
											<li>
												<a  href="../blogs/news.html">Blog</a>
											</li>
										
									</ul>
								</div>

							 
					</div>
				
					<div class="col-sm-3 footer_block ">
						
<div class="footer_item footer_item__links " >
									<h3>My Account</h3>

									<ul>
										
											<li>
												<a  href="login4236.html">My Account</a>
											</li>
										
											<li>
												<a class="active" href="login.html">Log in</a>
											</li>
										
											<li>
												<a  href="login4918.html">My Addresses</a>
											</li>
										
											<li>
												<a  href="login4236.html">My Orders</a>
											</li>
										
											<li>
												<a  href="../pages/password.html">Password</a>
											</li>
										
											<li>
												<a  href="../pages/contact-us.html">Contact Us</a>
											</li>
										
											<li>
												<a  href="../blogs/news.html">Latest News</a>
											</li>
										
									</ul>
								</div>

							 
					</div>
				

			</div>

		</div>

	</div>

	
		

		<div class="footer_row__2 " > 
			<div class="container">
				<div class="footer_wrap_1">
					
							
							<div class="footer_wrap_2 footer_center">
								©kidsweet. <a target="_blank" rel="nofollow" href="https://www.shopify.com/?utm_campaign=poweredby&amp;utm_medium=shopify&amp;utm_source=onlinestore">Powered by Shopify</a>
							</div>
						
					

					
				</div>
			</div>
		</div>
	
</footer>


<style>
	#shopify-section-footer footer {padding-top: 0px;}
</style>

	



</div>
					
				</div>

				<a id="back_top" href="#">
					<i class="fa fa-angle-up" aria-hidden="true"></i>
				</a>
			
		</div>

		<script src="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/assets6067.js?v=15427973077311012127" defer></script>
		<script src="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/shop00c8.js?v=2953486184645170537" defer></script>
		<link href="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/style.scss6c2f.css?v=2068179708871254939" rel="stylesheet" type="text/css" media="all" />

		
			<script src="../../cdn.shopify.com/s/assets/themes_support/shopify_common-8ea6ac3faf357236a97f5de749df4da6e8436ca107bc3a4ee805cbf08bc47392.js" defer></script>
			<script src="../../cdn.shopify.com/s/assets/themes_support/customer_area-4beccea87758d91106a581ba89341d9b51842f6da79209258c8297239e950343.js" defer></script>

		
		
		
			<script>
				theme.titleAnimation = false;
			</script>
		

		<noscript id="deferred_styles">
			<link href="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/responsive.scss41fa.css?v=14820435587284736483" rel="stylesheet" type="text/css" media="all" />
			
		</noscript>

		<script>
			var loadDeferredStyles = function() {
				var addStylesNode = document.getElementById('deferred_styles');
				var replacement = document.createElement('div');
				replacement.innerHTML = addStylesNode.textContent;
				document.body.appendChild(replacement)
				addStylesNode.parentElement.removeChild(addStylesNode);
			};
			var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
			if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
			else window.addEventListener('load', loadDeferredStyles);
		</script>

		

		<script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');</script><meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/24595202108/digital_wallets/dialog">
<link href="https://monorail-edge.shopifysvc.com/" rel="dns-prefetch">
<script id="shopify-features" type="application/json">{"accessToken":"6aca557a56644bb5fd6cdde2ca631a12","betas":["rich-media-storefront-analytics"],"domain":"theme685-baby-clothing.myshopify.com","predictiveSearch":true,"shopId":24595202108,"smart_payment_buttons_url":"https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js","dynamic_checkout_cart_url":"https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js","locale":"en"}</script>
<script>var Shopify = Shopify || {};
Shopify.shop = "theme685-baby-clothing.myshopify.com";
Shopify.locale = "en";
Shopify.currency = {"active":"USD","rate":"1.0"};
Shopify.theme = {"name":"Theme685","id":72785526844,"theme_store_id":null,"role":"main"};
Shopify.theme.handle = "null";
Shopify.theme.style = {"id":null,"handle":null};</script>
<script type="module">!function(o){(o.Shopify=o.Shopify||{}).modules=!0}(window);</script>
<script>!function(o){function n(){var o=[];function n(){o.push(Array.prototype.slice.apply(arguments))}return n.q=o,n}var t=o.Shopify=o.Shopify||{};t.loadFeatures=n(),t.autoloadFeatures=n()}(window);</script>
<script id="__st">var __st={"a":24595202108,"offset":-14400,"reqid":"f9bd345b-d366-42c6-9fac-1adf3e033bf8","pageurl":"theme685-baby-clothing.myshopify.com\/account\/login","u":"6134de637f29"};</script>
<script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
<script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
window.ShopifyAnalytics.meta.currency = 'USD';
var meta = {"page":{}};
for (var attr in meta) {
  window.ShopifyAnalytics.meta[attr] = meta[attr];
}</script>
<script>window.ShopifyAnalytics.merchantGoogleAnalytics = function() {
  
};
</script>
<script class="analytics">(function () {
  var customDocumentWrite = function(content) {
    var jquery = null;

    if (window.jQuery) {
      jquery = window.jQuery;
    } else if (window.Checkout && window.Checkout.$) {
      jquery = window.Checkout.$;
    }

    if (jquery) {
      jquery('body').append(content);
    }
  };

  var isDuplicatedThankYouPageView = function() {
    return document.cookie.indexOf('loggedConversion=' + window.location.pathname) !== -1;
  }

  var setCookieIfThankYouPage = function() {
    if (window.location.pathname.indexOf('/checkouts') !== -1 &&
        window.location.pathname.indexOf('/thank_you') !== -1) {

      var twoMonthsFromNow = new Date(Date.now());
      twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

      document.cookie = 'loggedConversion=' + window.location.pathname + '; expires=' + twoMonthsFromNow;
    }
  }

  var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
  if (trekkie.integrations) {
    return;
  }
  trekkie.methods = [
    'identify',
    'page',
    'ready',
    'track',
    'trackForm',
    'trackLink'
  ];
  trekkie.factory = function(method) {
    return function() {
      var args = Array.prototype.slice.call(arguments);
      args.unshift(method);
      trekkie.push(args);
      return trekkie;
    };
  };
  for (var i = 0; i < trekkie.methods.length; i++) {
    var key = trekkie.methods[i];
    trekkie[key] = trekkie.factory(key);
  }
  trekkie.load = function(config) {
    trekkie.config = config;
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.onerror = function(e) {
      (new Image()).src = 'http://v.shopify.com/internal_errors/track?error=trekkie_load';
    };
    script.async = true;
    script.src = '../../cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min7bee.js?v=2020.04.13.1';
    var first = document.getElementsByTagName('script')[0];
    first.parentNode.insertBefore(script, first);
  };
  trekkie.load(
    {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":24595202108,"isMerchantRequest":null,"themeId":72785526844,"themeCityHash":"6118820579615239674","contentLanguage":"en","currency":"USD"},"isServerSideCookieWritingEnabled":true},"Performance":{"navigationTimingApiMeasurementsEnabled":true,"navigationTimingApiMeasurementsSampleRate":1},"Session Attribution":{}}
  );

  var loaded = false;
  trekkie.ready(function() {
    if (loaded) return;
    loaded = true;

    window.ShopifyAnalytics.lib = window.trekkie;
    

    var originalDocumentWrite = document.write;
    document.write = customDocumentWrite;
    try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
    document.write = originalDocumentWrite;
      (function () {
        if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
          return;
        }
        window.BOOMR = window.BOOMR || {};
        window.BOOMR.snippetStart = new Date().getTime();
        window.BOOMR.snippetExecuted = true;
        window.BOOMR.snippetVersion = 12;
        window.BOOMR.application = "core";
        window.BOOMR.shopId = 24595202108;
        window.BOOMR.themeId = 72785526844;
        window.BOOMR.url =
          "../../cdn.shopify.com/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
        var where = document.currentScript || document.getElementsByTagName("script")[0];
        var parentNode = where.parentNode;
        var promoted = false;
        var LOADER_TIMEOUT = 3000;
        function promote() {
          if (promoted) {
            return;
          }
          var script = document.createElement("script");
          script.id = "boomr-scr-as";
          script.src = window.BOOMR.url;
          script.async = true;
          parentNode.appendChild(script);
          promoted = true;
        }
        function iframeLoader(wasFallback) {
          promoted = true;
          var dom, bootstrap, iframe, iframeStyle;
          var doc = document;
          var win = window;
          window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
          bootstrap = function(parent, scriptId) {
            var script = doc.createElement("script");
            script.id = scriptId || "boomr-if-as";
            script.src = window.BOOMR.url;
            BOOMR_lstart = new Date().getTime();
            parent = parent || doc.body;
            parent.appendChild(script);
          };
          if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
            window.BOOMR.snippetMethod = "s";
            bootstrap(parentNode, "boomr-async");
            return;
          }
          iframe = document.createElement("IFRAME");
          iframe.src = "about:blank";
          iframe.title = "";
          iframe.role = "presentation";
          iframe.loading = "eager";
          iframeStyle = (iframe.frameElement || iframe).style;
          iframeStyle.width = 0;
          iframeStyle.height = 0;
          iframeStyle.border = 0;
          iframeStyle.display = "none";
          parentNode.appendChild(iframe);
          try {
            win = iframe.contentWindow;
            doc = win.document.open();
          } catch (e) {
            dom = document.domain;
            iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
            win = iframe.contentWindow;
            doc = win.document.open();
          }
          if (dom) {
            doc._boomrl = function() {
              this.domain = dom;
              bootstrap();
            };
            doc.write("<body onload='document._boomrl();'>");
          } else {
            win._boomrl = function() {
              bootstrap();
            };
            if (win.addEventListener) {
              win.addEventListener("load", win._boomrl, false);
            } else if (win.attachEvent) {
              win.attachEvent("onload", win._boomrl);
            }
          }
          doc.close();
        }
        var link = document.createElement("link");
        if (link.relList &&
          typeof link.relList.supports === "function" &&
          link.relList.supports("preload") &&
          ("as" in link)) {
          window.BOOMR.snippetMethod = "p";
          link.href = window.BOOMR.url;
          link.rel = "preload";
          link.as = "script";
          link.addEventListener("load", promote);
          link.addEventListener("error", function() {
            iframeLoader(true);
          });
          setTimeout(function() {
            if (!promoted) {
              iframeLoader(true);
            }
          }, LOADER_TIMEOUT);
          BOOMR_lstart = new Date().getTime();
          parentNode.appendChild(link);
        } else {
          iframeLoader(false);
        }
        function boomerangSaveLoadTime(e) {
          window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
        }
        if (window.addEventListener) {
          window.addEventListener("load", boomerangSaveLoadTime, false);
        } else if (window.attachEvent) {
          window.attachEvent("onload", boomerangSaveLoadTime);
        }
        if (document.addEventListener) {
          document.addEventListener("onBoomerangLoaded", function(e) {
            e.detail.BOOMR.init({
              ResourceTiming: {
                enabled: true,
                trackedResourceTypes: ["script", "img", "css"]
              },
            });
            e.detail.BOOMR.t_end = new Date().getTime();
          });
        } else if (document.attachEvent) {
          document.attachEvent("onpropertychange", function(e) {
            if (!e) e=event;
            if (e.propertyName === "onBoomerangLoaded") {
              e.detail.BOOMR.init({
                ResourceTiming: {
                  enabled: true,
                  trackedResourceTypes: ["script", "img", "css"]
                },
              });
              e.detail.BOOMR.t_end = new Date().getTime();
            }
          });
        }
      })();
    

    if (!isDuplicatedThankYouPageView()) {
      setCookieIfThankYouPage();
      
        window.ShopifyAnalytics.lib.page(
          null,
          {}
        );
      
      
    }
  });

  
      var eventsListenerScript = document.createElement('script');
      eventsListenerScript.async = true;
      eventsListenerScript.src = "../../cdn.shopify.com/s/assets/shop_events_listener-2c6237918c4bbec8783d8ceecd5759edc38afa9b5bef55134462710955517539.js";
      document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
    
})();</script>
<script integrity="sha256-WJ/zNC1jntI8lPX8EeA9ZOB4jipKaHOR6+7u8g6vL1A=" crossorigin="anonymous" data-source-attribution="shopify.loadfeatures" defer="defer" src="../../cdn.shopify.com/s/assets/storefront/load_feature-589ff3342d639ed23c94f5fc11e03d64e0788e2a4a687391ebeeeef20eaf2f50.js"></script>
<script integrity="sha256-EYppj7RbseKnaugbP4EJXR4sMs7TPdTpPmQ3i163eNA=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="../../cdn.shopify.com/s/assets/storefront/features-118a698fb45bb1e2a76ae81b3f81095d1e2c32ced33dd4e93e64378b5eb778d0.js" crossorigin="anonymous"></script>
<script id="sections-script" data-sections="template-login,header,footer" defer="defer" src="../../cdn.shopify.com/s/files/1/0245/9520/2108/t/2/compiled_assets/scripts75b9.js?3104"></script>

<script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>

	</body>


<!-- Mirrored from theme685-baby-clothing.myshopify.com/account/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 May 2020 17:40:40 GMT -->
</html>