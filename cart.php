<?php


$conn=  mysqli_connect("localhost","root","","ekids");
if (!$conn) {
die("cannot connect to server");
}

session_start();
$productCart = array();
$count = 0;

if(isset($_SESSION['product'])){
	//echo 111;die;
foreach ($_SESSION['product']as $pro_id ) {
		//echo $pro_id;
   $qu = "SELECT product_id,product_name,product_description,product_price,product_image,
    age,mproduct_name,mcategory_name,product.mcategory_id,product.mproduct_id,product.age_id from product
     inner join  main_category on main_category.mcategory_id = product.mcategory_id 
     inner join age on age.age_id = product.age_id
       inner join main_product on main_product.mproduct_id = product.mproduct_id  where product_id = 
       $pro_id";

		$res=mysqli_query($conn,$qu);
		if($res){
		while($row = mysqli_fetch_assoc($res)){
			$productCart[] = $row;}
		}
}

	
}

//$_COOKIE['item'][] = $pro_id;
//$pro_id = $_GET['id'];

function remove_product($id){
	$id = intval($id);
	$max    = count($_SESSION['product']);
	for ($i=0; $i <$max ; $i++) { 
		if ($_SESSION['product']['$i'] == $pro_id) {
			unset($_SESSION['product']['$i']);
		}
	}
	$_SESSION['product'] = array_values($_SESSION['product']);
}

if (isset($_GET['deletepro'])) {
	$key = $_GET['deletepro'];
	$pro_id = $_GET['product_id'];
	remove_product($_GET['deletepro']);
}


//if(is_array($_COOKIE['item'])){

	//foreach ($_COOKIE['item'] as $pro_id=> $value){

    //if (isset($_POST['deletepro']))
 //{
	//echo "111";
	//setcookie('item[$pro_id]',"", time()-1800);

?>
<!doctype html>
<html lang="en" class="color_scheme">
	<head>
		<meta charset="utf-8">

		

		<title>
			Your Shopping Cart

			
				&ndash; kidsweet
			
		</title>

		<link rel="canonical" href="https://theme685-baby-clothing.myshopify.com/cart">

		
			<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0245/9520/2108/files/fav_32x32.png?v=1558076533" type="image/png">
		

		

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

	<body class="template-cart scheme_1">
		<div class="page_wrapper">

			<div id="page_preloader__bg">
				<img id="page_preloader__img" src="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/shopify_logo.gif?v=12415398779637264056" alt="">
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
							<form action="/search" method="get" role="search" class="search_form">
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
							<a href="account/login.php" title="My account"><i class="fa fa-user" aria-hidden="true"></i><span>My account</span></a>

							
						</div>
					

						<script>
							theme.shopCurrency = "USD";
							theme.moneyFormat = "${{amount}}";
							theme.moneyFormatCurrency = "${{amount}} USD";
						</script>

						<script src="//cdn.shopify.com/s/javascripts/currencies.js" defer></script>
						<script src="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/currency-tools.js?v=5605314120525099720" defer></script>
					

				</div>
			</div>
		</div>

		<div class="header_wrap1" >   
			<div class="container header_main_wrap">
				<div class="header_wrap2 header_left">
					

					
							
								<a class="header_logo" href="https://theme685-baby-clothing.myshopify.com">
									<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/logo_170x30_crop_center@2x.png?v=1558086808" alt="kidsweet" style="max-width: 170px">
									
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
										<a class="level_1__link " href="https://theme685-baby-clothing.myshopify.com">Home
											<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1524227640085"></i> 
										</a>

										

<ul class="level_2" id="menu_1524227640085">
	<li>
		<div><ul class="level_3">
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/">Home</a>

						
					</li>
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/collections/all">Catalog</a>

						
					</li>
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/collections">Collections</a>

						
					</li>
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/blogs/news">Blog</a>

						
					</li>
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/pages/about-us">About Us</a>

						
					</li>
				


					<li class="level_3__item ">
						<a class="level_3__link" href="/pages/contact-us">Contact Us</a>

						
					</li>
				


					<li class="level_3__item with_ul">
						<a class="level_3__link" href="/pages/faq">Pages<i class="level_3__trigger megamenu_trigger" data-submenu="submenu_1524227640085-7"></i></a>

						
							<ul class="level_3_2 droped_linklist" id="submenu_1524227640085-7">
								

										
									<li class="level_3_2_item ">
										<a class="level_3_2_link" href="/pages/password">Password</a>

										
									</li>
								

										
									<li class="level_3_2_item ">
										<a class="level_3_2_link" href="/pages/privacy-policy">Privacy Policy</a>

										
									</li>
								

										
									<li class="level_3_2_item ">
										<a class="level_3_2_link" href="/pages/services">Services</a>

										
									</li>
								

										
									<li class="level_3_2_item ">
										<a class="level_3_2_link" href="/pages/wishlist">Wishlist</a>

										
									</li>
								
							</ul>
						
					</li>
				
			</ul>
		</div>
	</li>
</ul>




</li>




									

									<li class="level_1__item level_2__links">
										<a class="level_1__link " href="/collections/all">Catalog
											<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1524467474031"></i> 
										</a>

										
												
													<ul class="level_2" id="menu_1524467474031">
														<li class="container">
															
																
																
<div class="megamenu_col__item ">
																	
									
										<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/4_255x180_crop_center.png?v=1558360356" alt="Catalog #1">
									
									
									<h3 >Catalog #1 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-1"></i></h3>

									<ul class="level_3" id="menu_1524467474031-1">
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/sale">Accessories</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/basics">Basics</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/jackets">Jackets</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/jogging">Jogging</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/sale-1">Sale</a>
											</li>
										
									</ul>
								</div>
							
								
								
<div class="megamenu_col__item ">
									
									
										<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/1_255x180_crop_center.png?v=1558360351" alt="Catalog #2">
									
									
									<h3 >Catalog #2 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-2"></i></h3>

									<ul class="level_3" id="menu_1524467474031-2">
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/sale-1">Sale</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/jogging">Jogging</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/jackets">Jackets</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/basics">Basics</a>
											</li>
										
											<li class="level_3__item">
												

												<a class="level_3__link" href="/collections/sale">Accessories</a>
											</li>
										
									</ul>
								</div>
															
																
																
<div class="megamenu_col__item ">
							
							
								<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/3_255x180_crop_center.png?v=1558360354" alt="Catalog #3">
							
							
							<h3 >Catalog #3 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-3"></i></h3>

							<ul class="level_3" id="menu_1524467474031-3">
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="/collections/jackets">Jackets</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="/collections/jogging">Jogging</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="/collections/sale-1">Sale</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="/collections/shoes">Shoes</a>
									</li>
								
									<li class="level_3__item">
										

										<a class="level_3__link" href="/collections/t-shirts">T-Shirts</a>
									</li>
								
							</ul>
						</div>
															
																
																
<div class="megamenu_col__item ">
																	
																	
									<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/2_255x180_crop_center.png?v=1558360352" alt="Catalog #4">
								
								
								<h3 >Catalog #4 <i class="level_2__trigger megamenu_trigger" data-submenu="menu_1524467474031-4"></i></h3>

								<ul class="level_3" id="menu_1524467474031-4">
									
										<li class="level_3__item">
											

											<a class="level_3__link" href="/collections/t-shirts">T-Shirts</a>
										</li>
									
										<li class="level_3__item">
											

											<a class="level_3__link" href="/collections/shoes">Shoes</a>
										</li>
									
										<li class="level_3__item">
											

											<a class="level_3__link" href="/collections/sale-1">Sale</a>
										</li>
									
										<li class="level_3__item">
											

											<a class="level_3__link" href="/collections/jogging">Jogging</a>
										</li>
									
										<li class="level_3__item">
											

											<a class="level_3__link" href="/collections/jackets">Jackets</a>
										</li>
									
								</ul>
							</div>
						
					</li>
				</ul>
			

		

</li>






<li class="level_1__item level_2__links">
	<a class="level_1__link " href="/collections">Collections
		<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1558087194434"></i> 
	</a>

	
			
				<ul class="level_2" id="menu_1558087194434">
					<li class="container">
						
							
							
							

							
								<div class="megamenu_col__item ">
								
									<a href="/collections/sale"><img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/5_255x180_crop_center.png?v=1558360395" alt="Accessories">
										
									
										<h4>Accessories</h4>
									
									</a>
								</div>
							
						
							
							
							

							
								<div class="megamenu_col__item ">
								
									<a href="/collections/basics"><img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/6_255x180_crop_center.png?v=1558360396" alt="Basics">
										
									
										<h4>Basics</h4>
									
									</a>
								</div>
							
						
							
							
							

							
								<div class="megamenu_col__item ">
								
									<a href="/collections/jogging"><img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/7_255x180_crop_center.png?v=1558360398" alt="Jogging">
										
									
										<h4>Jogging</h4>
									
									</a>
								</div>
							
						
							
							
							

							
								<div class="megamenu_col__item ">
								
									<a href="/collections/shoes"><img src="//cdn.shopify.com/s/files/1/0245/9520/2108/files/8_255x180_crop_center.png?v=1558360400" alt="Shoes">
										
									
										<h4>Shoes</h4>
									
									</a>
								</div>	
									
								</li>
							</ul>
						

					

			</li>

								
									
									
									

									<li class="level_1__item level_2__blog">
										<a class="level_1__link " href="/blogs/news">Blog
											<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1479747008568"></i> 
										</a>

										

							<ul class="level_2" id="menu_1479747008568">
								<li class="container">
									
									<div class="megamenu_col__item">
										
											<div class="blog_img">
												<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/articles/amelia-keller-517180-unsplash_350x308_crop_center.jpg?v=1558013221" alt="PEOPLE LIKE BEING ATTRACTIVE, AND FASHION DESIGNERS KNOW IT QUITE WELL">
											</div>
										
										
										<div class="blog_info">
											<p class="blog_date">
												<span class="article_day">05</span>
												September
											</p>

											<h3 class="blog_title"><a href="/blogs/news/people-like-being-attractive-and-fashion-designers-know-it-quite-well">PEOPLE LIKE BEING ATTRACTIVE, AND FASHION DESIGNERS ...</a></h3>
										</div>
									</div>
									
									<div class="megamenu_col__item">
										
											<div class="blog_img">
												<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/articles/sai-de-silva-41032-unsplash_350x308_crop_center.jpg?v=1558013230" alt="CLOTHING STORES SEEM TO BE ONE OF THE MOST POPULAR PLACES OF ALL TIMES">
											</div>
										
										
										<div class="blog_info">
											<p class="blog_date">
												<span class="article_day">05</span>
												September
											</p>

											<h3 class="blog_title"><a href="/blogs/news/clothing-stores-seem-to-be-one-of-the-most-popular-places-of-all-times">CLOTHING STORES SEEM TO BE ONE OF THE MOST POPULAR P...</a></h3>
										</div>
									</div>
									
									<div class="megamenu_col__item">
										
											<div class="blog_img">
												<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/articles/kevin-gent-437469-unsplash_350x308_crop_center.jpg?v=1558013236" alt="Times change and bring these changes in all spheres of life.">
											</div>
										
										
										<div class="blog_info">
											<p class="blog_date">
												<span class="article_day">05</span>
												September
											</p>

											<h3 class="blog_title"><a href="/blogs/news/times-change-and-bring-these-changes-in-all-spheres-of-life">Times change and bring these changes in all spheres ...</a></h3>
										</div>
									</div>
									
								</li>
							</ul>
						

				

			</li>

		
			
			
			

			<li class="level_1__item level_2__products">
				<a class="level_1__link " href="/collections/sale">Sale
					<i class="level_1__trigger megamenu_trigger" data-submenu="menu_1479746552441"></i> 
				</a>

				

							<ul class="level_2" id="menu_1479746552441">
								<li class="container">
									
										<div class="megamenu_col__item">
											<div class="product">
												<div class="product_img">
													<a href="/products/contrast_dress">
														<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/products/contrast_dress_1_255x.jpg?v=1558440886" alt="Contrast Dress" />
													</a>
												</div>

												<div class="product_info">
													<p class="product_name">
														<a href="/products/contrast_dress">Contrast Dress</a>
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
													<a href="/products/plush_trousers">
														<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/products/plush_trousers_1_33c95fdf-ad4e-4080-9ef5-1ac798369a42_255x.jpg?v=1558008618" alt="Plush Trousers" />
													</a>
												</div>

												<div class="product_info">
													<p class="product_name">
														<a href="/products/plush_trousers">Plush Trousers</a>
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
													<a href="/products/lined_jogging_trousers">
														<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/products/lined_jogging_trousers_1_eaadc2f3-9977-483f-8519-2768bf218d0d_255x.jpg?v=1558008062" alt="Lined Jogging Trousers" />
													</a>
												</div>

												<div class="product_info">
													<p class="product_name">
														<a href="/products/lined_jogging_trousers">Lined Jogging Trousers</a>
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
													<a href="/products/contrast_embroidered_top">
														<img src="//cdn.shopify.com/s/files/1/0245/9520/2108/products/contrast_embroidered_top_1_38838c44-aa05-434a-b2a8-c53679884272_255x.jpg?v=1558440842" alt="Contrast Embroidered Top" />
													</a>
												</div>

												<div class="product_info">
													<p class="product_name">
														<a href="/products/contrast_embroidered_top">Contrast Embroidered Top</a>
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
						<a class="level_1__link " href="/pages/contact-us">Contact Us
							 
						</a>

						

					</li>

				
			</ul>
		</nav>
	
</div>

				<div class="header_wrap2 header_right">
					
						<div class="header_cart" id="main__cart_item">
							<a class="cart_link" href="cart.php"><b><i class="fa fa-shopping-cart" aria-hidden="true"></i>My Cart: </b><span id="cart_items"> 3 </span> item(s)</a>

							
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
										
											<ul class="cart_list_items">
												
													<li class="cart_items" data-id="1">
														<img class="item_img" src="//cdn.shopify.com/s/files/1/0245/9520/2108/products/magical_wand_sweatshirt_1_5661eb3c-1898-414d-9367-504404d0b00d_90x90.jpg?v=1558441074"  alt="Magical Wand Sweatshirt - Red / 2T / Fleece" />
														<div class="item_desc">
															<a class="product_title" href="/products/magical_wand_sweatshirt">Magical Wand Sweatshirt</a>
															<span class="money">$20.00</span>
															<p class="product_quantity">x3</p>
															<a class="item_remove_btn" href="#" item-id="28571945861180"><i class="fa fa-trash"></i></a>
														</div>
													</li>
												 
											</ul>

											<div class="box_footer">
												<p class="cart_total"><b>Total price: </b><span class="money">$60.00</span></p>
												<a id="clear_cart_all_items" class="cart_clear" href="/cart/clear"><i class="fa fa-refresh" title="Clear cart"></i></a>
												<a class="btn cart_url" href="/cart">Go to cart</a>
											</div>

										
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
			<li><a href="/">Home</a></li>

			
					<li><span>Your Shopping Cart</span></li>

			
		</ul>
	</div>
</div>
					

					
					
							<div class="main_content ">
								<div class="template_cart">
	<div class="container">
		<h1 class="page_heading">Your Shopping Cart</h1>

		
			<form action="" method="post" novalidate class="cart">
				<table class="table table-bordered cart_items">
					<thead>
						<tr>
							<th class="column_product" colspan="2">Product</th>
							<th class="column_price">Price</th>
							<th class="column_quantity">Quantity</th>
							<th class="column_total">Total</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$sum=0;
						foreach ($productCart as $productC) {
                	$sum+= intval($productC['product_price']);
                	echo "<tr>";
                	echo"<td class='column_product_img'><a href='collections/basics/product.php'><img class='cart__image' src='images/pimages/{$productC['product_image']}' alt='{$productC['product_name']}'></a></td>";
                	echo "<td class='column_product_info'><p class='cart_item__name product_name'><a href='collections/basics/product.php'>{$productC['product_name']}</a></p>";
                	echo "<p class='cart_item__variant'><span><b>Age:</b>{$productC['age']} </span></p>";
                	echo "<div class='cart_item__details'><p class='item_type'><b>Product type:</b>{$productC['mcategory_name']}</p>";
					echo  "<p class='item_vendor'><b>Vendor:</b> kidsweet</p>
									</div>";
					  echo "<button type='submit' class='btn btn-danger deletepro' name='deletepro'  data-id='{$productC['product_id']}'  style= 'width: 100px; height:40px;'>Delete</button></td>";
                     
					echo "<td class='column_price'><span class='money'> {$productC['product_price']}</span></td>";	
					echo "<td class='column_quantity'>";
					echo  "<div class='quantity_box'><span class='quantity_down'><i class='fa fa-minus' aria-hidden='true'></i></span>";
					echo "<input id='updates_28571945861180:22459c3f6e15f3c1f7dc64661ab2c645' name='updates[]' value='3' class='quantity_input' type='text'><span class='quantity_up'><i class='fa fa-plus' aria-hidden='true'></i></span><button type='submit' name='update' class='btn'>Update</button></div></td>";
					echo "<td class='column_total'><span class='money'>$sum $</span></td></tr></tbody>";		
                }
                	?>
								
					
					<tfoot>
						

						<tr>
							<td colspan="5">
								<p class="cart_total">Total price <span class="money"><?php echo $sum+3;?>$</span></p>
							</td>
						</tr>

						<tr>
							<td colspan="5">
								<label for="cart_note">Add a note to your order</label>
								<textarea name="note" id="cart_note"></textarea>

								
								<p class="alert alert-warning">Kidsweet process all orders in USD. Shipping &amp; taxes calculated at checkout.</p>
							</td>
						</tr>

						<tr>
							<td colspan="5">
								<a class="btn" href="index.php">Continue shopping</a>
							</td>
                            <td>
                            	<!--<a href="checkout.php" class="btn btn-alt" style="background-color: black; color: white;" type="button">Checkout</a>--->
                                 <a href="checkout.php">
                            	<button type="button" name="submit"  style="width:180px; height: 40px;background-color: black;color: white;">Checkout</button></a>
								
                            </td>

						</tr>
					</tfoot>
				</table>
			</form>
		
	</div>
</div> 
							    
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
												<a  href="/collections/sale">Accessories</a>
											</li>
										
											<li>
												<a  href="/collections/basics">Basics</a>
											</li>
										
											<li>
												<a  href="/collections/jackets">Jackets</a>
											</li>
										
											<li>
												<a  href="/collections/jogging">Jogging</a>
											</li>
										
											<li>
												<a  href="/collections/sale-1">Sale</a>
											</li>
										
											<li>
												<a  href="/collections/shoes">Shoes</a>
											</li>
										
											<li>
												<a  href="/collections/t-shirts">T-Shirts</a>
											</li>
										
									</ul>
								</div>

							 
					</div>
				
					<div class="col-sm-3 footer_block footer_block__2_1">
						
<div class="footer_item footer_item__links " >
									<h3>Information</h3>

									<ul>
										
											<li>
												<a  href="/pages/about-us">About Us</a>
											</li>
										
											<li>
												<a  href="/collections">Collections</a>
											</li>
										
											<li>
												<a  href="/pages/contact-us">Contact Us</a>
											</li>
										
											<li>
												<a  href="/collections/all">Catalog</a>
											</li>
										
											<li>
												<a  href="/pages/password">Password</a>
											</li>
										
											<li>
												<a  href="/pages/privacy-policy">Privacy Policy</a>
											</li>
										
											<li>
												<a  href="/blogs/news">Blog</a>
											</li>
										
									</ul>
								</div>

							 
					</div>
				
					<div class="col-sm-3 footer_block ">
						
<div class="footer_item footer_item__links " >
									<h3>My Account</h3>

									<ul>
										
											<li>
												<a  href="/account">My Account</a>
											</li>
										
											<li>
												<a  href="/account/login">Log in</a>
											</li>
										
											<li>
												<a  href="/account/addresses">My Addresses</a>
											</li>
										
											<li>
												<a  href="/account/orders">My Orders</a>
											</li>
										
											<li>
												<a  href="/pages/password">Password</a>
											</li>
										
											<li>
												<a  href="/pages/contact-us">Contact Us</a>
											</li>
										
											<li>
												<a  href="/blogs/news">Latest News</a>
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
								©kidsweet. <a target="_blank" rel="nofollow" href="https://www.shopify.com?utm_campaign=poweredby&amp;utm_medium=shopify&amp;utm_source=onlinestore">Powered by Shopify</a>
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

		<script src="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/assets.js?v=15427973077311012127" defer></script>
		<script src="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/shop.js?v=2953486184645170537" defer></script>
		<link href="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/style.scss.css?v=2068179708871254939" rel="stylesheet" type="text/css" media="all" />

		
		
		
			<script>
				theme.titleAnimation = false;
			</script>
		

		<noscript id="deferred_styles">
			<link href="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/assets/responsive.scss.css?v=14820435587284736483" rel="stylesheet" type="text/css" media="all" />
			
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
<link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
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
<script id="__st">var __st={"a":24595202108,"offset":-14400,"reqid":"dca8e629-f418-4289-aaee-b7cb82454ef6","pageurl":"theme685-baby-clothing.myshopify.com\/cart","t":"prospect","u":"1a793620bcc7"};</script>
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
      (new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';
    };
    script.async = true;
    script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2020.04.13.1';
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
          "https://cdn.shopify.com/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
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
      eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-2c6237918c4bbec8783d8ceecd5759edc38afa9b5bef55134462710955517539.js";
      document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
    
})();</script>
<script integrity="sha256-WJ/zNC1jntI8lPX8EeA9ZOB4jipKaHOR6+7u8g6vL1A=" crossorigin="anonymous" data-source-attribution="shopify.loadfeatures" defer="defer" src="//cdn.shopify.com/s/assets/storefront/load_feature-589ff3342d639ed23c94f5fc11e03d64e0788e2a4a687391ebeeeef20eaf2f50.js"></script>
<script integrity="sha256-EYppj7RbseKnaugbP4EJXR4sMs7TPdTpPmQ3i163eNA=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="//cdn.shopify.com/s/assets/storefront/features-118a698fb45bb1e2a76ae81b3f81095d1e2c32ced33dd4e93e64378b5eb778d0.js" crossorigin="anonymous"></script>
<script id="sections-script" data-sections="header,footer" defer="defer" src="//cdn.shopify.com/s/files/1/0245/9520/2108/t/2/compiled_assets/scripts.js?3104"></script>

<script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>

	</body>

</html>